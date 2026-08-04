<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageReceived;
use App\Mail\ContactPdfDownload;
use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactMessageController extends Controller
{
    // "Bilincinle Tanış" PDF'ine yönlendirilen gerçek dosya (Drive'da barındırılıyor).
    // Tracking amacıyla kullanıcıya tokenlı URL veriliyor, buradan gerçek adrese yönleniyor.
    public const PDF_BILINCINLE_TANIS_URL = 'https://drive.google.com/file/d/1lxI1gMZSbOVrda1ppro4gwFsjLQdjVDq/view?sc=4296137712271806c4bfc8518a450eba220d10728&pli=1';

    /**
     * Tokenlı PDF indirme endpoint'i — sayacı artırıp gerçek PDF adresine yönlendirir.
     */
    public function pdfDownload(string $token): RedirectResponse
    {
        $message = ContactMessage::where('pdf_token', $token)->first();
        if (!$message) {
            abort(404);
        }

        $now = now();
        $message->increment('pdf_download_count');
        $message->update([
            'pdf_first_downloaded_at' => $message->pdf_first_downloaded_at ?? $now,
            'pdf_last_downloaded_at'  => $now,
        ]);

        return redirect()->away(self::PDF_BILINCINLE_TANIS_URL);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'           => ['required', 'string', 'max:120'],
            'email'          => ['required', 'email', 'max:160'],
            'phone'          => ['required', 'string', 'max:32', 'regex:/^[0-9 +()\-]{7,}$/'],
            'subject'        => ['nullable', 'string', 'max:160'],
            'message'        => ['nullable', 'string', 'max:6000'],
            'source_url'     => ['nullable', 'string', 'max:500'],
            'source_label'   => ['nullable', 'string', 'max:80'],
            'kvkk'           => ['accepted'],
            'consent_email'  => ['nullable'],
            'consent_sms'    => ['nullable'],
        ], [
            'kvkk.accepted' => 'Mesajı gönderebilmek için KVKK aydınlatma metnini kabul etmeniz gerekir.',
            'phone.regex'   => 'Geçerli bir telefon numarası giriniz.',
        ]);

        $sourceUrl = $data['source_url'] ?? (string) $request->headers->get('referer');

        $isPdf = $this->looksLikePdfSource($sourceUrl, $data['source_label'] ?? null);

        $message = ContactMessage::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'phone'         => $data['phone'],
            'subject'       => $data['subject'] ?? null,
            'message'       => $data['message'] ?? null,
            'source_url'    => $sourceUrl ?: null,
            'source_label'  => $data['source_label'] ?? null,
            'kvkk_accepted' => true,
            'consent_email' => $request->boolean('consent_email'),
            'consent_sms'   => $request->boolean('consent_sms'),
            'status'        => 'new',
            'ip'            => $request->ip(),
            'user_agent'    => substr((string) $request->userAgent(), 0, 255),
            'pdf_token'     => $isPdf ? Str::random(48) : null,
        ]);

        $this->sendAcknowledgement($message);

        $title = $isPdf ? 'Bilgilerinizi Aldık' : 'Mesajınız İletildi';
        $body  = $isPdf
            ? 'PDF gönderimi otomatik olarak sağlanacaktır.'
            : 'Mesajınız iletildi. En kısa sürede dönüş yapacağız.';

        return redirect()
            ->to(($sourceUrl ?: url('/')) . '#contact-cta-h')
            ->with('contact_status', $body)
            ->with('contact_status_title', $title);
    }

    protected function looksLikePdfSource(?string $sourceUrl, ?string $sourceLabel): bool
    {
        return str_contains((string) $sourceUrl, '/bry-metodu-ile-tanis')
            || str_starts_with((string) $sourceLabel, 'BRY Metoduyla Tanış');
    }

    /**
     * Mail gönderimi + mail_status alanlarını günceller.
     * Admin panelden "tekrar gönder" işleminde de bu metot çağrılır.
     */
    public function sendAcknowledgement(ContactMessage $message): bool
    {
        $settings = Setting::allKeyed();

        if (($settings['mail_enabled'] ?? '1') !== '1' || empty($settings['mail_from_address'])) {
            $message->update([
                'mail_status'     => 'skipped',
                'mail_last_error' => 'Mail gönderimi kapalı ya da from adresi tanımlı değil.',
            ]);
            return false;
        }

        $message->increment('mail_attempts');

        try {
            $this->applyMailConfig($settings);
            $mailable = $this->mailableFor($message);
            Mail::to($message->email, $message->name)->send($mailable);

            $message->update([
                'mail_status'     => 'sent',
                'mail_sent_at'    => now(),
                'mail_last_error' => null,
            ]);
            return true;
        } catch (\Throwable $e) {
            Log::warning('Contact acknowledgement mail failed', [
                'id'    => $message->id,
                'error' => $e->getMessage(),
            ]);
            $message->update([
                'mail_status'     => 'failed',
                'mail_last_error' => $e->getMessage(),
            ]);
            return false;
        }
    }

    protected function mailableFor(ContactMessage $message): \Illuminate\Mail\Mailable
    {
        return $message->isPdfRequest()
            ? new ContactPdfDownload($message)
            : new ContactMessageReceived($message);
    }

    protected function applyMailConfig(array $settings): void
    {
        config([
            'mail.default'                  => 'smtp',
            'mail.mailers.smtp.host'        => $settings['mail_host']       ?? config('mail.mailers.smtp.host'),
            'mail.mailers.smtp.port'        => (int) ($settings['mail_port'] ?? config('mail.mailers.smtp.port')),
            'mail.mailers.smtp.username'    => $settings['mail_username']   ?? null,
            'mail.mailers.smtp.password'    => $settings['mail_password']   ?? null,
            'mail.mailers.smtp.encryption'  => $settings['mail_encryption'] ?: null,
            'mail.from.address'             => $settings['mail_from_address'],
            'mail.from.name'                => $settings['mail_from_name'] ?? ($settings['site_name'] ?? 'Bilinçli Ritmik Yaşam'),
        ]);
    }
}

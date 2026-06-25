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

class ContactMessageController extends Controller
{
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
        ]);

        $this->sendAcknowledgement($message);

        $isPdfSource = $this->isPdfSource($message);
        $title   = $isPdfSource ? 'Bilgilerinizi Aldık' : 'Mesajınız İletildi';
        $body    = $isPdfSource
            ? 'PDF gönderimi otomatik olarak sağlanacaktır.'
            : 'Mesajınız iletildi. En kısa sürede dönüş yapacağız.';

        return redirect()
            ->to(($sourceUrl ?: url('/')) . '#contact-cta-h')
            ->with('contact_status', $body)
            ->with('contact_status_title', $title);
    }

    protected function isPdfSource(ContactMessage $message): bool
    {
        return str_contains((string) $message->source_url, '/bry-metodu-ile-tanis')
            || str_starts_with((string) $message->source_label, 'BRY Metoduyla Tanış');
    }

    protected function sendAcknowledgement(ContactMessage $message): void
    {
        $settings = Setting::allKeyed();

        if (($settings['mail_enabled'] ?? '1') !== '1') {
            return;
        }
        if (empty($settings['mail_from_address'])) {
            return;
        }

        try {
            $this->applyMailConfig($settings);
            $mailable = $this->mailableFor($message);
            Mail::to($message->email, $message->name)->send($mailable);
        } catch (\Throwable $e) {
            Log::warning('Contact acknowledgement mail failed', [
                'id'    => $message->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    protected function mailableFor(ContactMessage $message): \Illuminate\Mail\Mailable
    {
        return $this->isPdfSource($message)
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

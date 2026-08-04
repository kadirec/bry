<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ContactMessageController as PublicContactController;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(Request $request): View
    {
        $query = ContactMessage::query();

        $status = $request->string('status')->toString();
        if ($status && array_key_exists($status, ContactMessage::STATUSES)) {
            $query->where('status', $status);
        }

        // ?type=pdf sadece "Bilincinle Tanış" PDF taleplerini gösterir
        $type = $request->string('type')->toString();
        if ($type === 'pdf') {
            $query->where(function ($q) {
                $q->where('source_url', 'like', '%/bry-metodu-ile-tanis%')
                  ->orWhere('source_label', 'like', 'BRY Metoduyla Tanış%');
            });
        }

        $messages = $query->orderByDesc('created_at')->paginate(30)->withQueryString();

        return view('admin.contact_messages.index', [
            'messages'     => $messages,
            'statuses'     => ContactMessage::STATUSES,
            'activeStatus' => $status,
            'activeType'   => $type,
            'counts'       => ContactMessage::selectRaw('status, count(*) as c')
                ->groupBy('status')->pluck('c', 'status')->all(),
            'pdfStats'     => $this->pdfStats(),
        ]);
    }

    public function show(ContactMessage $contactMessage): View
    {
        return view('admin.contact_messages.show', [
            'message' => $contactMessage,
        ]);
    }

    public function update(Request $request, ContactMessage $contactMessage): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:' . implode(',', array_keys(ContactMessage::STATUSES))],
            'notes'  => ['nullable', 'string', 'max:6000'],
        ]);

        $contactMessage->update($data);

        return redirect()->route('admin.contact-messages.show', $contactMessage)
            ->with('status', 'Mesaj güncellendi.');
    }

    /**
     * Mail'i (özellikle PDF gönderimini) tekrar dener.
     */
    public function resend(ContactMessage $contactMessage, PublicContactController $public): RedirectResponse
    {
        $ok = $public->sendAcknowledgement($contactMessage);

        return redirect()->route('admin.contact-messages.show', $contactMessage)
            ->with('status', $ok
                ? 'Mail yeniden gönderildi.'
                : 'Mail gönderilemedi. Detaylar için "Mail Durumu" kartındaki hata mesajına bakın.');
    }

    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();
        return redirect()->route('admin.contact-messages.index')
            ->with('status', 'Mesaj silindi.');
    }

    /**
     * "Bilincinle Tanış" PDF talepleri için özet raporlama.
     */
    protected function pdfStats(): array
    {
        $base = ContactMessage::query()->where(function ($q) {
            $q->where('source_url', 'like', '%/bry-metodu-ile-tanis%')
              ->orWhere('source_label', 'like', 'BRY Metoduyla Tanış%');
        });

        return [
            'total'      => (clone $base)->count(),
            'sent'       => (clone $base)->where('mail_status', 'sent')->count(),
            'failed'     => (clone $base)->where('mail_status', 'failed')->count(),
            'pending'    => (clone $base)->whereIn('mail_status', ['pending', 'skipped'])->count(),
            'downloaded' => (clone $base)->where('pdf_download_count', '>', 0)->count(),
            'downloads'  => (int) (clone $base)->sum('pdf_download_count'),
        ];
    }
}

<?php

namespace App\Mail;

use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactPdfDownload extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contact)
    {
    }

    public function envelope(): Envelope
    {
        $settings    = Setting::allKeyed();
        $fromAddress = $settings['mail_from_address'] ?? config('mail.from.address');
        $fromName    = $settings['mail_from_name']    ?? ($settings['site_name'] ?? config('mail.from.name'));
        $replyTo     = $settings['mail_reply_to']     ?? $fromAddress;

        return new Envelope(
            from: new Address($fromAddress, $fromName),
            replyTo: $replyTo ? [new Address($replyTo, $fromName)] : [],
            to: [new Address($this->contact->email, $this->contact->name)],
            subject: '"Bilincinle Tanış" — PDF Dosyanız Hazır',
        );
    }

    public function content(): Content
    {
        $settings = Setting::allKeyed();
        $logo     = $settings['logo_dark'] ?? $settings['logo_light'] ?? 'assets/logo.png';
        $logoUrl  = filter_var($logo, FILTER_VALIDATE_URL) ? $logo : asset($logo);

        // Tokenlı tracking URL — pdf_token yoksa gerçek adrese fallback (eski kayıtlar için).
        $pdfUrl = $this->contact->pdf_token
            ? route('pdf.download', ['token' => $this->contact->pdf_token])
            : \App\Http\Controllers\ContactMessageController::PDF_BILINCINLE_TANIS_URL;

        return new Content(
            view: 'emails.contact-pdf-download',
            with: [
                'contact'   => $this->contact,
                'siteName'  => $settings['site_name'] ?? 'Bilinçli Ritmik Yaşam',
                'siteUrl'   => $settings['site_url']  ?? config('app.url'),
                'logoUrl'   => $logoUrl,
                'pdfUrl'    => $pdfUrl,
                'methodUrl' => route('programs.methodu-egitimi'),
            ],
        );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'subject', 'message',
        'source_url', 'source_label',
        'kvkk_accepted', 'consent_email', 'consent_sms',
        'status', 'notes', 'ip', 'user_agent',
        'mail_status', 'mail_sent_at', 'mail_attempts', 'mail_last_error',
        'pdf_token', 'pdf_download_count', 'pdf_first_downloaded_at', 'pdf_last_downloaded_at',
    ];

    protected function casts(): array
    {
        return [
            'kvkk_accepted'           => 'boolean',
            'consent_email'           => 'boolean',
            'consent_sms'             => 'boolean',
            'mail_sent_at'            => 'datetime',
            'pdf_first_downloaded_at' => 'datetime',
            'pdf_last_downloaded_at'  => 'datetime',
        ];
    }

    public const STATUSES = [
        'new'         => 'Yeni',
        'in_progress' => 'Görüşülüyor',
        'done'        => 'Tamamlandı',
        'archived'    => 'Arşiv',
    ];

    public const MAIL_STATUSES = [
        'pending' => 'Bekliyor',
        'sent'    => 'Gönderildi',
        'failed'  => 'Başarısız',
        'skipped' => 'Atlandı',
    ];

    public function statusLabel(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    public function mailStatusLabel(): string
    {
        return self::MAIL_STATUSES[$this->mail_status] ?? $this->mail_status;
    }

    public function isPdfRequest(): bool
    {
        return str_contains((string) $this->source_url, '/bry-metodu-ile-tanis')
            || str_starts_with((string) $this->source_label, 'BRY Metoduyla Tanış');
    }

    public function sourceDisplay(): string
    {
        if (!empty($this->source_label)) {
            return $this->source_label;
        }
        if (!empty($this->source_url)) {
            $path = parse_url($this->source_url, PHP_URL_PATH) ?: $this->source_url;
            return $path === '/' ? 'Anasayfa' : $path;
        }
        return '—';
    }
}

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
    ];

    protected function casts(): array
    {
        return [
            'kvkk_accepted' => 'boolean',
            'consent_email' => 'boolean',
            'consent_sms'   => 'boolean',
        ];
    }

    public const STATUSES = [
        'new'         => 'Yeni',
        'in_progress' => 'Görüşülüyor',
        'done'        => 'Tamamlandı',
        'archived'    => 'Arşiv',
    ];

    public function statusLabel(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
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

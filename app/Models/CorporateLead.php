<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateLead extends Model
{
    protected $fillable = [
        'name', 'email', 'company', 'phone', 'program',
        'kvkk_accepted', 'status', 'notes', 'ip', 'user_agent',
    ];

    protected function casts(): array
    {
        return [
            'kvkk_accepted' => 'boolean',
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
}

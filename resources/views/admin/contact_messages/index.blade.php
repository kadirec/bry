@extends('admin.layouts.app')

@section('title', 'İletişim Formları')

@section('content')
<div class="adm-head">
  <div>
    <h1>İletişim Formları</h1>
    <div class="meta">
      Toplam {{ $messages->total() }} mesaj
      @if(!empty($counts))
        @foreach($statuses as $key => $label)
          @if(($counts[$key] ?? 0) > 0)
            · {{ $label }}: <strong>{{ $counts[$key] }}</strong>
          @endif
        @endforeach
      @endif
    </div>
  </div>
</div>

@if(session('status'))
  <div class="adm-flash" style="background:#E7F4EA; color:#1F5A2C; padding:10px 14px; border-radius:8px; margin-bottom:14px;">{{ session('status') }}</div>
@endif

{{-- "Bilincinle Tanış" PDF raporlaması --}}
@if(!empty($pdfStats) && $pdfStats['total'] > 0)
  <div class="adm-card" style="margin-bottom: 16px; padding: 14px 18px;">
    <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
      <div>
        <div style="font-size:12px; letter-spacing:0.12em; text-transform:uppercase; color:var(--a-ink-mute); margin-bottom:4px;">
          "Bilincinle Tanış" PDF Talepleri
        </div>
        <div style="display:flex; gap:22px; flex-wrap:wrap; font-size:14px;">
          <span><strong>{{ $pdfStats['total'] }}</strong> toplam istek</span>
          <span style="color:#1F5A2C;"><strong>{{ $pdfStats['sent'] }}</strong> gönderildi</span>
          @if($pdfStats['failed'] > 0)
            <span style="color:#7E1F1F;"><strong>{{ $pdfStats['failed'] }}</strong> başarısız</span>
          @endif
          @if($pdfStats['pending'] > 0)
            <span style="color:#7E5C13;"><strong>{{ $pdfStats['pending'] }}</strong> bekliyor</span>
          @endif
          <span>·</span>
          <span><strong>{{ $pdfStats['downloaded'] }}</strong> kişi indirdi</span>
          <span><strong>{{ $pdfStats['downloads'] }}</strong> toplam indirme</span>
        </div>
      </div>
      <a href="{{ route('admin.contact-messages.index', ['type' => 'pdf']) }}"
         class="adm-btn adm-btn--{{ ($activeType ?? '') === 'pdf' ? '' : 'ghost' }} adm-btn--sm">
        Sadece PDF Talepleri
      </a>
    </div>
  </div>
@endif

<div style="display: flex; gap: 8px; margin-bottom: 16px; flex-wrap: wrap;">
  <a href="{{ route('admin.contact-messages.index') }}"
     class="adm-btn adm-btn--{{ empty($activeStatus) && empty($activeType) ? '' : 'ghost' }} adm-btn--sm">
    Tümü ({{ collect($counts)->sum() }})
  </a>
  @foreach($statuses as $key => $label)
    <a href="{{ route('admin.contact-messages.index', ['status' => $key]) }}"
       class="adm-btn adm-btn--{{ $activeStatus === $key ? '' : 'ghost' }} adm-btn--sm">
      {{ $label }} ({{ $counts[$key] ?? 0 }})
    </a>
  @endforeach
</div>

<table class="adm-table">
  <thead>
    <tr>
      <th>Tarih</th>
      <th>Ad Soyad</th>
      <th>İletişim</th>
      <th>Konu / Kaynak</th>
      <th>Mail</th>
      <th>PDF İndirme</th>
      <th>Durum</th>
      <th class="actions">Eylem</th>
    </tr>
  </thead>
  <tbody>
    @forelse($messages as $msg)
      <tr>
        <td class="muted" style="white-space: nowrap;">{{ $msg->created_at->format('d.m.Y') }}<br><small>{{ $msg->created_at->format('H:i') }}</small></td>
        <td><strong>{{ $msg->name }}</strong></td>
        <td>
          <div><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></div>
          <div><a href="tel:{{ $msg->phone }}">{{ $msg->phone }}</a></div>
        </td>
        <td style="max-width:260px;">
          <div>{{ $msg->subject ?? '—' }}</div>
          @if($msg->source_url || $msg->source_label)
            <div style="font-size:12px; margin-top:3px;">
              <a href="{{ $msg->source_url ?: '#' }}" target="_blank" rel="noopener" style="color:var(--a-ink-mute);">{{ $msg->sourceDisplay() }}</a>
            </div>
          @endif
        </td>
        <td style="white-space: nowrap;">
          @php
            $mailStyles = [
              'sent'    => ['bg' => '#E7F4EA', 'fg' => '#1F5A2C', 'icon' => '✓'],
              'failed'  => ['bg' => '#FBE8E8', 'fg' => '#7E1F1F', 'icon' => '⚠'],
              'pending' => ['bg' => '#F1ECDD', 'fg' => '#7E5C13', 'icon' => '⏳'],
              'skipped' => ['bg' => '#ECECEC', 'fg' => '#666',    'icon' => '—'],
            ];
            $ms = $mailStyles[$msg->mail_status] ?? $mailStyles['pending'];
          @endphp
          <span title="{{ $msg->mail_last_error }}" style="display:inline-block; padding:3px 9px; background:{{ $ms['bg'] }}; color:{{ $ms['fg'] }}; border-radius:999px; font-size:11.5px;">
            {{ $ms['icon'] }} {{ $msg->mailStatusLabel() }}
          </span>
          @if($msg->mail_sent_at)
            <div style="font-size:11px; color:var(--a-ink-mute); margin-top:2px;">{{ $msg->mail_sent_at->format('d.m H:i') }}</div>
          @endif
        </td>
        <td style="white-space: nowrap;">
          @if($msg->isPdfRequest())
            @if($msg->pdf_download_count > 0)
              <strong style="color:#1F5A2C;">{{ $msg->pdf_download_count }}×</strong>
              <div style="font-size:11px; color:var(--a-ink-mute); margin-top:2px;">
                {{ optional($msg->pdf_last_downloaded_at)->format('d.m H:i') }}
              </div>
            @else
              <span class="muted">henüz indirilmedi</span>
            @endif
          @else
            <span class="muted">—</span>
          @endif
        </td>
        <td>
          @php
            $statusStyles = [
              'new'         => ['bg' => '#FBE8E8', 'fg' => '#7E1F1F'],
              'in_progress' => ['bg' => '#F1ECDD', 'fg' => '#7E5C13'],
              'done'        => ['bg' => '#E7F4EA', 'fg' => '#1F5A2C'],
              'archived'    => ['bg' => '#ECECEC', 'fg' => '#444'],
            ];
            $s = $statusStyles[$msg->status] ?? $statusStyles['new'];
          @endphp
          <span style="display:inline-block; padding:3px 10px; background:{{ $s['bg'] }}; color:{{ $s['fg'] }}; border-radius:999px; font-size:12px;">{{ $msg->statusLabel() }}</span>
        </td>
        <td class="actions">
          <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.contact-messages.show', $msg) }}">Aç</a>
          <form action="{{ route('admin.contact-messages.destroy', $msg) }}" method="POST" style="display:inline;" onsubmit="return confirm('Silmek istediğine emin misin?');">
            @csrf @method('DELETE')
            <button class="adm-btn adm-btn--danger adm-btn--sm" type="submit">Sil</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="8" class="muted">Henüz iletişim mesajı gelmedi.</td></tr>
    @endforelse
  </tbody>
</table>

<div style="margin-top: 16px;">
  {{ $messages->links() }}
</div>
@endsection

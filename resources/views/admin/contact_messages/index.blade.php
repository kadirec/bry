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

<div style="display: flex; gap: 8px; margin-bottom: 16px; flex-wrap: wrap;">
  <a href="{{ route('admin.contact-messages.index') }}"
     class="adm-btn adm-btn--{{ empty($activeStatus) ? '' : 'ghost' }} adm-btn--sm">
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
      <th>Konu</th>
      <th>Geldiği Sayfa</th>
      <th>İzinler</th>
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
        <td>{{ $msg->subject ?? '—' }}</td>
        <td>
          @if($msg->source_url)
            <a href="{{ $msg->source_url }}" target="_blank" rel="noopener" title="{{ $msg->source_url }}" style="font-size:13px;">{{ $msg->sourceDisplay() }}</a>
          @else
            <span class="muted">—</span>
          @endif
        </td>
        <td style="white-space: nowrap;">
          @if($msg->consent_email)
            <span title="E-posta iznini verdi" style="display:inline-block; background:#E7F4EA; color:#1F5A2C; border-radius:999px; padding:2px 9px; font-size:11.5px; margin-right:3px;">✉ E-posta</span>
          @else
            <span title="E-posta izni yok" style="display:inline-block; background:#F1F1F1; color:#9A9A9A; border-radius:999px; padding:2px 9px; font-size:11.5px; margin-right:3px; text-decoration:line-through;">✉ E-posta</span>
          @endif
          @if($msg->consent_sms)
            <span title="SMS iznini verdi" style="display:inline-block; background:#E7F4EA; color:#1F5A2C; border-radius:999px; padding:2px 9px; font-size:11.5px;">📱 SMS</span>
          @else
            <span title="SMS izni yok" style="display:inline-block; background:#F1F1F1; color:#9A9A9A; border-radius:999px; padding:2px 9px; font-size:11.5px; text-decoration:line-through;">📱 SMS</span>
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

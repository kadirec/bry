@extends('admin.layouts.app')

@section('title', 'Kurumsal Teklif Formu')

@section('content')
<div class="adm-head">
  <div>
    <h1>Kurumsal Teklif Formu</h1>
    <div class="meta">
      Toplam {{ $leads->total() }} kayıt
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
  <a href="{{ route('admin.corporate-leads.index') }}"
     class="adm-btn adm-btn--{{ empty($activeStatus) ? '' : 'ghost' }} adm-btn--sm">
    Tümü ({{ $leads->total() + (collect($counts)->sum() - $leads->total()) }})
  </a>
  @foreach($statuses as $key => $label)
    <a href="{{ route('admin.corporate-leads.index', ['status' => $key]) }}"
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
      <th>Kurum</th>
      <th>İletişim</th>
      <th>İlgilendiği</th>
      <th>Durum</th>
      <th class="actions">Eylem</th>
    </tr>
  </thead>
  <tbody>
    @forelse($leads as $lead)
      <tr>
        <td class="muted" style="white-space: nowrap;">{{ $lead->created_at->format('d.m.Y') }}<br><small>{{ $lead->created_at->format('H:i') }}</small></td>
        <td><strong>{{ $lead->name }}</strong></td>
        <td>{{ $lead->company }}</td>
        <td>
          <div><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></div>
          <div><a href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a></div>
        </td>
        <td>{{ $lead->program ?? '—' }}</td>
        <td>
          @php
            $statusStyles = [
              'new'         => ['bg' => '#FBE8E8', 'fg' => '#7E1F1F'],
              'in_progress' => ['bg' => '#F1ECDD', 'fg' => '#7E5C13'],
              'done'        => ['bg' => '#E7F4EA', 'fg' => '#1F5A2C'],
              'archived'    => ['bg' => '#ECECEC', 'fg' => '#444'],
            ];
            $s = $statusStyles[$lead->status] ?? $statusStyles['new'];
          @endphp
          <span style="display:inline-block; padding:3px 10px; background:{{ $s['bg'] }}; color:{{ $s['fg'] }}; border-radius:999px; font-size:12px;">{{ $lead->statusLabel() }}</span>
        </td>
        <td class="actions">
          <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.corporate-leads.show', $lead) }}">Aç</a>
          <form action="{{ route('admin.corporate-leads.destroy', $lead) }}" method="POST" style="display:inline;" onsubmit="return confirm('Silmek istediğine emin misin?');">
            @csrf @method('DELETE')
            <button class="adm-btn adm-btn--danger adm-btn--sm" type="submit">Sil</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="7" class="muted">Henüz teklif talebi gelmedi.</td></tr>
    @endforelse
  </tbody>
</table>

<div style="margin-top: 16px;">
  {{ $leads->links() }}
</div>
@endsection

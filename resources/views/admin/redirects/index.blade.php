@extends('admin.layouts.app')

@section('title', '301 Yönlendirmeler')

@section('content')
<div class="adm-head">
  <div>
    <h1>301 Yönlendirmeler</h1>
    <div class="meta">
      Toplam {{ $items->total() }} kayıt · Aktif {{ \App\Models\Redirect::where('is_active', true)->count() }}
    </div>
  </div>
  <a class="adm-btn" href="{{ route('admin.redirects.create') }}">+ Yeni Yönlendirme</a>
</div>

@if(session('status'))
  <div class="adm-alert adm-alert--success" style="margin-bottom:14px;">{{ session('status') }}</div>
@endif

<table class="adm-table">
  <thead>
    <tr>
      <th>Kaynak URL</th>
      <th>Hedef URL</th>
      <th>Kod</th>
      <th>Durum</th>
      <th>Hit</th>
      <th>Son Kullanım</th>
      <th class="actions">Eylem</th>
    </tr>
  </thead>
  <tbody>
    @forelse($items as $r)
      <tr>
        <td>
          <code style="font-size:12px;">{{ $r->from_path }}</code>
          @if($r->note)
            <div class="muted" style="font-size:11px; margin-top:4px;">{{ $r->note }}</div>
          @endif
        </td>
        <td>
          <code style="font-size:12px; color:#4a90e2;">{{ $r->to_path }}</code>
        </td>
        <td><span class="adm-badge adm-badge--neutral">{{ $r->status_code }}</span></td>
        <td>
          @if($r->is_active)
            <span class="adm-badge adm-badge--success"><span class="adm-badge__dot"></span>Aktif</span>
          @else
            <span class="adm-badge adm-badge--neutral"><span class="adm-badge__dot"></span>Pasif</span>
          @endif
        </td>
        <td><span class="muted">{{ number_format($r->hits) }}</span></td>
        <td><span class="muted">{{ optional($r->last_hit_at)->format('d.m.Y H:i') ?? '—' }}</span></td>
        <td class="actions">
          <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.redirects.edit', $r) }}">Düzenle</a>
          <form action="{{ route('admin.redirects.destroy', $r) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ $r->from_path }} yönlendirmesini silmek istediğine emin misin?');">
            @csrf @method('DELETE')
            <button class="adm-btn adm-btn--danger adm-btn--sm" type="submit">Sil</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="7" class="muted">Henüz yönlendirme kaydı yok.</td></tr>
    @endforelse
  </tbody>
</table>

@if($items->hasPages())
  <div style="margin-top:16px;">
    {{ $items->links('pagination.admin') }}
  </div>
@endif
@endsection

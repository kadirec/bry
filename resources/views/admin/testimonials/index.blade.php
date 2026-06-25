@extends('admin.layouts.app')

@section('title', 'Dönüşen Hayatlar')

@section('content')
<div class="adm-head">
  <div>
    <h1>Dönüşen Hayatlar</h1>
    <div class="meta">{{ $items->count() }} hikaye · anasayfa reels bölümü</div>
  </div>
  <a class="adm-btn" href="{{ route('admin.testimonials.create') }}">+ Yeni Hikaye</a>
</div>

<table class="adm-table">
  <thead>
    <tr>
      <th>Kişi</th>
      <th>Etiket</th>
      <th>Süre</th>
      <th>Video</th>
      <th>Durum</th>
      <th>Sıra</th>
      <th class="actions">Eylem</th>
    </tr>
  </thead>
  <tbody>
    @forelse($items as $t)
      <tr>
        <td><strong>{{ $t->name }}</strong></td>
        <td>@if($t->tag)<span style="display:inline-block; padding:3px 10px; background:var(--a-line-soft); border-radius:999px; font-size:12px;">{{ $t->tag }}</span>@endif</td>
        <td>{{ $t->duration ?? '—' }}</td>
        <td>
          @if($t->video_file)
            <span style="display:inline-block; padding:3px 10px; background:var(--a-plum-soft); color:var(--a-plum-deep); border-radius:999px; font-size:12px;">📼 Yüklü</span>
          @elseif($t->youtube_id)
            <a href="https://youtu.be/{{ $t->youtube_id }}" target="_blank" style="font-size:13px;">▶ {{ $t->youtube_id }} ↗</a>
          @else
            <span class="muted">—</span>
          @endif
        </td>
        <td>
          @if(!$t->is_active)
            <span style="display:inline-block; padding:3px 10px; background:#F1ECDD; color:#7E5C13; border-radius:999px; font-size:12px;">Pasif</span>
          @elseif(!$t->show_on_home)
            <span style="display:inline-block; padding:3px 10px; background:#FBE8E8; color:#7E1F1F; border-radius:999px; font-size:12px;">Anasayfada gizli</span>
          @else
            <span style="display:inline-block; padding:3px 10px; background:#E7F4EA; color:#1F5A2C; border-radius:999px; font-size:12px;">Aktif</span>
          @endif
        </td>
        <td>{{ $t->sort }}</td>
        <td class="actions">
          <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.testimonials.edit', $t) }}">Düzenle</a>
          <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" style="display:inline;" onsubmit="return confirm('Silmek istediğine emin misin?');">
            @csrf @method('DELETE')
            <button class="adm-btn adm-btn--danger adm-btn--sm" type="submit">Sil</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="7" class="muted">Henüz hikaye eklenmedi.</td></tr>
    @endforelse
  </tbody>
</table>
@endsection

@extends('admin.layouts.app')

@section('title', 'Blog Yazıları')

@section('content')
<div class="adm-head">
  <div>
    <h1>Blog Yazıları</h1>
    <div class="meta">{{ $posts->total() }} yazı</div>
  </div>
  <a class="adm-btn" href="{{ route('admin.blog.posts.create') }}">+ Yeni Yazı</a>
</div>

<form method="GET" class="adm-card" style="margin-bottom: 16px;">
  <div style="display: grid; grid-template-columns: 2fr 1fr 1fr auto; gap: 12px; align-items: end;">
    <div class="adm-field" style="margin: 0;">
      <label for="q">Ara</label>
      <input id="q" type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Başlıkta ara…">
    </div>
    <div class="adm-field" style="margin: 0;">
      <label for="category">Kategori</label>
      <select id="category" name="category">
        <option value="">Tümü</option>
        @foreach($categories as $c)
          <option value="{{ $c->id }}" {{ ($filters['category'] ?? null) == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="adm-field" style="margin: 0;">
      <label for="status">Durum</label>
      <select id="status" name="status">
        <option value="">Hepsi</option>
        <option value="draft"     {{ ($filters['status'] ?? '') === 'draft'     ? 'selected' : '' }}>Taslak</option>
        <option value="published" {{ ($filters['status'] ?? '') === 'published' ? 'selected' : '' }}>Yayında</option>
      </select>
    </div>
    <button class="adm-btn adm-btn--ghost" type="submit">Filtrele</button>
  </div>
</form>

<table class="adm-table">
  <thead>
    <tr>
      <th>Başlık</th>
      <th>Kategori</th>
      <th>Durum</th>
      <th>Yayın</th>
      <th class="actions">Eylem</th>
    </tr>
  </thead>
  <tbody>
    @forelse($posts as $p)
      <tr>
        <td>
          <strong>{{ $p->title }}</strong>
          @if($p->is_featured) <span style="display:inline-block; padding:2px 8px; background:var(--a-plum-soft); color:var(--a-plum-deep); border-radius:999px; font-size:11px; margin-left:4px;">⭐ Öne çıkan</span>@endif
          <br><span class="muted">/blog/{{ $p->slug }}</span>
        </td>
        <td>{{ $p->category?->name ?? '—' }}</td>
        <td>
          @if($p->status === 'published')
            <span style="display:inline-block; padding:3px 10px; background:#E7F4EA; color:#1F5A2C; border-radius:999px; font-size:12px;">Yayında</span>
          @else
            <span style="display:inline-block; padding:3px 10px; background:#F1ECDD; color:#7E5C13; border-radius:999px; font-size:12px;">Taslak</span>
          @endif
        </td>
        <td class="muted">{{ $p->published_at?->format('d.m.Y') ?? '—' }}</td>
        <td class="actions">
          @if($p->status === 'published')
            <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('blog.show', $p) }}" target="_blank">↗ Görüntüle</a>
          @endif
          <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.blog.posts.edit', $p) }}">Düzenle</a>
          <form action="{{ route('admin.blog.posts.destroy', $p) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yazıyı silmek istediğine emin misin?');">
            @csrf @method('DELETE')
            <button class="adm-btn adm-btn--danger adm-btn--sm" type="submit">Sil</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="5" class="muted">Henüz yazı yok.</td></tr>
    @endforelse
  </tbody>
</table>

<div style="margin-top: 16px;">{{ $posts->links() }}</div>
@endsection

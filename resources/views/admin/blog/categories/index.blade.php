@extends('admin.layouts.app')

@section('title', 'Blog Kategorileri')

@section('content')
<div class="adm-head">
  <div>
    <h1>Blog Kategorileri</h1>
    <div class="meta">{{ $categories->count() }} kategori</div>
  </div>
  <a class="adm-btn" href="{{ route('admin.blog.categories.create') }}">+ Yeni Kategori</a>
</div>

<table class="adm-table">
  <thead>
    <tr>
      <th>Ad</th>
      <th>Slug</th>
      <th>Yazı Sayısı</th>
      <th>Sıra</th>
      <th class="actions">Eylem</th>
    </tr>
  </thead>
  <tbody>
    @forelse($categories as $c)
      <tr>
        <td><strong>{{ $c->name }}</strong>@if($c->description)<br><span class="muted">{{ Str::limit($c->description, 80) }}</span>@endif</td>
        <td><span class="muted">{{ $c->slug }}</span></td>
        <td>{{ $c->posts_count }}</td>
        <td>{{ $c->sort }}</td>
        <td class="actions">
          <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.blog.categories.edit', $c) }}">Düzenle</a>
          <form action="{{ route('admin.blog.categories.destroy', $c) }}" method="POST" style="display:inline;" onsubmit="return confirm('Kategoriyi silmek istediğine emin misin?');">
            @csrf @method('DELETE')
            <button class="adm-btn adm-btn--danger adm-btn--sm" type="submit">Sil</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="5" class="muted">Henüz kategori yok.</td></tr>
    @endforelse
  </tbody>
</table>
@endsection

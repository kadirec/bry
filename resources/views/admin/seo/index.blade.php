@extends('admin.layouts.app')

@section('title', 'SEO Ayarları')

@section('content')
<div class="adm-head">
  <div>
    <h1>SEO Ayarları</h1>
    <div class="meta">Her sayfa için başlık, açıklama, OG ve JSON-LD özelleştirmesi</div>
  </div>
</div>

<table class="adm-table">
  <thead>
    <tr>
      <th>Sayfa</th>
      <th>Title</th>
      <th>Açıklama</th>
      <th class="actions">Eylem</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pages as $p)
      <tr>
        <td><strong>{{ $p->label }}</strong><br><span class="muted">{{ $p->route }}</span></td>
        <td>{{ $p->title ? Str::limit($p->title, 60) : '—' }}</td>
        <td>{{ $p->description ? Str::limit($p->description, 80) : '—' }}</td>
        <td class="actions">
          <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.seo.edit', $p) }}">Düzenle</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection

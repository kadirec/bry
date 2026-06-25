@extends('admin.layouts.app')

@section('title', $category->exists ? 'Kategori Düzenle' : 'Yeni Kategori')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $category->exists ? $category->name : 'Yeni Kategori' }}</h1>
    <div class="meta">{{ $category->exists ? 'Mevcut kategoriyi düzenle' : 'Blog kategorisi ekle' }}</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.blog.categories.index') }}">← Geri</a>
</div>

<form action="{{ $category->exists ? route('admin.blog.categories.update', $category) : route('admin.blog.categories.store') }}" method="POST">
  @csrf
  @if($category->exists) @method('PUT') @endif

  <div class="adm-card">
    <div class="adm-field {{ $errors->has('name') ? 'invalid' : '' }}">
      <label for="name">Kategori Adı</label>
      <input id="name" type="text" name="name" value="{{ old('name', $category->name) }}" required>
      @if($errors->has('name'))<div class="err">{{ $errors->first('name') }}</div>@endif
    </div>

    <div class="adm-field {{ $errors->has('slug') ? 'invalid' : '' }}">
      <label for="slug">Slug</label>
      <input id="slug" type="text" name="slug" value="{{ old('slug', $category->slug) }}" placeholder="otomatik üretilir">
      <div class="hint">URL'de görünen kısım. Boş bırakılırsa addan üretilir.</div>
      @if($errors->has('slug'))<div class="err">{{ $errors->first('slug') }}</div>@endif
    </div>

    <div class="adm-field">
      <label for="description">Açıklama</label>
      <textarea id="description" name="description">{{ old('description', $category->description) }}</textarea>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
      <div class="adm-field">
        <label for="color">Pill Rengi (opsiyonel)</label>
        <input id="color" type="text" name="color" value="{{ old('color', $category->color) }}" placeholder="#8A6FC1">
      </div>
      <div class="adm-field">
        <label for="sort">Sıra</label>
        <input id="sort" type="number" name="sort" value="{{ old('sort', $category->sort ?? 0) }}" min="0">
      </div>
    </div>

    <div style="display: flex; gap: 10px;">
      <button class="adm-btn" type="submit">{{ $category->exists ? 'Güncelle' : 'Ekle' }}</button>
      <a class="adm-btn adm-btn--ghost" href="{{ route('admin.blog.categories.index') }}">İptal</a>
    </div>
  </div>
</form>
@endsection

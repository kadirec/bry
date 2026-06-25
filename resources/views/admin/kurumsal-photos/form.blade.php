@extends('admin.layouts.app')

@section('title', $item->exists ? 'Fotoğrafı Düzenle' : 'Yeni Fotoğraf')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $item->exists ? ('Fotoğraf #' . $item->id) : 'Yeni Fotoğraf(lar)' }}</h1>
    <div class="meta">{{ $item->exists ? 'Mevcut fotoğrafı düzenle' : 'Tek veya çoklu fotoğraf yükle' }}</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.kurumsal-photos.index') }}">← Geri</a>
</div>

<form action="{{ $item->exists ? route('admin.kurumsal-photos.update', $item) : route('admin.kurumsal-photos.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if($item->exists) @method('PUT') @endif

  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; align-items: start;">
    <div>
      <div class="adm-card">
        <h2>Görsel</h2>
        <p class="sub">JPG / PNG / WEBP · max 8 MB. Kurumsal etkinlik kareleri 4:3 veya yatay önerilir.</p>

        @if($item->exists && $item->image_path)
          <div style="margin-bottom: 14px;">
            <img src="{{ $item->imageUrl() }}" alt="" style="max-width: 320px; border-radius: 10px; border: 1px solid var(--a-line);">
          </div>
        @endif

        @if(! $item->exists)
          <div class="adm-field">
            <label for="image_files_upload">Çoklu Yükleme (önerilen)</label>
            <input id="image_files_upload" type="file" name="image_files_upload[]" multiple accept="image/jpeg,image/png,image/webp">
            <div class="hint">Birden fazla fotoğrafı aynı anda seçip yükleyebilirsin. Sıralama yükleme anına göre verilir.</div>
          </div>
          <p style="margin: 14px 0 6px; font-size: 12px; color: var(--a-ink-mute); text-transform: uppercase; letter-spacing: 0.12em;">veya tek tek</p>
        @endif

        <div class="adm-field">
          <label for="image_file_upload">Tek Fotoğraf {{ $item->exists ? '(değiştirmek için)' : '' }}</label>
          <input id="image_file_upload" type="file" name="image_file_upload" accept="image/jpeg,image/png,image/webp">
        </div>

        <div class="adm-field">
          <label for="caption">Açıklama (opsiyonel)</label>
          <input id="caption" type="text" name="caption" value="{{ old('caption', $item->caption) }}" placeholder="BRY Kurumsal · Açılış">
        </div>
      </div>
    </div>

    <div>
      <div class="adm-card">
        <h2>Yayın</h2>
        <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
          <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
          <label for="is_active" style="margin: 0; text-transform: none; letter-spacing: 0;">Aktif (galeride göster)</label>
        </div>
        <div class="adm-field">
          <label for="sort">Sıra</label>
          <input id="sort" type="number" name="sort" value="{{ old('sort', $item->sort ?? 0) }}" min="0">
          <div class="hint">Liste sayfasında sürükle-bırakla da değiştirebilirsin.</div>
        </div>
      </div>
    </div>
  </div>

  <div style="display: flex; gap: 10px;">
    <button class="adm-btn" type="submit">{{ $item->exists ? 'Güncelle' : 'Yükle' }}</button>
    <a class="adm-btn adm-btn--ghost" href="{{ route('admin.kurumsal-photos.index') }}">İptal</a>
  </div>
</form>
@endsection

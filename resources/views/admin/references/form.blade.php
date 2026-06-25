@extends('admin.layouts.app')

@section('title', $item->exists ? 'Logo Düzenle' : 'Yeni Logo')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $item->exists ? $item->name : 'Yeni Kurumsal Referans' }}</h1>
    <div class="meta">{{ $item->exists ? 'Mevcut logoyu düzenle' : 'Kurumsal referanslar gridine yeni logo ekle' }}</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.references.index') }}">← Geri</a>
</div>

<form action="{{ $item->exists ? route('admin.references.update', $item) : route('admin.references.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if($item->exists) @method('PUT') @endif

  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; align-items: start;">

    {{-- Sol: bilgiler --}}
    <div>
      <div class="adm-card">
        <h2>Kurum Bilgileri</h2>

        <div class="adm-field {{ $errors->has('name') ? 'invalid' : '' }}">
          <label for="name">Kurum Adı</label>
          <input id="name" type="text" name="name" value="{{ old('name', $item->name) }}" required placeholder="Akdeniz Üniversitesi">
          @if($errors->has('name'))<div class="err">{{ $errors->first('name') }}</div>@endif
        </div>

        <div class="adm-field {{ $errors->has('website') ? 'invalid' : '' }}">
          <label for="website">Web Sitesi (opsiyonel)</label>
          <input id="website" type="text" name="website" value="{{ old('website', $item->website) }}" placeholder="https://...">
          <div class="hint">Logo tıklandığında bu adrese yönlenecek. Boşsa link verilmez.</div>
          @if($errors->has('website'))<div class="err">{{ $errors->first('website') }}</div>@endif
        </div>
      </div>

      <div class="adm-card">
        <h2>Logo Görseli</h2>
        <p class="sub">Şeffaf arka planlı <strong>PNG/SVG</strong> önerilir. Maksimum 4 MB.</p>

        @if($item->image_path)
          <div style="background: var(--a-line-soft, #F4F1EA); border-radius: 10px; padding: 24px; display: grid; place-items: center; margin-bottom: 12px;">
            <img src="{{ $item->imageUrl() }}" alt="{{ $item->name }}" style="max-width: 220px; max-height: 140px; object-fit: contain;">
          </div>
          <p class="hint" style="margin-bottom: 12px;">Mevcut görsel. Yeni dosya yüklersen eskisi otomatik değiştirilir.</p>
        @endif

        <div class="adm-field {{ $errors->has('image_file_upload') ? 'invalid' : '' }}">
          <label for="image_file_upload">Logo Yükle (jpg/png/webp/svg · max 4 MB){{ $item->exists ? ' — opsiyonel' : '' }}</label>
          <input id="image_file_upload" type="file" name="image_file_upload" accept="image/jpeg,image/png,image/webp,image/svg+xml" {{ $item->exists ? '' : 'required' }}>
          @if($errors->has('image_file_upload'))<div class="err">{{ $errors->first('image_file_upload') }}</div>@endif
        </div>
      </div>
    </div>

    {{-- Sağ: yayın --}}
    <div>
      <div class="adm-card">
        <h2>Yayın</h2>

        <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
          <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
          <label for="is_active" style="margin: 0; text-transform: none; letter-spacing: 0;">Aktif (referanslar sayfasında göster)</label>
        </div>

        <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
          <input id="show_on_kurumsal" type="checkbox" name="show_on_kurumsal" value="1" {{ old('show_on_kurumsal', $item->show_on_kurumsal ?? false) ? 'checked' : '' }}>
          <label for="show_on_kurumsal" style="margin: 0; text-transform: none; letter-spacing: 0;">Eğitimlerde göster (kurumsal sayfa carousel'i)</label>
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
    <button class="adm-btn" type="submit">{{ $item->exists ? 'Güncelle' : 'Ekle' }}</button>
    <a class="adm-btn adm-btn--ghost" href="{{ route('admin.references.index') }}">İptal</a>
  </div>
</form>
@endsection

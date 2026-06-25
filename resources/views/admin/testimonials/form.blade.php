@extends('admin.layouts.app')

@section('title', $item->exists ? 'Hikaye Düzenle' : 'Yeni Hikaye')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $item->exists ? $item->name : 'Yeni Dönüşen Hayat' }}</h1>
    <div class="meta">{{ $item->exists ? 'Mevcut hikayeyi düzenle' : 'Anasayfa reels bölümüne yeni hikaye ekle' }}</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.testimonials.index') }}">← Geri</a>
</div>

<form action="{{ $item->exists ? route('admin.testimonials.update', $item) : route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if($item->exists) @method('PUT') @endif

  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; align-items: start;">
    {{-- Sol kolon: içerik --}}
    <div>
      <div class="adm-card">
        <h2>Kart İçeriği</h2>

        <div class="adm-field {{ $errors->has('name') ? 'invalid' : '' }}">
          <label for="name">Ad Soyad</label>
          <input id="name" type="text" name="name" value="{{ old('name', $item->name) }}" required placeholder="Ayşe K.">
          @if($errors->has('name'))<div class="err">{{ $errors->first('name') }}</div>@endif
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="adm-field">
            <label for="tag">Sol üst etiket</label>
            <input id="tag" type="text" name="tag" value="{{ old('tag', $item->tag) }}" placeholder="Bireysel · Online · Kurumsal">
          </div>
          <div class="adm-field">
            <label for="duration">Sağ üst süre</label>
            <input id="duration" type="text" name="duration" value="{{ old('duration', $item->duration) }}" placeholder="0:47">
          </div>
        </div>
      </div>

      <div class="adm-card">
        <h2>Video Yükle</h2>
        <p class="sub">Bu hikayeye özel video dosyası. <strong>Yüklenirse YouTube'a göre öncelikli</strong> olur.</p>

        @if($item->video_file)
          <video src="{{ $item->videoFileUrl() }}" controls preload="metadata" style="width: 100%; max-width: 480px; border-radius: 10px; background: #000; margin-bottom: 12px;"></video>
          <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
            <input id="remove_video" type="checkbox" name="remove_video" value="1">
            <label for="remove_video" style="margin: 0; text-transform: none; letter-spacing: 0; color: var(--a-danger);">Mevcut videoyu sil</label>
          </div>
        @endif

        <div class="adm-field {{ $errors->has('video_file_upload') ? 'invalid' : '' }}">
          <label for="video_file_upload">Dosya (mp4, webm, mov · max 200 MB)</label>
          <input id="video_file_upload" type="file" name="video_file_upload" accept="video/mp4,video/webm,video/quicktime,video/x-m4v">
          <div class="hint">Mevcut dosya varken yeniden yüklenirse eskisi otomatik silinir.</div>
          @if($errors->has('video_file_upload'))<div class="err">{{ $errors->first('video_file_upload') }}</div>@endif
        </div>
      </div>

      <div class="adm-card">
        <h2>Kapak Görseli (Poster)</h2>
        <p class="sub">Karttaki arka plan + video başlamadan önce gösterilen poster. <strong>9:16 oran</strong> önerilir.<br>YouTube ID'si varsa otomatik hqdefault kullanılır; özel kapak yüklersen o öncelikli olur.</p>

        @if($item->thumbnail)
          <img src="{{ $item->posterUrl() }}" alt="Kapak" style="max-width: 220px; aspect-ratio: 9/16; object-fit: cover; border-radius: 12px; border: 1px solid var(--a-line); margin-bottom: 12px;">
          <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
            <input id="remove_thumbnail" type="checkbox" name="remove_thumbnail" value="1">
            <label for="remove_thumbnail" style="margin: 0; text-transform: none; letter-spacing: 0; color: var(--a-danger);">Mevcut kapağı sil</label>
          </div>
        @endif

        <div class="adm-field {{ $errors->has('thumbnail_file_upload') ? 'invalid' : '' }}">
          <label for="thumbnail_file_upload">Kapak Yükle (jpg/png/webp · max 4 MB)</label>
          <input id="thumbnail_file_upload" type="file" name="thumbnail_file_upload" accept="image/jpeg,image/png,image/webp">
          <div class="hint">Önerilen: 720×1280 px (9:16 dikey).</div>
          @if($errors->has('thumbnail_file_upload'))<div class="err">{{ $errors->first('thumbnail_file_upload') }}</div>@endif
        </div>
      </div>

      <div class="adm-card">
        <h2>YouTube</h2>
        <p class="sub">Dosya yüklemek istemiyorsan YouTube ID veya URL ile ekleyebilirsin. Dosya yüklenmediği durumda kullanılır.</p>

        <div class="adm-field {{ $errors->has('youtube_id') ? 'invalid' : '' }}">
          <label for="youtube_id">YouTube ID / URL</label>
          <input id="youtube_id" type="text" name="youtube_id" value="{{ old('youtube_id', $item->youtube_id) }}" placeholder="jZwHCFFrNKA  veya  https://youtu.be/jZwHCFFrNKA">
          <div class="hint">Tam URL yapıştırırsan otomatik olarak ID çıkarılır (youtu.be, youtube.com/watch, /embed, /shorts).</div>
          @if($errors->has('youtube_id'))<div class="err">{{ $errors->first('youtube_id') }}</div>@endif
        </div>

        @if($item->youtube_id && !$item->video_file && !$item->thumbnail)
          <div style="margin-top: 8px;">
            <img src="{{ $item->youtubeThumbnailUrl() }}" alt="YouTube otomatik thumbnail" style="max-width: 320px; border-radius: 10px; border: 1px solid var(--a-line);">
            <div class="hint" style="margin-top: 6px;">YouTube'dan otomatik gelen kapak (özel kapak yüklemediğinde kullanılır).</div>
          </div>
        @endif
      </div>
    </div>

    {{-- Sağ kolon: yayın --}}
    <div>
      <div class="adm-card">
        <h2>Yayın</h2>

        <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
          <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
          <label for="is_active" style="margin: 0; text-transform: none; letter-spacing: 0;">Aktif</label>
        </div>

        <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
          <input id="show_on_home" type="checkbox" name="show_on_home" value="1" {{ old('show_on_home', $item->show_on_home ?? true) ? 'checked' : '' }}>
          <label for="show_on_home" style="margin: 0; text-transform: none; letter-spacing: 0;">Anasayfada göster</label>
        </div>

        <div class="adm-field">
          <label for="sort">Sıra</label>
          <input id="sort" type="number" name="sort" value="{{ old('sort', $item->sort ?? 0) }}" min="0">
        </div>
      </div>
    </div>
  </div>

  <div style="display: flex; gap: 10px;">
    <button class="adm-btn" type="submit">{{ $item->exists ? 'Güncelle' : 'Ekle' }}</button>
    <a class="adm-btn adm-btn--ghost" href="{{ route('admin.testimonials.index') }}">İptal</a>
  </div>
</form>
@endsection

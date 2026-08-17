@extends('admin.layouts.app')

@section('title', $item->exists ? 'Eğitimi Düzenle' : 'Yeni Eğitim')

@php
  $type = old('type', $item->type);
@endphp

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $item->exists ? 'Eğitimi Düzenle' : 'Yeni Kayıt' }}</h1>
    <div class="meta">BRY Online Akademi sayfasında görünecek kart</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.academy.index') }}">← Geri</a>
</div>

@if($errors->any())
  <div style="background:#FDECEC; color:#8E1B1B; padding:10px 14px; border-radius:8px; margin-bottom:14px;">
    <ul style="margin:0; padding-left:18px;">
      @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
    </ul>
  </div>
@endif

<form action="{{ $item->exists ? route('admin.academy.update', $item) : route('admin.academy.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if($item->exists) @method('PUT') @endif

  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; align-items: start;">
    <div>
      <div class="adm-card">
        <h2>İçerik</h2>
        <p class="sub">Vurgu için kelimeyi yıldız içine al: <code>BRY Metodu *Eğitimi*</code> → italik-serif görünür.</p>

        <div class="adm-field">
          <label for="type">Bölüm</label>
          <select id="type" name="type" data-acd-type>
            <option value="course" {{ $type === 'course' ? 'selected' : '' }}>Akademide Yer Alan Eğitimler</option>
            <option value="live"   {{ $type === 'live'   ? 'selected' : '' }}>Canlı Yayın Eğitimler</option>
          </select>
          <div class="hint">Kartın sayfanın hangi bölümünde görüneceğini belirler.</div>
        </div>

        <div class="adm-field">
          <label for="title">Başlık</label>
          <input id="title" type="text" name="title" value="{{ old('title', $item->title) }}" placeholder="BRY Metodu *Eğitimi*" required>
        </div>

        <div class="adm-field" data-only="course">
          <label for="title_note">Başlık Notu (opsiyonel)</label>
          <input id="title_note" type="text" name="title_note" value="{{ old('title_note', $item->title_note) }}" placeholder="Yetişkinler">
          <div class="hint">Başlığın yanında küçük gri "— Yetişkinler" şeklinde çıkar.</div>
        </div>

        <div class="adm-field" data-only="live">
          <label for="quote">Alıntı (canlı yayın kartının üst cümlesi)</label>
          <input id="quote" type="text" name="quote" value="{{ old('quote', $item->quote) }}" placeholder="Ertelemek, karakter özelliğin *değil*; yönetebileceğin bir alışkanlıktır.">
        </div>

        <div class="adm-field">
          <label for="body">Metin</label>
          <textarea id="body" name="body" rows="8" placeholder="Her paragrafı boş satırla ayır.">{{ old('body', $item->body) }}</textarea>
          <div class="hint">Paragrafları boş satırla ayır; her biri ayrı <code>&lt;p&gt;</code> olarak basılır.</div>
        </div>
      </div>

      <div class="adm-card" data-only="course">
        <h2>Görsel</h2>
        <p class="sub">JPG / PNG / WEBP · max 8 MB. Kart görselleri dikey-portre oranında iyi durur.</p>

        @if($item->imageUrl())
          <div style="margin-bottom: 14px;">
            <img src="{{ $item->imageUrl() }}" alt="" style="max-width: 240px; border-radius: 10px; border: 1px solid var(--a-line);">
          </div>
        @endif

        <div class="adm-field">
          <label for="image_file_upload">Görsel {{ $item->image_path ? '(değiştirmek için)' : '' }}</label>
          <input id="image_file_upload" type="file" name="image_file_upload" accept="image/jpeg,image/png,image/webp">
        </div>
      </div>
    </div>

    <div>
      <div class="adm-card">
        <h2>Bağlantı</h2>
        <div class="adm-field">
          <label for="link_url">Link (URL)</label>
          <input id="link_url" type="text" name="link_url" value="{{ old('link_url', $item->link_url) }}" placeholder="/bry-methodu-egitimi">
          <div class="hint">Site içi için <code>/sayfa-adresi</code>, dış link için tam adres. Boş bırakırsan buton pasif ("Yakında") görünür.</div>
        </div>
        <div class="adm-field">
          <label for="link_label">Buton Yazısı</label>
          <input id="link_label" type="text" name="link_label" value="{{ old('link_label', $item->link_label) }}" placeholder="Eğitimi İncele">
        </div>
      </div>

      <div class="adm-card">
        <h2>Görünüm</h2>
        <div class="adm-field">
          <label for="badge">Rozet</label>
          <select id="badge" name="badge">
            @php $badge = old('badge', $item->badge ?? 'live'); @endphp
            <option value="live" {{ $badge === 'live' ? 'selected' : '' }}>Yayında</option>
            <option value="soon" {{ $badge === 'soon' ? 'selected' : '' }}>Yakında</option>
            <option value="none" {{ $badge === 'none' ? 'selected' : '' }}>Rozet gösterme</option>
          </select>
        </div>
        <div class="adm-field" data-only="course" style="display: flex; align-items: center; gap: 8px;">
          <input id="show_seal" type="checkbox" name="show_seal" value="1" {{ old('show_seal', $item->show_seal) ? 'checked' : '' }}>
          <label for="show_seal" style="margin: 0; text-transform: none; letter-spacing: 0;">"Dünyada İlk" mührünü göster</label>
        </div>
      </div>

      <div class="adm-card">
        <h2>Yayın</h2>
        <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
          <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
          <label for="is_active" style="margin: 0; text-transform: none; letter-spacing: 0;">Aktif (sitede göster)</label>
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
    <button class="adm-btn" type="submit">{{ $item->exists ? 'Güncelle' : 'Kaydet' }}</button>
    <a class="adm-btn adm-btn--ghost" href="{{ route('admin.academy.index') }}">İptal</a>
  </div>
</form>

<script>
  (function () {
    var select = document.querySelector('[data-acd-type]');
    if (!select) return;
    function sync() {
      var t = select.value;
      document.querySelectorAll('[data-only]').forEach(function (el) {
        el.style.display = el.getAttribute('data-only') === t
          ? (el.classList.contains('adm-field') && el.querySelector('input[type=checkbox]') ? 'flex' : '')
          : 'none';
      });
    }
    select.addEventListener('change', sync);
    sync();
  })();
</script>
@endsection

@extends('admin.layouts.app')

@section('title', 'Yeni Değerlendirme')

@section('content')
<div class="adm-head">
  <div>
    <h1>Yeni Değerlendirme</h1>
    <div class="meta">Panelden manuel olarak değerlendirme ekle (varsayılan onaylı).</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.product-reviews.index') }}">← Geri</a>
</div>

<div style="display:grid; grid-template-columns: 2fr 1fr; gap:20px; align-items:start;">

  <form action="{{ route('admin.product-reviews.store') }}" method="POST">
    @csrf

    <div class="adm-card">
      <h2>Değerlendirme Bilgileri</h2>

      <div class="adm-field">
        <label for="product_slug">Eğitim</label>
        <select id="product_slug" name="product_slug" required>
          @foreach($products as $slug => $label)
            <option value="{{ $slug }}" {{ old('product_slug') === $slug ? 'selected' : '' }}>{{ $label }}</option>
          @endforeach
        </select>
      </div>

      <div class="adm-field">
        <label for="name">Ad Soyad</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" maxlength="120" required>
        @error('name') <small style="color:#C1121F;">{{ $message }}</small> @enderror
      </div>

      <div class="adm-field">
        <label for="message">Mesaj</label>
        <textarea id="message" name="message" rows="6" maxlength="2000" required>{{ old('message') }}</textarea>
        @error('message') <small style="color:#C1121F;">{{ $message }}</small> @enderror
      </div>

      <div class="adm-field">
        <label for="sort">Sıralama</label>
        <input id="sort" name="sort" type="number" min="0" max="9999" value="{{ old('sort', 0) }}" style="max-width: 120px;">
        <small class="muted">Daha düşük sayı önce gösterilir.</small>
      </div>

      <div class="adm-field">
        <label style="display:inline-flex; gap:8px; align-items:center;">
          <input type="hidden" name="is_approved" value="0">
          <input type="checkbox" name="is_approved" value="1" {{ old('is_approved', '1') ? 'checked' : '' }}>
          Yayında (onaylı)
        </label>
        <small class="muted">İşaretli bırakırsan değerlendirme anında sitede yayınlanır.</small>
      </div>

      <button type="submit" class="adm-btn">Değerlendirmeyi Ekle</button>
    </div>
  </form>

  <div>
    <div class="adm-card">
      <h2>İpucu</h2>
      <p class="sub" style="margin:0;">Manuel olarak eklediğin değerlendirmeler "kvkk_accepted" olarak kaydedilir ve formdan gelen yorumlarla aynı carousel'de gösterilir. Düzenlemek istediğinde sıralama ve onay durumunu istediğin gibi değiştirebilirsin.</p>
    </div>
  </div>
</div>
@endsection

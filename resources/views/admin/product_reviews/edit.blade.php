@extends('admin.layouts.app')

@section('title', 'Değerlendirme Düzenle')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $review->name }} <small style="color: var(--a-ink-mute); font-weight: 400;">— {{ $review->productLabel() }}</small></h1>
    <div class="meta">{{ $review->created_at->format('d.m.Y H:i') }} · #{{ $review->id }}</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.product-reviews.index') }}">← Geri</a>
</div>

@if(session('status'))
  <div class="adm-flash" style="background:#E7F4EA; color:#1F5A2C; padding:10px 14px; border-radius:8px; margin-bottom:14px;">{{ session('status') }}</div>
@endif

<div style="display:grid; grid-template-columns: 2fr 1fr; gap:20px; align-items:start;">

  <form action="{{ route('admin.product-reviews.update', $review) }}" method="POST">
    @csrf @method('PUT')

    <div class="adm-card">
      <h2>Değerlendirme</h2>

      <div class="adm-field">
        <label for="product_slug">Eğitim</label>
        <select id="product_slug" name="product_slug">
          @foreach($products as $slug => $label)
            <option value="{{ $slug }}" {{ old('product_slug', $review->product_slug) === $slug ? 'selected' : '' }}>{{ $label }}</option>
          @endforeach
        </select>
      </div>

      <div class="adm-field">
        <label for="name">Ad Soyad</label>
        <input id="name" name="name" type="text" value="{{ old('name', $review->name) }}" required>
      </div>

      <div class="adm-field">
        <label for="message">Mesaj</label>
        <textarea id="message" name="message" rows="6" required>{{ old('message', $review->message) }}</textarea>
      </div>

      <div class="adm-field">
        <label for="sort">Sıralama</label>
        <input id="sort" name="sort" type="number" min="0" max="9999" value="{{ old('sort', $review->sort) }}" style="max-width: 120px;">
        <small class="muted">Daha düşük sayı önce gösterilir.</small>
      </div>

      <div class="adm-field">
        <label style="display:inline-flex; gap:8px; align-items:center;">
          <input type="hidden" name="is_approved" value="0">
          <input type="checkbox" name="is_approved" value="1" {{ old('is_approved', $review->is_approved) ? 'checked' : '' }}>
          Yayında (onaylı)
        </label>
      </div>

      <button type="submit" class="adm-btn">Güncelle</button>
    </div>
  </form>

  <div>
    <div class="adm-card">
      <h2>Hızlı Eylemler</h2>
      <form action="{{ route('admin.product-reviews.toggle', $review) }}" method="POST" style="margin-bottom:10px;">
        @csrf
        <button class="adm-btn" type="submit" style="width:100%;">{{ $review->is_approved ? 'Yayından Al' : 'Onayla ve Yayınla' }}</button>
      </form>

      <form action="{{ route('admin.product-reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Bu değerlendirmeyi silmek istediğine emin misin?');">
        @csrf @method('DELETE')
        <button class="adm-btn adm-btn--danger" type="submit" style="width:100%;">Kaydı Sil</button>
      </form>
    </div>

    <div class="adm-card">
      <h2>Teknik Bilgi</h2>
      <p class="sub" style="margin:0 0 4px;">IP: {{ $review->ip ?: '—' }}</p>
      <p class="sub" style="margin:0; word-break:break-all;">UA: {{ $review->user_agent ?: '—' }}</p>
    </div>
  </div>
</div>
@endsection

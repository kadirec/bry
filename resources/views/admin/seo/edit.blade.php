@extends('admin.layouts.app')

@section('title', $page->label . ' — SEO')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $page->label }} <span style="color: var(--a-ink-mute); font-size: 14px; font-weight: 500;">/ {{ $page->route }}</span></h1>
    <div class="meta">Bu sayfaya özel SEO ayarları</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.seo.index') }}">← Geri</a>
</div>

<form action="{{ route('admin.seo.update', $page) }}" method="POST">
  @csrf

  <div class="adm-card">
    <h2>Temel SEO</h2>
    <p class="sub">Arama motorları ve sosyal paylaşımlarda görünecek</p>

    <div class="adm-field {{ $errors->has('label') ? 'invalid' : '' }}">
      <label for="label">Sayfa Etiketi (admin görünümü)</label>
      <input id="label" type="text" name="label" value="{{ old('label', $page->label) }}" required>
      @if($errors->has('label'))<div class="err">{{ $errors->first('label') }}</div>@endif
    </div>

    <div class="adm-field {{ $errors->has('title') ? 'invalid' : '' }}">
      <label for="title">Title</label>
      <input id="title" type="text" name="title" value="{{ old('title', $page->title) }}" maxlength="255">
      <div class="hint">Önerilen: 50–60 karakter</div>
      @if($errors->has('title'))<div class="err">{{ $errors->first('title') }}</div>@endif
    </div>

    <div class="adm-field {{ $errors->has('description') ? 'invalid' : '' }}">
      <label for="description">Description</label>
      <textarea id="description" name="description" maxlength="1000">{{ old('description', $page->description) }}</textarea>
      <div class="hint">Önerilen: 140–160 karakter</div>
      @if($errors->has('description'))<div class="err">{{ $errors->first('description') }}</div>@endif
    </div>

    <div class="adm-field {{ $errors->has('keywords') ? 'invalid' : '' }}">
      <label for="keywords">Keywords</label>
      <textarea id="keywords" name="keywords">{{ old('keywords', $page->keywords) }}</textarea>
      <div class="hint">Virgülle ayır</div>
    </div>

    <div class="adm-field {{ $errors->has('canonical') ? 'invalid' : '' }}">
      <label for="canonical">Canonical URL</label>
      <input id="canonical" type="url" name="canonical" value="{{ old('canonical', $page->canonical) }}">
      @if($errors->has('canonical'))<div class="err">{{ $errors->first('canonical') }}</div>@endif
    </div>
  </div>

  <div class="adm-card">
    <h2>Open Graph & Social</h2>
    <p class="sub">Facebook, Twitter, LinkedIn paylaşımları</p>

    <div class="adm-field">
      <label for="og_image">OG Image</label>
      <input id="og_image" type="text" name="og_image" value="{{ old('og_image', $page->og_image) }}" placeholder="assets/og/page-share.jpg">
      <div class="hint">Önerilen: 1200×630 px. Göreceli yol (assets/...) veya tam URL.</div>
    </div>

    <div class="adm-field">
      <label for="og_type">OG Type</label>
      <select id="og_type" name="og_type">
        <option value="">— seçilmedi —</option>
        <option value="website" {{ $page->og_type === 'website' ? 'selected' : '' }}>website</option>
        <option value="article" {{ $page->og_type === 'article' ? 'selected' : '' }}>article</option>
        <option value="profile" {{ $page->og_type === 'profile' ? 'selected' : '' }}>profile</option>
      </select>
    </div>

    <div class="adm-field">
      <label for="robots">Robots</label>
      <input id="robots" type="text" name="robots" value="{{ old('robots', $page->robots) }}" placeholder="index, follow, max-image-preview:large">
    </div>
  </div>

  <div class="adm-card">
    <h2>JSON-LD (Structured Data)</h2>
    <p class="sub">Sayfaya özel schema.org override'ı (boş bırakılırsa varsayılan kullanılır)</p>
    <div class="adm-field">
      <label for="jsonld">JSON-LD</label>
      <textarea id="jsonld" name="jsonld" rows="10" style="font-family: 'SF Mono', Consolas, monospace; font-size: 12.5px;">{{ old('jsonld', $page->jsonld) }}</textarea>
    </div>
  </div>

  <div style="display: flex; gap: 10px;">
    <button class="adm-btn" type="submit">Kaydet</button>
    <a class="adm-btn adm-btn--ghost" href="{{ route('admin.seo.index') }}">İptal</a>
  </div>
</form>
@endsection

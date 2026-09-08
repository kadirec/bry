@extends('admin.layouts.app')

@section('title', $item->exists ? 'Yönlendirme Düzenle' : 'Yeni Yönlendirme')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $item->exists ? 'Yönlendirme Düzenle' : 'Yeni Yönlendirme' }}</h1>
    <div class="meta">Eski URL isteklerini yeni URL'lere 301 ile yönlendir.</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.redirects.index') }}">← Geri</a>
</div>

<form action="{{ $item->exists ? route('admin.redirects.update', $item) : route('admin.redirects.store') }}" method="POST" autocomplete="off">
  @csrf
  @if($item->exists) @method('PUT') @endif

  <div class="adm-card">
    <div class="adm-field {{ $errors->has('from_path') ? 'invalid' : '' }}">
      <label for="from_path">Kaynak URL (eski)</label>
      <input id="from_path" type="text" name="from_path" value="{{ old('from_path', $item->from_path) }}" placeholder="/eski-sayfa" required>
      <div class="hint">"/" ile başlayan yerel path yaz. Örn: <code>/bry_nedir</code> veya <code>/store</code>. Tam URL yazsan bile sadece path kısmı kaydedilir.</div>
      @if($errors->has('from_path'))<div class="err">{{ $errors->first('from_path') }}</div>@endif
    </div>

    <div class="adm-field {{ $errors->has('to_path') ? 'invalid' : '' }}">
      <label for="to_path">Hedef URL (yeni)</label>
      <input id="to_path" type="text" name="to_path" value="{{ old('to_path', $item->to_path) }}" placeholder="/yeni-sayfa veya https://..." required>
      <div class="hint">Yerel path (<code>/yeni-sayfa</code>) veya tam URL (<code>https://...</code>) olabilir.</div>
      @if($errors->has('to_path'))<div class="err">{{ $errors->first('to_path') }}</div>@endif
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
      <div class="adm-field {{ $errors->has('status_code') ? 'invalid' : '' }}">
        <label for="status_code">HTTP Kodu</label>
        <select id="status_code" name="status_code">
          @php $sc = old('status_code', $item->status_code ?? 301); @endphp
          <option value="301" {{ (int)$sc === 301 ? 'selected' : '' }}>301 — Kalıcı (önerilen)</option>
          <option value="308" {{ (int)$sc === 308 ? 'selected' : '' }}>308 — Kalıcı (method korur)</option>
          <option value="302" {{ (int)$sc === 302 ? 'selected' : '' }}>302 — Geçici</option>
          <option value="307" {{ (int)$sc === 307 ? 'selected' : '' }}>307 — Geçici (method korur)</option>
        </select>
        @if($errors->has('status_code'))<div class="err">{{ $errors->first('status_code') }}</div>@endif
      </div>

      <div class="adm-field" style="display: flex; align-items: center; gap: 8px; padding-top: 30px;">
        <input id="is_active" type="checkbox" name="is_active" value="1"
          {{ old('is_active', $item->exists ? $item->is_active : true) ? 'checked' : '' }}>
        <label for="is_active" style="margin: 0; text-transform: none; letter-spacing: 0;">Aktif</label>
      </div>
    </div>

    <div class="adm-field {{ $errors->has('note') ? 'invalid' : '' }}">
      <label for="note">Not</label>
      <input id="note" type="text" name="note" value="{{ old('note', $item->note) }}" maxlength="255" placeholder="Örn: eski site yönlendirmesi">
      @if($errors->has('note'))<div class="err">{{ $errors->first('note') }}</div>@endif
    </div>

    <div style="display: flex; gap: 10px;">
      <button class="adm-btn" type="submit">{{ $item->exists ? 'Güncelle' : 'Ekle' }}</button>
      <a class="adm-btn adm-btn--ghost" href="{{ route('admin.redirects.index') }}">İptal</a>
    </div>
  </div>
</form>
@endsection

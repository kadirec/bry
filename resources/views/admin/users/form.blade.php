@extends('admin.layouts.app')

@section('title', $user->exists ? 'Kullanıcı Düzenle' : 'Yeni Kullanıcı')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $user->exists ? $user->name : 'Yeni Kullanıcı' }}</h1>
    <div class="meta">{{ $user->exists ? 'Mevcut kullanıcıyı düzenle' : 'Panele erişecek yeni bir kullanıcı oluştur' }}</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.users.index') }}">← Geri</a>
</div>

<form action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}" method="POST" autocomplete="off">
  @csrf
  @if($user->exists) @method('PUT') @endif

  <div class="adm-card">
    <div class="adm-field {{ $errors->has('name') ? 'invalid' : '' }}">
      <label for="name">Ad Soyad</label>
      <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required>
      @if($errors->has('name'))<div class="err">{{ $errors->first('name') }}</div>@endif
    </div>

    <div class="adm-field {{ $errors->has('email') ? 'invalid' : '' }}">
      <label for="email">E-posta</label>
      <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="off">
      <div class="hint">Panele giriş yaparken kullanılacak adres.</div>
      @if($errors->has('email'))<div class="err">{{ $errors->first('email') }}</div>@endif
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
      <div class="adm-field {{ $errors->has('password') ? 'invalid' : '' }}">
        <label for="password">Şifre</label>
        <input id="password" type="password" name="password" autocomplete="new-password" {{ $user->exists ? '' : 'required' }}>
        <div class="hint">{{ $user->exists ? 'Değiştirmek istemiyorsan boş bırak.' : 'En az 8 karakter.' }}</div>
        @if($errors->has('password'))<div class="err">{{ $errors->first('password') }}</div>@endif
      </div>
      <div class="adm-field">
        <label for="password_confirmation">Şifre (Tekrar)</label>
        <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" {{ $user->exists ? '' : 'required' }}>
      </div>
    </div>

    <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
      <input id="is_admin" type="checkbox" name="is_admin" value="1"
        {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
        {{ $user->exists && $user->id === auth()->id() ? 'disabled' : '' }}>
      <label for="is_admin" style="margin: 0; text-transform: none; letter-spacing: 0;">🔐 Yönetici — admin paneline erişebilir</label>
    </div>
    @if($user->exists && $user->id === auth()->id())
      <input type="hidden" name="is_admin" value="1">
      <div class="hint" style="margin: -6px 0 10px;">Kendi yönetici yetkini kaldıramazsın.</div>
    @else
      <div class="hint" style="margin: -6px 0 10px;">İşaretli değilse kullanıcı panele giriş yapamaz.</div>
    @endif

    <div style="display: flex; gap: 10px;">
      <button class="adm-btn" type="submit">{{ $user->exists ? 'Güncelle' : 'Oluştur' }}</button>
      <a class="adm-btn adm-btn--ghost" href="{{ route('admin.users.index') }}">İptal</a>
    </div>
  </div>
</form>
@endsection

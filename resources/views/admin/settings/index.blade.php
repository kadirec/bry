@extends('admin.layouts.app')

@section('title', 'Site Ayarları')

@section('content')
@php
  $groupLabels = [
    'general'  => 'Genel',
    'contact'  => 'İletişim',
    'social'   => 'Sosyal Medya',
    'mail'     => 'Mail Ayarları',
  ];
@endphp

<div class="adm-head">
  <div>
    <h1>Site Ayarları</h1>
    <div class="meta">Genel site bilgileri, iletişim ve sosyal medya bağlantıları</div>
  </div>
</div>

<div class="adm-tabs">
  @foreach($groups as $g)
    <a href="{{ route('admin.settings.index', $g) }}" class="{{ $g === $group ? 'is-active' : '' }}">
      {{ $groupLabels[$g] ?? ucfirst($g) }}
    </a>
  @endforeach
</div>

<form action="{{ route('admin.settings.update', $group) }}" method="POST">
  @csrf
  <div class="adm-card">
    <h2>{{ $groupLabels[$group] ?? ucfirst($group) }}</h2>
    <p class="sub">Bu sekmedeki ayarlar tüm sitede kullanılır</p>

    @foreach($items as $item)
      <div class="adm-field">
        <label for="set-{{ $item->key }}">{{ $item->label ?? $item->key }}</label>
        @if($item->type === 'textarea')
          <textarea id="set-{{ $item->key }}" name="value[{{ $item->key }}]">{{ $item->value }}</textarea>
        @elseif($item->type === 'boolean')
          <select id="set-{{ $item->key }}" name="value[{{ $item->key }}]">
            <option value="1" {{ (string) $item->value === '1' ? 'selected' : '' }}>Açık</option>
            <option value="0" {{ (string) $item->value === '0' ? 'selected' : '' }}>Kapalı</option>
          </select>
        @elseif($item->type === 'password')
          <input
            id="set-{{ $item->key }}"
            type="password"
            name="value[{{ $item->key }}]"
            value="{{ $item->value }}"
            autocomplete="new-password"
          >
        @else
          <input
            id="set-{{ $item->key }}"
            type="{{ in_array($item->type, ['email','tel','url','text','image']) ? ($item->type === 'image' ? 'text' : $item->type) : 'text' }}"
            name="value[{{ $item->key }}]"
            value="{{ $item->value }}"
          >
        @endif
        @if($item->hint)<div class="hint">{{ $item->hint }}</div>@endif
      </div>
    @endforeach

    <div style="display: flex; gap: 10px; margin-top: 8px;">
      <button class="adm-btn" type="submit">Kaydet</button>
      <a class="adm-btn adm-btn--ghost" href="{{ route('admin.dashboard') }}">İptal</a>
    </div>
  </div>
</form>
@endsection

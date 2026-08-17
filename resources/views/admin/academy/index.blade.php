@extends('admin.layouts.app')

@section('title', 'BRY Online Akademi')

@section('content')
<div class="adm-head">
  <div>
    <h1>BRY Online Akademi</h1>
    <div class="meta">/bry-online-akademi sayfasındaki eğitim kartları · sürükle-bırak ile sıralayabilirsin</div>
  </div>
  <div style="display:flex; gap:8px;">
    <a class="adm-btn" href="{{ route('admin.academy.create', ['type' => 'course']) }}">+ Yeni Eğitim</a>
    <a class="adm-btn adm-btn--ghost" href="{{ route('admin.academy.create', ['type' => 'live']) }}">+ Yeni Canlı Yayın</a>
  </div>
</div>

@if(session('status'))
  <div class="adm-flash" style="background:#E7F4EA; color:#1F5A2C; padding:10px 14px; border-radius:8px; margin-bottom:14px;">{{ session('status') }}</div>
@endif

@php
  $badges = ['live' => 'Yayında', 'soon' => 'Yakında', 'none' => 'Rozet yok'];
@endphp

@foreach ([
    ['title' => 'Akademide Yer Alan Eğitimler', 'items' => $courses, 'type' => 'course'],
    ['title' => 'Canlı Yayın Eğitimler',        'items' => $lives,   'type' => 'live'],
  ] as $group)
  <h2 style="margin: 26px 0 12px; font-size: 16px;">{{ $group['title'] }}
    <span style="font-weight:400; color: var(--a-ink-mute);">· {{ $group['items']->count() }} kayıt</span>
  </h2>

  @if($group['items']->isEmpty())
    <div class="adm-card" style="text-align:center; padding: 28px;">
      <p style="margin-bottom: 14px; color: var(--a-ink-mute);">Henüz kayıt yok.</p>
      <a class="adm-btn" href="{{ route('admin.academy.create', ['type' => $group['type']]) }}">Ekle</a>
    </div>
  @else
    <div class="acd-list"
         data-reorder-url="{{ route('admin.academy.reorder') }}"
         data-csrf="{{ csrf_token() }}">
      @foreach($group['items'] as $c)
        <div class="acd-row" data-id="{{ $c->id }}">
          <div class="acd-handle" title="Sürükle">⋮⋮</div>
          <div class="acd-thumb">
            @if($c->imageUrl())
              <img src="{{ $c->imageUrl() }}" alt="" loading="lazy">
            @else
              <span>—</span>
            @endif
          </div>
          <div class="acd-body">
            <strong>{!! $c->titleHtml() !!}@if($c->title_note)<span class="acd-note">— {{ $c->title_note }}</span>@endif</strong>
            @if($c->quote)<div class="acd-quote">{!! $c->quoteHtml() !!}</div>@endif
            <div class="acd-meta">
              <span class="acd-pill">#{{ $c->sort }}</span>
              <span class="acd-pill">{{ $badges[$c->badge] ?? $c->badge }}</span>
              @if($c->show_seal)<span class="acd-pill">Dünyada İlk mührü</span>@endif
              @if($c->link_url)<span class="acd-pill acd-pill--link">{{ $c->link_url }}</span>@endif
              @if(!$c->is_active)<span class="acd-pill acd-pill--off">Pasif</span>@endif
            </div>
          </div>
          <div class="acd-actions">
            <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.academy.edit', $c) }}">Düzenle</a>
            <form action="{{ route('admin.academy.destroy', $c) }}" method="POST" style="display:inline;" onsubmit="return confirm('Silmek istediğine emin misin?');">
              @csrf @method('DELETE')
              <button class="adm-btn adm-btn--danger adm-btn--sm" type="submit">Sil</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  @endif
@endforeach

<div id="reorder-status" style="margin-top: 14px; font-size: 13px; color: var(--a-ink-mute); min-height: 18px;"></div>

<style>
  .acd-list { display: flex; flex-direction: column; gap: 10px; }
  .acd-row {
    display: grid;
    grid-template-columns: 24px 92px 1fr auto;
    gap: 12px;
    align-items: center;
    background: #fff;
    border: 1px solid var(--a-line);
    border-radius: 10px;
    padding: 10px 12px;
  }
  .acd-row.sortable-ghost { opacity: .4; }
  .acd-row.sortable-chosen { box-shadow: 0 8px 24px -8px rgba(0,0,0,.25); }
  .acd-handle { cursor: grab; user-select: none; color: var(--a-ink-mute); text-align: center; }
  .acd-handle:active { cursor: grabbing; }
  .acd-thumb {
    aspect-ratio: 4/3; border-radius: 8px; overflow: hidden;
    background: var(--a-line-soft, #F4F1EA);
    display: grid; place-items: center; color: var(--a-ink-mute); font-size: 12px;
  }
  .acd-thumb img { width: 100%; height: 100%; object-fit: cover; }
  .acd-body strong { display: block; font-size: 14px; line-height: 1.35; }
  .acd-note { font-weight: 400; color: var(--a-ink-mute); font-size: 12px; margin-left: 4px; }
  .acd-quote { font-size: 12px; color: var(--a-ink-mute); margin-top: 3px; }
  .acd-meta { display: flex; gap: 6px; flex-wrap: wrap; margin-top: 6px; }
  .acd-pill { font-size: 11px; padding: 2px 8px; border-radius: 999px; background: #F4F1EA; color: #5A5348; }
  .acd-pill--link { font-family: ui-monospace, monospace; }
  .acd-pill--off { background: #F1ECDD; color: #7E5C13; }
  .acd-actions { display: flex; gap: 6px; }
  @media (max-width: 720px) {
    .acd-row { grid-template-columns: 24px 1fr; }
    .acd-thumb, .acd-actions { grid-column: 2; }
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
  (function () {
    if (typeof Sortable === 'undefined') return;
    var status = document.getElementById('reorder-status');
    document.querySelectorAll('.acd-list').forEach(function (list) {
      Sortable.create(list, {
        handle: '.acd-handle',
        animation: 150,
        ghostClass: 'sortable-ghost',
        chosenClass: 'sortable-chosen',
        onEnd: function () {
          var ids = Array.prototype.map.call(list.querySelectorAll('.acd-row'), function (el) {
            return parseInt(el.getAttribute('data-id'), 10);
          });
          status.textContent = 'Sıra kaydediliyor…';
          fetch(list.getAttribute('data-reorder-url'), {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',
              'X-CSRF-TOKEN': list.getAttribute('data-csrf'),
              'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ order: ids })
          })
          .then(function (r) { return r.json(); })
          .then(function (res) {
            status.textContent = res && res.ok ? '✓ Sıra kaydedildi.' : '⚠ Kaydedilemedi.';
            if (res && res.ok) setTimeout(function () { status.textContent = ''; }, 2000);
          })
          .catch(function () { status.textContent = '⚠ Bağlantı hatası.'; });
        }
      });
    });
  })();
</script>
@endsection

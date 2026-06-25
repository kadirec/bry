@extends('admin.layouts.app')

@section('title', 'Kurumsal Referanslar')

@section('content')
<div class="adm-head">
  <div>
    <h1>Kurumsal Referanslar</h1>
    <div class="meta">{{ $items->count() }} logo · sürükle-bırak ile sıralayabilirsin</div>
  </div>
  <a class="adm-btn" href="{{ route('admin.references.create') }}">+ Yeni Logo</a>
</div>

@if(session('status'))
  <div class="adm-flash" style="background:#E7F4EA; color:#1F5A2C; padding:10px 14px; border-radius:8px; margin-bottom:14px;">{{ session('status') }}</div>
@endif

@if($items->isEmpty())
  <div class="adm-card" style="text-align:center; padding: 40px;">
    <p style="margin-bottom: 16px; color: var(--a-ink-mute);">Henüz referans eklenmedi.</p>
    <a class="adm-btn" href="{{ route('admin.references.create') }}">İlk Logoyu Ekle</a>
    <p style="margin-top: 16px; font-size: 13px; color: var(--a-ink-mute);">İpucu: <code>php artisan db:seed --class=ReferenceSeeder</code> ile <code>storage/app/public/referanslar/</code> klasöründeki mevcut logoları toplu içe aktarabilirsin.</p>
  </div>
@else
  <div id="references-grid"
       class="ref-admin-grid"
       data-reorder-url="{{ route('admin.references.reorder') }}"
       data-csrf="{{ csrf_token() }}">
    @foreach($items as $r)
      <div class="ref-admin-card" data-id="{{ $r->id }}">
        <div class="ref-admin-handle" title="Sürükle">⋮⋮</div>
        <div class="ref-admin-img">
          @if($r->image_path)
            <img src="{{ $r->imageUrl() }}" alt="{{ $r->name }}" loading="lazy">
          @else
            <span style="color: var(--a-ink-mute); font-size: 12px;">Görsel yok</span>
          @endif
        </div>
        <div class="ref-admin-body">
          <strong>{{ $r->name }}</strong>
          <div class="ref-admin-meta">
            @if($r->is_active)
              <span class="ref-status ref-status-on">Aktif</span>
            @else
              <span class="ref-status ref-status-off">Pasif</span>
            @endif
            @if($r->show_on_kurumsal)
              <span class="ref-status ref-status-kur" title="Kurumsal sayfa carousel'inde">Eğitimlerde</span>
            @endif
            <span class="ref-sort">#{{ $r->sort }}</span>
          </div>
        </div>
        <div class="ref-admin-actions">
          <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.references.edit', $r) }}">Düzenle</a>
          <form action="{{ route('admin.references.destroy', $r) }}" method="POST" style="display:inline;" onsubmit="return confirm('Silmek istediğine emin misin?');">
            @csrf @method('DELETE')
            <button class="adm-btn adm-btn--danger adm-btn--sm" type="submit">Sil</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>

  <div id="reorder-status" style="margin-top: 14px; font-size: 13px; color: var(--a-ink-mute); min-height: 18px;"></div>
@endif

<style>
  .ref-admin-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 14px;
  }
  .ref-admin-card {
    background: #fff;
    border: 1px solid var(--a-line);
    border-radius: 10px;
    padding: 14px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    position: relative;
    transition: box-shadow .15s, border-color .15s, transform .15s;
  }
  .ref-admin-card.sortable-ghost { opacity: 0.4; }
  .ref-admin-card.sortable-chosen { box-shadow: 0 8px 24px -8px rgba(0,0,0,0.25); border-color: var(--a-plum, #8A6FC1); }
  .ref-admin-handle {
    position: absolute;
    top: 8px; right: 8px;
    cursor: grab;
    user-select: none;
    color: var(--a-ink-mute);
    padding: 4px 6px;
    font-size: 14px;
    line-height: 1;
  }
  .ref-admin-handle:active { cursor: grabbing; }
  .ref-admin-img {
    aspect-ratio: 16/10;
    background: var(--a-line-soft, #F4F1EA);
    border-radius: 8px;
    display: grid;
    place-items: center;
    padding: 14px;
    overflow: hidden;
  }
  .ref-admin-img img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
  }
  .ref-admin-body strong {
    display: block;
    font-size: 14px;
    line-height: 1.3;
    margin-bottom: 4px;
  }
  .ref-admin-meta {
    display: flex;
    gap: 8px;
    align-items: center;
    font-size: 12px;
  }
  .ref-status {
    display: inline-block;
    padding: 2px 8px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 500;
  }
  .ref-status-on { background:#E7F4EA; color:#1F5A2C; }
  .ref-status-off { background:#F1ECDD; color:#7E5C13; }
  .ref-status-kur { background:#EDE7F6; color:#4527A0; }
  .ref-sort { color: var(--a-ink-mute); }
  .ref-admin-actions {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
  }
</style>

@if(!$items->isEmpty())
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
  (function () {
    var grid = document.getElementById('references-grid');
    if (!grid || typeof Sortable === 'undefined') return;
    var status = document.getElementById('reorder-status');

    Sortable.create(grid, {
      handle: '.ref-admin-handle',
      animation: 150,
      ghostClass: 'sortable-ghost',
      chosenClass: 'sortable-chosen',
      onEnd: function () {
        var ids = Array.prototype.map.call(grid.querySelectorAll('.ref-admin-card'), function (el) {
          return parseInt(el.getAttribute('data-id'), 10);
        });
        status.textContent = 'Sıra kaydediliyor…';
        fetch(grid.getAttribute('data-reorder-url'), {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': grid.getAttribute('data-csrf'),
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: JSON.stringify({ order: ids })
        })
        .then(function (r) { return r.json(); })
        .then(function (res) {
          if (res && res.ok) {
            status.textContent = '✓ Sıra kaydedildi.';
            setTimeout(function () { status.textContent = ''; }, 2000);
          } else {
            status.textContent = '⚠ Kaydedilemedi.';
          }
        })
        .catch(function () {
          status.textContent = '⚠ Bağlantı hatası.';
        });
      }
    });
  })();
</script>
@endif
@endsection

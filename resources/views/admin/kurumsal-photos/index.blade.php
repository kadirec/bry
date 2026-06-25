@extends('admin.layouts.app')

@section('title', 'Kurumsal Etkinlik Fotoğrafları')

@section('content')
<div class="adm-head">
  <div>
    <h1>Kurumsal Etkinlik Fotoğrafları</h1>
    <div class="meta">{{ $items->count() }} fotoğraf · sürükle-bırak ile sıralayabilirsin</div>
  </div>
  <a class="adm-btn" href="{{ route('admin.kurumsal-photos.create') }}">+ Yeni Fotoğraf</a>
</div>

@if(session('status'))
  <div class="adm-flash" style="background:#E7F4EA; color:#1F5A2C; padding:10px 14px; border-radius:8px; margin-bottom:14px;">{{ session('status') }}</div>
@endif

@if($items->isEmpty())
  <div class="adm-card" style="text-align:center; padding: 40px;">
    <p style="margin-bottom: 16px; color: var(--a-ink-mute);">Henüz fotoğraf eklenmedi.</p>
    <a class="adm-btn" href="{{ route('admin.kurumsal-photos.create') }}">İlk Fotoğrafı Ekle</a>
    <p style="margin-top: 16px; font-size: 13px; color: var(--a-ink-mute);">İpucu: <code>php artisan db:seed --class=KurumsalPhotoSeeder</code> ile <code>storage/app/public/kurumsal-etkinlikler/</code> klasöründeki mevcut fotoğrafları toplu içe aktarabilirsin.</p>
  </div>
@else
  <div id="kurumsal-grid"
       class="gph-grid"
       data-reorder-url="{{ route('admin.kurumsal-photos.reorder') }}"
       data-csrf="{{ csrf_token() }}">
    @foreach($items as $p)
      <div class="gph-card" data-id="{{ $p->id }}">
        <div class="gph-handle" title="Sürükle">⋮⋮</div>
        <div class="gph-img">
          @if($p->image_path)
            <img src="{{ $p->imageUrl() }}" alt="{{ $p->caption ?: 'Fotoğraf #' . $p->id }}" loading="lazy">
          @endif
        </div>
        <div class="gph-body">
          @if($p->caption)<strong>{{ $p->caption }}</strong>@endif
          <div class="gph-meta">
            @if(!$p->is_active)
              <span class="gph-status gph-status-off">Pasif</span>
            @endif
            <span class="gph-sort">#{{ $p->sort }}</span>
          </div>
        </div>
        <div class="gph-actions">
          <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.kurumsal-photos.edit', $p) }}">Düzenle</a>
          <form action="{{ route('admin.kurumsal-photos.destroy', $p) }}" method="POST" style="display:inline;" onsubmit="return confirm('Silmek istediğine emin misin?');">
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
  .gph-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 14px;
  }
  .gph-card {
    background: #fff;
    border: 1px solid var(--a-line);
    border-radius: 10px;
    padding: 10px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    position: relative;
    transition: box-shadow .15s, border-color .15s;
  }
  .gph-card.sortable-ghost { opacity: 0.4; }
  .gph-card.sortable-chosen { box-shadow: 0 8px 24px -8px rgba(0,0,0,0.25); border-color: var(--a-plum, #8A6FC1); }
  .gph-handle {
    position: absolute; top: 6px; right: 6px;
    cursor: grab;
    user-select: none;
    color: #fff;
    background: rgba(0,0,0,0.5);
    padding: 2px 6px;
    font-size: 12px;
    border-radius: 6px;
    z-index: 2;
  }
  .gph-handle:active { cursor: grabbing; }
  .gph-img {
    aspect-ratio: 4/3;
    background: var(--a-line-soft, #F4F1EA);
    border-radius: 8px;
    overflow: hidden;
    display: grid;
    place-items: center;
  }
  .gph-img img {
    width: 100%; height: 100%; object-fit: cover;
  }
  .gph-body strong { display: block; font-size: 13px; line-height: 1.3; }
  .gph-meta { display: flex; gap: 8px; align-items: center; font-size: 12px; }
  .gph-status { display: inline-block; padding: 2px 8px; border-radius: 999px; font-size: 11px; font-weight: 500; }
  .gph-status-off { background:#F1ECDD; color:#7E5C13; }
  .gph-sort { color: var(--a-ink-mute); }
  .gph-actions { display: flex; gap: 6px; flex-wrap: wrap; }
</style>

@if(!$items->isEmpty())
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
  (function () {
    var grid = document.getElementById('kurumsal-grid');
    if (!grid || typeof Sortable === 'undefined') return;
    var status = document.getElementById('reorder-status');
    Sortable.create(grid, {
      handle: '.gph-handle',
      animation: 150,
      ghostClass: 'sortable-ghost',
      chosenClass: 'sortable-chosen',
      onEnd: function () {
        var ids = Array.prototype.map.call(grid.querySelectorAll('.gph-card'), function (el) {
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
          status.textContent = res && res.ok ? '✓ Sıra kaydedildi.' : '⚠ Kaydedilemedi.';
          if (res && res.ok) setTimeout(function () { status.textContent = ''; }, 2000);
        })
        .catch(function () { status.textContent = '⚠ Bağlantı hatası.'; });
      }
    });
  })();
</script>
@endif
@endsection

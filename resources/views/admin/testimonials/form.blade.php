@extends('admin.layouts.app')

@section('title', $item->exists ? 'Hikaye Düzenle' : 'Yeni Hikaye')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $item->exists ? $item->name : 'Yeni Dönüşen Hayat' }}</h1>
    <div class="meta">{{ $item->exists ? 'Mevcut hikayeyi düzenle' : 'Anasayfa reels bölümüne yeni hikaye ekle' }}</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.testimonials.index') }}">← Geri</a>
</div>

<form id="testimonialForm" action="{{ $item->exists ? route('admin.testimonials.update', $item) : route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" data-max-video-mb="120">
  @csrf
  @if($item->exists) @method('PUT') @endif

  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; align-items: start;">
    {{-- Sol kolon: içerik --}}
    <div>
      <div class="adm-card">
        <h2>Kart İçeriği</h2>

        <div class="adm-field {{ $errors->has('name') ? 'invalid' : '' }}">
          <label for="name">Ad Soyad</label>
          <input id="name" type="text" name="name" value="{{ old('name', $item->name) }}" required placeholder="Ayşe K.">
          @if($errors->has('name'))<div class="err">{{ $errors->first('name') }}</div>@endif
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="adm-field">
            <label for="tag">Sol üst etiket</label>
            <input id="tag" type="text" name="tag" value="{{ old('tag', $item->tag) }}" placeholder="Bireysel · Online · Kurumsal">
          </div>
          <div class="adm-field">
            <label for="duration">Sağ üst süre</label>
            <input id="duration" type="text" name="duration" value="{{ old('duration', $item->duration) }}" placeholder="0:47">
          </div>
        </div>
      </div>

      <div class="adm-card">
        <h2>Video Yükle</h2>
        <p class="sub">Bu hikayeye özel video dosyası. <strong>Yüklenirse YouTube'a göre öncelikli</strong> olur.</p>

        @if($item->video_file)
          <video src="{{ $item->videoFileUrl() }}" controls preload="metadata" style="width: 100%; max-width: 480px; border-radius: 10px; background: #000; margin-bottom: 12px;"></video>
          <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
            <input id="remove_video" type="checkbox" name="remove_video" value="1">
            <label for="remove_video" style="margin: 0; text-transform: none; letter-spacing: 0; color: var(--a-danger);">Mevcut videoyu sil</label>
          </div>
        @endif

        <div class="adm-field {{ $errors->has('video_file_upload') ? 'invalid' : '' }}">
          <label for="video_file_upload">Dosya (mp4, webm, mov · max 120 MB)</label>
          <input id="video_file_upload" type="file" name="video_file_upload" accept="video/mp4,video/webm,video/quicktime,video/x-m4v">
          <div class="hint">Mevcut dosya varken yeniden yüklenirse eskisi otomatik silinir.</div>
          @if($errors->has('video_file_upload'))<div class="err">{{ $errors->first('video_file_upload') }}</div>@endif
        </div>
      </div>

      <div class="adm-card">
        <h2>Kapak Görseli (Poster)</h2>
        <p class="sub">Karttaki arka plan + video başlamadan önce gösterilen poster. <strong>9:16 oran</strong> önerilir.<br>YouTube ID'si varsa otomatik hqdefault kullanılır; özel kapak yüklersen o öncelikli olur.</p>

        @if($item->thumbnail)
          <img src="{{ $item->posterUrl() }}" alt="Kapak" style="max-width: 220px; aspect-ratio: 9/16; object-fit: cover; border-radius: 12px; border: 1px solid var(--a-line); margin-bottom: 12px;">
          <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
            <input id="remove_thumbnail" type="checkbox" name="remove_thumbnail" value="1">
            <label for="remove_thumbnail" style="margin: 0; text-transform: none; letter-spacing: 0; color: var(--a-danger);">Mevcut kapağı sil</label>
          </div>
        @endif

        <div class="adm-field {{ $errors->has('thumbnail_file_upload') ? 'invalid' : '' }}">
          <label for="thumbnail_file_upload">Kapak Yükle (jpg/png/webp · max 4 MB)</label>
          <input id="thumbnail_file_upload" type="file" name="thumbnail_file_upload" accept="image/jpeg,image/png,image/webp">
          <div class="hint">Önerilen: 720×1280 px (9:16 dikey).</div>
          @if($errors->has('thumbnail_file_upload'))<div class="err">{{ $errors->first('thumbnail_file_upload') }}</div>@endif
        </div>
      </div>

      <div class="adm-card">
        <h2>YouTube</h2>
        <p class="sub">Dosya yüklemek istemiyorsan YouTube ID veya URL ile ekleyebilirsin. Dosya yüklenmediği durumda kullanılır.</p>

        <div class="adm-field {{ $errors->has('youtube_id') ? 'invalid' : '' }}">
          <label for="youtube_id">YouTube ID / URL</label>
          <input id="youtube_id" type="text" name="youtube_id" value="{{ old('youtube_id', $item->youtube_id) }}" placeholder="jZwHCFFrNKA  veya  https://youtu.be/jZwHCFFrNKA">
          <div class="hint">Tam URL yapıştırırsan otomatik olarak ID çıkarılır (youtu.be, youtube.com/watch, /embed, /shorts).</div>
          @if($errors->has('youtube_id'))<div class="err">{{ $errors->first('youtube_id') }}</div>@endif
        </div>

        @if($item->youtube_id && !$item->video_file && !$item->thumbnail)
          <div style="margin-top: 8px;">
            <img src="{{ $item->youtubeThumbnailUrl() }}" alt="YouTube otomatik thumbnail" style="max-width: 320px; border-radius: 10px; border: 1px solid var(--a-line);">
            <div class="hint" style="margin-top: 6px;">YouTube'dan otomatik gelen kapak (özel kapak yüklemediğinde kullanılır).</div>
          </div>
        @endif
      </div>
    </div>

    {{-- Sağ kolon: yayın --}}
    <div>
      <div class="adm-card">
        <h2>Yayın</h2>

        <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
          <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
          <label for="is_active" style="margin: 0; text-transform: none; letter-spacing: 0;">Aktif</label>
        </div>

        <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
          <input id="show_on_home" type="checkbox" name="show_on_home" value="1" {{ old('show_on_home', $item->show_on_home ?? true) ? 'checked' : '' }}>
          <label for="show_on_home" style="margin: 0; text-transform: none; letter-spacing: 0;">Anasayfada göster</label>
        </div>

        <div class="adm-field">
          <label for="sort">Sıra</label>
          <input id="sort" type="number" name="sort" value="{{ old('sort', $item->sort ?? 0) }}" min="0">
        </div>
      </div>
    </div>
  </div>

  <div style="display: flex; gap: 10px;">
    <button class="adm-btn" type="submit">{{ $item->exists ? 'Güncelle' : 'Ekle' }}</button>
    <a class="adm-btn adm-btn--ghost" href="{{ route('admin.testimonials.index') }}">İptal</a>
  </div>
</form>

<div id="uploadOverlay" hidden aria-hidden="true" role="dialog" aria-live="polite"
     style="position:fixed; inset:0; background:rgba(15,23,42,0.72); backdrop-filter:blur(2px);
            display:flex; align-items:center; justify-content:center; z-index:9999;">
  <div style="background:#fff; border-radius:14px; padding:28px 32px; min-width:340px; max-width:92vw;
              box-shadow:0 20px 60px rgba(0,0,0,0.35); text-align:center;">
    <div style="display:flex; align-items:center; justify-content:center; gap:12px; margin-bottom:14px;">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#1E3A5F"
           stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
           style="animation:uplSpin 1s linear infinite;">
        <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
      </svg>
      <h3 id="uploadTitle" style="margin:0; font-size:16px; color:#0F172A;">Video yükleniyor…</h3>
    </div>

    <div style="height:10px; background:#EEF2F6; border-radius:999px; overflow:hidden; margin-bottom:10px;">
      <div id="uploadBar" style="height:100%; width:0%; background:linear-gradient(90deg,#2C5282,#3B82F6);
                                 transition:width .2s ease;"></div>
    </div>

    <div style="display:flex; justify-content:space-between; font-size:13px; color:#64748B;">
      <span id="uploadPercent">0%</span>
      <span id="uploadBytes">0 / 0 MB</span>
    </div>

    <p style="margin:14px 0 0; font-size:12px; color:#94A3B8;">
      Yükleme tamamlanana kadar sekmeyi kapatma.
    </p>
  </div>
</div>

<style>@keyframes uplSpin { to { transform: rotate(360deg); } }</style>

@push('scripts')
<script>
(function () {
  const form        = document.getElementById('testimonialForm');
  const videoInput  = document.getElementById('video_file_upload');
  const overlay     = document.getElementById('uploadOverlay');
  const bar         = document.getElementById('uploadBar');
  const pctEl       = document.getElementById('uploadPercent');
  const bytesEl     = document.getElementById('uploadBytes');
  const titleEl     = document.getElementById('uploadTitle');
  const maxMb       = parseInt(form.dataset.maxVideoMb || '120', 10);
  const maxBytes    = maxMb * 1024 * 1024;

  const fmtMb = b => (b / 1048576).toFixed(1);

  videoInput?.addEventListener('change', () => {
    const f = videoInput.files?.[0];
    if (f && f.size > maxBytes) {
      alert('Video dosyası ' + maxMb + ' MB sınırını aşıyor (' + fmtMb(f.size) + ' MB). Lütfen daha küçük bir dosya seçin.');
      videoInput.value = '';
    }
  });

  function showOverlay() {
    overlay.hidden = false;
    overlay.setAttribute('aria-hidden', 'false');
    bar.style.width = '0%';
    pctEl.textContent = '0%';
    bytesEl.textContent = '0 / 0 MB';
    titleEl.textContent = 'Video yükleniyor…';
  }

  form.addEventListener('submit', function (e) {
    const f = videoInput?.files?.[0];
    if (f && f.size > maxBytes) {
      e.preventDefault();
      alert('Video dosyası ' + maxMb + ' MB sınırını aşıyor.');
      return;
    }

    // Sadece bir video gerçekten seçildiyse XHR ile ilerleme göster.
    if (!f) return;

    e.preventDefault();
    showOverlay();

    const xhr  = new XMLHttpRequest();
    const data = new FormData(form);

    xhr.upload.addEventListener('progress', (ev) => {
      if (!ev.lengthComputable) return;
      const pct = (ev.loaded / ev.total) * 100;
      bar.style.width = pct.toFixed(1) + '%';
      pctEl.textContent = pct.toFixed(0) + '%';
      bytesEl.textContent = fmtMb(ev.loaded) + ' / ' + fmtMb(ev.total) + ' MB';
      if (pct >= 99.5) titleEl.textContent = 'İşleniyor…';
    });

    xhr.addEventListener('load', () => {
      // 2xx/3xx → tarayıcı yönlendirmeyi takip etti; responseURL son sayfayı verir.
      // 4xx → Laravel form sayfasını hatalarla render eder.
      if (xhr.status >= 200 && xhr.status < 400) {
        if (xhr.responseURL) {
          window.location.href = xhr.responseURL;
        } else {
          window.location.reload();
        }
      } else if (xhr.status === 422 || xhr.status === 419 || xhr.status === 413) {
        // Validasyon / CSRF / boyut hatası → sayfayı XHR cevabıyla değiştir.
        document.open();
        document.write(xhr.responseText);
        document.close();
      } else {
        overlay.hidden = true;
        alert('Yükleme sırasında bir hata oluştu (HTTP ' + xhr.status + '). Lütfen tekrar dene.');
      }
    });

    xhr.addEventListener('error', () => {
      overlay.hidden = true;
      alert('Ağ hatası. Bağlantını kontrol edip tekrar dene.');
    });

    xhr.addEventListener('abort', () => {
      overlay.hidden = true;
    });

    xhr.open(form.method.toUpperCase(), form.action, true);
    // X-Requested-With koymuyoruz; Laravel'in normal HTML akışında kalsın
    // (422 → form HTML'i yeniden render, 302 → redirect HTML'i).
    xhr.setRequestHeader('Accept', 'text/html');
    xhr.send(data);
  });
})();
</script>
@endpush
@endsection

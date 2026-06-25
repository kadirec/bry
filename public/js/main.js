  // Header — submenu click on mobile / a11y
  document.querySelectorAll('.menu .item > button').forEach(btn => {
    btn.addEventListener('click', () => {
      const exp = btn.getAttribute('aria-expanded') === 'true';
      btn.setAttribute('aria-expanded', String(!exp));
    });
  });

  // Mobile drawer toggle
  const header = document.querySelector('header.site');
  const toggle = document.querySelector('.menu-toggle');
  if (toggle && header) {
    toggle.setAttribute('aria-expanded', 'false');
    toggle.addEventListener('click', () => {
      const open = header.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(open));
    });
    header.querySelectorAll('nav.menu a').forEach(a => {
      a.addEventListener('click', () => {
        header.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape' && header.classList.contains('is-open')) {
        header.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // Video modal — data-video-id (YouTube) veya data-video-src (yüklenen dosya) destekler
  const modal = document.getElementById('video-modal');
  const iframeWrap = modal && modal.querySelector('.video-modal-iframe-wrap');
  const fallback   = modal && modal.querySelector('.video-modal-fallback');
  let lastTrigger = null;

  function escapeAttr(s) {
    return String(s).replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;');
  }

  function openYouTubeModal(videoId, triggerEl) {
    if (!modal || !iframeWrap || !videoId) return;
    lastTrigger = triggerEl || null;
    modal.classList.remove('is-file-mode');
    const src = 'https://www.youtube-nocookie.com/embed/' + encodeURIComponent(videoId) +
      '?autoplay=1&rel=0&modestbranding=1&playsinline=1';
    iframeWrap.innerHTML =
      '<iframe src="' + src + '" ' +
      'title="Klip" frameborder="0" ' +
      'allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" ' +
      'allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>';
    if (fallback) {
      fallback.href = 'https://www.youtube.com/watch?v=' + encodeURIComponent(videoId);
      fallback.style.display = '';
    }
    showModal();
  }

  function openFileModal(src, mime, poster, triggerEl) {
    if (!modal || !iframeWrap || !src) return;
    lastTrigger = triggerEl || null;
    modal.classList.add('is-file-mode');
    const mt = mime || 'video/mp4';
    const posterAttr = poster ? ' poster="' + escapeAttr(poster) + '"' : '';
    iframeWrap.innerHTML =
      '<video controls autoplay playsinline preload="metadata"' + posterAttr + '>' +
      '  <source src="' + escapeAttr(src) + '" type="' + escapeAttr(mt) + '">' +
      '  Tarayıcınız bu videoyu oynatamıyor.' +
      '</video>';
    // Yüklenen dosyada YouTube fallback'i anlamsız → gizle
    if (fallback) fallback.style.display = 'none';
    showModal();
  }

  function showModal() {
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('video-modal-open');
  }

  function closeVideoModal() {
    if (!modal || !iframeWrap) return;
    modal.classList.remove('is-open');
    modal.classList.remove('is-file-mode');
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('video-modal-open');
    iframeWrap.innerHTML = ''; // iframe / video'yu kaldır → ses+akış durur
    if (lastTrigger && typeof lastTrigger.focus === 'function') lastTrigger.focus();
  }

  if (modal) {
    document.addEventListener('click', e => {
      const trigger = e.target.closest('[data-video-id], [data-video-src]');
      if (!trigger) return;
      e.preventDefault();
      if (trigger.dataset.videoSrc) {
        openFileModal(trigger.dataset.videoSrc, trigger.dataset.videoMime, trigger.dataset.videoPoster, trigger);
      } else if (trigger.dataset.videoId) {
        openYouTubeModal(trigger.dataset.videoId, trigger);
      }
    });

    modal.querySelectorAll('[data-close]').forEach(el => {
      el.addEventListener('click', closeVideoModal);
    });
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape' && modal.classList.contains('is-open')) closeVideoModal();
    });
  }


/* ─────────────────────────────────────────────────────────────
   Generic modal opener (KVKK vs.)
   data-open-modal="<id>" → açar
   data-close-modal       → kapatır
   ───────────────────────────────────────────────────────────── */
(function () {
  function open(id) {
    var m = document.getElementById(id);
    if (!m) return;
    m.hidden = false;
    document.body.classList.add('kvkk-modal-open');
    var focusable = m.querySelector('button, a, [tabindex]');
    if (focusable) focusable.focus();
  }
  function close(m) {
    if (!m) return;
    m.hidden = true;
    document.body.classList.remove('kvkk-modal-open');
  }
  document.addEventListener('click', function (e) {
    var opener = e.target.closest('[data-open-modal]');
    if (opener) {
      e.preventDefault();
      open(opener.getAttribute('data-open-modal'));
      return;
    }
    var closer = e.target.closest('[data-close-modal]');
    if (closer) {
      e.preventDefault();
      var m = closer.closest('.kvkk-modal');
      close(m);
    }
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      document.querySelectorAll('.kvkk-modal').forEach(function (m) {
        if (!m.hidden) close(m);
      });
    }
  });
})();

/* ─────────────────────────────────────────────────────────────
   Foto galeri lightbox (Etkinlik & Kamp)
   ───────────────────────────────────────────────────────────── */
(function () {
  var grid = document.getElementById('photo-grid');
  var box  = document.getElementById('photo-lightbox');
  if (!grid || !box) return;

  var cells = Array.prototype.slice.call(grid.querySelectorAll('a.photo-cell'));
  if (!cells.length) return;

  var imgEl     = box.querySelector('.pl-img');
  var capEl     = box.querySelector('.pl-caption');
  var counterEl = box.querySelector('.pl-counter');
  var current   = 0;
  var lastTrigger = null;

  function open(i, trigger) {
    current = (i + cells.length) % cells.length;
    var cell = cells[current];
    imgEl.src = cell.getAttribute('href');
    imgEl.alt = cell.getAttribute('aria-label') || '';
    var cap = cell.querySelector('.photo-cap');
    capEl.textContent = cap ? cap.textContent : '';
    capEl.hidden = !capEl.textContent;
    counterEl.textContent = (current + 1) + ' / ' + cells.length;
    box.hidden = false;
    document.body.classList.add('photo-lightbox-open');
    lastTrigger = trigger || cell;
  }
  function close() {
    box.hidden = true;
    document.body.classList.remove('photo-lightbox-open');
    imgEl.src = '';
    if (lastTrigger && typeof lastTrigger.focus === 'function') lastTrigger.focus();
  }
  function prev() { open(current - 1); }
  function next() { open(current + 1); }

  grid.addEventListener('click', function (e) {
    var cell = e.target.closest('a.photo-cell');
    if (!cell) return;
    e.preventDefault();
    var idx = parseInt(cell.getAttribute('data-index'), 10) || 0;
    open(idx, cell);
  });

  box.addEventListener('click', function (e) {
    if (e.target.closest('[data-pl-close]')) return close();
    if (e.target.closest('[data-pl-prev]'))  return prev();
    if (e.target.closest('[data-pl-next]'))  return next();
    if (e.target === box) close(); // dış tıklamada kapan
  });

  document.addEventListener('keydown', function (e) {
    if (box.hidden) return;
    if (e.key === 'Escape')     close();
    else if (e.key === 'ArrowLeft')  prev();
    else if (e.key === 'ArrowRight') next();
  });

  // Basit kaydırma desteği (mobil)
  var touchStartX = null;
  box.addEventListener('touchstart', function (e) { touchStartX = e.changedTouches[0].clientX; }, { passive: true });
  box.addEventListener('touchend', function (e) {
    if (touchStartX === null) return;
    var dx = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(dx) > 40) (dx < 0 ? next() : prev());
    touchStartX = null;
  });
})();

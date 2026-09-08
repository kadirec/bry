@php
  /** @var \Illuminate\Support\Collection $productReviews */
  /** @var string $captchaQuestion */
  $reviewsTitle       = $reviewsTitle       ?? 'Katılımcı <em>Deneyimleri ve Yorumları</em>';
  $reviewsIntro       = $reviewsIntro       ?? 'Bu dönüşümü yaşayan diğer katılımcıların deneyimlerini aşağıda inceleyebilirsiniz.';
  $reviewsSectionId   = $reviewsSectionId   ?? 'degerlendir';
  $reviewDefaultSlug  = $reviewDefaultSlug  ?? 'genel';
@endphp

<section class="alt" id="{{ $reviewsSectionId }}" aria-labelledby="deneyim-title" style="padding: 50px 0; scroll-margin-top: 80px;">
  <div class="container">
    <div class="section-head section-head-center">
      <h2 id="deneyim-title">{!! $reviewsTitle !!}</h2>
      <p>{{ $reviewsIntro }}</p>
    </div>

    @if($productReviews->isNotEmpty())
      <div class="reviews-wrap" data-reviews-carousel>
        <button type="button" class="reviews-arrow reviews-arrow--prev" aria-label="Önceki yorumlar" data-dir="-1">
          <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 6 9 12 15 18"></polyline></svg>
        </button>

        <div class="reviews-row" role="list">
          @foreach($productReviews as $review)
            @php
              $initial = mb_strtoupper(mb_substr(trim($review->name), 0, 1));
            @endphp
            <article class="review-card" role="listitem">
              <div class="review-card-quote">
                <svg class="review-qmark" viewBox="0 0 32 32" aria-hidden="true">
                  <path fill="currentColor" d="M9 6c-3 0-5 2.4-5 5.6 0 3 2 5.4 4.6 5.4-.6 2.4-2.5 4-4.6 4.4v2.6c5 0 9-3.6 9-9.4V11.6C13 8.4 11 6 9 6zm14 0c-3 0-5 2.4-5 5.6 0 3 2 5.4 4.6 5.4-.6 2.4-2.5 4-4.6 4.4v2.6c5 0 9-3.6 9-9.4V11.6C27 8.4 25 6 23 6z"/>
                </svg>
                <p>{{ $review->message }}</p>
              </div>
              <div class="review-card-foot">
                <span class="review-avatar" aria-hidden="true">{{ $initial }}</span>
                <div class="review-author">
                  <strong>{{ $review->name }}</strong>
                  <span>{{ $review->productLabel() }}</span>
                </div>
              </div>
            </article>
          @endforeach
        </div>

        <button type="button" class="reviews-arrow reviews-arrow--next" aria-label="Sonraki yorumlar" data-dir="1">
          <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 6 15 12 9 18"></polyline></svg>
        </button>
      </div>
    @else
      <div style="text-align: center; padding: 40px 0; color: var(--ink-mute);">
        <p>İlk değerlendirmeyi yapacak sen ol — formu doldur, yayına alınınca burada görünecek.</p>
      </div>
    @endif

    {{-- DEĞERLENDİR — Modal Tetik --}}
    <div style="text-align: center; margin-top: 40px;">
      <button type="button" class="btn btn-plum" data-review-modal-open>
        ✎ Sen de Değerlendir
      </button>
      @if(session('review_status'))
        <p style="margin-top: 14px; color: #1F5A2C; font-size: 14.5px; font-weight: 500;">✓ {{ session('review_status') }}</p>
      @endif
    </div>
  </div>

  {{-- DEĞERLENDİR — Modal --}}
  <div class="review-modal" data-review-modal {{ ($errors->any() || session('review_status')) ? 'data-open' : '' }} aria-hidden="true">
    <div class="review-modal-backdrop" data-review-modal-close></div>
    <div class="review-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="review-modal-title">
      <button type="button" class="review-modal-close" data-review-modal-close aria-label="Kapat">
        <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>

      <div class="section-head section-head-center" style="margin-bottom: 24px;">
        <h3 id="review-modal-title" style="font-size: clamp(22px, 2.4vw, 28px);">Sen de <em>Değerlendir</em></h3>
        <p>Bizimle ilgili deneyimini paylaş. Mesajın admin onayından sonra yayınlanır.</p>
      </div>

      @if(session('review_status'))
        <div class="review-flash" role="status">
          ✓ {{ session('review_status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('product-reviews.store') }}" class="review-form" novalidate>
        @csrf

        <div class="rf-field">
          <label for="rf-product">Kategori</label>
          <select id="rf-product" name="product_slug" required>
            <option value="" disabled>Seçiniz</option>
            @foreach(\App\Models\ProductReview::PRODUCTS as $slug => $label)
              <option value="{{ $slug }}" {{ old('product_slug', $reviewDefaultSlug) === $slug ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
          </select>
          @error('product_slug') <small class="rf-error">{{ $message }}</small> @enderror
        </div>

        <div class="rf-field">
          <label for="rf-name">Ad Soyad</label>
          <input id="rf-name" type="text" name="name" value="{{ old('name') }}" maxlength="120" required>
          @error('name') <small class="rf-error">{{ $message }}</small> @enderror
        </div>

        <div class="rf-field">
          <label for="rf-message">Mesajınız</label>
          <textarea id="rf-message" name="message" rows="5" maxlength="2000" required>{{ old('message') }}</textarea>
          @error('message') <small class="rf-error">{{ $message }}</small> @enderror
        </div>

        <div class="rf-row">
          <div class="rf-field">
            <label for="rf-captcha">Güvenlik Sorusu — <strong>{{ $captchaQuestion }}</strong></label>
            <input id="rf-captcha" type="text" name="captcha" autocomplete="off" inputmode="numeric" maxlength="3" required>
            @error('captcha') <small class="rf-error">{{ $message }}</small> @enderror
          </div>
          <div class="rf-field rf-kvkk-cell">
            <label class="rf-kvkk-label" for="rf-kvkk">
              <input id="rf-kvkk" type="checkbox" name="kvkk" value="1" {{ old('kvkk') ? 'checked' : '' }} required>
              <span><a href="#kisisel-verilerin-korunmasi" target="_blank">KVKK aydınlatma metnini</a> okudum, kabul ediyorum.</span>
            </label>
            @error('kvkk') <small class="rf-error">{{ $message }}</small> @enderror
          </div>
        </div>

        <div class="rf-actions">
          <button type="submit" class="btn btn-plum">Gönder</button>
        </div>
      </form>
    </div>
  </div>

  <style>
    /* ============ DEĞERLENDİRMELER CAROUSEL ============ */
    .reviews-wrap {
      position: relative;
      margin-top: 30px;
      padding: 0 56px;
    }
    .reviews-row {
      display: flex;
      gap: 22px;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      scroll-behavior: smooth;
      padding: 6px 4px 18px;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: thin;
      scrollbar-color: var(--line) transparent;
    }
    .reviews-row::-webkit-scrollbar { height: 8px; }
    .reviews-row::-webkit-scrollbar-track { background: transparent; }
    .reviews-row::-webkit-scrollbar-thumb { background: var(--line); border-radius: 999px; }

    .review-card {
      flex: 0 0 440px;
      scroll-snap-align: start;
      background: var(--cream);
      border: 1px solid var(--line);
      border-radius: var(--radius-lg);
      padding: 32px 30px 26px;
      display: flex;
      flex-direction: column;
      gap: 22px;
      transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
      position: relative;
    }
    .review-card:hover {
      transform: translateY(-4px);
      border-color: var(--plum);
      box-shadow: 0 28px 60px -32px rgba(31,42,36,0.28);
    }
    .review-card-quote { position: relative; padding-left: 8px; }
    .review-qmark {
      width: 36px; height: 36px;
      color: var(--plum); opacity: .22;
      margin-bottom: 6px; display: block;
    }
    .review-card-quote p {
      font-family: var(--sans);
      font-size: 16px; line-height: 1.7;
      color: var(--ink);
      margin: 0;
      display: -webkit-box;
      -webkit-line-clamp: 7;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
    .review-card-foot {
      display: flex; align-items: center; gap: 14px;
      padding-top: 18px;
      border-top: 1px solid var(--line);
      margin-top: auto;
    }
    .review-avatar {
      width: 44px; height: 44px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--plum) 0%, var(--plum-deep) 100%);
      color: #fff;
      font-family: var(--sans);
      font-weight: 600; font-size: 17px;
      display: grid; place-items: center;
      flex-shrink: 0;
      letter-spacing: 0.02em;
    }
    .review-author { display: flex; flex-direction: column; gap: 2px; min-width: 0; }
    .review-author strong {
      font-family: var(--sans);
      font-size: 15px; font-weight: 600;
      color: var(--ink);
      letter-spacing: -0.01em;
      line-height: 1.2;
    }
    .review-author span {
      font-size: 12px;
      color: var(--ink-mute);
      letter-spacing: 0.04em;
    }

    .reviews-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      z-index: 5;
      width: 44px; height: 44px;
      border-radius: 50%;
      border: 1px solid var(--line);
      background: var(--cream);
      color: var(--ink);
      cursor: pointer;
      display: grid; place-items: center;
      transition: background .2s ease, border-color .2s ease, opacity .2s ease;
      box-shadow: 0 10px 24px -16px rgba(31,42,36,0.35);
    }
    .reviews-arrow:hover { background: var(--plum); color: #fff; border-color: var(--plum); }
    .reviews-arrow:disabled { opacity: .35; cursor: default; }
    .reviews-arrow:disabled:hover { background: var(--cream); color: var(--ink); border-color: var(--line); }
    .reviews-arrow svg { width: 20px; height: 20px; display: block; }
    .reviews-arrow--prev { left: 0; }
    .reviews-arrow--next { right: 0; }

    @media (max-width: 720px) {
      .reviews-wrap { padding: 0; }
      .reviews-arrow { display: none; }
      .review-card { flex-basis: 84vw; padding: 28px 24px 24px; }
    }

    /* ============ DEĞERLENDİR MODAL ============ */
    .review-modal {
      position: fixed;
      inset: 0;
      z-index: 100;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .review-modal[data-open] { display: flex; animation: rmFade .25s ease; }
    .review-modal-backdrop {
      position: absolute; inset: 0;
      background: rgba(15, 18, 22, 0.6);
      backdrop-filter: blur(4px);
      -webkit-backdrop-filter: blur(4px);
      cursor: pointer;
    }
    .review-modal-dialog {
      position: relative;
      background: var(--cream);
      border: 1px solid var(--line);
      border-radius: var(--radius-lg);
      padding: 44px 42px 36px;
      width: 100%;
      max-width: 640px;
      max-height: calc(100vh - 40px);
      overflow-y: auto;
      box-shadow: 0 30px 80px -20px rgba(15,18,22,0.45);
      animation: rmSlideUp .3s cubic-bezier(.16,.84,.44,1);
    }
    .review-modal-close {
      position: absolute;
      top: 16px; right: 16px;
      width: 36px; height: 36px;
      border-radius: 50%;
      border: 1px solid var(--line);
      background: transparent;
      color: var(--ink-soft);
      cursor: pointer;
      display: grid; place-items: center;
      transition: background .2s ease, color .2s ease, border-color .2s ease;
      z-index: 2;
    }
    .review-modal-close:hover { background: var(--ink); color: #fff; border-color: var(--ink); }
    .review-modal-close svg { width: 18px; height: 18px; display: block; }
    @media (max-width: 640px) {
      .review-modal { padding: 0; }
      .review-modal-dialog {
        padding: 50px 22px 28px;
        max-height: 100vh;
        border-radius: 0;
        max-width: 100%;
      }
    }
    @keyframes rmFade    { from { opacity: 0; } to { opacity: 1; } }
    @keyframes rmSlideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    body.review-modal-open { overflow: hidden; }

    .review-flash {
      background: #E7F4EA;
      color: #1F5A2C;
      padding: 12px 16px;
      border-radius: 10px;
      margin-bottom: 22px;
      font-size: 14.5px;
      font-weight: 500;
    }
    .review-form .rf-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 16px;
    }
    @media (max-width: 640px) {
      .review-form .rf-row { grid-template-columns: 1fr; }
    }
    .review-form .rf-field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px; }
    .review-form .rf-field:last-child { margin-bottom: 0; }
    .review-form label {
      font-family: var(--sans);
      font-size: 13px;
      font-weight: 600;
      color: var(--ink);
      letter-spacing: 0.02em;
    }
    .review-form label strong {
      font-family: var(--serif);
      font-style: italic;
      font-weight: 500;
      color: var(--plum-deep);
    }
    .review-form input[type="text"],
    .review-form input[type="tel"],
    .review-form select,
    .review-form textarea {
      font-family: var(--sans);
      font-size: 15px;
      padding: 12px 14px;
      border: 1px solid var(--line);
      border-radius: 10px;
      background: var(--bg);
      color: var(--ink);
      transition: border-color .15s ease, background .15s ease;
      width: 100%;
    }
    .review-form input:focus,
    .review-form textarea:focus {
      outline: none;
      border-color: var(--plum);
      background: #fff;
    }
    .review-form textarea { resize: vertical; min-height: 110px; }
    .review-form .rf-kvkk-cell { justify-content: flex-end; }
    .review-form .rf-kvkk-label {
      display: flex;
      gap: 10px;
      align-items: flex-start;
      font-weight: 400;
      font-size: 13px;
      color: var(--ink-soft);
      line-height: 1.5;
      cursor: pointer;
    }
    .review-form .rf-kvkk-label a { color: var(--plum-deep); text-decoration: underline; }
    .review-form .rf-kvkk-label input { margin-top: 2px; flex-shrink: 0; }
    .review-form .rf-error {
      color: #C1121F;
      font-size: 12.5px;
      font-weight: 500;
      margin-top: 2px;
    }
    .review-form .rf-actions {
      display: flex;
      justify-content: flex-end;
      margin-top: 20px;
    }
    @media (max-width: 640px) {
      .review-form .rf-actions { justify-content: stretch; }
      .review-form .rf-actions .btn { width: 100%; }
    }
  </style>
</section>

@push('scripts')
<script>
  // ============ REVIEWS CAROUSEL ============
  (function () {
    const wrap = document.querySelector('[data-reviews-carousel]');
    if (!wrap) return;

    const row  = wrap.querySelector('.reviews-row');
    const prev = wrap.querySelector('.reviews-arrow--prev');
    const next = wrap.querySelector('.reviews-arrow--next');

    function step() {
      const card = row.querySelector('.review-card');
      if (!card) return 360;
      return card.getBoundingClientRect().width + 22;
    }
    function updateArrows() {
      const max = row.scrollWidth - row.clientWidth - 2;
      prev.disabled = row.scrollLeft <= 0;
      next.disabled = row.scrollLeft >= max;
    }
    prev.addEventListener('click', () => row.scrollBy({ left: -step(), behavior: 'smooth' }));
    next.addEventListener('click', () => row.scrollBy({ left:  step(), behavior: 'smooth' }));
    row.addEventListener('scroll', updateArrows, { passive: true });
    window.addEventListener('resize', updateArrows);
    updateArrows();
  })();

  // ============ REVIEW MODAL ============
  (function () {
    const modal = document.querySelector('[data-review-modal]');
    if (!modal) return;

    const openBtns  = document.querySelectorAll('[data-review-modal-open]');
    const closeEls  = modal.querySelectorAll('[data-review-modal-close]');
    const dialog    = modal.querySelector('.review-modal-dialog');
    let lastFocused = null;

    function open() {
      lastFocused = document.activeElement;
      modal.setAttribute('data-open', '');
      modal.setAttribute('aria-hidden', 'false');
      document.body.classList.add('review-modal-open');
      const firstField = dialog.querySelector('input[type="text"], input[type="tel"], textarea');
      if (firstField) setTimeout(() => firstField.focus(), 50);
    }
    function close() {
      modal.removeAttribute('data-open');
      modal.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('review-modal-open');
      if (lastFocused) lastFocused.focus();
    }

    openBtns.forEach(b => b.addEventListener('click', open));
    closeEls.forEach(c => c.addEventListener('click', close));
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modal.hasAttribute('data-open')) close();
    });

    if (modal.hasAttribute('data-open')) {
      document.body.classList.add('review-modal-open');
      modal.setAttribute('aria-hidden', 'false');
    }
  })();
</script>
@endpush

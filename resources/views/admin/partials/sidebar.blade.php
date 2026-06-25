@php
  $newLeadsCount = \App\Models\CorporateLead::where('status','new')->count();
  $pendingReviewsCount = \Illuminate\Support\Facades\Schema::hasTable('product_reviews')
      ? \App\Models\ProductReview::pending()->count() : 0;
  $newContactCount = \Illuminate\Support\Facades\Schema::hasTable('contact_messages')
      ? \App\Models\ContactMessage::where('status','new')->count() : 0;
@endphp

<aside class="adm-sidebar">
  <div class="adm-brand">
    <img class="adm-brand__logo" src="{{ asset('assets/logo.png') }}" alt="BRY">
    <div class="adm-brand__name">
      BRY
      <small>Yönetim Paneli</small>
    </div>
  </div>

  <nav class="adm-nav" aria-label="Ana menü">
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg>
      <span class="adm-nav__label">Gösterge Paneli</span>
    </a>

    <div class="adm-nav__group">Site Yönetimi</div>
    <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
      <span class="adm-nav__label">Site Ayarları</span>
    </a>
    <a href="{{ route('admin.seo.index') }}" class="{{ request()->routeIs('admin.seo.*') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      <span class="adm-nav__label">SEO Ayarları</span>
    </a>

    <div class="adm-nav__group">Blog</div>
    <a href="{{ route('admin.blog.posts.index') }}" class="{{ request()->routeIs('admin.blog.posts.*') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
      <span class="adm-nav__label">Blog Yazıları</span>
    </a>
    <a href="{{ route('admin.blog.categories.index') }}" class="{{ request()->routeIs('admin.blog.categories.*') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
      <span class="adm-nav__label">Kategoriler</span>
    </a>

    <div class="adm-nav__group">İçerik Blokları</div>
    <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
      <span class="adm-nav__label">Dönüşen Hayatlar</span>
    </a>
    <a href="{{ route('admin.references.index') }}" class="{{ request()->routeIs('admin.references.*') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V7l7-4 7 4v14"/><path d="M9 21V11h6v10"/></svg>
      <span class="adm-nav__label">Kurumsal Referanslar</span>
    </a>
    <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
      <span class="adm-nav__label">Etkinlik & Kamp Fotoğrafları</span>
    </a>
    <a href="{{ route('admin.kurumsal-photos.index') }}" class="{{ request()->routeIs('admin.kurumsal-photos.*') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
      <span class="adm-nav__label">Kurumsal Etkinlikler</span>
    </a>

    <div class="adm-nav__group">CRM</div>
    <a href="{{ route('admin.corporate-leads.index') }}" class="{{ request()->routeIs('admin.corporate-leads.*') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
      <span class="adm-nav__label">Kurumsal Teklifler</span>
      @if($newLeadsCount > 0)
        <span class="adm-nav__badge">{{ $newLeadsCount }}</span>
      @endif
    </a>
    <a href="{{ route('admin.product-reviews.index') }}" class="{{ request()->routeIs('admin.product-reviews.*') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
      <span class="adm-nav__label">Değerlendirmeler</span>
      @if($pendingReviewsCount > 0)
        <span class="adm-nav__badge">{{ $pendingReviewsCount }}</span>
      @endif
    </a>
    <a href="{{ route('admin.contact-messages.index') }}" class="{{ request()->routeIs('admin.contact-messages.*') ? 'is-active' : '' }}">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
      <span class="adm-nav__label">İletişim Formları</span>
      @if($newContactCount > 0)
        <span class="adm-nav__badge">{{ $newContactCount }}</span>
      @endif
    </a>
    <a href="#" class="is-disabled" aria-disabled="true">
      <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      <span class="adm-nav__label">Üyeler</span>
      <span class="adm-nav__tail">Yakında</span>
    </a>

    <div class="adm-nav__group">Hesap</div>
    <form action="{{ route('admin.logout') }}" method="POST" style="margin:0;">
      @csrf
      <button type="submit" class="adm-nav__link">
        <svg class="adm-nav__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        <span class="adm-nav__label">Çıkış Yap</span>
      </button>
    </form>
  </nav>
</aside>

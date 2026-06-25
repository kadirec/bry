@extends('admin.layouts.app')

@section('title', 'Gösterge Paneli')

@section('content')
<div class="adm-head">
  <div>
    <h1>Gösterge Paneli</h1>
    <div class="meta">Hoş geldin, {{ auth()->user()->name }}. İşte bugünkü özet.</div>
  </div>
  <div class="adm-head__actions">
    <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.settings.index') }}">
      <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
      Ayarlar
    </a>
  </div>
</div>

{{-- KPI cards --}}
<div class="adm-stats">
  <div class="adm-stat">
    <div class="adm-stat__top">
      <div class="lbl">Yeni Teklif Talebi</div>
      <div class="adm-stat__ico">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
      </div>
    </div>
    <div class="num">{{ $stats['new_leads'] }}</div>
    <div class="trend">
      <a href="{{ route('admin.corporate-leads.index') }}">Detaylara git →</a>
    </div>
  </div>

  <div class="adm-stat">
    <div class="adm-stat__top">
      <div class="lbl">Onay Bekleyen Yorum</div>
      <div class="adm-stat__ico">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
      </div>
    </div>
    <div class="num">{{ $stats['pending_reviews'] }}</div>
    <div class="trend">
      <a href="{{ route('admin.product-reviews.index') }}">İncele →</a>
    </div>
  </div>

  <div class="adm-stat">
    <div class="adm-stat__top">
      <div class="lbl">Yeni İletişim Mesajı</div>
      <div class="adm-stat__ico">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
      </div>
    </div>
    <div class="num">{{ $stats['new_messages'] }}</div>
    <div class="trend">
      <a href="{{ route('admin.contact-messages.index') }}">Gelen kutusu →</a>
    </div>
  </div>

  <div class="adm-stat">
    <div class="adm-stat__top">
      <div class="lbl">Yayında Blog Yazısı</div>
      <div class="adm-stat__ico">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
      </div>
    </div>
    <div class="num">{{ $stats['published_posts'] }}</div>
    <div class="trend">
      <a href="{{ route('admin.blog.posts.index') }}">Yazıları yönet →</a>
    </div>
  </div>
</div>

<div class="adm-grid-2">
  {{-- Recent activity column --}}
  <div>
    <div class="adm-card">
      <div class="adm-card__head">
        <div>
          <h2>Son Teklif Talepleri</h2>
          <div class="sub">Kurumsal teklif formundan gelen son başvurular</div>
        </div>
        <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.corporate-leads.index') }}">Tümü</a>
      </div>
      @if($recentLeads->isEmpty())
        <div class="adm-empty">
          <svg class="adm-empty__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
          <h3>Henüz başvuru yok</h3>
          <p>Kurumsal teklif formuna gelen başvurular burada listelenecek.</p>
        </div>
      @else
        <div class="adm-list">
          @foreach($recentLeads as $lead)
            <a href="{{ route('admin.corporate-leads.show', $lead) }}" class="adm-list__item" style="color:inherit;">
              <span class="adm-list__avatar">{{ strtoupper(mb_substr($lead->name, 0, 1)) }}</span>
              <div class="adm-list__body">
                <div class="adm-list__title">{{ $lead->name }} <span class="u-text-muted u-text-sm">· {{ $lead->company ?? '—' }}</span></div>
                <div class="adm-list__sub">{{ $lead->email }}</div>
              </div>
              <div class="adm-list__meta">
                @php
                  $cls = match($lead->status) {
                    'new' => 'adm-badge--info',
                    'in_progress' => 'adm-badge--warn',
                    'done' => 'adm-badge--success',
                    default => 'adm-badge--neutral',
                  };
                @endphp
                <span class="adm-badge {{ $cls }}"><span class="adm-badge__dot"></span>{{ $lead->statusLabel() }}</span>
              </div>
            </a>
          @endforeach
        </div>
      @endif
    </div>

    <div class="adm-card">
      <div class="adm-card__head">
        <div>
          <h2>Son İletişim Mesajları</h2>
          <div class="sub">Site iletişim formundan gelen son mesajlar</div>
        </div>
        <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.contact-messages.index') }}">Tümü</a>
      </div>
      @if($recentMessages->isEmpty())
        <div class="adm-empty">
          <svg class="adm-empty__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <h3>Gelen kutusu boş</h3>
          <p>İletişim formundan gelen mesajlar burada görünecek.</p>
        </div>
      @else
        <div class="adm-list">
          @foreach($recentMessages as $msg)
            <a href="{{ route('admin.contact-messages.show', $msg) }}" class="adm-list__item" style="color:inherit;">
              <span class="adm-list__avatar">{{ strtoupper(mb_substr($msg->name, 0, 1)) }}</span>
              <div class="adm-list__body">
                <div class="adm-list__title">{{ $msg->name }}</div>
                <div class="adm-list__sub">{{ \Illuminate\Support\Str::limit($msg->message, 80) }}</div>
              </div>
              <div class="adm-list__meta">{{ $msg->created_at?->diffForHumans() }}</div>
            </a>
          @endforeach
        </div>
      @endif
    </div>
  </div>

  {{-- Right column --}}
  <div>
    <div class="adm-card">
      <div class="adm-card__head">
        <h2>Hızlı Erişim</h2>
      </div>
      <div class="adm-card__body" style="display:flex; flex-direction:column; gap:8px;">
        <a class="adm-btn adm-btn--ghost adm-btn--block" href="{{ route('admin.blog.posts.create') }}" style="justify-content:flex-start;">
          <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
          Yeni Blog Yazısı
        </a>
        <a class="adm-btn adm-btn--ghost adm-btn--block" href="{{ route('admin.gallery.create') }}" style="justify-content:flex-start;">
          <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          Galeriye Fotoğraf Ekle
        </a>
        <a class="adm-btn adm-btn--ghost adm-btn--block" href="{{ route('admin.testimonials.create') }}" style="justify-content:flex-start;">
          <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
          Yeni Dönüşüm Hikayesi
        </a>
        <a class="adm-btn adm-btn--ghost adm-btn--block" href="{{ route('admin.seo.index') }}" style="justify-content:flex-start;">
          <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          SEO Ayarları
        </a>
      </div>
    </div>

    <div class="adm-card">
      <div class="adm-card__head">
        <div>
          <h2>Onay Bekleyen Yorumlar</h2>
          <div class="sub">Yayına alınmadan önce incelenmeli</div>
        </div>
        <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.product-reviews.index') }}">Tümü</a>
      </div>
      @if($recentReviews->isEmpty())
        <div class="adm-empty">
          <svg class="adm-empty__ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          <h3>Onay bekleyen yorum yok</h3>
        </div>
      @else
        <div class="adm-list">
          @foreach($recentReviews as $review)
            <a href="{{ route('admin.product-reviews.edit', $review) }}" class="adm-list__item" style="color:inherit;">
              <span class="adm-list__avatar">{{ strtoupper(mb_substr($review->name, 0, 1)) }}</span>
              <div class="adm-list__body">
                <div class="adm-list__title">{{ $review->name }}</div>
                <div class="adm-list__sub">{{ $review->productLabel() }}</div>
              </div>
              <div class="adm-list__meta">
                @if($review->is_approved)
                  <span class="adm-badge adm-badge--success"><span class="adm-badge__dot"></span>Onaylı</span>
                @else
                  <span class="adm-badge adm-badge--warn"><span class="adm-badge__dot"></span>Beklemede</span>
                @endif
              </div>
            </a>
          @endforeach
        </div>
      @endif
    </div>

    <div class="adm-card">
      <div class="adm-card__head">
        <h2>Sistem Bilgisi</h2>
      </div>
      <div class="adm-card__body">
        <div style="display:flex; justify-content:space-between; padding:6px 0; border-bottom:1px solid var(--c-line-2);">
          <span class="u-text-muted u-text-sm">Site ayarı kaydı</span>
          <span style="font-weight:500;">{{ $secondary['settings_count'] }}</span>
        </div>
        <div style="display:flex; justify-content:space-between; padding:6px 0; border-bottom:1px solid var(--c-line-2);">
          <span class="u-text-muted u-text-sm">SEO yapılandırılmış sayfa</span>
          <span style="font-weight:500;">{{ $secondary['seo_count'] }}</span>
        </div>
        <div style="display:flex; justify-content:space-between; padding:6px 0;">
          <span class="u-text-muted u-text-sm">Sunucu zamanı</span>
          <span style="font-weight:500;">{{ now()->format('d.m.Y H:i') }}</span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

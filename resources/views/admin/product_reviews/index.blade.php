@extends('admin.layouts.app')

@section('title', 'Değerlendirmeler')

@section('content')
<div class="adm-head">
  <div>
    <h1>Değerlendirmeler</h1>
    <div class="meta">
      Toplam {{ $counts['total'] }} · Onay bekleyen <strong>{{ $counts['pending'] }}</strong> · Yayında {{ $counts['approved'] }}
    </div>
  </div>
  <a class="adm-btn" href="{{ route('admin.product-reviews.create') }}">+ Yeni Değerlendirme</a>
</div>

@if(session('status'))
  <div class="adm-flash" style="background:#E7F4EA; color:#1F5A2C; padding:10px 14px; border-radius:8px; margin-bottom:14px;">{{ session('status') }}</div>
@endif

<div style="display:flex; gap:8px; margin-bottom:16px; flex-wrap:wrap;">
  <a href="{{ route('admin.product-reviews.index') }}" class="adm-btn adm-btn--{{ $activeStatus === '' ? '' : 'ghost' }} adm-btn--sm">Tümü ({{ $counts['total'] }})</a>
  <a href="{{ route('admin.product-reviews.index', ['status' => 'pending']) }}" class="adm-btn adm-btn--{{ $activeStatus === 'pending' ? '' : 'ghost' }} adm-btn--sm">Onay Bekleyen ({{ $counts['pending'] }})</a>
  <a href="{{ route('admin.product-reviews.index', ['status' => 'approved']) }}" class="adm-btn adm-btn--{{ $activeStatus === 'approved' ? '' : 'ghost' }} adm-btn--sm">Yayında ({{ $counts['approved'] }})</a>
</div>

<div style="display:flex; gap:8px; margin-bottom:16px; flex-wrap:wrap;">
  <a href="{{ route('admin.product-reviews.index', ['status' => $activeStatus]) }}" class="adm-btn adm-btn--{{ $activeProduct === '' ? '' : 'ghost' }} adm-btn--sm">Tüm Eğitimler</a>
  @foreach($products as $slug => $label)
    <a href="{{ route('admin.product-reviews.index', ['status' => $activeStatus, 'product' => $slug]) }}"
       class="adm-btn adm-btn--{{ $activeProduct === $slug ? '' : 'ghost' }} adm-btn--sm">{{ $label }}</a>
  @endforeach
</div>

<table class="adm-table">
  <thead>
    <tr>
      <th>Tarih</th>
      <th>Eğitim</th>
      <th>Ad Soyad</th>
      <th>Mesaj</th>
      <th>Durum</th>
      <th class="actions">Eylem</th>
    </tr>
  </thead>
  <tbody>
    @forelse($reviews as $review)
      <tr>
        <td class="muted" style="white-space:nowrap;">{{ $review->created_at->format('d.m.Y') }}<br><small>{{ $review->created_at->format('H:i') }}</small></td>
        <td><small>{{ $review->productLabel() }}</small></td>
        <td><strong>{{ $review->name }}</strong></td>
        <td style="max-width:380px;"><span style="display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">{{ $review->message }}</span></td>
        <td>
          @if($review->is_approved)
            <span style="display:inline-block; padding:3px 10px; background:#E7F4EA; color:#1F5A2C; border-radius:999px; font-size:12px;">Yayında</span>
          @else
            <span style="display:inline-block; padding:3px 10px; background:#FBE8E8; color:#7E1F1F; border-radius:999px; font-size:12px;">Bekliyor</span>
          @endif
        </td>
        <td class="actions">
          <form action="{{ route('admin.product-reviews.toggle', $review) }}" method="POST" style="display:inline;">
            @csrf
            <button class="adm-btn adm-btn--sm" type="submit">{{ $review->is_approved ? 'Yayından Al' : 'Onayla' }}</button>
          </form>
          <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.product-reviews.edit', $review) }}">Düzenle</a>
          <form action="{{ route('admin.product-reviews.destroy', $review) }}" method="POST" style="display:inline;" onsubmit="return confirm('Silmek istediğine emin misin?');">
            @csrf @method('DELETE')
            <button class="adm-btn adm-btn--danger adm-btn--sm" type="submit">Sil</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="6" class="muted">Henüz değerlendirme yok.</td></tr>
    @endforelse
  </tbody>
</table>

<div style="margin-top:16px;">
  {{ $reviews->links() }}
</div>
@endsection

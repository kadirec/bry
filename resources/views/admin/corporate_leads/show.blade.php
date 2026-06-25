@extends('admin.layouts.app')

@section('title', 'Teklif Detayı')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $lead->name }} <small style="color: var(--a-ink-mute); font-weight: 400;">— {{ $lead->company }}</small></h1>
    <div class="meta">{{ $lead->created_at->format('d.m.Y H:i') }} · #{{ $lead->id }}</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.corporate-leads.index') }}">← Geri</a>
</div>

@if(session('status'))
  <div class="adm-flash" style="background:#E7F4EA; color:#1F5A2C; padding:10px 14px; border-radius:8px; margin-bottom:14px;">{{ session('status') }}</div>
@endif

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; align-items: start;">

  <div>
    <div class="adm-card">
      <h2>İletişim Bilgileri</h2>
      <table style="width: 100%; border-collapse: collapse;">
        <tr><td style="padding: 8px 0; color: var(--a-ink-mute); width: 140px;">Ad Soyad</td><td style="padding: 8px 0;"><strong>{{ $lead->name }}</strong></td></tr>
        <tr><td style="padding: 8px 0; color: var(--a-ink-mute);">Kurum</td><td style="padding: 8px 0;">{{ $lead->company }}</td></tr>
        <tr><td style="padding: 8px 0; color: var(--a-ink-mute);">E-posta</td><td style="padding: 8px 0;"><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></td></tr>
        <tr><td style="padding: 8px 0; color: var(--a-ink-mute);">Telefon</td><td style="padding: 8px 0;"><a href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a></td></tr>
        <tr><td style="padding: 8px 0; color: var(--a-ink-mute);">İlgilendiği</td><td style="padding: 8px 0;">{{ $lead->program ?? '—' }}</td></tr>
        <tr><td style="padding: 8px 0; color: var(--a-ink-mute);">KVKK</td><td style="padding: 8px 0;">{{ $lead->kvkk_accepted ? '✓ Kabul edildi' : '— Kabul edilmedi' }}</td></tr>
      </table>
    </div>

    <form action="{{ route('admin.corporate-leads.update', $lead) }}" method="POST">
      @csrf @method('PATCH')

      <div class="adm-card">
        <h2>Notlar</h2>
        <div class="adm-field">
          <textarea name="notes" rows="6" placeholder="Görüşme notları, sonraki adımlar, müşteri talepleri…">{{ old('notes', $lead->notes) }}</textarea>
        </div>
      </div>

      <div class="adm-card">
        <h2>Durum</h2>
        <div class="adm-field">
          <label for="status">Aşama</label>
          <select id="status" name="status">
            @foreach(\App\Models\CorporateLead::STATUSES as $key => $label)
              <option value="{{ $key }}" {{ old('status', $lead->status) === $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <button type="submit" class="adm-btn">Güncelle</button>
    </form>
  </div>

  <div>
    <div class="adm-card">
      <h2>Teknik Bilgi</h2>
      <p class="sub" style="margin: 0 0 4px;">IP: {{ $lead->ip ?: '—' }}</p>
      <p class="sub" style="margin: 0 0 4px; word-break: break-all;">UA: {{ $lead->user_agent ?: '—' }}</p>
    </div>

    <form action="{{ route('admin.corporate-leads.destroy', $lead) }}" method="POST" onsubmit="return confirm('Bu kaydı silmek istediğine emin misin?');">
      @csrf @method('DELETE')
      <button class="adm-btn adm-btn--danger" type="submit">Kaydı Sil</button>
    </form>
  </div>
</div>
@endsection

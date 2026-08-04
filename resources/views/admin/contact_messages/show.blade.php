@extends('admin.layouts.app')

@section('title', 'Mesaj Detayı')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $message->name }} <small style="color: var(--a-ink-mute); font-weight: 400;">— {{ $message->subject ?: 'Konu yok' }}</small></h1>
    <div class="meta">{{ $message->created_at->format('d.m.Y H:i') }} · #{{ $message->id }}</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.contact-messages.index') }}">← Geri</a>
</div>

@if(session('status'))
  <div class="adm-flash" style="background:#E7F4EA; color:#1F5A2C; padding:10px 14px; border-radius:8px; margin-bottom:14px;">{{ session('status') }}</div>
@endif

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; align-items: start;">

  <div>
    <div class="adm-card">
      <h2>İletişim Bilgileri</h2>
      <table style="width: 100%; border-collapse: collapse;">
        <tr><td style="padding: 8px 0; color: var(--a-ink-mute); width: 160px;">Ad Soyad</td><td style="padding: 8px 0;"><strong>{{ $message->name }}</strong></td></tr>
        <tr><td style="padding: 8px 0; color: var(--a-ink-mute);">E-posta</td><td style="padding: 8px 0;"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td></tr>
        <tr><td style="padding: 8px 0; color: var(--a-ink-mute);">Telefon</td><td style="padding: 8px 0;"><a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></td></tr>
        <tr><td style="padding: 8px 0; color: var(--a-ink-mute);">Konu</td><td style="padding: 8px 0;">{{ $message->subject ?? '—' }}</td></tr>
        <tr>
          <td style="padding: 8px 0; color: var(--a-ink-mute);">Geldiği Sayfa</td>
          <td style="padding: 8px 0;">
            @if($message->source_url)
              <a href="{{ $message->source_url }}" target="_blank" rel="noopener">{{ $message->sourceDisplay() }}</a>
              <div style="font-size:12px; color:var(--a-ink-mute); word-break:break-all; margin-top:2px;">{{ $message->source_url }}</div>
            @else
              —
            @endif
          </td>
        </tr>
        <tr><td style="padding: 8px 0; color: var(--a-ink-mute);">KVKK</td><td style="padding: 8px 0;">{{ $message->kvkk_accepted ? '✓ Kabul edildi' : '— Kabul edilmedi' }}</td></tr>
        <tr>
          <td style="padding: 8px 0; color: var(--a-ink-mute);">E-posta İzni</td>
          <td style="padding: 8px 0;">
            @if($message->consent_email)
              <span style="display:inline-block; background:#E7F4EA; color:#1F5A2C; border-radius:999px; padding:3px 10px; font-size:12px;">✓ E-posta ile bilgilendirme istiyor</span>
            @else
              <span style="color:#9A9A9A;">— İzin yok</span>
            @endif
          </td>
        </tr>
        <tr>
          <td style="padding: 8px 0; color: var(--a-ink-mute);">SMS İzni</td>
          <td style="padding: 8px 0;">
            @if($message->consent_sms)
              <span style="display:inline-block; background:#E7F4EA; color:#1F5A2C; border-radius:999px; padding:3px 10px; font-size:12px;">✓ SMS ile bilgilendirme istiyor</span>
            @else
              <span style="color:#9A9A9A;">— İzin yok</span>
            @endif
          </td>
        </tr>
      </table>
    </div>

    @if($message->message)
      <div class="adm-card">
        <h2>Mesaj</h2>
        <div style="white-space: pre-wrap; color: var(--a-ink); line-height: 1.65;">{{ $message->message }}</div>
      </div>
    @endif

    <form action="{{ route('admin.contact-messages.update', $message) }}" method="POST">
      @csrf @method('PATCH')

      <div class="adm-card">
        <h2>Notlar</h2>
        <div class="adm-field">
          <textarea name="notes" rows="6" placeholder="Görüşme notları, sonraki adımlar…">{{ old('notes', $message->notes) }}</textarea>
        </div>
      </div>

      <div class="adm-card">
        <h2>Durum</h2>
        <div class="adm-field">
          <label for="status">Aşama</label>
          <select id="status" name="status">
            @foreach(\App\Models\ContactMessage::STATUSES as $key => $label)
              <option value="{{ $key }}" {{ old('status', $message->status) === $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <button type="submit" class="adm-btn">Güncelle</button>
    </form>
  </div>

  <div>
    {{-- Mail Durumu --}}
    <div class="adm-card">
      <h2>Mail Durumu</h2>
      @php
        $mailStyles = [
          'sent'    => ['bg' => '#E7F4EA', 'fg' => '#1F5A2C', 'icon' => '✓'],
          'failed'  => ['bg' => '#FBE8E8', 'fg' => '#7E1F1F', 'icon' => '⚠'],
          'pending' => ['bg' => '#F1ECDD', 'fg' => '#7E5C13', 'icon' => '⏳'],
          'skipped' => ['bg' => '#ECECEC', 'fg' => '#666',    'icon' => '—'],
        ];
        $ms = $mailStyles[$message->mail_status] ?? $mailStyles['pending'];
      @endphp
      <div style="margin-bottom:10px;">
        <span style="display:inline-block; padding:4px 12px; background:{{ $ms['bg'] }}; color:{{ $ms['fg'] }}; border-radius:999px; font-size:13px;">
          {{ $ms['icon'] }} {{ $message->mailStatusLabel() }}
        </span>
      </div>
      <p class="sub" style="margin:0 0 4px;">Gönderim: <strong>{{ $message->mail_sent_at ? $message->mail_sent_at->format('d.m.Y H:i') : '—' }}</strong></p>
      <p class="sub" style="margin:0 0 4px;">Deneme sayısı: <strong>{{ $message->mail_attempts }}</strong></p>
      @if($message->mail_last_error)
        <div style="background:#FBE8E8; color:#7E1F1F; padding:8px 10px; border-radius:6px; font-size:12px; margin-top:8px; word-break:break-word;">
          <strong>Son hata:</strong> {{ $message->mail_last_error }}
        </div>
      @endif

      <form action="{{ route('admin.contact-messages.resend', $message) }}" method="POST" style="margin-top:12px;" onsubmit="return confirm('Maili tekrar gönderelim mi?');">
        @csrf
        <button class="adm-btn adm-btn--sm" type="submit">
          @if($message->mail_status === 'sent') Tekrar Gönder @else Şimdi Gönder @endif
        </button>
      </form>
    </div>

    {{-- PDF İndirme (yalnızca PDF talebi ise) --}}
    @if($message->isPdfRequest())
      <div class="adm-card">
        <h2>PDF İndirme</h2>
        <p class="sub" style="margin:0 0 4px;">Toplam indirme: <strong>{{ $message->pdf_download_count }}</strong></p>
        <p class="sub" style="margin:0 0 4px;">İlk indirme: <strong>{{ $message->pdf_first_downloaded_at ? $message->pdf_first_downloaded_at->format('d.m.Y H:i') : '—' }}</strong></p>
        <p class="sub" style="margin:0 0 4px;">Son indirme: <strong>{{ $message->pdf_last_downloaded_at ? $message->pdf_last_downloaded_at->format('d.m.Y H:i') : '—' }}</strong></p>
        @if($message->pdf_token)
          <div style="margin-top:10px;">
            <a href="{{ route('pdf.download', $message->pdf_token) }}" target="_blank" rel="noopener" class="adm-btn adm-btn--ghost adm-btn--sm">Tracking linkini aç</a>
          </div>
        @else
          <p class="sub" style="margin-top:8px; color:#9A6D18;">Bu kayıt için pdf_token yok (yeni sistemden önce oluşturulmuş). Tekrar gönderdiğinde de raw Drive linki gidecektir.</p>
        @endif
      </div>
    @endif

    <div class="adm-card">
      <h2>Teknik Bilgi</h2>
      <p class="sub" style="margin: 0 0 4px;">IP: {{ $message->ip ?: '—' }}</p>
      <p class="sub" style="margin: 0 0 4px; word-break: break-all;">UA: {{ $message->user_agent ?: '—' }}</p>
    </div>

    <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Bu mesajı silmek istediğine emin misin?');">
      @csrf @method('DELETE')
      <button class="adm-btn adm-btn--danger" type="submit">Mesajı Sil</button>
    </form>
  </div>
</div>
@endsection

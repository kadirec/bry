<div class="topbar">
  <div class="topbar-inner">
    <div class="topbar-left">
      @if(!empty($site['phone']))
        <span>📞 <a href="tel:{{ preg_replace('/[^+\d]/', '', $site['phone']) }}" aria-label="Telefon">{{ $site['phone'] }}</a></span>
      @endif
      @if(!empty($site['email']))
        <span>✉ <a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a></span>
      @endif
    </div>
    <div class="topbar-right">
      <span>{{ $site['years_experience'] ?? '22' }} yıl · {{ $site['people_reached'] ?? '30.000+' }} kişi</span>
      <span>·</span>
      <a href="https://www.bilincliritmikyasam.com/login" target="_blank" rel="noopener">Akademi Girişi</a>
    </div>
  </div>
</div>

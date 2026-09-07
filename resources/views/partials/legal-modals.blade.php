{{-- Footer hukuki metin popup'ları — data-open-modal ile açılır (public/js/main.js) --}}
@php
  $legalDocs = [
    ['id' => 'legal-gizlilik-modal', 'title' => 'KVKK / Gizlilik Politikası',  'partial' => 'partials.legal.gizlilik', 'route' => 'legal.gizlilik'],
    ['id' => 'legal-cerez-modal',    'title' => 'Çerez Politikası',            'partial' => 'partials.legal.cerez',    'route' => 'legal.cerez'],
    ['id' => 'legal-mesafeli-modal', 'title' => 'Mesafeli Satış Sözleşmesi',   'partial' => 'partials.legal.mesafeli', 'route' => 'legal.mesafeli'],
  ];
@endphp

@foreach($legalDocs as $doc)
  <div class="kvkk-modal" id="{{ $doc['id'] }}" hidden role="dialog" aria-modal="true" aria-labelledby="{{ $doc['id'] }}-title">
    <div class="kvkk-modal-backdrop" data-close-modal></div>
    <div class="kvkk-modal-panel" role="document">
      <button type="button" class="kvkk-modal-close" data-close-modal aria-label="Kapat">&times;</button>
      <h3 id="{{ $doc['id'] }}-title">{{ $doc['title'] }}</h3>
      <div class="kvkk-modal-body legal-doc">
        @include($doc['partial'])
      </div>
      <p class="kvkk-modal-foot">
        <a href="{{ route($doc['route']) }}">Tam sayfada aç &rarr;</a>
      </p>
    </div>
  </div>
@endforeach

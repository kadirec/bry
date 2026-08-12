{{--
  Admin paneli için sayfalama.
  Laravel'in varsayılan görünümü Tailwind sınıflarıyla geliyor; panel Tailwind
  yüklemediği için o işaretleme stilsiz kalıyordu. Burada admin.css'teki
  .adm-pagination yapısı kullanılıyor.
--}}
@if ($paginator->hasPages())
  <nav class="adm-pagination" role="navigation" aria-label="Sayfalama">
    <ul class="pagination">

      {{-- Önceki --}}
      @if ($paginator->onFirstPage())
        <li><span class="is-disabled" aria-disabled="true">‹ Önceki</span></li>
      @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">‹ Önceki</a></li>
      @endif

      {{-- Sayfa numaraları --}}
      @foreach ($elements as $element)
        @if (is_string($element))
          <li><span class="is-dots" aria-disabled="true">{{ $element }}</span></li>
        @endif

        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li><span aria-current="page">{{ $page }}</span></li>
            @else
              <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
          @endforeach
        @endif
      @endforeach

      {{-- Sonraki --}}
      @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Sonraki ›</a></li>
      @else
        <li><span class="is-disabled" aria-disabled="true">Sonraki ›</span></li>
      @endif

    </ul>
  </nav>
@endif

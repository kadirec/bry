{{-- simplePaginate() için: yalnızca önceki/sonraki --}}
@if ($paginator->hasPages())
  <nav class="adm-pagination" role="navigation" aria-label="Sayfalama">
    <ul class="pagination">
      @if ($paginator->onFirstPage())
        <li><span class="is-disabled" aria-disabled="true">‹ Önceki</span></li>
      @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">‹ Önceki</a></li>
      @endif

      @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Sonraki ›</a></li>
      @else
        <li><span class="is-disabled" aria-disabled="true">Sonraki ›</span></li>
      @endif
    </ul>
  </nav>
@endif

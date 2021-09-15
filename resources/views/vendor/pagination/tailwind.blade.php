@if ($paginator->hasPages())
<div class="col-sm-12">
  <nav class="pagination-a">
    <ul class="pagination justify-content-end">

      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="page-item disabled">
          <a class="page-link" tabindex="-1">
            <span class="ion-ios-arrow-back"></span>
          </a>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">
            <span class="ion-ios-arrow-back"></span>
          </a>
        </li>
      @endif

      {{-- Array Of Links --}}
      @if (is_array($elements[0]))
        @foreach ($elements[0] as $page => $url)
          @if ($page == $paginator->currentPage())
            <li class="page-item active">
              <a class="page-link">{{ $page }}</a>
            </li>
          @else
            <li class="page-item">
              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
          @endif
        @endforeach
      @endif

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="page-item next">
          <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
            <span class="ion-ios-arrow-forward"></span>
          </a>
        </li>
      @else
        <li class="page-item next disabled">
          <a class="page-link">
            <span class="ion-ios-arrow-forward"></span>
          </a>
        </li>
      @endif

    </ul>
  </nav>
</div>
@endif

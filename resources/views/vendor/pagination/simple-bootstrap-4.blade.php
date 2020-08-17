@if ($paginator->hasPages())
    <ul class="pagination-box" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true">
                <span ><i class="pe-7s-angle-left"></i></span>
            </li>
        @else
            <li class="">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="pe-7s-angle-left"></i></a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="">
                <a  href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="pe-7s-angle-right"></i></a>
            </li>
        @else
            <li class="disabled" aria-disabled="true">
                <span ><i class="pe-7s-angle-right"></i></span>
            </li>
        @endif
    </ul>
@endif

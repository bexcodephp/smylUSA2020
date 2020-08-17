@if ($paginator->hasPages())
    <ul class="pagination-box" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="previous " aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a href="#"><span class="" aria-hidden="true">&lsaquo;</span></a>
            </li>
        @else
            <li class="previous">
                <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class=" " aria-disabled="true"><span class="">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><a href="#"><span class="">{{ $page }}</span></a></li>
                    @else
                        <li class=""><a class="" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="">
                <a class="next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class=" next " aria-disabled="true" aria-label="@lang('pagination.next')">
               <a href="#"> <span class="" aria-hidden="true"><i class="pe-7s-angle-right"></i></span> </a>
            </li>
        @endif
    </ul>
@endif

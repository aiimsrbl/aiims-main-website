@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item page-prev" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="page-link" href="javascript:void(0);" aria-hidden="true">Prev</a>
        </li>
    @else
        <li class="page-item page-prev">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Prev</a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-item" aria-disabled="true"><a class="page-link">{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active"  aria-current="page">
                        <a class="page-link" href="javascript:void(0);">{{ $page }}</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $url }}">
                            {{ $page }}
                        </a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-item page-next">
            <a class="page-link"  href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>
        </li>
    @else
        <li class="page-item page-next" aria-disabled="true" aria-label="@lang('pagination.next')">
            <a class="page-link" href="javascript:void(0);" aria-hidden="true">Next</a>
        </li>
    @endif
@endif

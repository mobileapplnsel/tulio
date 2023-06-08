@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li style="visibility:hidden" class="disabled"><span>{{ __('« Previous') }}</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="button button-outline" rel="prev">{{ __('« Previous') }}</a></li>
        @endif
        
        
        
        {{-- {{ "Page " . $paginator->currentPage() . "  of  " . $paginator->lastPage() }} --}}
       
        
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="button button-outline" rel="next">{{ __('Next »') }}</a></li>
        @else
            <li style="display:none" class="disabled"><span>{{ __('Next »') }}</span></li>
        @endif
    </ul>
@endif
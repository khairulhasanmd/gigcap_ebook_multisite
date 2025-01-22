@if ($paginator->hasPages())
<ul class="pagination">
    @if ($paginator->onFirstPage())
        <li class="paginate_button page-item previous disabled" id="kt_file_manager_list_previous"><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li>
    @else
        <li class="paginate_button page-item previous" rel="prev" id="kt_file_manager_list_previous"><a href="{{ $paginator->previousPageUrl() }}" aria-controls="kt_file_manager_list" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="paginate_button page-item disabled"><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="{{ $element }}" tabindex="0" class="page-link">{{ $element }}</a></li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="paginate_button page-item active"><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">{{ $page }}</a></li>
                @else
                    <li class="paginate_button page-item "><a href="{{ $url }}" aria-controls="kt_file_manager_list" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
        <li class="paginate_button page-item next" id="kt_file_manager_list_next"><a href="{{ $paginator->nextPageUrl() }}" aria-controls="kt_file_manager_list" data-dt-idx="8" tabindex="0" class="page-link"><i class="next"></i></a></li>
    @else
        <li class="paginate_button page-item next disabled" id="kt_file_manager_list_next"><a href="#" aria-controls="kt_file_manager_list" data-dt-idx="8" tabindex="0" class="page-link"><i class="next"></i></a></li>
    @endif
</ul>
@endif

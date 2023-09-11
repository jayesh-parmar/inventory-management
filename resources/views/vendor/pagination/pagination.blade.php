<div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
        <p>Showing {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }}</p>
        </span>
        <span class="col-span-2"></span>
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            @if ($paginator->hasPages())
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        @if ($paginator->onFirstPage())
                            <li class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                        @else
                            <li class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                            </li>
                        @endif
                        @foreach ($elements as $element)
                
                            @if (is_string($element))
                                <li class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                            @endif
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                    @else
                                        <li class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        @if ($paginator->hasMorePages())
                            <li class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                            </li>
                        @else
                            <li class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        </span>
    </div>
</div>
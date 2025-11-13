@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 cursor-default rounded-md ">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-blue-100 hover:text-blue-600 transition">
                    {!! __('pagination.previous') !!}
                </a>
            @endif
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-blue-100 hover:text-blue-600 transition">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="px-4 py-2 ml-3 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 cursor-default rounded-md ">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-600">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    @if ($paginator->onFirstPage())
                        <span
                            class="px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 cursor-default rounded-l-md ">
                            ‹
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-blue-100 hover:text-blue-600 transition">
                            ‹
                        </a>
                    @endif
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span
                                class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default :bg-gray-800">{{ $element }}</span>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span
                                        class="px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 cursor-default rounded-md">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-blue-100 hover:text-blue-600 transition">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-blue-100 hover:text-blue-600 transition">
                            ›
                        </a>
                    @else
                        <span
                            class="px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 cursor-default rounded-r-md ">
                            ›
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif

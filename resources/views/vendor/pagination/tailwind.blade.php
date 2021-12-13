@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="showingxofy">
            <p>
                {!! __('Showing') !!}
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
                {!! __('of') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>            
        </div>
        <div>
            @if ($paginator->onFirstPage())
                <a class ="prevpage" style="background-color:#919191">
                    {!! __('pagination.previous') !!}
                </a>
            @else
                <a class ="prevpage" style="background-color:white" href="{{ $paginator->previousPageUrl() }}">
                    {!! __('pagination.previous') !!}
                </a>
            @endif
        </div>
        <div>
            <span class="relative z-0 inline-flex shadow-sm rounded-md">                
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span>{{ $element }}</span>
                        </span>
                    @endif
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span>{{ $page }}</span>
                                </span>
                            @else
                                <a href="{{ $url }}"  aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </span>
        <div>
            @if ($paginator->hasMorePages())
                <a class ="nextpage" style="background-color:white" href="{{ $paginator->nextPageUrl() }}" >
                    {!! __('pagination.next') !!}
                </a>
            @else
                <a class ="nextpage" style="background-color:#919191">
                    {!! __('pagination.next') !!}
                </a>
            @endif
        </div>

        
    </nav>
@endif

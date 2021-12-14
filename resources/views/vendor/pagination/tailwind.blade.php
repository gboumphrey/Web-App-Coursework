    @if ($paginator->hasPages())
        <br>
        <a style="font-family:'Roboto';"> {!! __('Showing') !!} {{ $paginator->firstItem() }} {!! __('to') !!} {{ $paginator->lastItem() }} {!! __('of') !!} {{ $paginator->total() }} {!! __('results') !!}</a>
        <br>
        <div style="width:33%;float:left">
            @if ($paginator->onFirstPage())
                <a><div class="pagel" style="background-color:#919191;float:left;margin-left:50px;">{!! __('pagination.previous') !!}</div></a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"><div class="pagel" style="background-color:cornflowerblue;float:left;margin-left:50px;">{!! __('pagination.previous') !!}</div></a>
            @endif
        </div>
        <div class="eqi-container" style="width:33%;float:left">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a><div class="pagel">{{ $element }}</div></a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a><div style="background-color:#919191">{{ $page }}</div></a>
                        @else
                            <a href="{{ $url }}"  aria-label="{{ __('Go to page :page', ['page' => $page]) }}"><div style="background-color:cornflowerblue;">{{ $page }}</div></a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        <div style="width:33%;float:left">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" ><div class="pagel"style="background-color:cornflowerblue;float:right;margin-right:50px;">{!! __('pagination.next') !!}</div></a>
            @else
                <a><div class="pagel"style="background-color:#919191;float:right;margin-right:50px;">{!! __('pagination.next') !!}</div></a>
            @endif
        </div>  
    @endif

<!--PAGINATION-->
<div class="pagination">
    @if(is_object($items) && !empty($items->lastPage()) && $items->lastPage() > 1)
        @if($items->lastPage() > 1)
            @if($items->currentPage() !== 1)
                <a rel="prev" href="{{ $items->url(($items->currentPage() - 1)) }}"
                   class="prev">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @else
            @endif
            @if($items->currentPage() >= 3)
                <a href="{{ $items->url($items->url(1)) }}" class="pagin">1</a>
            @endif
            @if($items->currentPage() >= 4)
                <a href="#" class="pagin">...</a>
            @endif
            @if($items->currentPage() !== 1)
                <a href="{{ $items->url($items->currentPage()-1) }}" class="pagin">{{ $items->currentPage()-1 }}</a>
            @endif
            <a class="pagin active">{{ $items->currentPage() }}</a>
            @if($items->currentPage() !== $items->lastPage())
                <a href="{{ $items->url($items->currentPage()+1) }}" class="pagin">{{ $items->currentPage()+1 }}</a>
            @endif
            @if($items->currentPage()+1 < $items->lastPage())
                <a href="{{ $items->url($items->currentPage()+2) }}" class="pagin">{{ $items->currentPage()+2 }}</a>
            @endif
            @if($items->currentPage()+2 < $items->lastPage())
                <a href="{{ $items->url($items->currentPage()+3) }}" class="pagin">{{ $items->currentPage()+3 }}</a>
            @endif
            @if($items->currentPage()+3 < $items->lastPage())
                <a href="{{ $items->url($items->currentPage()+4) }}" class="pagin">{{ $items->currentPage()+4 }}</a>
            @endif
            @if($items->currentPage() < ($items->lastPage()-5))
                <a href="#" class="pagin">...</a>
            @endif
            @if($items->currentPage() < ($items->lastPage()-4))
                <a href="{{ $items->url($items->lastPage()) }}" class="pagin">{{ $items->lastPage() }}</a>
            @endif
            @if($items->currentPage() !== $items->lastPage())
                <a rel="next" href="{{ $items->url(($items->currentPage() + 1)) }}"
                   class="next">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @endif
        @endif
    @endif
</div>
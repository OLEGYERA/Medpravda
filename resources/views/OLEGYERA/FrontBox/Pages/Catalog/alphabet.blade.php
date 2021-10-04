<ul class="catalog-items">
    @php($currentSubLetter = '')
    @foreach($medicamentData as $item)
        @if($currentSubLetter != mb_substr($item->name, 1, 1) && $currentDataName != 'pharma_bad')
            <?php $currentSubLetter = mb_substr($item->name, 1, 1); ?>
            <li class="catalog-sub-alphabet">{{mb_strtoupper($currentAlpha) . $currentSubLetter}}</li>
        @endif
        @if($currentDataName == 'inname')
            <li class="catalog-item">
                <a href="{{route($routeNameItem, ['val' => $item->name] )}}">{{$item->name}}</a>
            </li>
        @elseif($currentDataName == 'pharma' || $currentDataName == 'pharma_bad' || $currentDataName == 'fabricator')
            <li class="catalog-item full">
                <a href="{{route($routeNameItem, ['val' => $item->alias] )}}">{{$item->name}}</a>
            </li>
        @else
            <li class="catalog-item">
                <a href="{{route($routeNameItem, ['alias' => $item->alias] )}}">{{$item->name}} @if($currentDataName == 'drug')<span class="inname">({{$item->dependency->inname->title}})</span>@endif</a>
            </li>
        @endif
    @endforeach
</ul>

{!! $seoText ?? '' !!}


@if(is_object($medicamentData) && !empty($medicamentData->lastPage()) && $medicamentData->lastPage() > 1)
    <div class="catalog-pagination">
        @if($medicamentData->lastPage() > 1)
            @if($medicamentData->currentPage() !== 1)
                <a rel="prev" href="{{ $medicamentData->url(($medicamentData->currentPage() - 1)) }}" class="back">«</a>
            @endif
            @if($medicamentData->currentPage() >= 3)
                <a href="{{ $medicamentData->url($medicamentData->url(1)) }}" class="pagin-number">1</a>
            @endif
            @if($medicamentData->currentPage() >= 4)
                <span> ... </span>
            @endif
            @if($medicamentData->currentPage() !== 1)
                <a href="{{ $medicamentData->url($medicamentData->currentPage()-1) }}"
                   class="pagin-number">{{ $medicamentData->currentPage()-1 }}</a>
            @endif
            <a class="active-pagin-number pagin-number">{{ $medicamentData->currentPage() }}</a>
            @if($medicamentData->currentPage() !== $medicamentData->lastPage())
                <a href="{{ $medicamentData->url($medicamentData->currentPage()+1) }}"
                   class="pagin-number">{{ $medicamentData->currentPage()+1 }}</a>
            @endif
            @if($medicamentData->currentPage() <= ($medicamentData->lastPage()-3))
                <span> ... </span>
            @endif
            @if($medicamentData->currentPage() <= ($medicamentData->lastPage()-2))
                <a href="{{ $medicamentData->url($medicamentData->lastPage()) }}"
                   class="pagin-number">{{ $medicamentData->lastPage() }}</a>
            @endif
            @if($medicamentData->currentPage() !== $medicamentData->lastPage())
                <a rel="next" href="{{ $medicamentData->url(($medicamentData->currentPage() + 1)) }}" class="forward">
                    »
                </a>
            @endif

        @endif
    </div>
@endif


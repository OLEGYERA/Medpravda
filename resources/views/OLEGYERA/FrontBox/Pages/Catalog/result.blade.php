<h2 class="page-sub-title">{{$itemParent->name}}</h2>
<ul class="catalog-items sub-items">
    @php($currentSubLetter = '')
    @if($currentDataName != 'fabricator' && count($medicamentData) != 0)
        @foreach($medicamentData as $item)
            @if($currentSubLetter != mb_substr($item->name, 0, 1))
                <?php $currentSubLetter = mb_substr($item->name, 0, 1); ?>
                <li class="catalog-sub-alphabet">{{mb_strtoupper($currentSubLetter)}}</li>
            @endif
            <li class="catalog-item">
                <a href="{{route($routeNameItem, ['alias' => $item->alias] )}}">{{$item->name}}</a>
            </li>
        @endforeach
    @elseif($currentDataName == 'fabricator')
    @else
        <li class="catalog-item alert">
            @switch($currentDataName)
                @case('inname')
                {{$lang == 'ru' ? 'Препараты' : 'Препарати'}}
                    @break
{{--                @case('bad_atx')--}}
{{--                {{$lang == 'ru' ? 'Диетические Добавки' : 'Дієтичні добавки'}}--}}
{{--                @break--}}
{{--                @case('ware_atx')--}}
{{--                {{$lang == 'ru' ? 'Изделия Медицинского Назначения' : 'Вироби Медичного Призначення'}}--}}
{{--                @break--}}
{{--                @case('cosmetic_atx')--}}
{{--                {{$lang == 'ru' ? 'Косметические средства' : 'Косметичні Засоби'}}--}}
{{--                @break--}}
            @endswitch
            {{$lang == 'ru' ? 'отсутсвуют' : 'відсутні'}}
        </li>
    @endif
</ul>

@if($currentDataName == 'fabricator')
    @foreach($medicamentData as $key => $data)
        @if($medicamentData[$key]['data']->count() != 0)
            <h3 class="page-sub-title">
                @switch($data['type'])
                    @case('drug')
                    {{$lang == 'ru' ? 'Препараты' : 'Препарати'}}
                    @break
                    @case('bad')
                    {{$lang == 'ru' ? 'Диетические Добавки' : 'Дієтичні Добавки'}}
                    @break
                    @case('ware')
                    {{$lang == 'ru' ? 'Изделия Медицинского Назначения' : 'Вироби Медичного Призначення'}}
                    @break
                    @case('cosmetic')
                    {{$lang == 'ru' ? 'Косметические средства' : 'Косметичні Засоби'}}
                    @break
                @endswitch
            </h3>
            <ul class="catalog-items">
                <?php
                    $currentSubLetter = '';
                ?>
                @foreach($data['data'] as $item)
                    @if($currentSubLetter != mb_substr($item->name, 0, 1))
                        <?php $currentSubLetter = mb_substr($item->name, 0, 1);?>
                        <li class="catalog-sub-alphabet">{{$currentSubLetter}}</li>
                    @endif
                    <li class="catalog-item">
                        <a href="{{route($routeNameItem . $data['type'], ['alias' => $item->alias] )}}">{{$item->name}} @if($currentDataName == 'drug_atx')<span class="inname">({{$item->dependency->inname->title}})</span>@endif</a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endforeach
@endif

{!! $seoText ?? '' !!}


@if($currentDataName != 'fabricator' && is_object($medicamentData) && !empty($medicamentData->lastPage()) && $medicamentData->lastPage() > 1)
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
            @if($medicamentData->currentPage() <= $medicamentData->lastPage())
                <a rel="next" href="{{ $medicamentData->url(($medicamentData->currentPage() + 1)) }}" class="forward">
                    »
                </a>
            @endif

        @endif
    </div>
@endif


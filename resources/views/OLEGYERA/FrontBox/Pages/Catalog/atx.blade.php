@if($atxParent)<h2 class="page-sub-title">{{$atxParent->class}} - {{$atxParent->name}}</h2>@endif
@if(!empty($atxData))
    <ul class="catalog-items catalog-atx">
        @foreach($atxData as $item)
            @if($item->child($item->id)->count() != 0 || $item->medicines->count() != 0)
                <li class="catalog-item @if($atxParent) sub-el @endif">
                    <a href="{{route($routeNameAtx, ['val' => $item->class] )}}"><span class="atx-class">{{$item->class}}</span> - {{$item->name}}</a>
                </li>
            @endif
        @endforeach
    </ul>
@endif
@if($atxParent)
    <h3 class="page-sub-title">
        @switch($currentDataName)
            @case('drug_atx')
                {{$lang == 'ru' ? 'Препараты' : 'Препарати'}}
                @break
            @case('bad_atx')
                {{$lang == 'ru' ? 'Диетические Добавки' : 'Дієтичні Добавки'}}
                @break
            @case('ware_atx')
                {{$lang == 'ru' ? 'Изделия Медицинского Назначения' : 'Вироби Медичного Призначення'}}
                @break
            @case('cosmetic_atx')
                {{$lang == 'ru' ? 'Косметические средства' : 'Косметичні Засоби'}}
                @break
        @endswitch
    </h3>
    <ul class="catalog-items">
        <?php
            $currentSubLetter = '';
        ?>
        @if($atxParentMedicines->count() != 0)
            @foreach($atxParentMedicines as $item)
                @if($currentSubLetter != mb_substr($item->name, 0, 1))
                    <?php $currentSubLetter = mb_substr($item->name, 0, 1);?>
                    <li class="catalog-sub-alphabet">{{$currentSubLetter}}</li>
                @endif
                <li class="catalog-item">
                    <a href="{{route($routeNameItem, ['alias' => $item->alias] )}}">{{$item->name}} @if($currentDataName == 'drug_atx')<span class="inname">({{$item->dependency->inname->title}})</span>@endif</a>
                </li>
            @endforeach
        @else
            <li class="catalog-item alert">
                @switch($currentDataName)
                    @case('drug_atx')
                        {{$lang == 'ru' ? 'Препараты' : 'Препарати'}}
                        @break
                    @case('bad_atx')
                        {{$lang == 'ru' ? 'Диетические Добавки' : 'Дієтичні добавки'}}
                    @break
                    @case('ware_atx')
                        {{$lang == 'ru' ? 'Изделия Медицинского Назначения' : 'Вироби Медичного Призначення'}}
                        @break
                    @case('cosmetic_atx')
                        {{$lang == 'ru' ? 'Косметические средства' : 'Косметичні Засоби'}}
                        @break
                @endswitch
                {{$lang == 'ru' ? 'отсутсвуют' : 'відсутні'}}
            </li>
        @endif
    </ul>
@endif

{!! $seoText ?? '' !!}

@if(is_object($atxParentMedicines) && !empty($atxParentMedicines->lastPage()) && $atxParentMedicines->lastPage() > 1)
    <div class="catalog-pagination">
        @if($atxParentMedicines->lastPage() > 1)
            @if($atxParentMedicines->currentPage() !== 1)
                <a rel="prev" href="{{ $atxParentMedicines->url(($atxParentMedicines->currentPage() - 1)) }}" class="back">«</a>
            @endif
            @if($atxParentMedicines->currentPage() >= 3)
                <a href="{{ $atxParentMedicines->url($atxParentMedicines->url(1)) }}" class="pagin-number">1</a>
            @endif
            @if($atxParentMedicines->currentPage() >= 4)
                <span> ... </span>
            @endif
            @if($atxParentMedicines->currentPage() !== 1)
                <a href="{{ $atxParentMedicines->url($atxParentMedicines->currentPage()-1) }}"
                   class="pagin-number">{{ $atxParentMedicines->currentPage()-1 }}</a>
            @endif
            <a class="active-pagin-number pagin-number">{{ $atxParentMedicines->currentPage() }}</a>
            @if($atxParentMedicines->currentPage() !== $atxParentMedicines->lastPage())
                <a href="{{ $atxParentMedicines->url($atxParentMedicines->currentPage()+1) }}"
                   class="pagin-number">{{ $atxParentMedicines->currentPage()+1 }}</a>
            @endif
            @if($atxParentMedicines->currentPage() <= ($atxParentMedicines->lastPage()-3))
                <span> ... </span>
            @endif
            @if($atxParentMedicines->currentPage() <= ($atxParentMedicines->lastPage()-2))
                <a href="{{ $atxParentMedicines->url($atxParentMedicines->lastPage()) }}"
                   class="pagin-number">{{ $atxParentMedicines->lastPage() }}</a>
            @endif
            @if($atxParentMedicines->currentPage() !== $atxParentMedicines->lastPage())
                <a rel="next" href="{{ $atxParentMedicines->url(($atxParentMedicines->currentPage() + 1)) }}" class="forward">
                    »
                </a>
            @endif

        @endif
    </div>
@endif

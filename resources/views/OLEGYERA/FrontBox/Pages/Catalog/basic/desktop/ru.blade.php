<div class="full-content">
    <div class="single-wrap">
        <div class="page-content">
            <h1 class="page-title">
                {{isset($currentAlpha) ? $currentAlpha . ': ' : ''}}{{$medicamentCatalog[$currentDataName]['title']}}
            </h1>
            @if(isset($alphabet))
                <div class="alphabet-rows">
                    @if(count($alphabet['num']) != 0)
                        <div class="alphabet-row">
                            <div class="alphabet-row-title">Нумерация:</div>
                            <div class="alphabet-row-data">
                                @foreach($alphabet['num'] as $num)
                                    <a href="{{route($routeNameAlphabet, ['val' => mb_strtoupper($num)])}}" class="alphabet-row-data-item @if(mb_strtoupper($currentAlpha) == mb_strtoupper($num)) active @endif">{{$num}}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(count($alphabet['let']) != 0)
                        <div class="alphabet-row">
                            <div class="alphabet-row-title">Кириллица:</div>
                            <div class="alphabet-row-data @if($currentDataName != 'inname') prioritet @endif">
                                @foreach($alphabet['let'] as $let)
                                    <a href="{{route($routeNameAlphabet, ['val' => mb_strtoupper($let)])}}" class="alphabet-row-data-item @if(mb_strtoupper($currentAlpha) == mb_strtoupper($let)) active @endif">{{$let}}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(count($alphabet['let_en']) != 0)
                        <div class="alphabet-row">
                            <div class="alphabet-row-title">Латиница:</div>
                            <div class="alphabet-row-data @if($currentDataName == 'inname') prioritet @endif">
                                @foreach($alphabet['let_en'] as $let_en)
                                    <a href="{{route($routeNameAlphabet, ['val' => mb_strtoupper($let_en)])}}" class="alphabet-row-data-item @if(mb_strtoupper($currentAlpha) == mb_strtoupper($let_en)) active @endif">{{$let_en}}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @endif
            <div class="catalog-links">
                @foreach($medicamentCatalog as $key => $item)
                    <a href="{{route('ru.catalog.' . $item['route_name'])}}" class="catalog-link @if($key == $currentDataName) active @endif" title="{{$item['title']}}">
                        <span class="glyph {{$key}}" @if($key == $currentDataName) class="active" @endif></span>
                    </a>
                @endforeach
            </div>

            @include($includeDataPath)
        </div>
    </div>
</div>

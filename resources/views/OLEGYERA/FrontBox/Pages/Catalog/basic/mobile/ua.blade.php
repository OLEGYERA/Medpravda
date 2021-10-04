<div class="full-content">
    <div class="page-content">
        <h1 class="page-title">
            {{$medicamentCatalog[$currentDataName]['utitle']}}
        </h1>
        @if(isset($alphabet))
            <div class="alphabet-rows">
                @if(count($alphabet['num']) != 0 || count($alphabet['let']) != 0 || count($alphabet['let']) != 0)
                    <div class="alphabet-row">
                        <div class="alphabet-row-data">
                            @foreach($alphabet['num'] as $num)
                                <a href="{{route($routeNameAlphabet, ['alpha' => mb_strtoupper($num)])}}" class="alphabet-row-data-item @if(mb_strtoupper($currentAlpha) == mb_strtoupper($num)) active @endif">{{$num}}</a>
                            @endforeach
                            @foreach($alphabet['let'] as $let)
                                <a href="{{route($routeNameAlphabet, ['alpha' => mb_strtoupper($let)])}}" class="alphabet-row-data-item @if(mb_strtoupper($currentAlpha) == mb_strtoupper($let)) active @endif">{{$let}}</a>
                            @endforeach
                            @foreach($alphabet['let_en'] as $let_en)
                                <a href="{{route($routeNameAlphabet, ['alpha' => mb_strtoupper($let_en)])}}" class="alphabet-row-data-item @if(mb_strtoupper($currentAlpha) == mb_strtoupper($let_en)) active @endif">{{$let_en}}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        @endif
        <div class="catalog-links-box">
            <div class="catalog-links">
                @foreach($medicamentCatalog as $key => $item)
                    <a href="{{route('m.ua.catalog.' . $item['route_name'])}}" class="catalog-link @if($key == $currentDataName) active @endif" title="{{$item['utitle']}}">
                        <span class="glyph {{$key}}" @if($key == $currentDataName) class="active" @endif></span>
                    </a>
                @endforeach
            </div>
        </div>

        @include($includeDataPath)
    </div>
</div>

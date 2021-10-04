@if($drug->udosage)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Дозування:</div>
        <div class="info-row" itemprop="articleSection">{{$drug->udosage}}</div>
    </div>
@endif
@if($drug->uregistration)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Реєстрація:</div>
        <div class="info-row" itemprop="articleSection">{{$drug->uregistration}}</div>
    </div>
@endif
@if($drug->dependency->fabricator)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Виробник:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ua.catalog.list.fabricator', ['val' => $drug->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ua.catalog.list.fabricator', ['val' => $drug->dependency->fabricator->alias])}}" class="external-link">{{$drug->dependency->fabricator->utitle}}@if($drug->dependency->fabricator_location), {{$drug->dependency->fabricator_location->utitle}}@endif</a>
        </div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn4', ['key_word' => $drug->alias])
@endif
@if($drug->dependency->inname)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">МНН:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ua.catalog.drug.inname', ['val' => $drug->dependency->inname->title])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ua.catalog.drug.inname', ['val' => $drug->dependency->inname->title])}}" class="external-link">{{$drug->dependency->inname->title}}</a>
        </div>
    </div>
@endif
@if($drug->dependency->pharma)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Фарм. група:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ua.catalog.drug.pharma', ['val' => $drug->dependency->pharma->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ua.catalog.drug.pharma', ['val' => $drug->dependency->pharma->alias])}}" class="external-link">{{$drug->dependency->pharma->utitle}}</a>
        </div>
    </div>
@endif
@if($atx)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Код АТХ {{$drug->dependency->atx->class}}:</div>
        <div class="info-row atx-mg" itemprop="articleSection">
            @foreach($atx as $atx_item)
                <p>
                    <a href="{{route('ua.catalog.drug.atx', ['val' => $atx_item->class])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                    <a href="{{route('ua.catalog.drug.atx', ['val' => $atx_item->class])}}" class="external-link">{{$atx_item->class}} - {{$atx_item->utitle}}</a>
                </p>
            @endforeach
        </div>
    </div>
@endif

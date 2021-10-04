@if($drug->dosage)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Дозировка:</div>
        <div class="info-row" itemprop="articleSection">{{$drug->dosage}}</div>
    </div>
@endif
@if($drug->registration)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Регистрация:</div>
        <div class="info-row" itemprop="articleSection">{{$drug->registration}}</div>
    </div>
@endif
@if($drug->dependency->fabricator)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Производитель:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ru.catalog.list.fabricator', ['val' => $drug->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ru.catalog.list.fabricator', ['val' => $drug->dependency->fabricator->alias])}}" class="external-link">{{$drug->dependency->fabricator->title}}@if($drug->dependency->fabricator_location), {{$drug->dependency->fabricator_location->title}}@endif</a>
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
            <a href="{{route('ru.catalog.drug.inname', ['val' => $drug->dependency->inname->title])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ru.catalog.drug.inname', ['val' => $drug->dependency->inname->title])}}" class="external-link">{{$drug->dependency->inname->title}}</a>
        </div>
    </div>
@endif
@if($drug->dependency->pharma)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Фарм. группа:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ru.catalog.drug.pharma', ['val' => $drug->dependency->pharma->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ru.catalog.drug.pharma', ['val' => $drug->dependency->pharma->alias])}}" class="external-link">{{$drug->dependency->pharma->title}}</a>
        </div>
    </div>
@endif
@if($atx)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Код АТХ {{$drug->dependency->atx->class}}:</div>
        <div class="info-row atx-mg" itemprop="articleSection">
            @foreach($atx as $atx_item)
                <p>
                    <a href="{{route('ru.catalog.drug.atx', ['val' => $atx_item->class])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                    <a href="{{route('ru.catalog.drug.atx', ['val' => $atx_item->class])}}" class="external-link">{{$atx_item->class}} - {{$atx_item->title}}</a>
                </p>
            @endforeach
        </div>
    </div>
@endif

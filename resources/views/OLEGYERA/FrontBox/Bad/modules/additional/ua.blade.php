@if($bad->udosage)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Дозування:</div>
        <div class="info-row" itemprop="articleSection">{{$bad->udosage}}</div>
    </div>
@endif
@if($bad->uregistration)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Реєстрація:</div>
        <div class="info-row" itemprop="articleSection">{{$bad->uregistration}}</div>
    </div>
@endif
@if($bad->dependency->fabricator)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Виробник:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ua.catalog.list.fabricator', ['val' => $bad->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ua.catalog.list.fabricator', ['val' => $bad->dependency->fabricator->alias])}}" class="external-link">{{$bad->dependency->fabricator->utitle}}@if($bad->dependency->fabricator_location), {{$bad->dependency->fabricator_location->utitle}}@endif</a>
        </div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn4', ['key_word' => $bad->alias])
@endif
@if($bad->dependency->pharma)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Група:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ua.catalog.bad.pharma_bad', ['val' => $bad->dependency->pharma->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ua.catalog.bad.pharma_bad', ['val' => $bad->dependency->pharma->alias])}}" class="external-link">{{$bad->dependency->pharma->utitle}}</a>
        </div>
    </div>
@endif

@if($classification)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Класифікація {{$bad->dependency->classification->class}}:</div>
        <div class="info-row atx-mg" itemprop="articleSection">
            @foreach($classification as $class_item)
                <p>
                    <a href="{{route('ua.catalog.bad.atx', ['val' => $class_item->class])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                    <a href="{{route('ua.catalog.bad.atx', ['val' => $class_item->class])}}" class="external-link">{{$class_item->class}} - {{$class_item->utitle}}</a>
                </p>
            @endforeach
        </div>
    </div>
@endif

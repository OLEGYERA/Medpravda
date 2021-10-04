@if($ware->udosage)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Дозування:</div>
        <div class="info-row" itemprop="articleSection">{{$ware->udosage}}</div>
    </div>
@endif
@if($ware->uregistration)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Реєстрація:</div>
        <div class="info-row" itemprop="articleSection">{{$ware->uregistration}}</div>
    </div>
@endif
@if($ware->dependency->fabricator)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Виробник:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ua.catalog.list.fabricator', ['val' => $ware->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ua.catalog.list.fabricator', ['val' => $ware->dependency->fabricator->alias])}}" class="external-link">{{$ware->dependency->fabricator->utitle}}@if($ware->dependency->fabricator_location), {{$ware->dependency->fabricator_location->utitle}}@endif</a>
        </div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn4', ['key_word' => $ware->alias])
@endif
@if($classification)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Класифікація {{$ware->dependency->classification->class}}:</div>
        <div class="info-row atx-mg" itemprop="articleSection">
            @foreach($classification as $class_item)
                <p>
                    <a href="{{route('ua.catalog.ware.atx', ['val' => $class_item->class])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                    <a href="{{route('ua.catalog.ware.atx', ['val' => $class_item->class])}}" class="external-link">{{$class_item->class}} - {{$class_item->utitle}}</a>
                </p>
            @endforeach
        </div>
    </div>
@endif

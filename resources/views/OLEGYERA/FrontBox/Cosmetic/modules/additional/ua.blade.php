@if($cosmetic->udosage)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Дозування:</div>
        <div class="info-row" itemprop="articleSection">{{$cosmetic->udosage}}</div>
    </div>
@endif
@if($cosmetic->uregistration)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Регистрация:</div>
        <div class="info-row" itemprop="articleSection">{{$cosmetic->uregistration}}</div>
    </div>
@endif
@if($cosmetic->dependency->fabricator)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Виробник:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ua.catalog.list.fabricator', ['val' => $cosmetic->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ua.catalog.list.fabricator', ['val' => $cosmetic->dependency->fabricator->alias])}}" class="external-link">{{$cosmetic->dependency->fabricator->utitle}}@if($cosmetic->dependency->fabricator_location), {{$cosmetic->dependency->fabricator_location->utitle}}@endif</a>
        </div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn4', ['key_word' => $cosmetic->alias])
@endif
@if($classification)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Класифікація {{$cosmetic->dependency->classification->class}}:</div>
        <div class="info-row atx-mg" itemprop="articleSection">
            @foreach($classification as $class_item)
                <p>
                    <a href="{{route('ua.catalog.cosmetic.atx', ['val' => $class_item->class])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                    <a href="{{route('ua.catalog.cosmetic.atx', ['val' => $class_item->class])}}" class="external-link">{{$class_item->class}} - {{$class_item->utitle}}</a>
                </p>
            @endforeach
        </div>
    </div>
@endif

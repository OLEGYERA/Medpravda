@if($ware->dosage)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Дозировка:</div>
        <div class="info-row" itemprop="articleSection">{{$ware->dosage}}</div>
    </div>
@endif
@if($ware->registration)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Регистрация:</div>
        <div class="info-row" itemprop="articleSection">{{$ware->registration}}</div>
    </div>
@endif
@if($ware->dependency->fabricator)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Производитель:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ru.catalog.list.fabricator', ['val' => $ware->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ru.catalog.list.fabricator', ['val' => $ware->dependency->fabricator->alias])}}" class="external-link">{{$ware->dependency->fabricator->title}}@if($ware->dependency->fabricator_location), {{$ware->dependency->fabricator_location->title}}@endif</a>
        </div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn4', ['key_word' => $ware->alias])
@endif
@if($classification)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Классификация {{$ware->dependency->classification->class}}:</div>
        <div class="info-row atx-mg" itemprop="articleSection">
            @foreach($classification as $class_item)
                <p>
                    <a href="{{route('ru.catalog.ware.atx', ['val' => $class_item->class])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                    <a href="{{route('ru.catalog.ware.atx', ['val' => $class_item->class])}}" class="external-link">{{$class_item->class}} - {{$class_item->title}}</a>
                </p>
            @endforeach
        </div>
    </div>
@endif

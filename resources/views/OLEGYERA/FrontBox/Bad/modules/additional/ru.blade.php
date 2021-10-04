@if($bad->dosage)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Дозировка:</div>
        <div class="info-row" itemprop="articleSection">{{$bad->dosage}}</div>
    </div>
@endif
@if($bad->registration)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Регистрация:</div>
        <div class="info-row" itemprop="articleSection">{{$bad->registration}}</div>
    </div>
@endif
@if($bad->dependency->fabricator)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Производитель:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ru.catalog.list.fabricator', ['val' => $bad->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ru.catalog.list.fabricator', ['val' => $bad->dependency->fabricator->alias])}}" class="external-link">{{$bad->dependency->fabricator->title}}@if($bad->dependency->fabricator_location), {{$bad->dependency->fabricator_location->title}}@endif</a>
        </div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn4', ['key_word' => $bad->alias])
@endif
@if($bad->dependency->pharma)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Группа:</div>
        <div class="info-row" itemprop="articleSection">
            <a href="{{route('ru.catalog.bad.pharma_bad', ['val' => $bad->dependency->pharma->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
            <a href="{{route('ru.catalog.bad.pharma_bad', ['val' => $bad->dependency->pharma->alias])}}" class="external-link">{{$bad->dependency->pharma->title}}</a>
        </div>
    </div>
@endif
@if($classification)
    <div class="mp-row-present">
        <div class="title-row" itemprop="name">Классификация {{$bad->dependency->classification->class}}:</div>
        <div class="info-row atx-mg" itemprop="articleSection">
            @foreach($classification as $class_item)
                <p>
                    <a href="{{route('ru.catalog.bad.atx', ['val' => $class_item->class])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                    <a href="{{route('ru.catalog.bad.atx', ['val' => $class_item->class])}}" class="external-link">{{$class_item->class}} - {{$class_item->title}}</a>
                </p>
            @endforeach
        </div>
    </div>
@endif

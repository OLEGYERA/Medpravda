@if($data->dosage)
    <div class="mp-row-icon">
        <h3 class="title-row" itemprop="name">Дозировка:</h3>
        <div class="content-row" itemprop="articleSection">{{$data->dosage}}</div>
    </div>
@endif
@if($data->registration)
    <div class="mp-row-icon">
        <h3 class="title-row" itemprop="name">Регистрация:</h3>
        <div class="content-row" itemprop="articleSection">{{$data->registration}}</div>
    </div>
@endif
@if($data->dependency->fabricator)
    <div class="mp-row-icon">
        <h3 class="title-row" itemprop="name">Производитель:</h3>
        <div class="content-row" itemprop="articleSection">
            <a href="#" class="external-link">{{$data->dependency->fabricator->title}}@if($data->dependency->fabricator_location), {{$data->dependency->fabricator_location->title}}@endif</a>

{{--            <a href="{{route('ru.catalog.list.fabricator', ['val' => $data->dependency->fabricator->alias])}}" class="external-link">{{$data->dependency->fabricator->title}}@if($data->dependency->fabricator_location), {{$data->dependency->fabricator_location->title}}@endif</a>--}}
        </div>
    </div>
@endif
{{--@if($is_mobile ?? false)--}}
{{--    @include('OLEGYERA.FrontBox.MODULES.banners.bn4', ['key_word' => $data->alias])--}}
{{--@endif--}}
@if($data->dependency->inname)
    <div class="mp-row-icon">
        <h3 class="title-row" itemprop="name">МНН:</h3>
        <div class="content-row" itemprop="articleSection">
            <a href="#" class="external-link">{{$data->dependency->inname->title}}</a>

{{--            <a href="{{route('ru.catalog.drug.inname', ['val' => $data->dependency->inname->title])}}" class="external-link">{{$data->dependency->inname->title}}</a>--}}
        </div>
    </div>
@endif
@if($data->dependency->pharma)
    <div class="mp-row-icon">
        <h3 class="title-row" itemprop="name">Фарм. группа:</h3>
        <div class="content-row" itemprop="articleSection">
            <a href="#" class="external-link">{{$data->dependency->pharma->title}}</a>
{{--            <a href="{{route('ru.catalog.drug.pharma', ['val' => $data->dependency->pharma->alias])}}" class="external-link">{{$data->dependency->pharma->title}}</a>--}}
        </div>
    </div>
@endif
@if($atx)
    <div class="mp-row-icon">
        <h3 class="title-row" itemprop="name">Код АТХ {{$data->dependency->atx->class}}:</h3>
        <div class="content-row atx-mg" itemprop="articleSection">
            @foreach($atx as $atx_item)
                <p>
                    <a href="#" class="external-link">{{$atx_item->class}} - {{$atx_item->title}}</a>

{{--                    <a href="{{route('ru.catalog.drug.atx', ['val' => $atx_item->class])}}" class="external-link">{{$atx_item->class}} - {{$atx_item->title}}</a>--}}
                </p>
            @endforeach
        </div>
    </div>
@endif

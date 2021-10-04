@include(env('APP_RESOURCE_PATH') . 'SiteView.default.module.author.mini.ru')

<h1 class="information-title">
    {{$data->title}}
    @if($data->dependency->inname)
        ({{$data->dependency->inname->title}})
    @endif
    - инструкция по применению
</h1>

@if(count($data->dependency->tags) !== 0)
    <div class="information-tags-box">
        <span class="tag-title">Теги: </span>
        @foreach($data->dependency->tags as $tag)
            <a class="tag-link" title="{{$tag->tag->title}}">#{{$tag->tag->title}}</a>
        @endforeach
        @foreach($data->dependency->tags as $tag)
            <a class="tag-link" title="{{$tag->tag->title}}">#{{$tag->tag->title}}</a>
        @endforeach
        <span class="open-tag" data-show="false">
            <i class="icon-arrow_down"></i>
        </span>
    </div>
@endif

<div class="medicine-detail">
    <div class="detail-information">
        <figure class="medicine-image @if($data->setting->registration_life !== 1) blur @endif">
            <img src="{{asset('/gallery/' . getCategoryName($data->image->category_id) . '/large/' . $data->image->path)}}" alt="{{$data->title}} фото, инструкция">
            @if($data->setting->registration_life !== 1)
                <div class="reg-alert">
                    <span class="ob-text">Нет Регистрации</span>
                </div>
            @endif
        </figure>
        <div class="detail-main-option">
            <div class="medicine-review">
                {!! generateRatingStar(getRatingAvarage($data->reviews), 'Общий рейтинг') !!}

                <div class="review-add">
                    @if(getRatingAvarage($data->reviews) !== 0)
                        <a class="scroll-to-add-review mp-btn" href="#"><span class="icon-stages_development"></span>Добавить отзыв</a>
                        <a class="scroll-to-review" href="#">Смотреть отзывы ({{count($data->reviews)}})</a>
                    @else
                        <a class="scroll-to-add-review mp-btn" href="#"><span class="icon-stages_development"></span>Оставить отзыв первым</a>
                    @endif
                </div>
            </div>

            @if($data->dosage)
                <div class="mp-row-icon">
                    <div class="title-row">Дозировка:</div>
                    <div class="content-row">{{$data->dosage}}</div>
                </div>
            @endif
            @if($data->dependency->fabricator)
                <div class="mp-row-icon">
                    <div class="title-row">Производитель:</div>
                    <div class="content-row">
                        <a href="#" class="external-link">{{$data->dependency->fabricator->title}}@if($data->dependency->fabricator_location), {{$data->dependency->fabricator_location->title}}@endif</a>
{{--                        <a href="{{route('ru.catalog.list.fabricator', ['val' => $data->dependency->fabricator->alias])}}" class="external-link">{{$data->dependency->fabricator->title}}@if($data->dependency->fabricator_location), {{$data->dependency->fabricator_location->title}}@endif</a>--}}
                    </div>
                </div>
            @endif
            @if($data->dependency->pharma)
                <div class="mp-row-icon">
                    <div class="title-row">Фарм. группа:</div>
                    <div class="content-row">
                        <a href="#" class="external-link">{{$data->dependency->pharma->title}}</a>
{{--                        <a href="{{route('ru.catalog.drug.pharma', ['val' => $data->dependency->pharma->alias])}}" class="external-link">{{$data->dependency->pharma->title}}</a>--}}
                    </div>
                </div>
            @endif
        </div>

    </div>
    <nav class="detail-navigation">
        @include(env('APP_RESOURCE_PATH') . 'SiteView.medicines.' . $type .  '.subanchor.ru')
    </nav>

</div>

<div class="mp-box">
    <h2 class="box-title">
        <i class="icon-adapted_manual"></i> Адаптированная инструкция
    </h2>
    <div class="box-content">
        @include(env('APP_RESOURCE_PATH') . 'SiteView.medicines.' . $type .  '.adaptive.ru')
    </div>
</div>

<div class="mp-box">
    <h2 class="box-title">
        <i class="icon-official_manual"></i> Официальная инструкция
    </h2>
    <div class="box-content">
        @include(env('APP_RESOURCE_PATH') . 'SiteView.medicines.' . $type .  '.official.ru')
    </div>
</div>

<div class="mp-box">
    <h2 class="box-title">
        <i class="icon-glyph-other"></i> Дополнительные данные
    </h2>
    <div class="box-content">
        @include(env('APP_RESOURCE_PATH') . 'SiteView.medicines.' . $type .  '.additional.ru')
    </div>
</div>

<div class="mp-box">
    <h2 class="box-title">
        <i class="icon-indications"></i> Редакция
    </h2>
    <div class="box-content">
        @include(env('APP_RESOURCE_PATH') . 'SiteView.default.module.author.maxi.ru')
    </div>
</div>

@if($terms->count() != 0)
    <div class="mp-box">
        <h2 class="box-title">
            <i class="icon-book"></i> Терминология
        </h2>
        <div class="box-content">
            @include(env('APP_RESOURCE_PATH') . 'SiteView.medicines.' . $type .  '.term.ru')
        </div>
    </div>
@endif

<mp-review></mp-review>

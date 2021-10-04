@php $is_mobile = false; @endphp
<div class="full-content">
    <div class="triple-wrap">
        <aside class="page-navigation">
{{--            <div class="aside-fixed">--}}
{{--                @include('OLEGYERA.FrontBox.Drug.modules.navigation.ru')--}}
{{--            </div>--}}
        </aside>
        <section class="page-content mp-anchor" id="startPage">
            <div class="row-author">
                <div class="author-data">
                    <div class="author-info">
                        <div class="author-name">
                            Автор: {{$drug->creator->surname}} {{$drug->creator->name}} {{$drug->creator->middle_name}}
                        </div>
                        @if($drug->creator->editor)
                            <div class="author-links">
                                @if($drug->creator->editor->facebook)
                                    <a target="_blank" href="{{$drug->creator->editor->facebook}}">
                                        <span class="glyph editor-fb"></span>
                                    </a>
                                @endif
                                @if($drug->creator->editor->instagram)
                                    <a target="_blank" href="{{$drug->creator->editor->instagram}}">
                                        <span class="glyph editor-in"></span>
                                    </a>
                                @endif
                                <a target="_blank" href="{{route('ru.editors')}}/#{{$drug->creator->id}}">{{$drug->creator->surname}} {{$drug->creator->name}}</a>
                            </div>
                        @endif
                    </div>
                    @if($drug->creator->editor)
                        <div class="author-specialty">
                            {{$drug->creator->editor->specialty}}
                        </div>
                    @endif
                </div>

                <div class="last-update">
                    Дата обновления: {{$last_mod->formatLocalized('%e')}} {{$last_mod->formatLocalized('%B')}} {{$last_mod->formatLocalized('%Y')}}
                </div>
            </div>
            @if(count($drug->dependency->tags) !== 0)
                <div class="row-tags">
                    <span class="tag-title">Теги: </span>
                    @foreach($drug->dependency->tags as $tag)
                        <a class="tag-link" title="{{$tag->tag->title}}">#{{$tag->tag->title}}</a>
                    @endforeach
                </div>
            @endif
            <div class="row-drug-presentation">
                @if($drug->setting->recipe)
                    <a href="{{route('ru.prescription_conditions')}}" target="_blank" class="recipe-alert">
                        <span class="glyph other"></span>
                        <span class="under-title">Информация об использовании рецептурных препаратов</span>
                    </a>
                @endif
                <h1 class="drug-title @if($drug->setting->recipe) isRecipe @endif">{{$drug->title}}
                    @if($drug->dependency->inname)
                        ({{$drug->dependency->inname->title}})
                    @endif
                </h1>
                <div class="drug-review">
                    <div class="review-left">
                        {!! generateRatingStar(getRatingAvarage($reviews), 'Общий рейтинг') !!}
                        <div class="review-title">
                            Общий рейтинг: <span class="rating-val">{{getRatingAvarage($reviews)}} из 5</span>
                        </div>
                    </div>

                    <script>
                        window.reviewTitle = "о препарате {{$drug->title}}"
                        window.reviewAlias = "{{$drug->alias}}"
                    </script>
                    <div class="review review-right">
                        <review :lang="'ru'"></review>
                    </div>
                </div>

                <div class="drug-columns">
                    <div class="el-img">
                        <figure class="avatar">
                            <img src="{{asset('/gallery/' . getCategoryName($drug->image->category_id) . '/large/' . $drug->image->path)}}" alt="{{$drug->image->alt}}">
                        </figure>
                        @if($drug->setting->registration_life !== 1)
                            <div class="end-registration-life">
                                Нет Регистрации
                            </div>
                        @endif
                    </div>
                    <div class="drug-intro-reviews">
                        <div class="mp-row-present">
                            <div class="title-row">Качество<span class="rating-val">({{getItemAvarage($reviews, 'quality')}} из 5)</span></div>
                            <div class="info-row">
                                {!! generateRatingStar(getItemAvarage($reviews, 'quality'), 'Рейтинг качества') !!}
                            </div>
                        </div>
                        <div class="mp-row-present">
                            <div class="title-row">Упаковка<span class="rating-val">({{getItemAvarage($reviews, 'packaging')}} из 5)</span></div>
                            <div class="info-row">
                                {!! generateRatingStar(getItemAvarage($reviews, 'packaging'), 'Рейтинг упаковки') !!}
                            </div>
                        </div>
                        <div class="mp-row-present">
                            <div class="title-row">Эффект<span class="rating-val">({{getItemAvarage($reviews, 'effect')}} из 5)</span></div>
                            <div class="info-row">
                                {!! generateRatingStar(getItemAvarage($reviews, 'effect'), 'Рейтинг эффекта') !!}
                            </div>
                        </div>
                        <div class="mp-row-present">
                            <div class="title-row">Безопасность<span class="rating-val">({{getItemAvarage($reviews, 'safety')}} из 5)</span></div>
                            <div class="info-row">
                                {!! generateRatingStar(getItemAvarage($reviews, 'safety'), 'Рейтинг безопасности') !!}
                            </div>
                        </div>
                        <div class="mp-row-present">
                            <div class="title-row">Доступность<span class="rating-val">({{getItemAvarage($reviews, 'availability')}} из 5)</span></div>
                            <div class="info-row">
                                {!! generateRatingStar(getItemAvarage($reviews, 'availability'), 'Рейтинг доступности') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-drug-accordion">
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="reviews">
                        Отзывы ({{count($reviews)}})
                    </h2>
                    <div class="accordion-box">
                        @foreach($reviews as $review)
                            <div class="mp-row-present review-row">
                                <div class="review-info">
                                    <div class="review-publisher">
                                        <figure class="publisher-avatar">
                                            <img src="{{$review->avatar_path}}" alt="">
                                        </figure>
                                        <div class="publisher-name">
                                            {{$review->ln}} {{$review->fn}}
                                        </div>
                                    </div>
                                    <div class="review-rate">
                                        {!! generateRatingStar(calcAvarage($review), 'Рейтинг от ' . $review->ln . ' ' . $review->fn) !!}
                                    </div>
                                </div>
                                <div class="review-data">
                                    @if($review->worth != null)
                                        <div class="review-worth">
                                            <span class="data-title">
                                                Достоинства:
                                            </span>
                                            {{$review->worth}}
                                        </div>
                                    @endif
                                    @if($review->limitations != null)
                                        <div class="review-limitations">
                                            <span class="data-title">
                                                Недостатки:
                                            </span>
                                            {{$review->limitations}}
                                        </div>
                                    @endif
                                    @if($review->review != null)
                                        <div class="review-text">
                                            {{$review->review}}
                                        </div>
                                    @endif
                                </div>
                                <div class="review-explicit-rating">
                                    <div class="mp-row-present">
                                        <div class="title-row">Качество</div>
                                        <div class="info-row">
                                            {!! generateRatingStar($review->quality, 'Рейтинг качества') !!}
                                        </div>
                                    </div>
                                    <div class="mp-row-present">
                                        <div class="title-row">Упаковка</div>
                                        <div class="info-row">
                                            {!! generateRatingStar($review->packaging, 'Рейтинг упаковки') !!}
                                        </div>
                                    </div>
                                    <div class="mp-row-present">
                                        <div class="title-row">Эффект</div>
                                        <div class="info-row">
                                            {!! generateRatingStar($review->effect, 'Рейтинг эффекта') !!}
                                        </div>
                                    </div>
                                    <div class="mp-row-present">
                                        <div class="title-row">Безопасность</div>
                                        <div class="info-row">
                                            {!! generateRatingStar($review->safety, 'Рейтинг безопасности') !!}
                                        </div>
                                    </div>
                                    <div class="mp-row-present">
                                        <div class="title-row">Доступность</div>
                                        <div class="info-row">
                                            {!! generateRatingStar($review->availability, 'Рейтинг доступности') !!}
                                        </div>
                                    </div>
                                </div>
                                <time class="review-date-publish">
                                    {{$review->created_at->format('d.m.Y')}}
                                </time>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @include('OLEGYERA.FrontBox.MODULES.asides.desktop.ru', ['data' => $drug])
    </div>
</div>

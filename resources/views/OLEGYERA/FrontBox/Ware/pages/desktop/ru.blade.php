@if ($agent->isMobile())
    @php $is_mobile = true; @endphp
@else
    @php $is_mobile = false; @endphp
@endif

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Drug",
  "name": "{{$ware->title}}",
  "url": "{{ route('ru.ware', ['alias' => $ware->alias])}}",
  "image": "{{asset('/gallery/' . getCategoryName($ware->image->category_id) . '/large/' . $ware->image->path)}}",
  "description": "{{mb_strtoupper($ware->title) . ' - полная информация о медицинском изделии от производителя с адаптированной, упрощенной инструкцией, списком болезней, составом, показаниями, противопоказания, побочными действиями, передозировкой, аналогами, отзывами.'}}",
  "dosageForm": "{{$ware->dosage}}",
  @if($ware->dependency->fabricator)"manufacturer": "{{$ware->dependency->fabricator->title}}"@endif
}
</script>

@if($ware->instruction_adaptive->composition && $ware->instruction_adaptive->composition !== '<p><br></p>' ||
$ware->instruction_adaptive->pharma_props && $ware->instruction_adaptive->pharma_props !== '<p><br></p>'
                || $ware->instruction_adaptive->indications && $ware->instruction_adaptive->indications !== '<p><br></p>'
                || $ware->instruction_adaptive->contraindications && $ware->instruction_adaptive->contraindications !== '<p><br></p>'
                || $ware->instruction_adaptive->usage_and_dose && $ware->instruction_adaptive->usage_and_dose !== '<p><br></p>')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            @if($ware->instruction_adaptive->composition && $ware->instruction_adaptive->composition !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какой состав у медицинского изделия {{$ware->title}}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{!! $ware->instruction_adaptive->composition !!}"
                }
                @if($ware->instruction_adaptive->pharma_props && $ware->instruction_adaptive->pharma_props !== '<p><br></p>'
                || $ware->instruction_adaptive->indications && $ware->instruction_adaptive->indications !== '<p><br></p>'
                || $ware->instruction_adaptive->contraindications && $ware->instruction_adaptive->contraindications !== '<p><br></p>'
                || $ware->instruction_adaptive->usage_and_dose && $ware->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
            @else
            }
            @endif
    @endif

    @if($ware->instruction_adaptive->pharma_props && $ware->instruction_adaptive->pharma_props !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какие свойства у медицинского изделия {{$ware->title}}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{!! $ware->instruction_adaptive->pharma_props !!}"
                }
                @if($ware->instruction_adaptive->indications && $ware->instruction_adaptive->indications !== '<p><br></p>'
                || $ware->instruction_adaptive->contraindications && $ware->instruction_adaptive->contraindications !== '<p><br></p>'
                || $ware->instruction_adaptive->usage_and_dose && $ware->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
            @else
            }
            @endif
    @endif

    @if($ware->instruction_adaptive->indications && $ware->instruction_adaptive->indications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Для чего нужно применять медицинское изделие {{$ware->title}}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{!! $ware->instruction_adaptive->indications !!}"
                }
                @if($ware->instruction_adaptive->contraindications && $ware->instruction_adaptive->contraindications !== '<p><br></p>'
                || $ware->instruction_adaptive->usage_and_dose && $ware->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
            @else
            }
            @endif
    @endif

    @if($ware->instruction_adaptive->contraindications && $ware->instruction_adaptive->contraindications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какие противопоказания у медицинского изделия {{$ware->title}}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{!! $ware->instruction_adaptive->contraindications !!}"
                }
                @if($ware->instruction_adaptive->usage_and_dose && $ware->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
            @else
            }
            @endif
    @endif

    @if($ware->instruction_adaptive->usage_and_dose && $ware->instruction_adaptive->usage_and_dose !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Как применять медицинское изделие {{$ware->title}}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{!! $ware->instruction_adaptive->usage_and_dose !!}"
                }
            }
            @endif
    ]
}
</script>
@endif

<div class="full-content reactive"
     itemscope itemtype="http://schema.org/Article">
    <link itemprop="mainEntityOfPage" href="{{route('ru.ware', ['alias' => $ware->alias])}}" />
    <div class="triple-wrap">
        <aside class="page-navigation">
            <div class="aside-fixed">
                @include('OLEGYERA.FrontBox.Ware.modules.navigation.ru')
            </div>
        </aside>
        <section class="page-content mp-anchor" id="startPage">
            <div class="row-author">
                <div class="author-data"
                     itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                    <div class="author-info">
                        <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($ware->creator->avatar->category_id) . '/medium/' . $ware->creator->avatar->path)}}">
                        <div class="author-name">
                            Автор: {{$ware->creator->surname}} {{$ware->creator->name}} {{$ware->creator->middle_name}}
                        </div>
                        <meta itemprop="name" content="{{$ware->creator->surname}} {{$ware->creator->name}} {{$ware->creator->middle_name}}">
                        @if($ware->creator->editor)
                            <div class="author-links">
                                @if($ware->creator->editor->facebook)
                                    <a target="_blank" href="{{$ware->creator->editor->facebook}}">
                                        <span class="glyph editor-fb"></span>
                                    </a>
                                @endif
                                @if($ware->creator->editor->instagram)
                                    <a target="_blank" href="{{$ware->creator->editor->instagram}}">
                                        <span class="glyph editor-in"></span>
                                    </a>
                                @endif
                                <link itemprop="sameAs" href="{{route('ru.editors')}}/#{{$ware->creator->id}}" />
                                <a target="_blank" href="{{route('ru.editors')}}/#{{$ware->creator->id}}">{{$ware->creator->surname}} {{$ware->creator->name}}</a>
                            </div>
                        @endif
                    </div>
                    @if($ware->creator->editor)
                        <div class="author-specialty">
                            {{$ware->creator->editor->specialty}}
                        </div>
                    @endif
                </div>

                <meta itemprop="datePublished" content="{{$ware->created_at}}">
                <meta itemprop="dateModified" content="{{$last_mod}}">
                <time datetime="{{$last_mod->format('Y-m-d H:i:s')}}" class="last-update">
                    Дата обновления: {{$last_mod->format('d')}} {{renderNameOfMonth($last_mod->format('M'), 'ru')}} {{$last_mod->format('Y')}}
                </time>
            </div>
            @if(count($ware->dependency->tags) !== 0)
                <div class="row-tags">
                    <span class="tag-title">Теги: </span>
                    @foreach($ware->dependency->tags as $tag)
                        <a class="tag-link" title="{{$tag->tag->title}}">#{{$tag->tag->title}}</a>
                    @endforeach
                </div>
            @endif
            <div class="row-drug-presentation">
                <h1 itemprop="headline name" class="bad-title">{{$ware->title}}</h1>
                <div class="drug-columns">
                    <div class="el-img">
                        <figure class="avatar">
                            <img src="{{asset('/gallery/' . getCategoryName($ware->image->category_id) . '/large/' . $ware->image->path)}}" alt="{{$ware->image->alt}}">
                        </figure>
                        <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($ware->image->category_id) . '/large/' . $ware->image->path)}}">
                        @if($ware->setting->registration_life !== 1)
                            <div class="end-registration-life">
                                Нет Регистрации
                            </div>
                        @endif
                    </div>
                    <div class="drug-intro-dependencies">
                        @if($ware->dosage)
                            <div class="mp-row-present">
                                <div class="title-row">Дозировка:</div>
                                <div class="info-row">{{$ware->dosage}}</div>
                            </div>
                        @endif
                        @if($ware->dependency->fabricator)
                            <div class="mp-row-present">
                                <div class="title-row">Производитель:</div>
                                <div class="info-row">
                                    <a href="{{route('ru.catalog.list.fabricator', ['val' => $ware->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                                    <a href="{{route('ru.catalog.list.fabricator', ['val' => $ware->dependency->fabricator->alias])}}" class="external-link">{{$ware->dependency->fabricator->title}}@if($ware->dependency->fabricator_location), {{$ware->dependency->fabricator_location->title}}@endif</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($is_mobile)
                        @include('OLEGYERA.FrontBox.MODULES.banners.cap', ['key_word' => $ware->alias])
                    @endif
                </div>
            </div>
            @include('OLEGYERA.FrontBox.Ware.modules.anchors.ru')
            <div class="row-drug-accordion">
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="adaptive_instruction"
                        itemprop="alternativeHeadline">
                        Адаптированная инструкция
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.Ware.modules.adaptive.ru', ['is_mobile' => $is_mobile])
                    </div>
                </div>
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="official_instruction"
                        itemprop="alternativeHeadline">
                        Официальная инструкция
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.Ware.modules.official.ru', ['is_mobile' => $is_mobile])
                    </div>
                </div>
                <div class="accordion-item non-justify open">
                    <h2 class="accordion-title mp-anchor" id="otherData"
                        itemprop="alternativeHeadline">
                        Дополнительные данные
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.Ware.modules.additional.ru', ['is_mobile' => $is_mobile])
                    </div>
                </div>
                @if(count($terms) != 0)
                    <div class="accordion-item open">
                        <h2 class="accordion-title mp-anchor" id="official_instruction"
                            itemprop="alternativeHeadline">
                            Терминология
                            <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                            <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </h2>
                        <div class="accordion-box">
                            @include('OLEGYERA.FrontBox.Drug.modules.terms.ru')
                        </div>
                    </div>
                @endif
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="editorsData">
                        Редакция
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.MODULES.editors.ru', ['data' => $ware, 'is_mobile' => $is_mobile])
                    </div>
                </div>
                @if(count($ware->labels) != 0)
                    <div class="accordion-item open">
                        <h2 class="accordion-title">
                            Неправильные названия
                            <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                            <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </h2>
                        <div class="accordion-box">
                            <div class="mp-row-present">
                                <p style="margin: 0">
                                    @foreach($ware->labels as $key => $label)
                                        @if(count($ware->labels) == ($key + 1))
                                            {{$label->title}}.
                                        @else
                                            {{$label->title}},
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        @include('OLEGYERA.FrontBox.MODULES.asides.desktop.ru', ['data' => $ware, 'is_mobile' => $is_mobile])
    </div>
</div>

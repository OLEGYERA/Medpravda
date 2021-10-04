@if ($agent->isMobile())
    @php $is_mobile = true; @endphp
@else
    @php $is_mobile = false; @endphp
@endif

<script type="application/ld+json">
{
"@context": "https://schema.org/",
"@type": "Drug",
"name": "{{$bad->title}}",
"url": "{{ route('ru.bad', ['alias' => $bad->alias])}}",
"image": "{{asset('/gallery/' . getCategoryName($bad->image->category_id) . '/large/' . $bad->image->path)}}",
"description": "{{mb_strtoupper($bad->title) . ' - полная информация о диетической добавке от производителя с адаптированной, упрощенной инструкцией, списком болезней, составом, показаниями, противопоказания, побочными действиями, передозировкой, аналогами, отзывами.'}}",
"dosageForm": "{{$bad->dosage}}",
@if($bad->dependency->fabricator)"manufacturer": "{{$bad->dependency->fabricator->title}}"@endif
}
</script>

@if($bad->instruction_adaptive->composition && $bad->instruction_adaptive->composition !== '<p><br></p>'
        || $bad->instruction_adaptive->pharma_props && $bad->instruction_adaptive->pharma_props !== '<p><br></p>'
        || $bad->instruction_adaptive->indications && $bad->instruction_adaptive->indications !== '<p><br></p>'
        || $bad->instruction_adaptive->contraindications && $bad->instruction_adaptive->contraindications !== '<p><br></p>'
        || $bad->instruction_adaptive->usage_and_dose && $bad->instruction_adaptive->usage_and_dose !== '<p><br></p>')
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        @if($bad->instruction_adaptive->composition && $bad->instruction_adaptive->composition !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какой состав у диетической добавки {{$bad->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $bad->instruction_adaptive->composition !!}"
            }
         @if($bad->instruction_adaptive->pharma_props && $bad->instruction_adaptive->pharma_props !== '<p><br></p>'
        || $bad->instruction_adaptive->indications && $bad->instruction_adaptive->indications !== '<p><br></p>'
        || $bad->instruction_adaptive->contraindications && $bad->instruction_adaptive->contraindications !== '<p><br></p>'
        || $bad->instruction_adaptive->usage_and_dose && $bad->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($bad->instruction_adaptive->pharma_props && $bad->instruction_adaptive->pharma_props !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какие свойства у диетической добавки {{$bad->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $bad->instruction_adaptive->pharma_props !!}"
            }
          @if($bad->instruction_adaptive->indications && $bad->instruction_adaptive->indications !== '<p><br></p>'
        || $bad->instruction_adaptive->contraindications && $bad->instruction_adaptive->contraindications !== '<p><br></p>'
        || $bad->instruction_adaptive->usage_and_dose && $bad->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($bad->instruction_adaptive->indications && $bad->instruction_adaptive->indications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Для чего нужно принимать диетическую добавку {{$bad->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $bad->instruction_adaptive->indications !!}"
            }
         @if($bad->instruction_adaptive->contraindications && $bad->instruction_adaptive->contraindications !== '<p><br></p>'
        || $bad->instruction_adaptive->usage_and_dose && $bad->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($bad->instruction_adaptive->contraindications && $bad->instruction_adaptive->contraindications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какие противопоказания у диетической добавки {{$bad->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $bad->instruction_adaptive->contraindications !!}"
            }
         @if($bad->instruction_adaptive->usage_and_dose && $bad->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
@else
            }
@endif
    @endif

    @if($bad->instruction_adaptive->usage_and_dose && $bad->instruction_adaptive->usage_and_dose !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Как принимать диетическую добавку {{$bad->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $bad->instruction_adaptive->usage_and_dose !!}"
            }
        }
        @endif
    ]
 }
</script>
@endif



<div class="full-content reactive"
     itemscope itemtype="http://schema.org/Article">
    <link itemprop="mainEntityOfPage" href="{{route('ru.bad', ['alias' => $bad->alias])}}" />
    <div class="triple-wrap">
        <aside class="page-navigation">
            <div class="aside-fixed">
                @include('OLEGYERA.FrontBox.Bad.modules.navigation.ru')
            </div>
        </aside>
        <section class="page-content mp-anchor" id="startPage">
            <div class="row-author">
                <div class="author-data"
                     itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                    <div class="author-info">
                        <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($bad->creator->avatar->category_id) . '/medium/' . $bad->creator->avatar->path)}}">
                        <div class="author-name">
                            Автор: {{$bad->creator->surname}} {{$bad->creator->name}} {{$bad->creator->middle_name}}
                        </div>
                        <meta itemprop="name" content="{{$bad->creator->surname}} {{$bad->creator->name}} {{$bad->creator->middle_name}}">
                        @if($bad->creator->editor)
                            <div class="author-links">
                                @if($bad->creator->editor->facebook)
                                    <a target="_blank" href="{{$bad->creator->editor->facebook}}">
                                        <span class="glyph editor-fb"></span>
                                    </a>
                                @endif
                                @if($bad->creator->editor->instagram)
                                    <a target="_blank" href="{{$bad->creator->editor->instagram}}">
                                        <span class="glyph editor-in"></span>
                                    </a>
                                @endif
                                <link itemprop="sameAs" href="{{route('ru.editors')}}/#{{$bad->creator->id}}" />
                                <a target="_blank" href="{{route('ru.editors')}}/#{{$bad->creator->id}}">{{$bad->creator->surname}} {{$bad->creator->name}}</a>
                            </div>
                        @endif
                    </div>
                    @if($bad->creator->editor)
                        <div class="author-specialty">
                            {{$bad->creator->editor->specialty}}
                        </div>
                    @endif
                </div>

                <meta itemprop="datePublished" content="{{$bad->created_at}}">
                <meta itemprop="dateModified" content="{{$last_mod}}">
                <time datetime="{{$last_mod->format('Y-m-d H:i:s')}}" class="last-update">
                    Дата обновления: {{$last_mod->format('d')}} {{renderNameOfMonth($last_mod->format('M'), 'ru')}} {{$last_mod->format('Y')}}
                </time>
            </div>
            @if(count($bad->dependency->tags) !== 0)
                <div class="row-tags">
                    <span class="tag-title">Теги: </span>
                    @foreach($bad->dependency->tags as $tag)
                        <a class="tag-link" title="{{$tag->tag->title}}">#{{$tag->tag->title}}</a>
                    @endforeach
                </div>
            @endif
            <div class="row-drug-presentation">
                <h1 itemprop="headline name" class="bad-title">{{$bad->title}}</h1>
                <div class="drug-columns">
                    <div class="el-img">
                        <figure class="avatar">
                            <img src="{{asset('/gallery/' . getCategoryName($bad->image->category_id) . '/large/' . $bad->image->path)}}" alt="{{$bad->image->alt}}">
                        </figure>
                        <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($bad->image->category_id) . '/large/' . $bad->image->path)}}">
                        @if($bad->setting->registration_life !== 1)
                            <div class="end-registration-life">
                                Нет Регистрации
                            </div>
                        @endif
                    </div>
                    <div class="drug-intro-dependencies">
                        @if($bad->dosage)
                            <div class="mp-row-present">
                                <div class="title-row">Дозировка:</div>
                                <div class="info-row">{{$bad->dosage}}</div>
                            </div>
                        @endif
                        @if($bad->dependency->fabricator)
                            <div class="mp-row-present">
                                <div class="title-row">Производитель:</div>
                                <div class="info-row">
                                    <a href="{{route('ru.catalog.list.fabricator', ['val' => $bad->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                                    <a href="{{route('ru.catalog.list.fabricator', ['val' => $bad->dependency->fabricator->alias])}}" class="external-link">{{$bad->dependency->fabricator->title}}@if($bad->dependency->fabricator_location), {{$bad->dependency->fabricator_location->title}}@endif</a>
                                </div>
                            </div>
                        @endif
                        @if($bad->dependency->pharma)
                            <div class="mp-row-present">
                                <div class="title-row">Группа:</div>
                                <div class="info-row">
                                    <a href="{{route('ru.catalog.bad.pharma_bad', ['val' => $bad->dependency->pharma->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                                    <a href="{{route('ru.catalog.bad.pharma_bad', ['val' => $bad->dependency->pharma->alias])}}" class="external-link">{{$bad->dependency->pharma->title}}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($is_mobile)
                        @include('OLEGYERA.FrontBox.MODULES.banners.cap', ['key_word' => $bad->alias])
                    @endif
                </div>
            </div>
            @include('OLEGYERA.FrontBox.Bad.modules.anchors.ru')
            <div class="row-drug-accordion">
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="adaptive_instruction"
                        itemprop="alternativeHeadline">
                        Адаптированная инструкция
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.Bad.modules.adaptive.ru', ['is_mobile' => $is_mobile])
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
                        @include('OLEGYERA.FrontBox.Bad.modules.official.ru', ['is_mobile' => $is_mobile])
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
                        @include('OLEGYERA.FrontBox.Bad.modules.additional.ru', ['is_mobile' => $is_mobile])
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
                        @include('OLEGYERA.FrontBox.MODULES.editors.ru', ['data' => $bad, 'is_mobile' => $is_mobile])
                    </div>
                </div>
                @if(count($bad->labels) != 0)
                    <div class="accordion-item open">
                        <h2 class="accordion-title">
                            Неправильные названия
                            <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                            <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </h2>
                        <div class="accordion-box">
                            <div class="mp-row-present">
                                <p style="margin: 0">
                                    @foreach($bad->labels as $key => $label)
                                        @if(count($bad->labels) == ($key + 1))
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
        @include('OLEGYERA.FrontBox.MODULES.asides.desktop.ru', ['data' => $bad, 'is_mobile' => $is_mobile])
    </div>
</div>

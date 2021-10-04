@include('OLEGYERA.FrontBox.Cosmetic.modules.mobile-menu.ru')
@php $is_mobile = true; @endphp
<script type="application/ld+json">
{
"@context": "https://schema.org/",
"@type": "Drug",
"name": "{{$cosmetic->title}}",
"url": "{{ route('m.ru.cosmetic', ['alias' => $cosmetic->alias])}}",
"image": "{{asset('/gallery/' . getCategoryName($cosmetic->image->category_id) . '/large/' . $cosmetic->image->path)}}",
"description": "{{mb_strtoupper($cosmetic->title) . ' - полная информация о  косметическом средстве от производителя с адаптированной, упрощенной инструкцией, списком болезней, составом, показаниями, противопоказания, побочными действиями, передозировкой, аналогами, отзывами.'}}",
"dosageForm": "{{$cosmetic->dosage}}",
@if($cosmetic->dependency->fabricator)"manufacturer": "{{$cosmetic->dependency->fabricator->title}}"@endif
    }
</script>



@if($cosmetic->instruction_adaptive->composition && $cosmetic->instruction_adaptive->composition !== '<p><br></p>'
    || $cosmetic->instruction_adaptive->pharma_props && $cosmetic->instruction_adaptive->pharma_props !== '<p><br></p>'
        || $cosmetic->instruction_adaptive->indications && $cosmetic->instruction_adaptive->indications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive->contraindications && $cosmetic->instruction_adaptive->contraindications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive->usage_and_dose && $cosmetic->instruction_adaptive->usage_and_dose !== '<p><br></p>')
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        @if($cosmetic->instruction_adaptive->composition && $cosmetic->instruction_adaptive->composition !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какой состав у косметического средства {{$cosmetic->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive->composition !!}"
            }
         @if($cosmetic->instruction_adaptive->pharma_props && $cosmetic->instruction_adaptive->pharma_props !== '<p><br></p>'
        || $cosmetic->instruction_adaptive->indications && $cosmetic->instruction_adaptive->indications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive->contraindications && $cosmetic->instruction_adaptive->contraindications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive->usage_and_dose && $cosmetic->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($cosmetic->instruction_adaptive->pharma_props && $cosmetic->instruction_adaptive->pharma_props !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какие свойства у косметического средства {{$cosmetic->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive->pharma_props !!}"
            }
          @if($cosmetic->instruction_adaptive->indications && $cosmetic->instruction_adaptive->indications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive->contraindications && $cosmetic->instruction_adaptive->contraindications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive->usage_and_dose && $cosmetic->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($cosmetic->instruction_adaptive->indications && $cosmetic->instruction_adaptive->indications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Для чего нужно применять косметическое средство {{$cosmetic->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive->indications !!}"
            }
         @if($cosmetic->instruction_adaptive->contraindications && $cosmetic->instruction_adaptive->contraindications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive->usage_and_dose && $cosmetic->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($cosmetic->instruction_adaptive->contraindications && $cosmetic->instruction_adaptive->contraindications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какие противопоказания у косметического средства {{$cosmetic->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive->contraindications !!}"
            }
         @if($cosmetic->instruction_adaptive->usage_and_dose && $cosmetic->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            },
@else
            }
@endif
    @endif

    @if($cosmetic->instruction_adaptive->usage_and_dose && $cosmetic->instruction_adaptive->usage_and_dose !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Как применять косметическое средство {{$cosmetic->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive->usage_and_dose !!}"
            }
        }
        @endif
    ]
 }
</script>
@endif

<div class="full-content"
     itemscope itemtype="http://schema.org/Article">
    <link itemprop="mainEntityOfPage" href="{{route('m.ru.cosmetic', ['alias' => $cosmetic->alias])}}" />
    <section class="page-content mp-anchor" id="startPage">
        <div class="row-author">
            <div class="author-data"
                 itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                <div class="author-info">
                    <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($cosmetic->creator->avatar->category_id) . '/medium/' . $cosmetic->creator->avatar->path)}}">
                    <div class="author-name">
                        Автор: {{$cosmetic->creator->surname}} {{$cosmetic->creator->name}} {{$cosmetic->creator->middle_name}}
                    </div>
                    <meta itemprop="name" content="{{$cosmetic->creator->surname}} {{$cosmetic->creator->name}} {{$cosmetic->creator->middle_name}}">
                    @if($cosmetic->creator->editor)
                        <div class="author-links">
                            @if($cosmetic->creator->editor->facebook)
                                <a target="_blank" href="{{$cosmetic->creator->editor->facebook}}">
                                    <span class="glyph editor-fb"></span>
                                </a>
                            @endif
                            @if($cosmetic->creator->editor->instagram)
                                <a target="_blank" href="{{$cosmetic->creator->editor->instagram}}">
                                    <span class="glyph editor-in"></span>
                                </a>
                            @endif
                            <link itemprop="sameAs" href="{{route('m.ru.editors')}}/#{{$cosmetic->creator->id}}" />
                            <a target="_blank" href="{{route('m.ru.editors')}}/#{{$cosmetic->creator->id}}">{{$cosmetic->creator->surname}} {{$cosmetic->creator->name}}</a>
                        </div>
                    @endif
                </div>
                @if($cosmetic->creator->editor)
                    <div class="author-specialty">
                        {{$cosmetic->creator->editor->specialty}}
                    </div>
                @endif
            </div>

            <meta itemprop="datePublished" content="{{$cosmetic->created_at}}">
            <meta itemprop="dateModified" content="{{$last_mod}}">
            <time datetime="{{$last_mod->format('Y-m-d H:i:s')}}" class="last-update">
                Дата обновления: {{$last_mod->format('d')}} {{renderNameOfMonth($last_mod->format('M'), 'ru')}} {{$last_mod->format('Y')}}
            </time>
        </div>
        <div class="row-drug-presentation">
            <h1 class="drug-title" itemprop="headline name">{{$cosmetic->title}}</h1>
           <div class="page-row">
                <div class="el-img">
                    <figure class="avatar">
                        <img src="{{asset('/gallery/' . getCategoryName($cosmetic->image->category_id) . '/medium/' . $cosmetic->image->path)}}" alt="{{$cosmetic->image->alt}}">
                    </figure>
                    <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($cosmetic->image->category_id) . '/large/' . $cosmetic->image->path)}}">
                    @if($cosmetic->setting->registration_life !== 1)
                        <div class="end-registration-life">
                            Нет Регистрации
                        </div>
                    @endif
                </div>
                <div class="anchor-btns">
                    <a href="#" class="mp-btn module-price">Цены в аптеках</a>
                    <a href="#" class="mp-btn">Запись к врачу</a>
                    <a href="#" class="mp-btn">Анализы</a>
                </div>
            </div>
            <div class="drug-intro-dependencies">
                @if($cosmetic->dosage)
                    <div class="mp-row-present">
                        <h3 class="title-row">Дозировка:</h3>
                        <div class="info-row">{{$cosmetic->dosage}}</div>
                    </div>
                @endif
                @if($cosmetic->dependency->fabricator)
                    <div class="mp-row-present">
                        <h3 class="title-row">Производитель:</h3>
                        <div class="info-row">
                            <a href="{{route('m.ru.catalog.list.fabricator', ['val' => $cosmetic->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                            <a href="{{route('m.ru.catalog.list.fabricator', ['val' => $cosmetic->dependency->fabricator->alias])}}" class="external-link">{{$cosmetic->dependency->fabricator->title}}@if($cosmetic->dependency->fabricator_location), {{$cosmetic->dependency->fabricator_location->title}}@endif</a>
                        </div>
                    </div>
                @endif
            </div>
            @include('OLEGYERA.FrontBox.MODULES.banners.cap', ['key_word' => $cosmetic->alias])
        </div>
        @include('OLEGYERA.FrontBox.Cosmetic.modules.anchors.ru')
        <div class="row-drug-accordion">
            <div class="accordion-item open">
                <h2 class="accordion-title mp-anchor" id="adaptive_instruction"
                    itemprop="alternativeHeadline">
                    Адаптированная инструкция
                    <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                </h2>
                <div class="accordion-box">
                    @include('OLEGYERA.FrontBox.Cosmetic.modules.adaptive.ru', ['is_mobile' => $is_mobile])
                </div>
            </div>
            <div class="accordion-item open">
                <h2 class="accordion-title mp-anchor" id="official_instruction"
                    itemprop="alternativeHeadline">
                    Официальная инструкция
                    <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                </h2>
                <div class="accordion-box">
                    @include('OLEGYERA.FrontBox.Cosmetic.modules.official.ru', ['is_mobile' => $is_mobile])
                </div>
            </div>
            <div class="accordion-item non-justify open">
                <h2 class="accordion-title mp-anchor" id="otherData"
                    itemprop="alternativeHeadline">
                    Дополнительные данные
                    <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                </h2>
                <div class="accordion-box">
                    @include('OLEGYERA.FrontBox.Cosmetic.modules.additional.ru', ['is_mobile' => $is_mobile])
                </div>
            </div>
            <div class="accordion-item open">
                <h2 class="accordion-title mp-anchor" id="editorsData">
                    Редакция
                    <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                </h2>
                <div class="accordion-box">
                    @include('OLEGYERA.FrontBox.MODULES.editors.ru', ['data' => $cosmetic, 'is_mobile' => $is_mobile])
                </div>
            </div>
        </div>
    </section>
    @include('OLEGYERA.FrontBox.MODULES.asides.mobile.ru', ['data' => $cosmetic, 'is_mobile' => $is_mobile])
</div>

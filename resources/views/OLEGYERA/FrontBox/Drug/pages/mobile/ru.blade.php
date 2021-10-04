@include('OLEGYERA.FrontBox.Drug.modules.mobile-menu.ru')
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Drug",
  "name": "{{$drug->title}} @if($drug->dependency->inname) ({{$drug->dependency->inname->title}}) @endif",
  "url": "{{ route('m.ru.drug', ['alias' => $drug->alias])}}",
  "image": "{{asset('/gallery/' . getCategoryName($drug->image->category_id) . '/large/' . $drug->image->path)}}",
  "description": "{{mb_strtoupper($drug->title) . ' - полная информация о препарате от производителя с адаптированной, упрощенной инструкцией, списком болезней, составом, показаниями, противопоказания, побочными действиями, передозировкой, аналогами, отзывами.'}}",
  @if(count($drug->dependency->substancesThrough) != 0)
        "activeIngredient": [
    @foreach($drug->dependency->substancesThrough as $key=>$item)
            "{{$item->title}}"@if($key + 1 != count($drug->dependency->substancesThrough)),@endif
    @endforeach
        ],
@endif
    "dosageForm": "{{$drug->dosage}}",
  "prescriptionStatus":"@if($drug->setting->recipe == 0)Без рецепта. @else По рецепту. @endif",
  @if($drug->dependency->fabricator)"manufacturer": "{{$drug->dependency->fabricator->title}}",@endif
    @if($drug->dependency->pharma)"administrationRoute": "{{$drug->dependency->pharma->title}}"@endif
  }
</script>
@php $is_mobile = true; @endphp


@if($drug->instruction_adaptive->composition && $drug->instruction_adaptive->composition !== '<p><br></p>'
        ||  $drug->instruction_adaptive->indications && $drug->instruction_adaptive->indications !== '<p><br></p>'
        || $drug->instruction_adaptive->contraindications && $drug->instruction_adaptive->contraindications !== '<p><br></p>'
        || $drug->instruction_adaptive->pregnancy && $drug->instruction_adaptive->pregnancy !== '<p><br></p>'
        || $drug->instruction_adaptive->usage_and_dose && $drug->instruction_adaptive->usage_and_dose !== '<p><br></p>'
        || $drug->instruction_adaptive->side_effects && $drug->instruction_adaptive->side_effects !== '<p><br></p>')
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        @if($drug->instruction_adaptive->composition && $drug->instruction_adaptive->composition !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какой состав у препарата {{$drug->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive->composition !!}"
            }
         @if($drug->instruction_adaptive->indications && $drug->instruction_adaptive->indications !== '<p><br></p>'
        || $drug->instruction_adaptive->contraindications && $drug->instruction_adaptive->contraindications !== '<p><br></p>'
        || $drug->instruction_adaptive->pregnancy && $drug->instruction_adaptive->pregnancy !== '<p><br></p>'
        || $drug->instruction_adaptive->usage_and_dose && $drug->instruction_adaptive->usage_and_dose !== '<p><br></p>'
        || $drug->instruction_adaptive->side_effects && $drug->instruction_adaptive->side_effects !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($drug->instruction_adaptive->indications && $drug->instruction_adaptive->indications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какие показания у препарата {{$drug->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive->indications !!}"
            }
          @if($drug->instruction_adaptive->contraindications && $drug->instruction_adaptive->contraindications !== '<p><br></p>'
        || $drug->instruction_adaptive->pregnancy && $drug->instruction_adaptive->pregnancy !== '<p><br></p>'
        || $drug->instruction_adaptive->usage_and_dose && $drug->instruction_adaptive->usage_and_dose !== '<p><br></p>'
        || $drug->instruction_adaptive->side_effects && $drug->instruction_adaptive->side_effects !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($drug->instruction_adaptive->contraindications && $drug->instruction_adaptive->contraindications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какие противопоказания у препарата {{$drug->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive->contraindications !!}"
            }
         @if($drug->instruction_adaptive->pregnancy && $drug->instruction_adaptive->pregnancy !== '<p><br></p>'
        || $drug->instruction_adaptive->usage_and_dose && $drug->instruction_adaptive->usage_and_dose !== '<p><br></p>'
        || $drug->instruction_adaptive->side_effects && $drug->instruction_adaptive->side_effects !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($drug->instruction_adaptive->pregnancy && $drug->instruction_adaptive->pregnancy !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Можно ли принимать препарат {{$drug->title}} беременным?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive->pregnancy !!}"
            }
         @if($drug->instruction_adaptive->usage_and_dose && $drug->instruction_adaptive->usage_and_dose !== '<p><br></p>'
        || $drug->instruction_adaptive->side_effects && $drug->instruction_adaptive->side_effects !== '<p><br></p>')
            },
@else
            }
@endif
    @endif

    @if($drug->instruction_adaptive->usage_and_dose && $drug->instruction_adaptive->usage_and_dose !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Как принимать препарат {{$drug->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive->usage_and_dose !!}"
            }
         @if($drug->instruction_adaptive->side_effects && $drug->instruction_adaptive->side_effects !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($drug->instruction_adaptive->side_effects && $drug->instruction_adaptive->side_effects !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Какие есть побочные действия у препарата {{$drug->title}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive->side_effects !!}"
            }
        }
        @endif
    ]
 }
</script>
@endif


<div class="full-content"
     itemscope itemtype="http://schema.org/Article">
    <link itemprop="mainEntityOfPage" href="{{route('m.ru.drug', ['alias' => $drug->alias])}}" />
    <section class="page-content mp-anchor" id="startPage">
        <div class="row-author">
            <div class="author-data"
                 itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                <div class="author-info">
                    <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($drug->creator->avatar->category_id) . '/medium/' . $drug->creator->avatar->path)}}">
                    <div class="author-name">
                        Автор: {{$drug->creator->surname}} {{$drug->creator->name}} {{$drug->creator->middle_name}}
                    </div>
                    <meta itemprop="name" content="{{$drug->creator->surname}} {{$drug->creator->name}} {{$drug->creator->middle_name}}">
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
                            <link itemprop="sameAs" href="{{route('m.ru.editors')}}/#{{$drug->creator->id}}" />
                            <a target="_blank" href="{{route('m.ru.editors')}}/#{{$drug->creator->id}}">{{$drug->creator->surname}} {{$drug->creator->name}}</a>
                        </div>
                    @endif
                </div>
                @if($drug->creator->editor)
                    <div class="author-specialty">
                        {{$drug->creator->editor->specialty}}
                    </div>
                @endif
            </div>

            <meta itemprop="datePublished" content="{{$drug->created_at}}">
            <meta itemprop="dateModified" content="{{$last_mod}}">
            <time datetime="{{$last_mod->format('Y-m-d H:i:s')}}" class="last-update">
                Дата обновления: {{$last_mod->format('d')}} {{renderNameOfMonth($last_mod->format('M'), 'ru')}} {{$last_mod->format('Y')}}
            </time>
        </div>
        @if(count($drug->dependency->tags) !== 0)
            <div class="row-tags">
                <span class="tag-title">Теги: </span>
                <div class="tag-links">
                    @foreach($drug->dependency->tags as $tag)
                        <a class="tag-link" title="{{$tag->tag->title}}">#{{$tag->tag->title}}</a>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="row-drug-presentation">
            @if($drug->setting->recipe)
                <a href="{{route('m.ru.prescription_conditions')}}" target="_blank" class="recipe-alert">
                    <span class="glyph other"></span>
                    <span class="under-title">Информация об использовании рецептурных препаратов</span>
                </a>
            @endif

            <h1 class="drug-title" itemprop="headline name">{{$drug->title}}
                @if($drug->dependency->inname)
                    ({{$drug->dependency->inname->title}})
                @endif
                инструкция по применению
            </h1>
            <div class="drug-review">
                <div class="review-left">
                    {!! generateRatingStar(getRatingAvarage($reviews), 'Общий рейтинг') !!}
                    @if(getRatingAvarage($reviews) !== 0)<a class="under-title" href="{{route('m.ru.drug.review', ['alias' => $drug->alias])}}">Смотреть отзывы ({{count($reviews)}})</a>@endif
                </div>

                <script>
                    window.reviewTitle = "о препарате {{$drug->title}}"
                    window.reviewAlias = "{{$drug->alias}}"
                </script>
                <div class="review review-right">
                    <review :lang="'ru'"></review>
                </div>
            </div>


            <div class="page-row">
                <div class="el-img">
                    <figure class="avatar">
                        <img src="{{asset('/gallery/' . getCategoryName($drug->image->category_id) . '/medium/' . $drug->image->path)}}" alt="{{$drug->title}} фото, инструкция">
                    </figure>
                    <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($drug->image->category_id) . '/large/' . $drug->image->path)}}">
                    @if($drug->setting->registration_life !== 1)
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
                @if($drug->dosage)
                    <div class="mp-row-present">
                        <h3 class="title-row">Дозировка:</h3>
                        <div class="info-row">{{$drug->dosage}}</div>
                    </div>
                @endif
                @if($drug->dependency->fabricator)
                    <div class="mp-row-present">
                        <h3 class="title-row">Производитель:</h3>
                        <div class="info-row">
                            <a href="{{route('m.ru.catalog.list.fabricator', ['val' => $drug->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                            <a href="{{route('m.ru.catalog.list.fabricator', ['val' => $drug->dependency->fabricator->alias])}}" class="external-link">{{$drug->dependency->fabricator->title}}@if($drug->dependency->fabricator_location), {{$drug->dependency->fabricator_location->title}}@endif</a>
                        </div>
                    </div>
                @endif
                @if($drug->dependency->pharma)
                    <div class="mp-row-present">
                        <h3 class="title-row">Фарм. группа:</h3>
                        <div class="info-row">
                            <a href="{{route('m.ru.catalog.drug.pharma', ['val' => $drug->dependency->pharma->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                            <a href="{{route('m.ru.catalog.drug.pharma', ['val' => $drug->dependency->pharma->alias])}}" class="external-link">{{$drug->dependency->pharma->title}}</a>
                        </div>
                    </div>
                @endif
            </div>
            @include('OLEGYERA.FrontBox.MODULES.banners.cap', ['key_word' => $drug->alias])
        </div>
        @include('OLEGYERA.FrontBox.Drug.modules.anchors.ru')
        <div class="row-drug-accordion">
            <div class="accordion-item open">
                <h2 class="accordion-title mp-anchor" id="adaptive_instruction"
                    itemprop="alternativeHeadline">
                    Адаптированная инструкция
                    <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                </h2>
                <div class="accordion-box">
                    @include('OLEGYERA.FrontBox.Drug.modules.adaptive.ru', ['is_mobile' => $is_mobile])
                </div>
            </div>
            <div class="mp-attention" style="background-color: rgba(245, 56, 102, 0.75); padding: 10px 15px;">
                <h2 style="text-align: center; color: #fff">Внимание</h2>
                <p style="text-align: center; color: #fff">
                    Приведенная научная информация является обобщающей, основана на официально утвержденной инструкции по применению и не может быть использована для принятия решения о возможности применения конкретного лекарственного препарата.
                </p>
            </div>
            <div class="accordion-item open">
                <h2 class="accordion-title mp-anchor" id="official_instruction"
                    itemprop="alternativeHeadline">
                    Официальная инструкция
                    <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                </h2>
                <div class="accordion-box">
                    @include('OLEGYERA.FrontBox.Drug.modules.official.ru', ['is_mobile' => $is_mobile])
                </div>
            </div>
            <div class="accordion-item non-justify open">
                <h2 class="accordion-title mp-anchor" id="otherData"
                    itemprop="alternativeHeadline">
                    Дополнительные данные
                    <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                </h2>
                <div class="accordion-box">
                    @include('OLEGYERA.FrontBox.Drug.modules.additional.ru', ['is_mobile' => $is_mobile])
                </div>
            </div>
            <div class="mp-attention" style="background-color: rgba(245, 56, 102, 0.75); padding: 10px 15px;">
                <h2 style="text-align: center; color: #fff">Внимание</h2>
                <p style="text-align: center; color: #fff">
                    Приведенная научная информация является обобщающей, основана на официально утвержденной инструкции по применению и не может быть использована для принятия решения о возможности применения конкретного лекарственного препарата.
                </p>
            </div>
            <div class="accordion-item open">
                <h2 class="accordion-title mp-anchor" id="editorsData">
                    Редакция
                    <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                </h2>
                <div class="accordion-box">
                    @include('OLEGYERA.FrontBox.MODULES.editors.ru', ['data' => $drug, 'is_mobile' => $is_mobile])
                </div>
            </div>
            @if(count($drug->labels) != 0)
                <div class="accordion-item open">
                    <h2 class="accordion-title">
                        Неправильные названия
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        <div class="mp-row-present">
                            <p style="margin: 0">
                                @foreach($drug->labels as $key => $label)
                                    @if(count($drug->labels) == ($key + 1))
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
    @include('OLEGYERA.FrontBox.MODULES.asides.mobile.ru', ['data' => $drug, 'is_mobile' => $is_mobile])
</div>

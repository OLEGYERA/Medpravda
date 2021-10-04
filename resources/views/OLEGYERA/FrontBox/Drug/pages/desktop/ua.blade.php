@if ($agent->isMobile())
    @php $is_mobile = true; @endphp
@else
    @php $is_mobile = false; @endphp
@endif

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Drug",
  "name": "{{$drug->utitle}} @if($drug->dependency->inname) ({{$drug->dependency->inname->title}}) @endif",
  "url": "{{ route('ua.drug', ['alias' => $drug->alias])}}",
  "image": "{{asset('/gallery/' . getCategoryName($drug->image->category_id) . '/large/' . $drug->image->path)}}",
  "description": "{{mb_strtoupper($drug->utitle) . ' - повна інформація про препарат від виробника з адаптованої, спрощеної інструкцією, списком хвороб, складом, показаннями, протипоказання, побічні дії, передозуванням, аналогами, відгуками.'}}",
  @if(count($drug->dependency->substancesThrough) != 0)
    "activeIngredient": [
    @foreach($drug->dependency->substancesThrough as $key=>$item)
        "{{$item->utitle}}"@if($key + 1 != count($drug->dependency->substancesThrough)),@endif
    @endforeach
    ],
@endif
    "dosageForm": "{{$drug->udosage}}",
  "prescriptionStatus":"@if($drug->setting->recipe == 0)Без рецепта. @else По рецепту. @endif",
  @if($drug->dependency->fabricator)"manufacturer": "{{$drug->dependency->fabricator->utitle}}",@endif
    @if($drug->dependency->pharma)"administrationRoute": "{{$drug->dependency->pharma->utitle}}"@endif
  }
</script>

@if($drug->instruction_adaptive_ua->composition && $drug->instruction_adaptive_ua->composition !== '<p><br></p>'
|| $drug->instruction_adaptive_ua->indications && $drug->instruction_adaptive_ua->indications !== '<p><br></p>'
|| $drug->instruction_adaptive_ua->contraindications && $drug->instruction_adaptive_ua->contraindications !== '<p><br></p>'
|| $drug->instruction_adaptive_ua->pregnancy && $drug->instruction_adaptive_ua->pregnancy !== '<p><br></p>'
|| $drug->instruction_adaptive_ua->usage_and_dose && $drug->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>'
|| $drug->instruction_adaptive_ua->side_effects && $drug->instruction_adaptive_ua->side_effects !== '<p><br></p>')
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        @if($drug->instruction_adaptive_ua->composition && $drug->instruction_adaptive_ua->composition !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Який склад у препарата {{$drug->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive_ua->composition !!}"
            }
         @if($drug->instruction_adaptive_ua->indications && $drug->instruction_adaptive_ua->indications !== '<p><br></p>'
        || $drug->instruction_adaptive_ua->contraindications && $drug->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $drug->instruction_adaptive_ua->pregnancy && $drug->instruction_adaptive_ua->pregnancy !== '<p><br></p>'
        || $drug->instruction_adaptive_ua->usage_and_dose && $drug->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>'
        || $drug->instruction_adaptive_ua->side_effects && $drug->instruction_adaptive_ua->side_effects !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($drug->instruction_adaptive_ua->indications && $drug->instruction_adaptive_ua->indications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Які показання у препарата {{$drug->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive_ua->indications !!}"
            }
          @if($drug->instruction_adaptive_ua->contraindications && $drug->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $drug->instruction_adaptive_ua->pregnancy && $drug->instruction_adaptive_ua->pregnancy !== '<p><br></p>'
        || $drug->instruction_adaptive_ua->usage_and_dose && $drug->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>'
        || $drug->instruction_adaptive_ua->side_effects && $drug->instruction_adaptive_ua->side_effects !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($drug->instruction_adaptive_ua->contraindications && $drug->instruction_adaptive_ua->contraindications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Які протипоказання у препарата {{$drug->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive_ua->contraindications !!}"
            }
         @if($drug->instruction_adaptive_ua->pregnancy && $drug->instruction_adaptive_ua->pregnancy !== '<p><br></p>'
        || $drug->instruction_adaptive_ua->usage_and_dose && $drug->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>'
        || $drug->instruction_adaptive_ua->side_effects && $drug->instruction_adaptive_ua->side_effects !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($drug->instruction_adaptive_ua->pregnancy && $drug->instruction_adaptive_ua->pregnancy !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Чи можна приймати препарат {{$drug->utitle}} вагітним?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive_ua->pregnancy !!}"
            }
         @if($drug->instruction_adaptive_ua->usage_and_dose && $drug->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>'
        || $drug->instruction_adaptive_ua->side_effects && $drug->instruction_adaptive_ua->side_effects !== '<p><br></p>')
            },
@else
            }
@endif
    @endif

    @if($drug->instruction_adaptive_ua->usage_and_dose && $drug->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Як приймати препарат {{$drug->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive_ua->usage_and_dose !!}"
            }
         @if($drug->instruction_adaptive_ua->side_effects && $drug->instruction_adaptive_ua->side_effects !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($drug->instruction_adaptive_ua->side_effects && $drug->instruction_adaptive_ua->side_effects !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Які є побічні дії у препарату {{$drug->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $drug->instruction_adaptive_ua->side_effects !!}"
            }
        }
        @endif
    ]
 }
</script>
@endif


<div class="full-content reactive"
     itemscope itemtype="http://schema.org/Article">
    <link itemprop="mainEntityOfPage" href="{{route('ua.drug', ['alias' => $drug->alias])}}" />
    <div class="triple-wrap">
        <aside class="page-navigation">
            <div class="aside-fixed">
                @include('OLEGYERA.FrontBox.Drug.modules.navigation.ua')
            </div>
        </aside>
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
                                    <link itemprop="sameAs" href="{{route('ua.editors')}}/#{{$drug->creator->id}}" />
                                    <a target="_blank" href="{{route('ua.editors')}}/#{{$drug->creator->id}}">{{$drug->creator->surname}} {{$drug->creator->name}}</a>
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
                    Дата оновлення: {{$last_mod->format('d')}} {{renderNameOfMonth($last_mod->format('M'), 'ua')}} {{$last_mod->format('Y')}}
                </time>
            </div>
            @if(count($drug->dependency->tags) !== 0)
                <div class="row-tags">
                    <span class="tag-title">Теги: </span>
                        @foreach($drug->dependency->tags as $tag)
                            <a class="tag-link" title="{{$tag->tag->utitle}}">#{{$tag->tag->utitle}}</a>
                        @endforeach
                </div>
            @endif
            <div class="row-drug-presentation">
                @if($drug->setting->recipe)
                    <a href="{{route('ua.prescription_conditions')}}" target="_blank" class="recipe-alert">
                        <span class="glyph other"></span>
                        <span class="under-title">Інформація про використання рецептурних препаратів</span>
                    </a>
                @endif
                <h1 itemprop="headline name" class="drug-title @if($drug->setting->recipe) isRecipe @endif">{{$drug->utitle}}
                    @if($drug->dependency->inname)
                        ({{$drug->dependency->inname->title}})
                    @endif
                    інструкція із застосування
                </h1>
                <div class="drug-review">
                    <div class="review-left">
                        {!! generateRatingStar(getRatingAvarage($reviews), 'Загальний рейтинг') !!}
                        @if(getRatingAvarage($reviews) !== 0)<a class="under-title" href="{{route('ua.drug.review', ['alias' => $drug->alias])}}">Дивитися відгуки ({{count($reviews)}})</a>@endif
                    </div>

                    <script>
                        window.reviewTitle = "про препарат {{$drug->title}}"
                        window.reviewAlias = "{{$drug->alias}}"
                    </script>
                    <div class="review review-right">
                        <review :lang="'ua'"></review>
                    </div>
                </div>

                <div class="drug-columns">
                    <div class="el-img">
                        <figure class="avatar">
                            <img src="{{asset('/gallery/' . getCategoryName($drug->image->category_id) . '/small/' . $drug->image->path)}}" alt="{{$drug->title}} фото, інструкція">
                        </figure>
                        <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($drug->image->category_id) . '/large/' . $drug->image->path)}}">
                        @if($drug->setting->registration_life !== 1)
                            <div class="end-registration-life">
                                Немає Реєстрації
                            </div>
                        @endif
                    </div>
                    <div class="drug-intro-dependencies">
                        @if($drug->udosage)
                            <div class="mp-row-present">
                                <div class="title-row">Дозування:</div>
                                <div class="info-row">{{$drug->udosage}}</div>
                            </div>
                        @endif
                        @if($drug->dependency->fabricator)
                            <div class="mp-row-present">
                                <div class="title-row">Виробник:</div>
                                <div class="info-row">
                                    <a href="{{route('ua.catalog.list.fabricator', ['val' => $drug->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                                    <a href="{{route('ua.catalog.list.fabricator', ['val' => $drug->dependency->fabricator->alias])}}" class="external-link">{{$drug->dependency->fabricator->utitle}}@if($drug->dependency->fabricator_location), {{$drug->dependency->fabricator_location->utitle}}@endif</a>
                                </div>
                            </div>
                        @endif
                        @if($drug->dependency->pharma)
                            <div class="mp-row-present">
                                <div class="title-row">Фарм. група:</div>
                                <div class="info-row">
                                    <a href="{{route('ua.catalog.drug.pharma', ['val' => $drug->dependency->pharma->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                                    <a href="{{route('ua.catalog.drug.pharma', ['val' => $drug->dependency->pharma->alias])}}" class="external-link">{{$drug->dependency->pharma->utitle}}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($is_mobile)
                        @include('OLEGYERA.FrontBox.MODULES.banners.cap', ['key_word' => $drug->alias])
                    @endif
                </div>
            </div>
            @include('OLEGYERA.FrontBox.Drug.modules.anchors.ua')
            <div class="row-drug-accordion">
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="adaptive_instruction"
                        itemprop="alternativeHeadline">
                        Адаптована інструкція
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.Drug.modules.adaptive.ua', ['is_mobile' => $is_mobile])
                    </div>
                </div>
                <div class="mp-attention" style="background-color: rgba(245, 56, 102, 0.75); padding: 10px 15px;">
                    <h2 style="text-align: center; color: #fff">Увага</h2>
                    <p style="text-align: justify; color: #fff">
                        Наведена наукова інформація є узагальнюючою, заснована на офіційно затвердженій інструкції по застосуванню і не може бути використана для прийняття рішення про можливість застосування конкретного лікарського препарату.                    </p>
                </div>
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="official_instruction"
                        itemprop="alternativeHeadline">
                        Офіційна інструкція
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.Drug.modules.official.ua', ['is_mobile' => $is_mobile])
                    </div>
                </div>
                <div class="accordion-item non-justify open">
                    <h2 class="accordion-title mp-anchor" id="otherData"
                        itemprop="alternativeHeadline">
                        Додаткові дані
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.Drug.modules.additional.ua', ['is_mobile' => $is_mobile])
                    </div>
                </div>
                <div class="mp-attention" style="background-color: rgba(245, 56, 102, 0.75); padding: 10px 15px;">
                    <h2 style="text-align: center; color: #fff">Увага</h2>
                    <p style="text-align: justify; color: #fff">
                        Наведена наукова інформація є узагальнюючою, заснована на офіційно затвердженій інструкції по застосуванню і не може бути використана для прийняття рішення про можливість застосування конкретного лікарського препарату.                    </p>
                </div>
                @if(count($terms) != 0)
                    <div class="accordion-item open">
                        <h2 class="accordion-title mp-anchor" id="official_instruction"
                            itemprop="alternativeHeadline">
                            Термінологія
                            <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                            <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </h2>
                        <div class="accordion-box">
                            @include('OLEGYERA.FrontBox.Drug.modules.terms.ua')
                        </div>
                    </div>
                @endif
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="editorsData">
                        Редакція
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.MODULES.editors.ua', ['data' => $drug, 'is_mobile' => $is_mobile])
                    </div>
                </div>
                @if(count($drug->labels) != 0)
                    <div class="accordion-item open">
                        <h2 class="accordion-title">
                            Неправильні назви
                            <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                            <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </h2>
                        <div class="accordion-box">
                            <div class="mp-row-present">
                                <p style="margin: 0">
                                    @foreach($drug->labels as $key => $label)
                                        @if(count($drug->labels) == ($key + 1))
                                            {{$label->utitle}}.
                                        @else
                                            {{$label->utitle}},
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        @include('OLEGYERA.FrontBox.MODULES.asides.desktop.ua', ['data' => $drug, 'is_mobile' => $is_mobile])
    </div>
</div>

@if ($agent->isMobile())
    @php $is_mobile = true; @endphp
@else
    @php $is_mobile = false; @endphp
@endif

<script type="application/ld+json">
{
"@context": "https://schema.org/",
"@type": "Drug",
"name": "{{$cosmetic->utitle}}",
"url": "{{ route('ua.cosmetic', ['alias' => $cosmetic->alias])}}",
"image": "{{asset('/gallery/' . getCategoryName($cosmetic->image->category_id) . '/large/' . $cosmetic->image->path)}}",
"description": "{{mb_strtoupper($cosmetic->utitle) . ' - повна інформація про косметичний засіб від виробника з адаптованої, спрощеної інструкцією, списком хвороб, складом, показаннями, протипоказання, побічні дії, передозуванням, аналогами, відгуками.'}}",
"dosageForm": "{{$cosmetic->udosage}}",
@if($cosmetic->dependency->fabricator)"manufacturer": "{{$cosmetic->dependency->fabricator->utitle}}"@endif
    }
</script>

@if($cosmetic->instruction_adaptive_ua->composition && $cosmetic->instruction_adaptive_ua->composition !== '<p><br></p>'
 || $cosmetic->instruction_adaptive_ua->pharma_props && $cosmetic->instruction_adaptive_ua->pharma_props !== '<p><br></p>'
       || $cosmetic->instruction_adaptive_ua->indications && $cosmetic->instruction_adaptive_ua->indications !== '<p><br></p>'
       || $cosmetic->instruction_adaptive_ua->contraindications && $cosmetic->instruction_adaptive_ua->contraindications !== '<p><br></p>'
       || $cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        @if($cosmetic->instruction_adaptive_ua->composition && $cosmetic->instruction_adaptive_ua->composition !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Який склад у косметичного засобу {{$cosmetic->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive_ua->composition !!}"
            }
         @if($cosmetic->instruction_adaptive_ua->pharma_props && $cosmetic->instruction_adaptive_ua->pharma_props !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->indications && $cosmetic->instruction_adaptive_ua->indications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->contraindications && $cosmetic->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($cosmetic->instruction_adaptive_ua->pharma_props && $cosmetic->instruction_adaptive_ua->pharma_props !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Які властивості у косметичного засобу {{$cosmetic->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive_ua->pharma_props !!}"
            }
          @if($cosmetic->instruction_adaptive_ua->indications && $cosmetic->instruction_adaptive_ua->indications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->contraindications && $cosmetic->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($cosmetic->instruction_adaptive_ua->indications && $cosmetic->instruction_adaptive_ua->indications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Для чого потрібно застосовувати косметичний засіб {{$cosmetic->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive_ua->indications !!}"
            }
         @if($cosmetic->instruction_adaptive_ua->contraindications && $cosmetic->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($cosmetic->instruction_adaptive_ua->contraindications && $cosmetic->instruction_adaptive_ua->contraindications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Які протипоказання у косметичного засобу {{$cosmetic->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive_ua->contraindications !!}"
            }
         @if($cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
@else
            }
@endif
    @endif

    @if($cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Як застосовувати косметичний засіб {{$cosmetic->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $cosmetic->instruction_adaptive_ua->usage_and_dose !!}"
            }
        }
        @endif
    ]
 }
</script>
@endif


<div class="full-content reactive"
     itemscope itemtype="http://schema.org/Article">
    <link itemprop="mainEntityOfPage" href="{{route('ua.cosmetic', ['alias' => $cosmetic->alias])}}" />
    <div class="triple-wrap">
        <aside class="page-navigation">
            <div class="aside-fixed">
                @include('OLEGYERA.FrontBox.Cosmetic.modules.navigation.ua')
            </div>
        </aside>
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
                                <link itemprop="sameAs" href="{{route('ua.editors')}}/#{{$cosmetic->creator->id}}" />
                                <a target="_blank" href="{{route('ua.editors')}}/#{{$cosmetic->creator->id}}">{{$cosmetic->creator->surname}} {{$cosmetic->creator->name}}</a>
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
                    Дата оновлення: {{$last_mod->format('d')}} {{renderNameOfMonth($last_mod->format('M'), 'ua')}} {{$last_mod->format('Y')}}
                </time>
            </div>
            @if(count($cosmetic->dependency->tags) !== 0)
                <div class="row-tags">
                    <span class="tag-title">Теги: </span>
                    @foreach($cosmetic->dependency->tags as $tag)
                        <a class="tag-link" title="{{$tag->tag->utitle}}">#{{$tag->tag->utitle}}</a>
                    @endforeach
                </div>
            @endif
            <div class="row-drug-presentation">
                <h1 itemprop="headline name" class="bad-title">{{$cosmetic->utitle}}
                    @if($cosmetic->dependency->inname)
                        ({{$cosmetic->dependency->inname->title}})
                    @endif
                </h1>
                <div class="drug-columns">
                    <div class="el-img">
                        <figure class="avatar">
                            <img src="{{asset('/gallery/' . getCategoryName($cosmetic->image->category_id) . '/small/' . $cosmetic->image->path)}}" alt="{{$cosmetic->image->alt}}">
                        </figure>
                        <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($cosmetic->image->category_id) . '/large/' . $cosmetic->image->path)}}">
                        @if($cosmetic->setting->registration_life !== 1)
                            <div class="end-registration-life">
                                Немає Реєстрації
                            </div>
                        @endif
                    </div>
                    <div class="drug-intro-dependencies">
                        @if($cosmetic->udosage)
                            <div class="mp-row-present">
                                <div class="title-row">Дозування:</div>
                                <div class="info-row">{{$cosmetic->udosage}}</div>
                            </div>
                        @endif
                        @if($cosmetic->dependency->fabricator)
                            <div class="mp-row-present">
                                <div class="title-row">Виробник:</div>
                                <div class="info-row">
                                    <a href="{{route('ua.catalog.list.fabricator', ['val' => $cosmetic->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                                    <a href="{{route('ua.catalog.list.fabricator', ['val' => $cosmetic->dependency->fabricator->alias])}}" class="external-link">{{$cosmetic->dependency->fabricator->utitle}}@if($cosmetic->dependency->fabricator_location), {{$cosmetic->dependency->fabricator_location->utitle}}@endif</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($is_mobile)
                        @include('OLEGYERA.FrontBox.MODULES.banners.cap', ['key_word' => $cosmetic->alias])
                    @endif
                </div>
            </div>
            @include('OLEGYERA.FrontBox.Cosmetic.modules.anchors.ua')
            <div class="row-drug-accordion">
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="adaptive_instruction"
                        itemprop="alternativeHeadline">
                        Адаптована інструкція
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.Cosmetic.modules.adaptive.ua', ['is_mobile' => $is_mobile])
                    </div>
                </div>
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="official_instruction"
                        itemprop="alternativeHeadline">
                        Офіційна інструкція
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.Cosmetic.modules.official.ua', ['is_mobile' => $is_mobile])
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
                        @include('OLEGYERA.FrontBox.Cosmetic.modules.additional.ua', ['is_mobile' => $is_mobile])
                    </div>
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
                        @include('OLEGYERA.FrontBox.MODULES.editors.ua', ['data' => $cosmetic, 'is_mobile' => $is_mobile])
                    </div>
                </div>
                @if(count($cosmetic->labels) != 0)
                    <div class="accordion-item open">
                        <h2 class="accordion-title">
                            Неправильні назви
                            <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                            <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </h2>
                        <div class="accordion-box">
                            <div class="mp-row-present">
                                <p style="margin: 0">
                                    @foreach($cosmetic->labels as $key => $label)
                                        @if(count($cosmetic->labels) == ($key + 1))
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
        @include('OLEGYERA.FrontBox.MODULES.asides.desktop.ua', ['data' => $cosmetic, 'is_mobile' => $is_mobile])
    </div>
</div>

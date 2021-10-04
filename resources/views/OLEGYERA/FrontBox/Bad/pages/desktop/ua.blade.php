@if ($agent->isMobile())
    @php $is_mobile = true; @endphp
@else
    @php $is_mobile = false; @endphp
@endif

<script type="application/ld+json">
{
"@context": "https://schema.org/",
"@type": "Drug",
"name": "{{$bad->utitle}}",
"url": "{{ route('ua.bad', ['alias' => $bad->alias])}}",
"image": "{{asset('/gallery/' . getCategoryName($bad->image->category_id) . '/large/' . $bad->image->path)}}",
"description": "{{mb_strtoupper($bad->utitle) . ' - повна інформація про дієтичну добавку від виробника з адаптованої, спрощеної інструкцією, списком хвороб, складом, показаннями, протипоказання, побічні дії, передозуванням, аналогами, відгуками.'}}",
"dosageForm": "{{$bad->udosage}}",
@if($bad->dependency->fabricator)"manufacturer": "{{$bad->dependency->fabricator->utitle}}"@endif
}
</script>

@if($bad->instruction_adaptive_ua->composition && $bad->instruction_adaptive_ua->composition !== '<p><br></p>'
        || $bad->instruction_adaptive_ua->pharma_props && $bad->instruction_adaptive_ua->pharma_props !== '<p><br></p>'
        || $bad->instruction_adaptive_ua->indications && $bad->instruction_adaptive_ua->indications !== '<p><br></p>'
        || $bad->instruction_adaptive_ua->contraindications && $bad->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $bad->instruction_adaptive_ua->usage_and_dose && $bad->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        @if($bad->instruction_adaptive_ua->composition && $bad->instruction_adaptive_ua->composition !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Який склад у дієтичної добавки {{$bad->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $bad->instruction_adaptive_ua->composition !!}"
            }
         @if($bad->instruction_adaptive_ua->pharma_props && $bad->instruction_adaptive_ua->pharma_props !== '<p><br></p>'
        || $bad->instruction_adaptive_ua->indications && $bad->instruction_adaptive_ua->indications !== '<p><br></p>'
        || $bad->instruction_adaptive_ua->contraindications && $bad->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $bad->instruction_adaptive_ua->usage_and_dose && $bad->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($bad->instruction_adaptive_ua->pharma_props && $bad->instruction_adaptive_ua->pharma_props !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Які властивості у дієтичної добавки {{$bad->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $bad->instruction_adaptive_ua->pharma_props !!}"
            }
          @if($bad->instruction_adaptive_ua->indications && $bad->instruction_adaptive_ua->indications !== '<p><br></p>'
        || $bad->instruction_adaptive_ua->contraindications && $bad->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $bad->instruction_adaptive_ua->usage_and_dose && $bad->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($bad->instruction_adaptive_ua->indications && $bad->instruction_adaptive_ua->indications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Для чого потрібно приймати дієтичну добавку {{$bad->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $bad->instruction_adaptive_ua->indications !!}"
            }
         @if($bad->instruction_adaptive_ua->contraindications && $bad->instruction_adaptive_ua->contraindications !== '<p><br></p>'
        || $bad->instruction_adaptive_ua->usage_and_dose && $bad->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
         @else
            }
         @endif
    @endif

    @if($bad->instruction_adaptive_ua->contraindications && $bad->instruction_adaptive_ua->contraindications !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Які протипоказання у дієтичної добавки {{$bad->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $bad->instruction_adaptive_ua->contraindications !!}"
            }
         @if($bad->instruction_adaptive_ua->usage_and_dose && $bad->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            },
@else
            }
@endif
    @endif

    @if($bad->instruction_adaptive_ua->usage_and_dose && $bad->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
        {
            "@type": "Question",
            "name": "Як приймати дієтичну добавку {{$bad->utitle}}?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "{!! $bad->instruction_adaptive_ua->usage_and_dose !!}"
            }
        }
        @endif
    ]
 }
</script>
@endif



<div class="full-content reactive"
     itemscope itemtype="http://schema.org/Article">
    <link itemprop="mainEntityOfPage" href="{{route('ua.bad', ['alias' => $bad->alias])}}" />
    <div class="triple-wrap">
        <aside class="page-navigation">
            <div class="aside-fixed">
                @include('OLEGYERA.FrontBox.Bad.modules.navigation.ua')
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
                                    <link itemprop="sameAs" href="{{route('ua.editors')}}/#{{$bad->creator->id}}" />
                                    <a target="_blank" href="{{route('ua.editors')}}/#{{$bad->creator->id}}">{{$bad->creator->surname}} {{$bad->creator->name}}</a>
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
                    Дата оновлення: {{$last_mod->format('d')}} {{renderNameOfMonth($last_mod->format('M'), 'ua')}} {{$last_mod->format('Y')}}
                </time>
            </div>
            @if(count($bad->dependency->tags) !== 0)
                <div class="row-tags">
                    <span class="tag-title">Теги: </span>
                    @foreach($bad->dependency->tags as $tag)
                        <a class="tag-link" title="{{$tag->tag->utitle}}">#{{$tag->tag->utitle}}</a>
                    @endforeach
                </div>
            @endif
            <div class="row-drug-presentation">
                <h1 itemprop="headline name" class="bad-title">{{$bad->utitle}}
                    @if($bad->dependency->inname)
                        ({{$bad->dependency->inname->title}})
                    @endif
                </h1>
                <div class="drug-columns">
                    <div class="el-img">
                        <figure class="avatar">
                            <img src="{{asset('/gallery/' . getCategoryName($bad->image->category_id) . '/small/' . $bad->image->path)}}" alt="{{$bad->image->alt}}">
                        </figure>
                        <link itemprop="image" href="{{asset('/gallery/' . getCategoryName($bad->image->category_id) . '/large/' . $bad->image->path)}}">
                        @if($bad->setting->registration_life !== 1)
                            <div class="end-registration-life">
                                Немає Реєстрації
                            </div>
                        @endif
                    </div>
                    <div class="drug-intro-dependencies">
                        @if($bad->udosage)
                            <div class="mp-row-present">
                                <div class="title-row">Дозування:</div>
                                <div class="info-row">{{$bad->udosage}}</div>
                            </div>
                        @endif
                        @if($bad->dependency->fabricator)
                            <div class="mp-row-present">
                                <div class="title-row">Виробник:</div>
                                <div class="info-row">
                                    <a href="{{route('ua.catalog.list.fabricator', ['val' => $bad->dependency->fabricator->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                                    <a href="{{route('ua.catalog.list.fabricator', ['val' => $bad->dependency->fabricator->alias])}}" class="external-link">{{$bad->dependency->fabricator->utitle}}@if($bad->dependency->fabricator_location), {{$bad->dependency->fabricator_location->utitle}}@endif</a>
                                </div>
                            </div>
                        @endif
                        @if($bad->dependency->pharma)
                            <div class="mp-row-present">
                                <div class="title-row">Група:</div>
                                <div class="info-row">
                                    <a href="{{route('ua.catalog.bad.pharma_bad', ['val' => $bad->dependency->pharma->alias])}}" target="_blank" class="link-blank"><span class="glyph blank_link"></span></a>
                                    <a href="{{route('ua.catalog.bad.pharma_bad', ['val' => $bad->dependency->pharma->alias])}}" class="external-link">{{$bad->dependency->pharma->utitle}}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($is_mobile)
                        @include('OLEGYERA.FrontBox.MODULES.banners.cap', ['key_word' => $bad->alias])
                    @endif
                </div>
            </div>
            @include('OLEGYERA.FrontBox.Bad.modules.anchors.ua')
            <div class="row-drug-accordion">
                <div class="accordion-item open">
                    <h2 class="accordion-title mp-anchor" id="adaptive_instruction"
                        itemprop="alternativeHeadline">
                        Адаптована інструкція
                        <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                        <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                    </h2>
                    <div class="accordion-box">
                        @include('OLEGYERA.FrontBox.Bad.modules.adaptive.ua', ['is_mobile' => $is_mobile])
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
                        @include('OLEGYERA.FrontBox.Bad.modules.official.ua', ['is_mobile' => $is_mobile])
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
                        @include('OLEGYERA.FrontBox.Bad.modules.additional.ua', ['is_mobile' => $is_mobile])
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
                        @include('OLEGYERA.FrontBox.MODULES.editors.ua', ['data' => $bad, 'is_mobile' => $is_mobile])
                    </div>
                </div>
                @if(count($bad->labels) != 0)
                    <div class="accordion-item open">
                        <h2 class="accordion-title">
                            Неправильні назви
                            <svg class="arrow-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                            <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </h2>
                        <div class="accordion-box">
                            <div class="mp-row-present">
                                <p style="margin: 0">
                                    @foreach($bad->labels as $key => $label)
                                        @if(count($bad->labels) == ($key + 1))
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
        @include('OLEGYERA.FrontBox.MODULES.asides.desktop.ua', ['data' => $bad, 'is_mobile' => $is_mobile])
    </div>
</div>

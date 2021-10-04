@if($drug->instruction->composition && $drug->instruction->composition !== '<p><br></p>')
    <div class="mp-row-present" id="official_composition">
        <h3 class="title-row" itemprop="name">
            <span class="glyph composition"></span>
            Состав:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->composition !!}</div>
    </div>
@endif
@if($drug->dependency->form)
    <div class="mp-row-present" id="official_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph dosage_form"></span>
            Лекарственная форма:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{{$drug->dependency->form->title}}</p></div>
    </div>
@endif
@if($drug->instruction->physical_chemical && $drug->instruction->physical_chemical !== '<p><br></p>')
    <div class="mp-row-present" id="official_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph physical_chemical"></span>
            Основные физико-химические свойства:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{!! $drug->instruction->physical_chemical !!}</p></div>
    </div>
@endif
@if($drug->dependency->fabricator)
    <div class="mp-row-present" id="official_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="glyph fabricator"></span>
            Производитель:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{{$drug->dependency->fabricator->title}}</p></div>
    </div>
@endif

@if($drug->dependency->fabricator_location)
    <div class="mp-row-present" id="official_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="glyph fabricator_location"></span>
            Местонахождение производителя:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{{$drug->dependency->fabricator_location->title}}</p></div>
    </div>
@endif

@if($drug->dependency->pharma)
    <div class="mp-row-present" id="official_pharma">
        <h3 class="title-row" itemprop="name">
            <span class="glyph dosage_form"></span>
            Фармакотерапевтическая группа:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{{$drug->dependency->pharma->title}}</p></div>
    </div>
@endif
@if($drug->instruction->pharma_props && $drug->instruction->pharma_props !== '<p><br></p>')
    <div class="mp-row-present" id="official_pharma_props">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pharma_props"></span>
            Фармакологические свойства:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->pharma_props !!}</div>
    </div>
@endif
@if($drug->instruction->indications && $drug->instruction->indications !== '<p><br></p>')
    <div class="mp-row-present" id="official_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph indications"></span>
            Показания к применению:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->indications !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn2', ['key_word' => $drug->alias])
@endif
@if($drug->instruction->contraindications && $drug->instruction->contraindications !== '<p><br></p>')
    <div class="mp-row-present" id="official_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Противопоказания:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->contraindications !!}</div>
    </div>
@endif
@if($drug->instruction->security && $drug->instruction->security !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Надлежащие меры безопасности при применении:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->security !!}</div>
    </div>
@endif
@if($drug->instruction->features && $drug->instruction->features !== '<p><br></p>')
    <div class="mp-row-present" id="official_features">
        <h3 class="title-row" itemprop="name">
            <span class="glyph features"></span>
            Особенности применения:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->features !!}</div>
    </div>
@endif
@if($drug->instruction->pregnancy && $drug->instruction->pregnancy !== '<p><br></p>')
    <div class="mp-row-present" id="official_pregnancy">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pregnancy"></span>
            Применение в период беременности или кормления грудью:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->pregnancy !!}</div>
    </div>
@endif
@if($drug->instruction->driver && $drug->instruction->driver !== '<p><br></p>')
    <div class="mp-row-present" id="official_driver">
        <h3 class="title-row" itemprop="name">
            <span class="glyph driver"></span>
            Способность влиять на скорость реакции при управлении автотранспортом:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->driver !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn3', ['key_word' => $drug->alias])
@endif
@if($drug->instruction->children && $drug->instruction->children !== '<p><br></p>')
    <div class="mp-row-present" id="official_children">
        <h3 class="title-row" itemprop="name">
            <span class="glyph children"></span>
            Дети:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->children !!}</div>
    </div>
@endif
@if($drug->instruction->usage_and_dose && $drug->instruction->usage_and_dose !== '<p><br></p>')
    <div class="mp-row-present" id="official_usage_and_dose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph usage_and_dose"></span>
            Способ применения и дозы:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->usage_and_dose !!}</div>
    </div>
@endif
@if($drug->instruction->overdose && $drug->instruction->overdose !== '<p><br></p>')
    <div class="mp-row-present" id="official_overdose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph overdose"></span>
            Передозировка:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->overdose !!}</div>
    </div>
@endif
@if($drug->instruction->side_effects && $drug->instruction->side_effects !== '<p><br></p>')
    <div class="mp-row-present" id="official_side_effects">
        <h3 class="title-row" itemprop="name">
            <span class="glyph side_effects"></span>
            Побочные действия:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->side_effects !!}</div>
    </div>
@endif
@if($drug->instruction->interaction && $drug->instruction->interaction !== '<p><br></p>')
    <div class="mp-row-present" id="official_interaction">
        <h3 class="title-row" itemprop="name">
            <span class="glyph interaction"></span>
            Лекарственное взаимодействие:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->interaction !!}</div>
    </div>
@endif
@if($drug->instruction->time_life && $drug->instruction->time_life !== '<p><br></p>')
    <div class="mp-row-present" id="official_time_life">
        <h3 class="title-row" itemprop="name">
            <span class="glyph time_life"></span>
            Срок годности:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->time_life !!}</div>
    </div>
@endif
@if($drug->instruction->storage_conditions && $drug->instruction->storage_conditions !== '<p><br></p>')
    <div class="mp-row-present" id="official_storage_conditions">
        <h3 class="title-row" itemprop="name">
            <span class="glyph storage_conditions"></span>
            Условия хранения:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->storage_conditions !!}</div>
    </div>
@endif
@if($drug->instruction->release_form && $drug->instruction->release_form !== '<p><br></p>')
    <div class="mp-row-present" id="official_release_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph release_form"></span>
            Форма выпуска / упаковка:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->release_form !!}</div>
    </div>
@endif
<div class="mp-row-present" id="official_recipe">
    <h3 class="title-row" itemprop="name">
        <span class="glyph recipe"></span>
        Категория отпуска:
    </h3>
    <div class="info-row" itemprop="articleSection"><p>@if($drug->setting->recipe == 0) Без рецепта. @else По рецепту. @endif</p></div>
</div>
@if($drug->instruction->other && $drug->instruction->other !== '<p><br></p>')
    <div class="mp-row-present" id="official_other">
        <h3 class="title-row" itemprop="name">
            <span class="glyph other"></span>
            Дополнительно:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction->other !!}</div>
    </div>
@endif

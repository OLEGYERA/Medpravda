@if($drug->instruction_adaptive->composition && $drug->instruction_adaptive->composition !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_composition">
        <h3 class="title-row" itemprop="name">
            <span class="glyph composition"></span>
            Состав:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->composition !!}</div>
    </div>
@endif
@if($drug->dependency->form)
    <div class="mp-row-present" id="adaptive_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph dosage_form"></span>
            Лекарственная форма:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{{$drug->dependency->form->title}}</p></div>
    </div>
@endif
@if($drug->dependency->fabricator)
    <div class="mp-row-present" id="adaptive_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="glyph fabricator"></span>
            Производитель:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>Непосредственное производство: {{$drug->dependency->fabricator->title}}@if($drug->dependency->fabricator_location), {{$drug->dependency->fabricator_location->full_title}}@endif </p></div>
    </div>
@endif
@if($drug->dependency->pharma)
    <div class="mp-row-present" id="adaptive_pharma">
        <h3 class="title-row" itemprop="name">
            <span class="glyph dosage_form"></span>
            Фармакотерапевтическая группа:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{{$drug->dependency->pharma->title}}</p></div>
    </div>
@endif
@if($drug->instruction_adaptive->pharma_props && $drug->instruction_adaptive->pharma_props !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_pharma_props">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pharma_props"></span>
            Фармакологические свойства:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->pharma_props !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->indications && $drug->instruction_adaptive->indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph indications"></span>
            Показания к применению:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->indications !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn1', ['key_word' => $drug->alias])
@endif
@if($drug->instruction_adaptive->contraindications && $drug->instruction_adaptive->contraindications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Противопоказания:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->contraindications !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->security && $drug->instruction_adaptive->security !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_security">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Надлежащие меры безопасности при применении:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->security !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->features && $drug->instruction_adaptive->features !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_features">
        <h3 class="title-row" itemprop="name">
            <span class="glyph features"></span>
            Особенности применения:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->features !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->pregnancy && $drug->instruction_adaptive->pregnancy !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_pregnancy">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pregnancy"></span>
            Применение в период беременности или кормления грудью:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->pregnancy !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->driver && $drug->instruction_adaptive->driver !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_driver">
        <h3 class="title-row" itemprop="name">
            <span class="glyph driver"></span>
            Способность влиять на скорость реакции при управлении автотранспортом:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->driver !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->children && $drug->instruction_adaptive->children !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_children">
        <h3 class="title-row" itemprop="name">
            <span class="glyph children"></span>
            Дети:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->children !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->usage_and_dose && $drug->instruction_adaptive->usage_and_dose !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_usage_and_dose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph usage_and_dose"></span>
            Способ применения и дозы:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->usage_and_dose !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.second_cap', ['key_word' => $drug->alias])
@endif
@if($drug->instruction_adaptive->overdose && $drug->instruction_adaptive->overdose !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_overdose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph overdose"></span>
            Передозировка:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->overdose !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->side_effects && $drug->instruction_adaptive->side_effects !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_side_effects">
        <h3 class="title-row" itemprop="name">
            <span class="glyph side_effects"></span>
            Побочные действия:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->side_effects !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->interaction && $drug->instruction_adaptive->interaction !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_interaction">
        <h3 class="title-row" itemprop="name">
            <span class="glyph interaction"></span>
            Лекарственное взаимодействие:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->interaction !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->time_life && $drug->instruction_adaptive->time_life !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_time_life">
        <h3 class="title-row" itemprop="name">
            <span class="glyph time_life"></span>
            Срок годности:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->time_life !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->storage_conditions && $drug->instruction_adaptive->storage_conditions !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_storage_conditions">
        <h3 class="title-row" itemprop="name">
            <span class="glyph storage_conditions"></span>
            Условия хранения:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->storage_conditions !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive->release_form && $drug->instruction_adaptive->release_form !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_release_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph release_form"></span>
            Форма выпуска / упаковка:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->release_form !!}</div>
    </div>
@endif
<div class="mp-row-present" id="adaptive_recipe">
    <h3 class="title-row" itemprop="name">
        <span class="glyph recipe"></span>
        Категория отпуска:
    </h3>
    <div class="info-row" itemprop="articleSection"><p>@if($drug->setting->recipe == 0) Без рецепта. @else По рецепту. @endif</p></div>
</div>
@if($drug->instruction_adaptive->other && $drug->instruction_adaptive->other !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_other">
        <h3 class="title-row" itemprop="name">
            <span class="glyph other"></span>
            Дополнительно:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive->other !!}</div>
    </div>
@endif

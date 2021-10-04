@if($cosmetic->instruction->composition && $cosmetic->instruction->composition !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_composition">
        <h3 class="title-row" itemprop="name">
            <span class="glyph composition"></span>
            Состав:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction->composition !!}</div>
    </div>
@endif
@if($cosmetic->instruction->pharma_props && $cosmetic->instruction->pharma_props !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_pharma_props">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pharma_props"></span>
            Cвойства:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction->pharma_props !!}</div>
    </div>
@endif
@if($cosmetic->instruction->indications && $cosmetic->instruction->indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph indications"></span>
            Рекомендации по применению:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction->indications !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn2', ['key_word' => $cosmetic->alias])
@endif
@if($cosmetic->instruction->special_indications && $cosmetic->instruction->special_indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph recipe"></span>
            Особые указания:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction->special_indications !!}</div>
    </div>
@endif
@if($cosmetic->instruction->contraindications && $cosmetic->instruction->contraindications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Противопоказания:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction->contraindications !!}</div>
    </div>
@endif
@if($cosmetic->instruction->usage_and_dose && $cosmetic->instruction->usage_and_dose !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_usage_and_dose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph usage_and_dose"></span>
            Способ применения и дозы:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction->usage_and_dose !!}</div>
    </div>
@endif
@if($cosmetic->instruction->storage_conditions && $cosmetic->instruction->storage_conditions !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_storage_conditions">
        <h3 class="title-row" itemprop="name">
            <span class="glyph storage_conditions"></span>
            Условия хранения:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction->storage_conditions !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn3', ['key_word' => $cosmetic->alias])
@endif
@if($cosmetic->instruction->release_form && $cosmetic->instruction->release_form !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_release_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph release_form"></span>
            Форма выпуска / упаковка:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction->release_form !!}</div>
    </div>
@endif
@if($cosmetic->dependency->fabricator)
    <div class="mp-row-present" id="adaptive_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="glyph fabricator"></span>
            Производитель:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>Непосредственное производство: {{$cosmetic->dependency->fabricator->title}}@if($cosmetic->dependency->fabricator_location), {{$cosmetic->dependency->fabricator_location->full_title}}@endif </p></div>
    </div>
@endif
@if($cosmetic->instruction->other && $cosmetic->instruction->other !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_other">
        <h3 class="title-row" itemprop="name">
            <span class="glyph other"></span>
            Дополнительно:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction->other !!}</div>
    </div>
@endif

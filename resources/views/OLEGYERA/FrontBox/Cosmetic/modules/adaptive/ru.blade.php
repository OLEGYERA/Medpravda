@if($cosmetic->instruction_adaptive->composition && $cosmetic->instruction_adaptive->composition !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_composition">
        <h3 class="title-row" itemprop="name">
            <span class="glyph composition"></span>
            Состав:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive->composition !!}</div>
    </div>
@endif
@if($cosmetic->instruction_adaptive->pharma_props && $cosmetic->instruction_adaptive->pharma_props !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_pharma_props">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pharma_props"></span>
            Cвойства:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive->pharma_props !!}</div>
    </div>
@endif
@if($cosmetic->instruction_adaptive->indications && $cosmetic->instruction_adaptive->indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph indications"></span>
            Рекомендации по применению:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive->indications !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn1', ['key_word' => $cosmetic->alias])
@endif
@if($cosmetic->instruction_adaptive->special_indications && $cosmetic->instruction_adaptive->special_indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_individual">
        <h3 class="title-row" itemprop="name">
            <span class="glyph recipe"></span>
            Особые указания:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive->special_indications !!}</div>
    </div>
@endif
@if($cosmetic->instruction_adaptive->contraindications && $cosmetic->instruction_adaptive->contraindications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Противопоказания:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive->contraindications !!}</div>
    </div>
@endif
@if($cosmetic->instruction_adaptive->usage_and_dose && $cosmetic->instruction_adaptive->usage_and_dose !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_usage_and_dose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph usage_and_dose"></span>
            Способ применения и дозы:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive->usage_and_dose !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.second_cap', ['key_word' => $cosmetic->alias])
@endif
@if($cosmetic->instruction_adaptive->storage_conditions && $cosmetic->instruction_adaptive->storage_conditions !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_storage_conditions">
        <h3 class="title-row" itemprop="name">
            <span class="glyph storage_conditions"></span>
            Условия хранения:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive->storage_conditions !!}</div>
    </div>
@endif
@if($cosmetic->instruction_adaptive->release_form && $cosmetic->instruction_adaptive->release_form !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_release_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph release_form"></span>
            Форма выпуска / упаковка:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive->release_form !!}</div>
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
@if($cosmetic->instruction_adaptive->other && $cosmetic->instruction_adaptive->other !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_other">
        <h3 class="title-row" itemprop="name">
            <span class="glyph other"></span>
            Дополнительно:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive->other !!}</div>
    </div>
@endif

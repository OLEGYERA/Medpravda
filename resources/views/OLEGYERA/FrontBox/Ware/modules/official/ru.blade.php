@if($ware->instruction->composition && $ware->instruction->composition !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_composition">
        <h3 class="title-row" itemprop="name">
            <span class="glyph composition"></span>
            Состав:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction->composition !!}</div>
    </div>
@endif
@if($ware->instruction->pharma_props && $ware->instruction->pharma_props !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_pharma_props">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pharma_props"></span>
            Cвойства:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction->pharma_props !!}</div>
    </div>
@endif
@if($ware->instruction->indications && $ware->instruction->indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph indications"></span>
            Рекомендации по применению:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction->indications !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn2', ['key_word' => $ware->alias])
@endif
@if($ware->instruction->special_indications && $ware->instruction->special_indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph recipe"></span>
            Особые указания:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction->special_indications !!}</div>
    </div>
@endif
@if($ware->instruction->contraindications && $ware->instruction->contraindications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Противопоказания:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction->contraindications !!}</div>
    </div>
@endif
@if($ware->instruction->usage_and_dose && $ware->instruction->usage_and_dose !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_usage_and_dose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph usage_and_dose"></span>
            Способ применения и дозы:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction->usage_and_dose !!}</div>
    </div>
@endif
@if($ware->instruction->storage_conditions && $ware->instruction->storage_conditions !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_storage_conditions">
        <h3 class="title-row" itemprop="name">
            <span class="glyph storage_conditions"></span>
            Условия хранения:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction->storage_conditions !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn3', ['key_word' => $ware->alias])
@endif
@if($ware->instruction->release_form && $ware->instruction->release_form !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_release_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph release_form"></span>
            Форма выпуска / упаковка:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction->release_form !!}</div>
    </div>
@endif
@if($ware->dependency->fabricator)
    <div class="mp-row-present" id="adaptive_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="glyph fabricator"></span>
            Производитель:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>Непосредственное производство: {{$ware->dependency->fabricator->title}}@if($ware->dependency->fabricator_location), {{$ware->dependency->fabricator_location->full_title}}@endif </p></div>
    </div>
@endif
@if($ware->instruction->other && $ware->instruction->other !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_other">
        <h3 class="title-row" itemprop="name">
            <span class="glyph other"></span>
            Дополнительно:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction->other !!}</div>
    </div>
@endif

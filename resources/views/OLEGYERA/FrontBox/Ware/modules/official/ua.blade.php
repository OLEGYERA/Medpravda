@if($ware->instruction_ua->composition && $ware->instruction_ua->composition !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_composition">
        <h3 class="title-row" itemprop="name">
            <span class="glyph composition"></span>
            Склад:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction_ua->composition !!}</div>
    </div>
@endif
@if($ware->instruction_ua->pharma_props && $ware->instruction_ua->pharma_props !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_pharma_props">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pharma_props"></span>
            Властивості:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction_ua->pharma_props !!}</div>
    </div>
@endif
@if($ware->instruction_ua->indications && $ware->instruction_ua->indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph indications"></span>
            Рекомендації щодо застосування:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction_ua->indications !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn2', ['key_word' => $ware->alias])
@endif
@if($ware->instruction_ua->special_indications && $ware->instruction_ua->special_indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph recipe"></span>
            Особливі вказівки:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction_ua->special_indications !!}</div>
    </div>
@endif
@if($ware->instruction_ua->contraindications && $ware->instruction_ua->contraindications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Протипоказання:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction_ua->contraindications !!}</div>
    </div>
@endif
@if($ware->instruction_ua->usage_and_dose && $ware->instruction_ua->usage_and_dose !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_usage_and_dose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph usage_and_dose"></span>
            Спосіб застосування та дози:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction_ua->usage_and_dose !!}</div>
    </div>
@endif
@if($ware->instruction_ua->storage_conditions && $ware->instruction_ua->storage_conditions !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_storage_conditions">
        <h3 class="title-row" itemprop="name">
            <span class="glyph storage_conditions"></span>
            Умови зберігання:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction_ua->storage_conditions !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn3', ['key_word' => $ware->alias])
@endif
@if($ware->instruction_ua->release_form && $ware->instruction_ua->release_form !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_release_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph release_form"></span>
            Форма випуску / упаковка:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction_ua->release_form !!}</div>
    </div>
@endif
@if($ware->dependency->fabricator)
    <div class="mp-row-present" id="adaptive_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="glyph fabricator"></span>
            Виробник:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>Непосредственное производство: {{$ware->dependency->fabricator->utitle}}@if($ware->dependency->fabricator_location), {{$ware->dependency->fabricator_location->full_utitle}}@endif </p></div>
    </div>
@endif
@if($ware->instruction_ua->other && $ware->instruction_ua->other !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_other">
        <h3 class="title-row" itemprop="name">
            <span class="glyph other"></span>
            Додатково:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $ware->instruction_ua->other !!}</div>
    </div>
@endif

@if($cosmetic->instruction_adaptive_ua->composition && $cosmetic->instruction_adaptive_ua->composition !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_composition">
        <h3 class="title-row" itemprop="name">
            <span class="glyph composition"></span>
            Склад:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive_ua->composition !!}</div>
    </div>
@endif
@if($cosmetic->instruction_adaptive_ua->pharma_props && $cosmetic->instruction_adaptive_ua->pharma_props !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_pharma_props">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pharma_props"></span>
            Властивості:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive_ua->pharma_props !!}</div>
    </div>
@endif
@if($cosmetic->instruction_adaptive_ua->indications && $cosmetic->instruction_adaptive_ua->indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph indications"></span>
            Рекомендації щодо застосування:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive_ua->indications !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn1', ['key_word' => $cosmetic->alias])
@endif
@if($cosmetic->instruction_adaptive_ua->special_indications && $cosmetic->instruction_adaptive_ua->special_indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_individual">
        <h3 class="title-row" itemprop="name">
            <span class="glyph recipe"></span>
            Особливі вказівки:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive_ua->special_indications !!}</div>
    </div>
@endif
@if($cosmetic->instruction_adaptive_ua->contraindications && $cosmetic->instruction_adaptive_ua->contraindications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Протипоказання:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive_ua->contraindications !!}</div>
    </div>
@endif
@if($cosmetic->instruction_adaptive_ua->usage_and_dose && $cosmetic->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_usage_and_dose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph usage_and_dose"></span>
            Спосіб застосування та дози:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive_ua->usage_and_dose !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.second_cap', ['key_word' => $cosmetic->alias])
@endif
@if($cosmetic->instruction_adaptive_ua->storage_conditions && $cosmetic->instruction_adaptive_ua->storage_conditions !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_storage_conditions">
        <h3 class="title-row" itemprop="name">
            <span class="glyph storage_conditions"></span>
            Умови зберігання:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive_ua->storage_conditions !!}</div>
    </div>
@endif
@if($cosmetic->instruction_adaptive_ua->release_form && $cosmetic->instruction_adaptive_ua->release_form !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_release_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph release_form"></span>
            Форма випуску / упаковка:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive_ua->release_form !!}</div>
    </div>
@endif
@if($cosmetic->dependency->fabricator)
    <div class="mp-row-present" id="adaptive_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="glyph fabricator"></span>
            Виробник:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>Безпосереднє виробництво: {{$cosmetic->dependency->fabricator->utitle}}@if($cosmetic->dependency->fabricator_location), {{$cosmetic->dependency->fabricator_location->full_utitle}}@endif </p></div>
    </div>
@endif
@if($cosmetic->instruction_adaptive_ua->other && $cosmetic->instruction_adaptive_ua->other !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_other">
        <h3 class="title-row" itemprop="name">
            <span class="glyph other"></span>
            Додатково:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $cosmetic->instruction_adaptive_ua->other !!}</div>
    </div>
@endif

@if($bad->instruction->composition && $bad->instruction->composition !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_composition">
        <h3 class="title-row" itemprop="name">
            <span class="glyph composition"></span>
            Состав:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $bad->instruction->composition !!}</div>
    </div>
@endif
@if($bad->dependency->pharma)
    <div class="mp-row-present" id="adaptive_pharma">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pharma_group"></span>
            Группа:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{{$bad->dependency->pharma->title}}</p></div>
    </div>
@endif
@if($bad->instruction->pharma_props && $bad->instruction->pharma_props !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_pharma_props">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pharma_props"></span>
            Cвойства:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $bad->instruction->pharma_props !!}</div>
    </div>
@endif
@if($bad->instruction->indications && $bad->instruction->indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph indications"></span>
            Рекомендации по применению:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $bad->instruction->indications !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn2', ['key_word' => $bad->alias])
@endif
@if($bad->instruction->special_indications && $bad->instruction->special_indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph recipe"></span>
            Особые указания:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $bad->instruction->special_indications !!}</div>
    </div>
@endif
@if($bad->instruction->contraindications && $bad->instruction->contraindications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Противопоказания:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $bad->instruction->contraindications !!}</div>
    </div>
@endif
@if($bad->instruction->usage_and_dose && $bad->instruction->usage_and_dose !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_usage_and_dose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph usage_and_dose"></span>
            Способ применения и дозы:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $bad->instruction->usage_and_dose !!}</div>
    </div>
@endif
@if($bad->instruction->storage_conditions && $bad->instruction->storage_conditions !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_storage_conditions">
        <h3 class="title-row" itemprop="name">
            <span class="glyph storage_conditions"></span>
            Условия хранения:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $bad->instruction->storage_conditions !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn3', ['key_word' => $bad->alias])
@endif
@if($bad->instruction->release_form && $bad->instruction->release_form !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_release_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph release_form"></span>
            Форма выпуска / упаковка:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $bad->instruction->release_form !!}</div>
    </div>
@endif
@if($bad->dependency->fabricator)
    <div class="mp-row-present" id="adaptive_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="glyph fabricator"></span>
            Производитель:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>Непосредственное производство: {{$bad->dependency->fabricator->title}}@if($bad->dependency->fabricator_location), {{$bad->dependency->fabricator_location->full_title}}@endif </p></div>
    </div>
@endif
@if($bad->instruction->other && $bad->instruction->other !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_other">
        <h3 class="title-row" itemprop="name">
            <span class="glyph other"></span>
            Дополнительно:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $bad->instruction->other !!}</div>
    </div>
@endif

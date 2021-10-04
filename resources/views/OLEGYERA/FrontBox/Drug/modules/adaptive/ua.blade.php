@if($drug->instruction_adaptive_ua->composition && $drug->instruction_adaptive_ua->composition !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_composition">
        <h3 class="title-row" itemprop="name">
            <span class="glyph composition"></span>
            Склад:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->composition !!}</div>
    </div>
@endif
@if($drug->dependency->form)
    <div class="mp-row-present" id="adaptive_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph dosage_form"></span>
            Лікарська форма:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{{$drug->dependency->form->utitle}}</p></div>
    </div>
@endif
@if($drug->dependency->fabricator)
    <div class="mp-row-present" id="adaptive_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="glyph fabricator"></span>
            Виробник:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>Безпосереднє виробництво: {{$drug->dependency->fabricator->utitle}}@if($drug->dependency->fabricator_location), {{$drug->dependency->fabricator_location->full_utitle}}@endif </p></div>
    </div>
@endif
@if($drug->dependency->pharma)
    <div class="mp-row-present" id="adaptive_pharma">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pharma_group"></span>
            Фармакотерапевтична група:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{{$drug->dependency->pharma->utitle}}</p></div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->pharma_props && $drug->instruction_adaptive_ua->pharma_props !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_pharma_props">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pharma_props"></span>
            Фармакологічні властивості:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->pharma_props !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->indications && $drug->instruction_adaptive_ua->indications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph indications"></span>
            Показання до застосування:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->indications !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn1', ['key_word' => $drug->alias])
@endif
@if($drug->instruction_adaptive_ua->contraindications && $drug->instruction_adaptive_ua->contraindications !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Протипоказання:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->contraindications !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->security && $drug->instruction_adaptive_ua->security !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_security">
        <h3 class="title-row" itemprop="name">
            <span class="glyph contraindications"></span>
            Належні заходи безпеки при застосуванні:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->security !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->features && $drug->instruction_adaptive_ua->features !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_features">
        <h3 class="title-row" itemprop="name">
            <span class="glyph features"></span>
            Особливості застосування:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->features !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->pregnancy && $drug->instruction_adaptive_ua->pregnancy !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_pregnancy">
        <h3 class="title-row" itemprop="name">
            <span class="glyph pregnancy"></span>
            Застосування в період вагітності або годування груддю:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->pregnancy !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->driver && $drug->instruction_adaptive_ua->driver !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_driver">
        <h3 class="title-row" itemprop="name">
            <span class="glyph driver"></span>
            Здатність впливати на швидкість реакції при керуванні автотранспортом:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->driver !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->children && $drug->instruction_adaptive_ua->children !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_children">
        <h3 class="title-row" itemprop="name">
            <span class="glyph children"></span>
            Діти:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->children !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->usage_and_dose && $drug->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_usage_and_dose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph usage_and_dose"></span>
            Спосіб застосування та дози:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->usage_and_dose !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.second_cap', ['key_word' => $drug->alias])
@endif
@if($drug->instruction_adaptive_ua->overdose && $drug->instruction_adaptive_ua->overdose !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_overdose">
        <h3 class="title-row" itemprop="name">
            <span class="glyph overdose"></span>
            Передозування:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->overdose !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->side_effects && $drug->instruction_adaptive_ua->side_effects !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_side_effects">
        <h3 class="title-row" itemprop="name">
            <span class="glyph side_effects"></span>
            Побічні дії:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->side_effects !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->interaction && $drug->instruction_adaptive_ua->interaction !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_interaction">
        <h3 class="title-row" itemprop="name">
            <span class="glyph interaction"></span>
            Лікарська взаємодія:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->interaction !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->time_life && $drug->instruction_adaptive_ua->time_life !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_time_life">
        <h3 class="title-row" itemprop="name">
            <span class="glyph time_life"></span>
            Термін придатності:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->time_life !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->storage_conditions && $drug->instruction_adaptive_ua->storage_conditions !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_storage_conditions">
        <h3 class="title-row" itemprop="name">
            <span class="glyph storage_conditions"></span>
            Умови зберігання:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->storage_conditions !!}</div>
    </div>
@endif
@if($drug->instruction_adaptive_ua->release_form && $drug->instruction_adaptive_ua->release_form !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_release_form">
        <h3 class="title-row" itemprop="name">
            <span class="glyph release_form"></span>
            Форма випуску / упаковка:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->release_form !!}</div>
    </div>
@endif
<div class="mp-row-present" id="adaptive_recipe">
    <h3 class="title-row" itemprop="name">
        <span class="glyph recipe"></span>
        Категорія відпуску:
    </h3>
    <div class="info-row" itemprop="articleSection"><p>@if($drug->setting->recipe == 0) Без рецепта. @else По рецепту. @endif</p></div>
</div>
@if($drug->instruction_adaptive_ua->other && $drug->instruction_adaptive_ua->other !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_other">
        <h3 class="title-row" itemprop="name">
            <span class="glyph other"></span>
            Додатково:        </h3>
        <div class="info-row" itemprop="articleSection">{!! $drug->instruction_adaptive_ua->other !!}</div>
    </div>
@endif

@if($data->instruction_adaptive->composition && $data->instruction_adaptive->composition !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_composition">
        <h3 class="title-row" itemprop="name">
            <span class="icon-composition"></span>
            Состав:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->composition !!}</div>
    </div>
@endif
@if($data->dependency->form)
    <div class="mp-row-icon" id="adaptive_form">
        <h3 class="title-row" itemprop="name">
            <span class="icon-dosage_form"></span>
            Лекарственная форма:
        </h3>
        <div class="content-row" itemprop="articleSection"><p>{{$data->dependency->form->title}}</p></div>
    </div>
@endif
@if($data->dependency->fabricator)
    <div class="mp-row-icon" id="adaptive_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="icon-fabricator"></span>
            Производитель:
        </h3>
        <div class="content-row" itemprop="articleSection"><p>Непосредственное производство: {{$data->dependency->fabricator->title}}@if($data->dependency->fabricator_location), {{$data->dependency->fabricator_location->full_title}}@endif </p></div>
    </div>
@endif
@if($data->dependency->pharma)
    <div class="mp-row-icon" id="adaptive_pharma">
        <h3 class="title-row" itemprop="name">
            <span class="icon-pharma_group"></span>
            Фармакотерапевтическая группа:
        </h3>
        <div class="content-row" itemprop="articleSection"><p>{{$data->dependency->pharma->title}}</p></div>
    </div>
@endif
@if($data->instruction_adaptive->pharma_props && $data->instruction_adaptive->pharma_props !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_pharma_props">
        <h3 class="title-row" itemprop="name">
            <span class="icon-pharma_props"></span>
            Фармакологические свойства:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->pharma_props !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->indications && $data->instruction_adaptive->indications !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_indications">
        <h3 class="title-row" itemprop="name">
            <span class="icon-indications1"></span>
            Показания к применению:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->indications !!}</div>
    </div>
@endif
{{--@if($is_mobile ?? false)--}}
{{--    @include('OLEGYERA.FrontBox.MODULES.banners.bn1', ['key_word' => $data->alias])--}}
{{--@endif--}}
@if($data->instruction_adaptive->contraindications && $data->instruction_adaptive->contraindications !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="icon-contraindications"></span>
            Противопоказания:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->contraindications !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->security && $data->instruction_adaptive->security !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_security">
        <h3 class="title-row" itemprop="name">
            <span class="icon-sources"></span>
            Надлежащие меры безопасности при применении:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->security !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->features && $data->instruction_adaptive->features !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_features">
        <h3 class="title-row" itemprop="name">
            <span class="icon-features"></span>
            Особенности применения:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->features !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->pregnancy && $data->instruction_adaptive->pregnancy !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_pregnancy">
        <h3 class="title-row" itemprop="name">
            <span class="icon-pregnancy"></span>
            Применение в период беременности или кормления грудью:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->pregnancy !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->driver && $data->instruction_adaptive->driver !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_driver">
        <h3 class="title-row" itemprop="name">
            <span class="icon-driver"></span>
            Способность влиять на скорость реакции при управлении автотранспортом:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->driver !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->children && $data->instruction_adaptive->children !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_children">
        <h3 class="title-row" itemprop="name">
            <span class="icon-children"></span>
            Дети:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->children !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->usage_and_dose && $data->instruction_adaptive->usage_and_dose !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_usage_and_dose">
        <h3 class="title-row" itemprop="name">
            <span class="icon-usage_and_dose"></span>
            Способ применения и дозы:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->usage_and_dose !!}</div>
    </div>
@endif
{{--@if($is_mobile ?? false)--}}
{{--    @include('OLEGYERA.FrontBox.MODULES.banners.second_cap', ['key_word' => $data->alias])--}}
{{--@endif--}}
@if($data->instruction_adaptive->overdose && $data->instruction_adaptive->overdose !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_overdose">
        <h3 class="title-row" itemprop="name">
            <span class="icon-overdose"></span>
            Передозировка:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->overdose !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->side_effects && $data->instruction_adaptive->side_effects !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_side_effects">
        <h3 class="title-row" itemprop="name">
            <span class="icon-side_effects"></span>
            Побочные действия:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->side_effects !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->interaction && $data->instruction_adaptive->interaction !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_interaction">
        <h3 class="title-row" itemprop="name">
            <span class="icon-interaction"></span>
            Лекарственное взаимодействие:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->interaction !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->time_life && $data->instruction_adaptive->time_life !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_time_life">
        <h3 class="title-row" itemprop="name">
            <span class="icon-time_life"></span>
            Срок годности:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->time_life !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->storage_conditions && $data->instruction_adaptive->storage_conditions !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_storage_conditions">
        <h3 class="title-row" itemprop="name">
            <span class="icon-storage_conditions"></span>
            Условия хранения:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->storage_conditions !!}</div>
    </div>
@endif
@if($data->instruction_adaptive->release_form && $data->instruction_adaptive->release_form !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_release_form">
        <h3 class="title-row" itemprop="name">
            <span class="icon-release_form"></span>
            Форма выпуска / упаковка:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->release_form !!}</div>
    </div>
@endif
<div class="mp-row-icon" id="adaptive_recipe">
    <h3 class="title-row" itemprop="name">
        <span class="icon-recipe"></span>
        Категория отпуска:
    </h3>
    <div class="content-row" itemprop="articleSection"><p>@if($data->setting->recipe == 0) Без рецепта. @else По рецепту. @endif</p></div>
</div>
@if($data->instruction_adaptive->other && $data->instruction_adaptive->other !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_other">
        <h3 class="title-row" itemprop="name">
            <span class="icon-other"></span>
            Дополнительно:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction_adaptive->other !!}</div>
    </div>
@endif

@if($data->instruction->composition && $data->instruction->composition !== '<p><br></p>')
    <div class="mp-row-icon" id="official_composition">
        <h3 class="title-row" itemprop="name">
            <span class="icon-composition"></span>
            Состав:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->composition !!}</div>
    </div>
@endif
@if($data->dependency->form)
    <div class="mp-row-icon" id="official_form">
        <h3 class="title-row" itemprop="name">
            <span class="icon-dosage_form"></span>
            Лекарственная форма:
        </h3>
        <div class="content-row" itemprop="articleSection"><p>{{$data->dependency->form->title}}</p></div>
    </div>
@endif
@if($data->instruction->physical_chemical && $data->instruction->physical_chemical !== '<p><br></p>')
    <div class="mp-row-icon" id="official_form">
        <h3 class="title-row" itemprop="name">
            <span class="icon-physical_chemical"></span>
            Основные физико-химические свойства:
        </h3>
        <div class="content-row" itemprop="articleSection"><p>{!! $data->instruction->physical_chemical !!}</p></div>
    </div>
@endif
@if($data->dependency->fabricator)
    <div class="mp-row-icon" id="official_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="icon-fabricator"></span>
            Производитель:
        </h3>
        <div class="content-row" itemprop="articleSection"><p>{{$data->dependency->fabricator->title}}</p></div>
    </div>
@endif

@if($data->dependency->fabricator_location)
    <div class="mp-row-icon" id="official_fabricator">
        <h3 class="title-row" itemprop="name">
            <span class="icon-fabricator_location"></span>
            Местонахождение производителя:
        </h3>
        <div class="content-row" itemprop="articleSection"><p>{{$data->dependency->fabricator_location->title}}</p></div>
    </div>
@endif

@if($data->dependency->pharma)
    <div class="mp-row-icon" id="official_pharma">
        <h3 class="title-row" itemprop="name">
            <span class="icon-dosage_form"></span>
            Фармакотерапевтическая группа:
        </h3>
        <div class="content-row" itemprop="articleSection"><p>{{$data->dependency->pharma->title}}</p></div>
    </div>
@endif
@if($data->instruction->pharma_props && $data->instruction->pharma_props !== '<p><br></p>')
    <div class="mp-row-icon" id="official_pharma_props">
        <h3 class="title-row" itemprop="name">
            <span class="icon-pharma_props"></span>
            Фармакологические свойства:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->pharma_props !!}</div>
    </div>
@endif
@if($data->instruction->indications && $data->instruction->indications !== '<p><br></p>')
    <div class="mp-row-icon" id="official_indications">
        <h3 class="title-row" itemprop="name">
            <span class="icon-indications"></span>
            Показания к применению:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->indications !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn2', ['key_word' => $data->alias])
@endif
@if($data->instruction->contraindications && $data->instruction->contraindications !== '<p><br></p>')
    <div class="mp-row-icon" id="official_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="icon-contraindications"></span>
            Противопоказания:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->contraindications !!}</div>
    </div>
@endif
@if($data->instruction->security && $data->instruction->security !== '<p><br></p>')
    <div class="mp-row-icon" id="adaptive_contraindications">
        <h3 class="title-row" itemprop="name">
            <span class="icon-contraindications"></span>
            Надлежащие меры безопасности при применении:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->security !!}</div>
    </div>
@endif
@if($data->instruction->features && $data->instruction->features !== '<p><br></p>')
    <div class="mp-row-icon" id="official_features">
        <h3 class="title-row" itemprop="name">
            <span class="icon-features"></span>
            Особенности применения:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->features !!}</div>
    </div>
@endif
@if($data->instruction->pregnancy && $data->instruction->pregnancy !== '<p><br></p>')
    <div class="mp-row-icon" id="official_pregnancy">
        <h3 class="title-row" itemprop="name">
            <span class="icon-pregnancy"></span>
            Применение в период беременности или кормления грудью:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->pregnancy !!}</div>
    </div>
@endif
@if($data->instruction->driver && $data->instruction->driver !== '<p><br></p>')
    <div class="mp-row-icon" id="official_driver">
        <h3 class="title-row" itemprop="name">
            <span class="icon-driver"></span>
            Способность влиять на скорость реакции при управлении автотранспортом:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->driver !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn3', ['key_word' => $data->alias])
@endif
@if($data->instruction->children && $data->instruction->children !== '<p><br></p>')
    <div class="mp-row-icon" id="official_children">
        <h3 class="title-row" itemprop="name">
            <span class="icon-children"></span>
            Дети:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->children !!}</div>
    </div>
@endif
@if($data->instruction->usage_and_dose && $data->instruction->usage_and_dose !== '<p><br></p>')
    <div class="mp-row-icon" id="official_usage_and_dose">
        <h3 class="title-row" itemprop="name">
            <span class="icon-usage_and_dose"></span>
            Способ применения и дозы:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->usage_and_dose !!}</div>
    </div>
@endif
@if($data->instruction->overdose && $data->instruction->overdose !== '<p><br></p>')
    <div class="mp-row-icon" id="official_overdose">
        <h3 class="title-row" itemprop="name">
            <span class="icon-overdose"></span>
            Передозировка:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->overdose !!}</div>
    </div>
@endif
@if($data->instruction->side_effects && $data->instruction->side_effects !== '<p><br></p>')
    <div class="mp-row-icon" id="official_side_effects">
        <h3 class="title-row" itemprop="name">
            <span class="icon-side_effects"></span>
            Побочные действия:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->side_effects !!}</div>
    </div>
@endif
@if($data->instruction->interaction && $data->instruction->interaction !== '<p><br></p>')
    <div class="mp-row-icon" id="official_interaction">
        <h3 class="title-row" itemprop="name">
            <span class="icon-interaction"></span>
            Лекарственное взаимодействие:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->interaction !!}</div>
    </div>
@endif
@if($data->instruction->time_life && $data->instruction->time_life !== '<p><br></p>')
    <div class="mp-row-icon" id="official_time_life">
        <h3 class="title-row" itemprop="name">
            <span class="icon-time_life"></span>
            Срок годности:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->time_life !!}</div>
    </div>
@endif
@if($data->instruction->storage_conditions && $data->instruction->storage_conditions !== '<p><br></p>')
    <div class="mp-row-icon" id="official_storage_conditions">
        <h3 class="title-row" itemprop="name">
            <span class="icon-storage_conditions"></span>
            Условия хранения:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->storage_conditions !!}</div>
    </div>
@endif
@if($data->instruction->release_form && $data->instruction->release_form !== '<p><br></p>')
    <div class="mp-row-icon" id="official_release_form">
        <h3 class="title-row" itemprop="name">
            <span class="icon-release_form"></span>
            Форма выпуска / упаковка:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->release_form !!}</div>
    </div>
@endif
<div class="mp-row-icon" id="official_recipe">
    <h3 class="title-row" itemprop="name">
        <span class="icon-recipe"></span>
        Категория отпуска:
    </h3>
    <div class="content-row" itemprop="articleSection"><p>@if($data->setting->recipe == 0) Без рецепта. @else По рецепту. @endif</p></div>
</div>
@if($data->instruction->other && $data->instruction->other !== '<p><br></p>')
    <div class="mp-row-icon" id="official_other">
        <h3 class="title-row" itemprop="name">
            <span class="icon-other"></span>
            Дополнительно:
        </h3>
        <div class="content-row" itemprop="articleSection">{!! $data->instruction->other !!}</div>
    </div>
@endif

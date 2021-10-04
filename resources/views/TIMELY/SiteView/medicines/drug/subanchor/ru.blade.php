<ul class="page-navigation" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
    @if($data->instruction_adaptive->composition && $data->instruction_adaptive->composition !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_composition">Состав</a></li>
    @endif
    @if($data->dependency->form)
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_form">Лекарственная форма</a></li>
    @endif
    @if($data->dependency->fabricator)
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_fabricator">Производитель</a></li>
    @endif
    @if($data->dependency->pharma)
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_pharma">Фармакотерапевтическая группа</a></li>
    @endif
    @if($data->instruction_adaptive->pharma_props && $data->instruction_adaptive->pharma_props !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_pharma">Фармакологические свойства</a></li>
    @endif
    @if($data->instruction_adaptive->indications && $data->instruction_adaptive->indications !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_indications">Показания к применению</a></li>
    @endif
    @if($data->instruction_adaptive->contraindications && $data->instruction_adaptive->contraindications !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_contraindications">Противопоказания</a></li>
    @endif
    @if($data->instruction_adaptive->security && $data->instruction_adaptive->security !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_security">Надлежащие меры безопасности при применении</a></li>
    @endif
    @if($data->instruction_adaptive->features && $data->instruction_adaptive->features !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_features">Особенности применения</a></li>
    @endif
    @if($data->instruction_adaptive->pregnancy && $data->instruction_adaptive->pregnancy !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_pregnancy">Применение в период беременности или кормления грудью</a></li>
    @endif
    @if($data->instruction_adaptive->driver && $data->instruction_adaptive->driver !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_driver">Способность влиять на скорость реакции при управлении автотранспортом</a></li>
    @endif
    @if($data->instruction_adaptive->children && $data->instruction_adaptive->children !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_children">Дети</a></li>
    @endif
    @if($data->instruction_adaptive->usage_and_dose && $data->instruction_adaptive->usage_and_dose !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_usage_and_dose">Способ применения и дозы</a></li>
    @endif
    @if($data->instruction_adaptive->overdose && $data->instruction_adaptive->overdose !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_overdose">Передозировка</a></li>
    @endif
    @if($data->instruction_adaptive->side_effects && $data->instruction_adaptive->side_effects !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_side_effects">Побочные действия</a></li>
    @endif
    @if($data->instruction_adaptive->interaction && $data->instruction_adaptive->interaction !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_interaction">Лекарственное взаимодействие</a></li>
    @endif
    @if($data->instruction_adaptive->time_life && $data->instruction_adaptive->time_life !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_time_life">Срок годности</a></li>
    @endif
    @if($data->instruction_adaptive->storage_conditions && $data->instruction_adaptive->storage_conditions !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_storage_conditions">Условия хранения</a></li>
    @endif
    @if($data->instruction_adaptive->release_form && $data->instruction_adaptive->release_form !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_release_form">Форма выпуска / упаковка</a></li>
    @endif
    <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_recipe">Категория отпуска</a></li>
    @if($data->instruction_adaptive->other && $data->instruction_adaptive->other !== '<p><br></p>')
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_other">Дополнительно</a></li>
    @endif
</ul>

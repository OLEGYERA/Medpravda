<nav class="row-nav-links" >
    <ul class="row-nav-links-container" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
        @if($drug->instruction_adaptive_ua->composition && $drug->instruction_adaptive_ua->composition !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_composition">Склад</a></li>
        @endif
        @if($drug->dependency->form)
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_form">Лікарська форма</a></li>
        @endif
        @if($drug->dependency->fabricator)
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_fabricator">Виробник</a></li>
        @endif
        @if($drug->dependency->pharma)
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_pharma">Фармакотерапевтична група</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->pharma_props && $drug->instruction_adaptive_ua->pharma_props !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_pharma">Фармакологічні властивості</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->indications && $drug->instruction_adaptive_ua->indications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_indications">Показання до застосування</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->contraindications && $drug->instruction_adaptive_ua->contraindications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_contraindications">Протипоказання</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->security && $drug->instruction_adaptive_ua->security !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_security">Належні заходи безпеки при застосуванні</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->features && $drug->instruction_adaptive_ua->features !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_features">Особливості застосування</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->pregnancy && $drug->instruction_adaptive_ua->pregnancy !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_pregnancy">Застосування в період вагітності або годування груддю</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->driver && $drug->instruction_adaptive_ua->driver !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_driver">Здатність впливати на швидкість реакції при керуванні автотранспортом</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->children && $drug->instruction_adaptive_ua->children !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_children">Діти</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->usage_and_dose && $drug->instruction_adaptive_ua->usage_and_dose !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_usage_and_dose">Спосіб застосування та дози</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->overdose && $drug->instruction_adaptive_ua->overdose !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_overdose">Передозування</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->side_effects && $drug->instruction_adaptive_ua->side_effects !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_side_effects">Побічні дії</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->interaction && $drug->instruction_adaptive_ua->interaction !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_interaction">Лікарська взаємоді</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->time_life && $drug->instruction_adaptive_ua->time_life !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_time_life">Термін придатності</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->storage_conditions && $drug->instruction_adaptive_ua->storage_conditions !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_storage_conditions">Умови зберігання</a></li>
        @endif
        @if($drug->instruction_adaptive_ua->release_form && $drug->instruction_adaptive_ua->release_form !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_release_form">Форма випуску / упаковка</a></li>
        @endif
        <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_recipe">Категорія відпуску</a></li>
        @if($drug->instruction_adaptive_ua->other && $drug->instruction_adaptive_ua->other !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_other">Додатково</a></li>
        @endif
    </ul>
</nav>

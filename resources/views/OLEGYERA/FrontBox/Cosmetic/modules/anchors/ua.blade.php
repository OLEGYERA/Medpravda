<nav class="row-nav-links" >
    <ul class="row-nav-links-container" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
        @if($cosmetic->instruction_adaptive->composition && $cosmetic->instruction_adaptive->composition !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_composition">Склад</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->pharma_props && $cosmetic->instruction_adaptive->pharma_props !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_pharma_props">Властивості</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->indications && $cosmetic->instruction_adaptive->indications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_indications">Показання до застосування</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->special_indications && $cosmetic->instruction_adaptive->special_indications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_individual">Особливі вказівки</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->contraindications && $cosmetic->instruction_adaptive->contraindications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_contraindications">Протипоказання</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->usage_and_dose && $cosmetic->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_usage_and_dose">Спосіб застосування та дози</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->storage_conditions && $cosmetic->instruction_adaptive->storage_conditions !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_storage_conditions">Умови зберігання</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->release_form && $cosmetic->instruction_adaptive->release_form !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_release_form">Форма випуску / упаковка</a></li>
        @endif
        @if($cosmetic->dependency->fabricator)
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_fabricator">Виробник</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->other && $cosmetic->instruction_adaptive->other !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_other">Додатково</a></li>
        @endif
    </ul>
</nav>

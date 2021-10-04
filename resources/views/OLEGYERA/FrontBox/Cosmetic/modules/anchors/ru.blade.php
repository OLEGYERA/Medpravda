<nav class="row-nav-links" >
    <ul class="row-nav-links-container" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
        @if($cosmetic->instruction_adaptive->composition && $cosmetic->instruction_adaptive->composition !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_composition">Состав</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->pharma_props && $cosmetic->instruction_adaptive->pharma_props !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_pharma_props">Cвойства</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->indications && $cosmetic->instruction_adaptive->indications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_indications">Рекомендации по применению</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->special_indications && $cosmetic->instruction_adaptive->special_indications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_individual">Особые указания</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->contraindications && $cosmetic->instruction_adaptive->contraindications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_contraindications">Противопоказания</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->usage_and_dose && $cosmetic->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_usage_and_dose">Способ применения и дозы</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->storage_conditions && $cosmetic->instruction_adaptive->storage_conditions !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_storage_conditions">Условия хранения</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->release_form && $cosmetic->instruction_adaptive->release_form !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_release_form">Форма выпуска / упаковка</a></li>
        @endif
        @if($cosmetic->dependency->fabricator)
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_fabricator">Производитель</a></li>
        @endif
        @if($cosmetic->instruction_adaptive->other && $cosmetic->instruction_adaptive->other !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_other">Дополнительно</a></li>
        @endif
    </ul>
</nav>

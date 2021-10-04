<nav class="row-nav-links" >
    <ul class="row-nav-links-container" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
        @if($ware->instruction_adaptive->composition && $ware->instruction_adaptive->composition !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_composition">Состав</a></li>
        @endif
        @if($ware->instruction_adaptive->pharma_props && $ware->instruction_adaptive->pharma_props !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_pharma_props">Cвойства</a></li>
        @endif
        @if($ware->instruction_adaptive->indications && $ware->instruction_adaptive->indications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_indications">Рекомендации по применению</a></li>
        @endif
        @if($ware->instruction_adaptive->special_indications && $ware->instruction_adaptive->special_indications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_individual">Особые указания</a></li>
        @endif
        @if($ware->instruction_adaptive->contraindications && $ware->instruction_adaptive->contraindications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_contraindications">Противопоказания</a></li>
        @endif
        @if($ware->instruction_adaptive->usage_and_dose && $ware->instruction_adaptive->usage_and_dose !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_usage_and_dose">Способ применения и дозы</a></li>
        @endif
        @if($ware->instruction_adaptive->storage_conditions && $ware->instruction_adaptive->storage_conditions !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_storage_conditions">Условия хранения</a></li>
        @endif
        @if($ware->instruction_adaptive->release_form && $ware->instruction_adaptive->release_form !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_release_form">Форма выпуска / упаковка</a></li>
        @endif
        @if($ware->dependency->fabricator)
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_fabricator">Производитель</a></li>
        @endif
        @if($ware->instruction_adaptive->other && $ware->instruction_adaptive->other !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#adaptive_other">Дополнительно</a></li>
        @endif
    </ul>
</nav>

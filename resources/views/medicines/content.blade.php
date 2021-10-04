@if(!empty($medicine->consist))
    <div id="sostav" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/1_sostav.png" alt="Состав"  width="21" height="13">
            <h4>Состав</h4>
        </div>
        {!! $medicine->consist !!}
    </div>
@endif
@if(!empty($medicine->docs_form))
    <div id="lekforma" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/19_lek_forma.png" alt="Лекарственная форма"  width="16" height="19">
            <h4>Лекарственная форма</h4>
        </div>
        {!! $medicine->docs_form !!}
    </div>
@endif
@if(!empty($medicine->physicochemical_char))
    <div id="fizhimsvoistva" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/11_svoystva.png"
                 alt="Основные физико-химические свойства"  width="16" height="17">
            <h4>Основные физико-химические свойства</h4>
        </div>
        {!! $medicine->physicochemical_char !!}
    </div>
@endif
@if(!empty($medicine->fabricator))
    <div id="proizvoditel" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/20_proizvoditel.png" alt="Категория отпуска" width="18" height="18">
            <h4>Производитель</h4>
        </div>
        {!! $medicine->fabricator !!}
    </div>
@endif
@if(!empty($medicine->addr_fabricator))
    <div id="adresproizvoditelya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/21_mesto_proizvoditelya.png"
                 alt="Местонахождение производителя" width="16" height="19">
            <h4>Местонахождение производителя</h4>
        </div>
        {!! $medicine->addr_fabricator !!}
    </div>
@endif
@if(!empty($medicine->pharm_group))
    <div id="farmgruppa" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/18_farm_gruppa.png"
                 alt="Фармакотерапевтическая группа" width="19" height="17">
            <h4>Фармакотерапевтическая группа</h4>
        </div>
        {!! $medicine->pharm_group !!}
    </div>
@endif
@if(!empty($medicine->pharm_prop))
    <div id="farmsvoistva" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/2_svoystva.png" alt="Фармакологические свойства" width="18" height="17">
            <h4>Фармакологические свойства</h4>
        </div>
        {!! $medicine->pharm_prop !!}
    </div>
@endif
@if(!empty($medicine->indications))
    <div id="pokazanij" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/3_pokazaniya.png" alt="Показания к применению" width="16" height="18">

            <h4>Показания к применению</h4>
        </div>
        {!! $medicine->indications !!}
    </div>
@endif
</div>
    <div class="clone-to" data-number="1">
        {{--место для баннера 1 ПК версии только для mobile--}}
        @include('layouts.banners.mobile.bn1')
    </div>
    <div class="wrap">
@if(!empty($medicine->contraindications))
    <div id="protivipokazaniya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/6_protivopokazaniya.png" alt="Противопоказания" width="17" height="17">
            <h4>Противопоказания</h4>
        </div>
        {!! $medicine->contraindications !!}
    </div>
@endif

@if(!empty($medicine->security))
    <div id="bezopastnost" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/12_mery_bezopasnosti.png"
                 alt="Надлежащие меры безопасности при применении" width="17" height="19">
            <h4>Надлежащие меры безопасности при применении</h4>
        </div>
        {!! $medicine->security !!}
    </div>
@endif
@if(!empty($medicine->application_features))
    <div id="osobennostprimeneniya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/4_primenenie.png" alt="Особенности применения" width="15" height="17">
            <h4>Особенности применения</h4>
        </div>
        {!! $medicine->application_features !!}
    </div>
@endif
@if(!empty($medicine->pregnancy))
    <div id="beremennost" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/7_beremennost.png"
                 alt="Применение в период беременности или кормления грудью" width="16" height="17">
            <h4>Применение в период беременности или кормления грудью</h4>
        </div>
        {!! $medicine->pregnancy !!}
    </div>
@endif
@if(!empty($medicine->cars))
    <div id="avto" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/17_avto.png"
                 alt="Способность влиять на скорость реакции при управлении автотранспортом" width="18" height="18">
            <h4>Способность влиять на скорость реакции при управлении автотранспортом</h4>
        </div>
        {!! $medicine->cars !!}
    </div>
@endif
@if(!empty($medicine->children))
    <div id="deti" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/13_deti.png" alt="Дети" width="18" height="21">
            <h4>Дети</h4>
        </div>
        {!! $medicine->children !!}
    </div>
@endif
@if(!empty($medicine->app_mode))
    <div id="premenenieidosa" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/23_sposob_primineniya.png"
                 alt="Способ применения и дозы" width="15" height="19">
            <h4>Способ применения и дозы</h4>
        </div>
        {!! $medicine->app_mode !!}
    </div>
@endif
    </div>
    @include('layouts.banners.mobile.bn9')
    <div class="wrap">
@if(!empty($medicine->overdose))
    <div id="peredoz" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/9_peredozirovka.png" alt="Передозировка" width="18" height="18">
            <h4>Передозировка</h4>
        </div>
        {!! $medicine->overdose !!}
    </div>
@endif



@if(!empty($medicine->side_effects))
    <div id="pobochnie" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/5_pobochnie.png" alt="Побочные действия" width="18" height="15">
            <h4>Побочные действия</h4>
        </div>
        {!! $medicine->side_effects !!}
    </div>
@endif
@if(!empty($medicine->interaction))
    <div id="vzaimodeistvie" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/8_vzabmodeystvie.png"
                 alt="Лекарственное взаимодействие" width="18" height="18">
            <h4>Лекарственное взаимодействие</h4>
        </div>
        {!! $medicine->interaction !!}
    </div>
@endif
@if(!empty($medicine->shelf_life))
    <div id="srokgodnosti" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/14_srok.png" alt="Срок годности" width="18" height="17">
            <h4>Срок годности</h4>
        </div>
        {!! $medicine->shelf_life !!}
    </div>
@endif
@if(!empty($medicine->saving))
    <div id="usloviyahraneniya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/15_hranenie.png" alt="Условия хранения" width="17" height="21">
            <h4>Условия хранения</h4>
        </div>
        {!! $medicine->saving !!}
    </div>
@endif
@if(!empty($medicine->packaging))
    <div id="upakovka" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/16_upakovka.png" alt="Упаковка" width="15" height="19">
            <h4>Форма выпуска / упаковка</h4>
        </div>
        {!! $medicine->packaging !!}
    </div>
@endif
@if(!empty($medicine->leave_cat))
    <div id="kategoriyaotpuska" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/10_kategoriya.png" alt="Категория отпуска" width="14" height="17">
            <h4>Категория отпуска</h4>
        </div>
        {!! $medicine->leave_cat !!}
    </div>
@endif
@if(!empty($medicine->additionally))
    <div id="dopolnitelno" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/22_dopolnitelno.png" alt="Дополнительно" width="18" height="18">
            <h4>Дополнительно</h4>
        </div>
        {!! $medicine->additionally !!}
    </div>
@endif
<div class="clone-to" data-number="2" style="margin: 0 -15px;width: calc(100% + 30px);">
    @include('layouts.banners.mobile.bn2')
</div>
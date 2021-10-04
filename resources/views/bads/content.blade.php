@if(!empty($model->consist))
    <div id="sostav" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/1_sostav.png" alt="Состав" width="21" height="13">
            <h4>Состав</h4>
        </div>
        {!! $model->consist !!}
    </div>
@endif
<div class="banner-reklama order-first desktop-display-none">
    {{--@include('layouts.banners.banner1')--}}
    {{--@include('layouts.banners.mobile.banner4')--}}
</div>

@if(!empty($model->pharm_group))
    <div id="farmgruppa" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/18_farm_gruppa.png"
                 alt="Группа" width="19" height="17">
            <h4>Группа</h4>
        </div>
        {!! $model->pharm_group !!}
    </div>
@endif
@if(!empty($model->pharm_prop))
    <div id="farmsvoistva" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/2_svoystva.png" alt="Свойства" width="18" height="17">
            <h4>Свойства</h4>
        </div>
        {!! $model->pharm_prop !!}
    </div>
@endif
@if(!empty($model->recommendations))
    <div id="recomendacii" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/3_pokazaniya.png"
                 alt="Рекомендации по применению" width="18" height="18">
            <h4>Рекомендации по применению</h4>
        </div>
        {!! $model->recommendations !!}
    </div>
@endif
<div class="clone-to" data-number="1">
    @include('layouts.banners.mobile.bn1')
</div>
<div class="wrap"></div>

@if(!empty($model->special_instructions))
    <div id="ukazaniya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/12_mery_bezopasnosti.png" alt="Особые указания" width="18" height="18">
            <h4>Особые указания</h4>
        </div>
        {!! $model->special_instructions !!}
    </div>
@endif

@if(!empty($model->contraindications))
    <div id="protivipokazaniya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/6_protivopokazaniya.png" alt="Противопоказания" width="17" height="17">
            <h4>Противопоказания</h4>
        </div>
        {!! $model->contraindications !!}
    </div>
@endif

@if(!empty($model->app_mode))
    <div id="premenenieidosa" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/23_sposob_primineniya.png"
                 alt="Способ применения и дозы" width="15" height="19">
            <h4>Способ применения и дозы</h4>
        </div>
        {!! $model->app_mode !!}
    </div>
@endif

@include('layouts.banners.mobile.bn9')

@if(!empty($model->packaging))
    <div id="upakovka" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/16_upakovka.png" alt="Упаковка" width="15" height="19">
            <h4>Упаковка</h4>
        </div>
        {!! $model->packaging !!}
    </div>
@endif
@if(!empty($model->saving))
    <div id="usloviyahraneniya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/15_hranenie.png" alt="Условия хранения" width="17" height="21">
            <h4>Условия хранения</h4>
        </div>
        {!! $model->saving !!}
    </div>
@endif
@if(!empty($model->fabricator_name))
    <div id="proizvoditel" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/20_proizvoditel.png"
                 alt="Категория отпуска" width="18" height="18">
            <h4>Производитель</h4>
        </div>
        {!! $model->fabricator_name !!}
    </div>
@endif
@if(!empty($model->additionally))
    <div id="dopolnitelno" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/22_dopolnitelno.png" alt="Дополнительно" width="18" height="18">
            <h4>Дополнительно</h4>
        </div>
        {!! $model->additionally !!}
    </div>
@endif

<div class="clone-to" data-number="1">
    @include('layouts.banners.mobile.bn2')
</div>

<div class="wrap"></div>
@if(!empty($model->consist))
    <div id="sostav" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/1_sostav.png" alt="Склад" title="Склад" width="21" height="13">
            <h4>Склад</h4>
        </div>
        {!! $model->consist !!}
    </div>
@endif
<div class="banner-reklama order-first desktop-display-none">
    {{--@include('layouts.banners.banner1')--}}
</div>

@if(!empty($model->pharm_group))
    <div id="farmgruppa" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/18_farm_gruppa.png"
                 alt="Група" title="Група" width="19" height="17">
            <h4>Група</h4>
        </div>
        {!! $model->pharm_group !!}
    </div>
@endif
@if(!empty($model->pharm_prop))
    <div id="farmsvoistva" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/2_svoystva.png" alt="Властивості" title="Властивості" width="18" height="17">
            <h4>Властивості</h4>
        </div>
        {!! $model->pharm_prop !!}
    </div>
@endif
@if(!empty($model->recommendations))
    <div id="recomendacii" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/8_vzabmodeystvie.png"
                 alt="Рекомендації щодо застосування" title="Рекомендації щодо застосування" width="18" height="18">
            <h4>Рекомендації щодо застосування</h4>
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
            <img src="{{ asset('assets') }}/images/product-icon/black/8_vzabmodeystvie.png" alt="Особливі вказівки" title="Особливі вказівки" width="18" height="18">
            <h4>Особливі вказівки</h4>
        </div>
        {!! $model->special_instructions !!}
    </div>
@endif
@if(!empty($model->contraindications))
    <div id="protivipokazaniya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/6_protivopokazaniya.png" alt="Протипоказання" title="Протипоказання" width="17" height="17">
            <h4>Протипоказання</h4>
        </div>
        {!! $model->contraindications !!}
    </div>
@endif
@if(!empty($model->app_mode))
    <div id="premenenieidosa" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/23_sposob_primineniya.png"
                 alt="Спосіб застосування та дози" title="Спосіб застосування та дози" width="15" height="19">
            <h4>Спосіб застосування та дози</h4>
        </div>
        {!! $model->app_mode !!}
    </div>
@endif

@include('layouts.banners.mobile.bn9')

@if(!empty($model->packaging))
    <div id="upakovka" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/16_upakovka.png" alt="Форма випуску / упаковка" title="Форма випуску / упаковка" width="15" height="19">
            <h4>Форма випуску / упаковка</h4>
        </div>
        {!! $model->packaging !!}
    </div>
@endif
@if(!empty($model->saving))
    <div id="usloviyahraneniya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/15_hranenie.png" alt="Умови зберігання" title="Умови зберігання" width="17" height="21">
            <h4>Умови зберігання</h4>
        </div>
        {!! $model->saving !!}
    </div>
@endif
@if(!empty($model->fabricator_name))
    <div id="proizvoditel" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/20_proizvoditel.png"
                 alt="Виробник" title="Виробник" width="18" height="18">
            <h4>Виробник</h4>
        </div>
        {!! $model->fabricator_name !!}
    </div>
@endif
@if(!empty($model->additionally))
    <div id="dopolnitelno" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <img src="{{ asset('assets') }}/images/product-icon/black/22_dopolnitelno.png" alt="Додатково" title="Додатково" width="18" height="18">
            <h4>Додатково</h4>
        </div>
        {!! $model->additionally !!}
    </div>
@endif

<div class="clone-to" data-number="1">
    @include('layouts.banners.mobile.bn2')
</div>

<div class="wrap"></div>
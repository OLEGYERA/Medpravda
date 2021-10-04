<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="canonical" href="{{ route('ware_get_official_ua', ['ware_slug'=>$model->slug]) }}">
    <link href="{{ asset('/') }}favicon.png" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/style.css">
    <title>{{ $model->title }}</title>
</head>
<body>
<div class="for-print">
    <div class="print-btn">
        <a href="{{ url()->previous() }}" class="btn-print">Назад</a>
        <a href="javascript:window.print();" class="btn-print">Роздрукувати</a>
    </div>
    <div class="from">ІНФОРМАЦІЯ З САЙТУ medpravda.ua - ЗРОБЛЕНО ЛІКАРЯМИ</div>
    <h1>{{ $model->title }}</h1>
    <div class="product-info-down">
        @if(!empty($model->fabricator->utitle))
            <div id="proizvoditel">
                <h5>Виробник:</h5>
                <a href="#"><p>{{ $model->fabricator->utitle }}</p></a>
            </div>
        @endif
        @if(!empty($model->reg))
            <div id="reg">
                <h5>Реєстрація:</h5>
                <p>{{ $model->reg }}</p>
            </div>
        @endif

        @if(!empty($model->classification))
            <div id="kod-atx">
                <h5>Класифікація:</h5>
                <a href="#">
                    <p>{{$model->classification->class .' - '. $model->classification->uname}}</p>
                </a>
            </div>
        @endif
        @if(!empty($model->consist))
            <div id="sostav" class="top-product-nav-info">
                <div class="title-product-info">
                    <h5>Склад</h5>
                </div>
                {!! $model->consist !!}
            </div>
        @endif
        @if(!empty($model->pharm_group))
            <div id="farmgruppa" class="top-product-nav-info">
                <div class="title-product-info">
                    <h5>Група</h5>
                </div>
                {!! $model->pharm_group !!}
            </div>
        @endif
        @if(!empty($model->pharm_prop))
            <div id="farmsvoistva" class="top-product-nav-info">
                <div class="title-product-info">
                    <h5>Властивості</h5>
                </div>
                {!! $model->pharm_prop !!}
            </div>
        @endif
        @if(!empty($model->recommendations))
            <div id="recomendacii" class="top-product-nav-info">
                <div class="title-product-info">
                    <h5>Рекомендації щодо застосування</h5>
                </div>
                {!! $model->recommendations !!}
            </div>
        @endif
        @if(!empty($model->special_instructions))
            <div id="ukazaniya" class="top-product-nav-info">
                <div class="title-product-info">
                    <h5>Особливі вказівки</h5>
                </div>
                {!! $model->special_instructions !!}
            </div>
        @endif
        @if(!empty($model->contraindications))
            <div id="protivipokazaniya" class="top-product-nav-info">
                <div class="title-product-info">
                    <h5>Протипоказання</h5>
                </div>
                {!! $model->contraindications !!}
            </div>
        @endif
        @if(!empty($model->app_mode))
            <div id="premenenieidosa" class="top-product-nav-info">
                <div class="title-product-info">
                    <h5>Спосіб застосування та дози</h5>
                </div>
                {!! $model->app_mode !!}
            </div>
        @endif
        @if(!empty($model->packaging))
            <div id="upakovka" class="top-product-nav-info">
                <div class="title-product-info">
                    <h5>Форма випуску / упаковка</h5>
                </div>
                {!! $model->packaging !!}
            </div>
        @endif
        @if(!empty($model->saving))
            <div id="usloviyahraneniya" class="top-product-nav-info">
                <div class="title-product-info">
                    <h5>Умови зберігання</h5>
                </div>
                {!! $model->saving !!}
            </div>
        @endif
        @if(!empty($model->fabricator_name))
            <div id="proizvoditel" class="top-product-nav-info">
                <div class="title-product-info">
                    <h5>Виробник</h5>
                </div>
                {!! $model->fabricator_name !!}
            </div>
        @endif
        @if(!empty($model->additionally))
            <div id="dopolnitelno" class="top-product-nav-info">
                <div class="title-product-info">
                    <h5>Додатково</h5>
                </div>
                {!! $model->additionally !!}
            </div>
        @endif
    </div>
    <div class="print-btn">
        <a href="{{ url()->previous() }}" class="btn-print">Назад</a>
        <a href="javascript:window.print();" class="btn-print">Роздрукувати</a>
    </div>
</div>



</body>
</html>
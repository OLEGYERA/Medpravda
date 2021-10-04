<!doctype html>
<html ⚡>
<head>
  <meta charset="utf-8">
  <title>{{ $medicine->title }}</title>
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
  <link rel="canonical" href="{{ str_replace('/amp', '', Request::url()) }}">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <style amp-custom>
  @include("medicines.style")
  </style>
  <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
  <noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
</head>
<body>
<amp-analytics type="gtag" data-credentials="include">
      <script type="application/json">
        {
          "vars": {
            "gtag_id": "UA-131004163-1",
            "config": {
              "UA-131004163-1": { "groups": "default" }
            }
          },
          "triggers": {
            "button": {
              "selector": "#the-button",
              "on": "click",
              "vars": {
                "event_name": "login",
                "method": "Google"
              }
            }
          }
        }
      </script>
</amp-analytics>
<div class="fixed-wrap">
    <header id="myHeader">
        <div class="wrap">
            <div class="logo">
                @if('main' == Route::currentRouteName())
                    <amp-img src="{{ asset('assets') }}/images/main/logo_ru.png" alt="Главный логотип Медправда" title="Главный логотип"
                    	width="200" height="100"
                    >
                @else
                    <a href="{{ route('main') }}/">
                        <amp-img src="{{ asset('assets') }}/images/main/logo_ru.png" alt="Главный логотип Медправда" title="Главный логотип" id="menu-main"
                    	width="140" height="50"
                        ></a>
                @endif
            </div>
                        <div class="lang-menu-footer">
                            <div><br>
                                <span class="active">Рус</span>
                                <a href="{{ str_replace(env('APP_URL'), env('APP_URL').'/ua', Request::url()) }}/">Укр</a>
				<br>
				<a href="{{ str_replace('/amp', '', Request::url()) }}/">Стандартная версия</a>
				</div>
			</div>

	</div>
	</header>
</div>
<br><br><br>
            <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs">
                <div class="button">
                    <a href="{{ route('main') }}">
                        <span class="label1">Главная</span>
                        <meta content="1"/>
                    </a>
                </div>
                <div class="button">
                    <a href="{{ route('sort') }}">
                        <span class="label1">Поиск препаратов</span>
                        <meta content="2"/>
                    </a>
                </div>
                <div class="button">
                    <span class="label1">Адаптированная инструкция</span>
                    <meta content="3"/>
                </div>
            </div>

<h1 class="breadcrumbs1">{{ $medicine->title }} - Адаптированная инструкция</h1>
                    <ul class="top-product-nav">
                @if($medicine->image->isNotEmpty())
                    <div class="product-slider clone-from" data-number="3">
                        <div class="product-slider-go">
                            @foreach($medicine->image as $image)
                                <div>
                                    <amp-img src="{{ $image->getImage() }}"
                                         alt="{{ empty($image->alt) ? $medicine->title.' '.$loop->iteration : $image->alt  }}"
                                         title="{{ empty($image->title) ? $title_default.'. '. $medicine->title.' '.$loop->iteration : $image->title }}"
                                            {!! image_width_height_return_tags($image->getImage()) !!}
                                    ></amp-img>
                                </div>
                            @endforeach
                        </div>
                        @if(empty($medicine->certified))
                            <div class="no-regist">
                                <div>
                                    нет регистрации
                                </div>
                                <a href="{{ route('medicine_analog', ['medicine'=>$medicine->alias]) }}/">Перейти к
                                    аналогам</a>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="product-slider clone-from" data-number="3">
                        <div class="product-slider-go">
                            <div>
                                <amp-img src="{{ asset('asset/images/mp.png') }}"
                                     alt="{{$medicine->title}}. Фото скоро появится"
                                     title="Фото скоро появится" width="270" height="270">
                                </amp-img>
                            </div>
                        </div>
                        @if(empty($medicine->certified))
                            <div class="no-regist">
                                <div>
                                    нет регистрации
                                </div>
                                <a href="{{ route('medicine_analog', ['medicine'=>$medicine->alias]) }}/">Перейти к
                                    аналогам</a>
                            </div>
                        @endif
                    </div>
                @endif

                        @if(!empty($medicine->consist))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/1_sostav.png"
                                     alt="Состав"
                                     title="Состав" width="16" height="8">
                                </amp-img>
                                <a href="#sostav">Состав</a>
                            </li>
                        @endif
                        @if(!empty($medicine->docs_form))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/19_lek_forma.png"
                                     alt="Лекарственная форма"
                                     title="Лекарственная форма" width="12" height="15">
                                </amp-img>
                                <a href="#lekforma">Лекарственная форма</a>
                            </li>
                        @endif
                        @if(!empty($medicine->physicochemical_char))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/11_svoystva.png"
                                     alt="Основные физико-химические свойства" width="12" height="13">
                                </amp-img>
                                <a href="#fizhimsvoistva">Основные физико-химические свойства</a>
                            </li>
                        @endif
                        @if(!empty($medicine->fabricator))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/20_proizvoditel.png"
                                     alt="Производитель" width="14" height="14">
                                </amp-img>
                                <a href="#proizvoditel">Производитель</a>
                            </li>
                        @endif
                        @if(!empty($medicine->addr_fabricator))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/21_mesto_proizvoditelya.png"
                                     alt="Местонахождение производителя" width="12" height="15">
                                </amp-img>
                                <a href="#adresproizvoditelya">Местонахождение производителя</a>
                            </li>
                        @endif
                        @if(!empty($medicine->pharm_group))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/18_farm_gruppa.png"
                                     alt="Фармакотерапевтическая группа" width="15" height="13">
                                </amp-img>
                                <a href="#farmgruppa">Фармакотерапевтическая группа</a>
                            </li>
                        @endif
                        @if(!empty($medicine->pharm_prop))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/2_svoystva.png"
                                     alt="Фармакологические свойства" width="14" height="13">
                                </amp-img>
                                <a href="#farmsvoistva">Фармакологические свойства</a>
                            </li>
                        @endif
                        @if(!empty($medicine->indications))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/3_pokazaniya.png"
                                     alt="Показания к применению" width="12" height="14">
                                </amp-img>
                                <a href="#pokazanij">Показания к применению</a>
                            </li>
                        @endif
                        @if(!empty($medicine->contraindications))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/6_protivopokazaniya.png"
                                     alt="Противопоказания" width="14" height="14">
                                </amp-img>
                                <a href="#protivipokazaniya">Противопоказания</a>
                            </li>
                        @endif
                        @if(!empty($medicine->security))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/12_mery_bezopasnosti.png"
                                     alt="Надлежащие меры безопасности при применении" width="13" height="15">
                                </amp-img>
                                <a href="#bezopastnost">Надлежащие меры безопасности при применении</a>
                            </li>
                        @endif
                        @if(!empty($medicine->application_features))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/4_primenenie.png"
                                     alt="Особенности применения" width="11" height="13">
                                </amp-img>
                                <a href="#osobennostprimeneniya">Особенности применения</a>
                            </li>
                        @endif
                        @if(!empty($medicine->pregnancy))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/7_beremennost.png"
                                     alt="Применение в период беременности или кормления грудью" width="12" height="13">
                                </amp-img>
                                <a href="#beremennost">Применение в период беременности или кормления грудью</a>
                            </li>
                        @endif
                        @if(!empty($medicine->cars))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/17_avto.png"
                                     alt="Способность влиять на скорость реакции при управлении автотранспортом" width="14" height="14">
                                </amp-img>
                                <a href="#avto">Способность влиять на скорость реакции при управлении
                                    автотранспортом</a>
                            </li>
                        @endif
                        @if(!empty($medicine->children))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/13_deti.png"
                                     alt="Дети" width="14" height="16">
                                </amp-img>
                                <a href="#deti">Дети</a>
                            </li>
                        @endif
                        @if(!empty($medicine->app_mode))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/23_sposob_primineniya.png"
                                     alt="Способ применения и дозы" width="11" height="15">
                                </amp-img>
                                <a href="#premenenieidosa">Способ применения и дозы</a>
                            </li>
                        @endif
                        @if(!empty($medicine->overdose))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/9_peredozirovka.png"
                                     alt="Передозировка" width="14" height="14">
                                </amp-img>
                                <a href="#peredoz">Передозировка</a>
                            </li>
                        @endif
                        @if(!empty($medicine->side_effects))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/5_pobochnie.png"
                                     alt="Побочные действия" width="14" height="12">
                                </amp-img>
                                <a href="#pobochnie">Побочные действия</a>
                            </li>
                        @endif
                        @if(!empty($medicine->interaction))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/8_vzabmodeystvie.png"
                                     alt="Лекарственное взаимодействие" width="14" height="14">
                                </amp-img>
                                <a href="#vzaimodeistvie">Лекарственное взаимодействие</a>
                            </li>
                        @endif
                        @if(!empty($medicine->shelf_life))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/14_srok.png"
                                     alt="Срок годности" width="14" height="13">
                                </amp-img>
                                <a href="#srokgodnosti">Срок годности</a>
                            </li>
                        @endif
                        @if(!empty($medicine->saving))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/15_hranenie.png"
                                     alt="Условия хранения" width="13" height="16">
                                </amp-img>
                                <a href="#usloviyahraneniya">Условия хранения</a>
                            </li>
                        @endif
                        @if(!empty($medicine->packaging))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/16_upakovka.png"
                                     alt="Упаковка" width="11" height="15">
                                </amp-img>
                                <a href="#upakovka">Упаковка</a>
                            </li>
                        @endif
                        @if(!empty($medicine->leave_cat))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/10_kategoriya.png"
                                     alt="Категория отпуска" width="10" height="13">
                                </amp-img>
                                <a href="#kategoriyaotpuska">Категория отпуска</a>
                            </li>
                        @endif
                        @if(!empty($medicine->additionally))
                            <li>
                                <amp-img src="{{ asset('assets') }}/images/product-icon/22_dopolnitelno.png"
                                     alt="Дополнительно" width="14" height="14">
                                </amp-img>
                                <a href="#dopolnitelno">Дополнительно</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

<div class="breadcrumbs1">
@if(!empty($medicine->consist))
    <div id="sostav" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/1_sostav.png" alt="Состав"  width="21" height="13"></amp-img>
		<h2>Состав</h2>
        </div>
        {!! $medicine->consist !!}
    </div>
@endif
@if(!empty($medicine->docs_form))
    <div id="lekforma" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/19_lek_forma.png" alt="Лекарственная форма" width="16" height="19"></amp-img>
            <h2>Лекарственная форма</h2>
        </div>
        {!! $medicine->docs_form !!}
    </div>
@endif
@if(!empty($medicine->physicochemical_char))
    <div id="fizhimsvoistva" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/11_svoystva.png"
                 alt="Основные физико-химические свойства" width="16" height="17">
            </amp-img>
            <h2>Основные физико-химические свойства</h2>
        </div>
        {!! $medicine->physicochemical_char !!}
    </div>
@endif
@if(!empty($medicine->fabricator))
    <div id="proizvoditel" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/20_proizvoditel.png" alt="Категория отпуска" width="18" height="18"></amp-img>
            <h2>Производитель</h2>
        </div>
        {!! $medicine->fabricator !!}
    </div>
@endif
@if(!empty($medicine->addr_fabricator))
    <div id="adresproizvoditelya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/21_mesto_proizvoditelya.png"
                 alt="Местонахождение производителя" width="16" height="19">
            </amp-img>
            <h2>Местонахождение производителя</h2>
        </div>
        {!! $medicine->addr_fabricator !!}
    </div>
@endif
@if(!empty($medicine->pharm_group))
    <div id="farmgruppa" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/18_farm_gruppa.png"
                 alt="Фармакотерапевтическая группа" width="19" height="17">
            </amp-img>
            <h2>Фармакотерапевтическая группа</h2>
        </div>
        {!! $medicine->pharm_group !!}
    </div>
@endif
@if(!empty($medicine->pharm_prop))
    <div id="farmsvoistva" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/2_svoystva.png" alt="Фармакологические свойства" width="18" height="17"></amp-img>
            <h2>Фармакологические свойства</h2>
        </div>
        {!! $medicine->pharm_prop !!}
    </div>
@endif
@if(!empty($medicine->indications))
    <div id="pokazanij" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/3_pokazaniya.png" alt="Показания к применению" width="16" height="18"></amp-img>
            <h2>Показания к применению</h2>
        </div>
        {!! $medicine->indications !!}
    </div>
@endif
</div>
    <div class="clone-to" data-number="1">
        {{--место для баннера 1 ПК версии только для mobile--}}
    </div>
<div class="breadcrumbs1">
@if(!empty($medicine->contraindications))
    <div id="protivipokazaniya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/6_protivopokazaniya.png" alt="Противопоказания" width="17" height="17"></amp-img>
            <h2>Противопоказания</h2>
        </div>
        {!! $medicine->contraindications !!}
    </div>
@endif


@if(!empty($medicine->security))
    <div id="bezopastnost" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/12_mery_bezopasnosti.png"
                 alt="Надлежащие меры безопасности при применении" width="17" height="19">
            </amp-img>
            <h2>Надлежащие меры безопасности при применении</h2>
        </div>
        {!! $medicine->security !!}
    </div>
@endif
@if(!empty($medicine->application_features))
    <div id="osobennostprimeneniya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/4_primenenie.png" alt="Особенности применения"
                     width="15" height="17"></amp-img>
            <h2>Особенности применения</h2>
        </div>
        {!! $medicine->application_features !!}
    </div>
@endif
@if(!empty($medicine->pregnancy))
    <div id="beremennost" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/7_beremennost.png"
                 alt="Применение в период беременности или кормления грудью" width="16" height="17">
            </amp-img>
            <h2>Применение в период беременности или кормления грудью</h2>
        </div>
        {!! $medicine->pregnancy !!}
    </div>
@endif
@if(!empty($medicine->cars))
    <div id="avto" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/17_avto.png"
                 alt="Способность влиять на скорость реакции при управлении автотранспортом" width="18" height="18">
            </amp-img>
            <h2>Способность влиять на скорость реакции при управлении автотранспортом</h2>
        </div>
        {!! $medicine->cars !!}
    </div>
@endif
@if(!empty($medicine->children))
    <div id="deti" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/13_deti.png" alt="Дети" width="18" height="21"></amp-img>
            <h2>Дети</h2>
        </div>
        {!! $medicine->children !!}
    </div>
@endif
@if(!empty($medicine->app_mode))
    <div id="premenenieidosa" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/23_sposob_primineniya.png"
                 alt="Способ применения и дозы" width="15" height="19">
            </amp-img>
            <h2>Способ применения и дозы</h2>
        </div>
        {!! str_replace('<img', '<amp-img', $medicine->app_mode) !!}
    </div>
@endif
    </div>
    <div class="clone-to" data-number="1">
        {{-- отдельный баннер на mobile--}}
    </div>
<div class="breadcrumbs1">
@if(!empty($medicine->overdose))
    <div id="peredoz" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/9_peredozirovka.png" alt="Передозировка" width="18" height="18"></amp-img>
            <h2>Передозировка</h2>
        </div>
        {!! $medicine->overdose !!}
    </div>
@endif
@if(!empty($medicine->side_effects))
    <div id="pobochnie" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/5_pobochnie.png" alt="Побочные действия" width="18" height="15"></amp-img>
            <h2>Побочные действия</h2>
        </div>
        {!! $medicine->side_effects !!}
    </div>
@endif
@if(!empty($medicine->interaction))
    <div id="vzaimodeistvie" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/8_vzabmodeystvie.png"
                 alt="Лекарственное взаимодействие" width="18" height="18">
            </amp-img>
            <h2>Лекарственное взаимодействие</h2>
        </div>
        {!! $medicine->interaction !!}
    </div>
@endif
@if(!empty($medicine->shelf_life))
    <div id="srokgodnosti" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/14_srok.png" alt="Срок годности" width="18" height="17"></amp-img>
            <h2>Срок годности</h2>
        </div>
        {!! $medicine->shelf_life !!}
    </div>
@endif
@if(!empty($medicine->saving))
    <div id="usloviyahraneniya" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/15_hranenie.png" alt="Условия хранения" width="17" height="21"></amp-img>
            <h2>Условия хранения</h2>
        </div>
        {!! $medicine->saving !!}
    </div>
@endif
@if(!empty($medicine->packaging))
    <div id="upakovka" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/16_upakovka.png" alt="Упаковка" width="15" height="19"></amp-img>
            <h2>Форма выпуска / упаковка</h2>
        </div>
        {!! $medicine->packaging !!}
    </div>
@endif
@if(!empty($medicine->leave_cat))
    <div id="kategoriyaotpuska" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/10_kategoriya.png" alt="Категория отпуска" width="14" height="17"></amp-img>
            <h2>Категория отпуска</h2>
        </div>
        {!! $medicine->leave_cat !!}
    </div>
@endif
@if(!empty($medicine->additionally))
    <div id="dopolnitelno" class="top-product-nav-info admin-content">
        <div class="title-product-info">
            <amp-img src="{{ asset('assets') }}/images/product-icon/black/22_dopolnitelno.png" alt="Дополнительно" width="18" height="18"></amp-img>
            <h2>Дополнительно</h2>
        </div>
        {!! $medicine->additionally !!}
    </div>
@endif
</div><br><br><br>

<footer>
    <div class="footer-content">
        <div class="title_text_footer">
            {{--<p>САМОЛИЧЕНИЕ МОЖЕТ БЫТЬ ОПАСНЫМ ДЛЯ ВАШЕГО ЗДОРОВЬЯ!</p>--}}
        </div>
        <div class="footer-column-copyright">
            <div class="footer-three-column">
                <div class="footer-column">
                    <div class="meta-btn-footer">
                        <div class="about item_block_one">
                            {{--<p><a href="#!">О НАС</a>--}}
                                @if('about' == Route::currentRouteName())
                                   <p><a>О НАС</a></p>
                                @else
                                   <p> <a href="{{ route('about') }}/">О НАС</a></p>
                                @endif
                        </div>
                        <div class="preparation item_block_one">
                            @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/farm-gruppa/')
                                <p>ПРЕПАРАТЫ</p>
                            @else
                                <p><a href="https://medpravda.ua/sort/alfavit/">ПРЕПАРАТЫ</a></p>
                            @endif

                            <ul>
                                @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/farm-gruppa/')
                                    <li>ФАРМАКОТЕРАПЕВТИЧЕСКАЯ ГРУППА</li>
                                    @else
                                    <li><a href="https://medpravda.ua/sort/farm-gruppa/">ФАРМАКОТЕРАПЕВТИЧЕСКАЯ ГРУППА</a></li>
                                @endif

                                    @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/veshestvo/')
                                        <li>ДЕЙСТВУЮЩЕЕ ВЕЩЕСТВО</li>
                                    @else
                                        <li><a href="https://medpravda.ua/sort/veshestvo/">ДЕЙСТВУЮЩЕЕ ВЕЩЕСТВО</a></li>
                                    @endif

                                    @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/mnn/')
                                        <li>МЕЖДУНАРОДНОЕ НАЗВАНИЕ МНН</li>
                                    @else
                                        <li><a href="https://medpravda.ua/sort/mnn/">МЕЖДУНАРОДНОЕ НАЗВАНИЕ МНН</a></li>
                                    @endif


                                    @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/atx/')
                                        <li>АТХ-КЛАССИФИКАЦИЯ</li>
                                    @else
                                        <li><a href="https://medpravda.ua/sort/atx/">АТХ-КЛАССИФИКАЦИЯ</a></li>
                                    @endif

                                    @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/proizvoditel/')
                                        <li>ПРОИЗВОДИТЕЛИ</li>
                                    @else
                                        <li><a href="https://medpravda.ua/sort/proizvoditel/">ПРОИЗВОДИТЕЛИ</a></li>
                                    @endif

                            </ul>
                        </div>
                    </div>
                    <div class="lang-footer">
			<br><br>
                        <ul>
                            <li>
                                @if('conditions' == Route::currentRouteName())
                                    <a>Условия использования сайта</a>
                                @else
                                    <a href="{{ route('conditions') }}/">Условия использования сайта</a>
                                @endif
                            </li>
                            <li>
                                @if('convention' == Route::currentRouteName())
                                    <a>Конфиденциальности и Cookie-файлы</a>
                                @else
                                    <a href="{{ route('convention') }}/">Конфиденциальности и Cookie-файлы</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-column">
                    <div class="supplements item_block_two">
                        @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/bads/all/')
                            <p>ДИЕТИЧЕСКИЕ ДОБАВКИ</p>
                            @else
                            <p><a href="https://medpravda.ua/sort/bads/all/">ДИЕТИЧЕСКИЕ ДОБАВКИ</a></p>
                        @endif

                    </div>
                    <div class="cosmetics item_block_two">
                        <p><a href="#!">КОСМЕТИЧЕСКИЕ СРЕДСТВА</a></p>
                    </div>
                    <div class="products item_block_two">
                        <p><a href="#!">ИЗДЕЛИЯ МЕДИЦИНСКОГО НАЗНАЧЕНИЯ</a></p>
                    </div>
                    <div class="advertising item_block_two">
                        @if('adv' == Route::currentRouteName())
                            <p><a>РЕКЛАМА НА САЙТЕ</a></p>
                        @else
                            <p><a href="{{ route('adv') }}/">РЕКЛАМА НА САЙТЕ</a></p>
                        @endif
                    </div>
                    <div class="cooperation item_block_two">
                        @if('cooperation' == Route::currentRouteName())
                            <p><a>СОТРУДНИЧЕСТВО</a></p>
                        @else
                            <p><a href="{{ route('cooperation') }}/">СОТРУДНИЧЕСТВО</a></p>
                        @endif
                    </div>
                </div>
                <div class="footer-column">
                    <div class="products item_block_three">
                        @if(Request::fullUrl().'/' == 'https://medpravda.ua/fresh-articles/')
                            <p>СВЕЖИЕ СТАТЬИ</p>
                            @else
                            <p><a href="https://medpravda.ua/fresh-articles/">СВЕЖИЕ СТАТЬИ</a></p>
                        @endif

                        <ul>
                            @if(Request::fullUrl().'/' == 'https://medpravda.ua/fresh-articles/cat/intimnye-temy/')
                                <li>ИНТИМНЫЕ ТЕМЫ</li>
                                @else
                                <li><a href="https://medpravda.ua/fresh-articles/cat/intimnye-temy/">ИНТИМНЫЕ ТЕМЫ</a></li>
                            @endif

                                @if(Request::fullUrl().'/' == 'https://medpravda.ua/fresh-articles/cat/zabluzhdeniya/')
                                    <li>ЗАБЛУЖДЕНИЯ</li>
                                @else
                                    <li><a href="https://medpravda.ua/fresh-articles/cat/zabluzhdeniya/">ЗАБЛУЖДЕНИЯ</a></li>
                                @endif

                                @if(Request::fullUrl().'/' == 'https://medpravda.ua/fresh-articles/cat/pitanie-i-dieta/')
                                    <li>ПИТАНИЕ И ДИЕТА</li>
                                @else
                                    <li><a href="https://medpravda.ua/fresh-articles/cat/pitanie-i-dieta/">ПИТАНИЕ И ДИЕТА</a></li>
                                @endif
                        </ul>
                    </div>
                    <div class="advertising item_block_two">
                        <p><a href="https://medpravda.ua/top-themes/">ПОПУЛЯРНЫЕ ТЕМЫ</a></p>
                    </div>

                    <div class="advertising item_block_two">
                        @if('articles_cat' == Route::currentRouteName())
                            <p><a>МОЙ МАЛЫШ</a></p>
                        @else
                            <p><a href="{{route('articles_cat', ['cat_alias'=> 'moy-malysh'])}}/">МОЙ МАЛЫШ</a></p>
                        @endif
                    </div>

                    <div class="cooperation item_block_two">
                        @if(Request::url() === 'https://medpravda.ua/top-articles/')
                            <p>ТОП СТАТЬИ</p>
                            @else
                            <p><a href="https://medpravda.ua/top-articles/">ТОП СТАТЬИ</a></p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="totop totop-color">
        <div class="totop-background">
            <div class="line"></div>
        </div>
    </div>

</footer>


</body>
</html>
@if(!empty($medicine))
    <section class="content m-top">
        <div class="wrap">
            {{--BreadCrumbs--}}
            <script type="application/ld+json">
                {
                    "@context": "http://schema.org",
                     "@type": "BreadcrumbList",
                     "itemListElement": [{
                          "@type": "ListItem",
                          "position": 1,
                          "item": {
                               "@id": "{{ route('main') . '/' }}",
                               "name": "Главная"
                          }
                     }, {
                          "@type": "ListItem",
                          "position": 2,
                          "item": {
                               "@id": "{{ route('sort') . '/' }}",
                               "name": "Поиск препаратов"
                          }
                     }, {
                          "@type": "ListItem",
                          "position": 3,
                          "item": {
                            "@id": "{{url()->current() . '/'}}",
                               "name": "Адаптированная инструкция"
                          }
                     }]
                }
            </script>

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
            {{--BreadCrumbs--}}
            <h1 itemprop="Name">{{ $medicine->title }} - Адаптированная инструкция.</h1>
            @if(!empty($editor))
            <h2><i style="    font-size: 14px;
    color: #2C2C2D;
    margin: 0px;">Редактор</i> - <a href="https://medpravda.ua/editors/">{{$editor->last_name}} {{$editor->first_name}}</a></h2>
            @endif
            <div class="clone-to" data-number="3"></div>
            <div class="product-nav">
                @if(!empty($medicine->adaptive))
                    <a href="{{ route('medicine_official', ['medicine'=>$medicine->alias]) }}/"
                       class="nav-button-grey">
                        Официальная инструкция
                    </a>
                @endif
                <a class="nav-button-grey active">Адаптированная инструкция</a>
                <a href="{{ route('medicine_analog', ['medicine'=>$medicine->alias]) }}/"
                   class="nav-button-grey">Аналоги</a>
                <a href="{{ route('medicine_faq', ['medicine'=>$medicine->alias]) }}/"
                   class="nav-button-grey">Вопросы</a>
            </div>
            <div class="product-nav-img">
                <div class="product-nav-block">
                    <div class="wrap_btn">
                        <a href="{{ route('medicine_ua', ['medicine'=>$medicine->alias]) }}/"
                           class="button-blue">Перевести</a>
                        <a href="{{ route('medicine', ['medicine'=>$medicine->alias]) }}/price/kiev/" class="button-blue">Цена</a>
                    </div>
                    <ul class="top-product-nav">
                        @if(!empty($medicine->consist))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/1_sostav.png"
                                     alt="Состав" title="Состав" width="16" height="8">
                                <a href="#sostav">Состав</a>
                            </li>
                        @endif
                        @if(!empty($medicine->docs_form))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/19_lek_forma.png"
                                     alt="Лекарственная форма" title="Лекарственная форма" width="12" height="15">
                                <a href="#lekforma">Лекарственная форма</a>
                            </li>
                        @endif
                        @if(!empty($medicine->physicochemical_char))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/11_svoystva.png"
                                     alt="Основные физико-химические свойства" width="12" height="13">
                                <a href="#fizhimsvoistva">Основные физико-химические свойства</a>
                            </li>
                        @endif
                        @if(!empty($medicine->fabricator))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/20_proizvoditel.png"
                                     alt="Производитель" width="14" height="14">
                                <a href="#proizvoditel">Производитель</a>
                            </li>
                        @endif
                        @if(!empty($medicine->addr_fabricator))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/21_mesto_proizvoditelya.png"
                                     alt="Местонахождение производителя" width="12" height="15">
                                <a href="#adresproizvoditelya">Местонахождение производителя</a>
                            </li>
                        @endif
                        @if(!empty($medicine->pharm_group))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/18_farm_gruppa.png"
                                     alt="Фармакотерапевтическая группа" width="15" height="13">
                                <a href="#farmgruppa">Фармакотерапевтическая группа</a>
                            </li>
                        @endif
                        @if(!empty($medicine->pharm_prop))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/2_svoystva.png"
                                     alt="Фармакологические свойства" width="14" height="13">
                                <a href="#farmsvoistva">Фармакологические свойства</a>
                            </li>
                        @endif
                        @if(!empty($medicine->indications))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/3_pokazaniya.png"
                                     alt="Показания к применению" width="12" height="14">
                                <a href="#pokazanij">Показания к применению</a>
                            </li>
                        @endif
                        @if(!empty($medicine->contraindications))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/6_protivopokazaniya.png"
                                     alt="Противопоказания" width="14" height="14">
                                <a href="#protivipokazaniya">Противопоказания</a>
                            </li>
                        @endif
                        @if(!empty($medicine->security))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/12_mery_bezopasnosti.png"
                                     alt="Надлежащие меры безопасности при применении" width="13" height="15">
                                <a href="#bezopastnost">Надлежащие меры безопасности при применении</a>
                            </li>
                        @endif
                        @if(!empty($medicine->application_features))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/4_primenenie.png"
                                     alt="Особенности применения" width="11" height="13">
                                <a href="#osobennostprimeneniya">Особенности применения</a>
                            </li>
                        @endif
                        @if(!empty($medicine->pregnancy))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/7_beremennost.png"
                                     alt="Применение в период беременности или кормления грудью" width="12" height="13">
                                <a href="#beremennost">Применение в период беременности или кормления грудью</a>
                            </li>
                        @endif
                        @if(!empty($medicine->cars))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/17_avto.png"
                                     alt="Способность влиять на скорость реакции при управлении автотранспортом" width="14" height="14">
                                <a href="#avto">Способность влиять на скорость реакции при управлении
                                    автотранспортом</a>
                            </li>
                        @endif
                        @if(!empty($medicine->children))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/13_deti.png"
                                     alt="Дети" width="14" height="16">
                                <a href="#deti">Дети</a>
                            </li>
                        @endif
                        @if(!empty($medicine->app_mode))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/23_sposob_primineniya.png"
                                     alt="Способ применения и дозы" width="11" height="15">
                                <a href="#premenenieidosa">Способ применения и дозы</a>
                            </li>
                        @endif
                        @if(!empty($medicine->overdose))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/9_peredozirovka.png"
                                     alt="Передозировка" width="14" height="14">
                                <a href="#peredoz">Передозировка</a>
                            </li>
                        @endif
                        @if(!empty($medicine->side_effects))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/5_pobochnie.png"
                                     alt="Побочные действия" width="14" height="12">
                                <a href="#pobochnie">Побочные действия</a>
                            </li>
                        @endif
                        @if(!empty($medicine->interaction))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/8_vzabmodeystvie.png"
                                     alt="Лекарственное взаимодействие" width="14" height="14">
                                <a href="#vzaimodeistvie">Лекарственное взаимодействие</a>
                            </li>
                        @endif
                        @if(!empty($medicine->shelf_life))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/14_srok.png"
                                     alt="Срок годности" width="14" height="13">
                                <a href="#srokgodnosti">Срок годности</a>
                            </li>
                        @endif
                        @if(!empty($medicine->saving))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/15_hranenie.png"
                                     alt="Условия хранения" width="13" height="16">
                                <a href="#usloviyahraneniya">Условия хранения</a>
                            </li>
                        @endif
                        @if(!empty($medicine->packaging))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/16_upakovka.png"
                                     alt="Упаковка" width="11" height="15">
                                <a href="#upakovka">Упаковка</a>
                            </li>
                        @endif
                        @if(!empty($medicine->leave_cat))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/10_kategoriya.png"
                                     alt="Категория отпуска" width="10" height="13">
                                <a href="#kategoriyaotpuska">Категория отпуска</a>
                            </li>
                        @endif
                        @if(!empty($medicine->additionally))
                            <li>
                                <img src="{{ asset('assets') }}/images/product-icon/22_dopolnitelno.png"
                                     alt="Дополнительно" width="14" height="14">
                                <a href="#dopolnitelno">Дополнительно</a>
                            </li>
                        @endif
                    </ul>
                </div>
                @if($medicine->image->isNotEmpty())
                    <div class="product-slider clone-from" data-number="3">
                        <div class="product-slider-go">
                            @foreach($medicine->image as $image)
                                <div>
                                    <img src="{{ $image->getImage() }}"
                                         alt="{{ empty($image->alt) ? $medicine->title.' '.$loop->iteration : $image->alt  }}"
                                         title="{{ empty($image->title) ? $title_default.'. '. $medicine->title.' '.$loop->iteration : $image->title }}"
                                         width="405" height="405">
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
                                <img src="{{ asset('asset/images/mp.png') }}"
                                     alt="{{$medicine->title}}. Фото скоро появится"
                                     title="Фото скоро появится" width="270" height="270">
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
            </div>

            @include('medicines.content', $medicine)


            <div class="print">
                <a href="{{ route('toprint', ['medicine'=>$medicine->alias, 'vr'=>'adaptive']) }}/">
                    <img src="{{ asset('assets') }}/images/main/icons.png" alt="Версия для печати" width="64" height="98">
                    Версия для печати
                </a>
            </div>
            <div class="product-info-down">
                @if(!empty($medicine->dose))
                    <div id="dozirovka">
                        <h5>Дозировка:</h5>
                        <p>{{ $medicine->dose }}</p>
                    </div>
                @endif
                @if(!empty($medicine->fabricator_name->title))
                    <div id="proizvoditel">
                        <h5>Производитель:</h5>
                        <a href="{{ route('search_fabricator',
                        ['val'=>'A', 'fabricator'=> $medicine->fabricator_name->alias]) }}/">
                            <p>{{ $medicine->fabricator_name->title }}</p>
                        </a>
                    </div>
                @endif
                @if(!empty($medicine->innname->title))
                    <div id="mhh">
                        <h5>МНН:</h5>
                        <a href="{{ route('search_mnn', ['val'=> $medicine->innname->alias]) }}/">
                            <p>{{ $medicine->innname->title }}</p>
                        </a>
                    </div>
                @endif
                @if(!empty($medicine->pharmagroup->title))
                    <div id="farm-group">
                        <h5>Фарм. группа:</h5>
                        <a href="{{ route('search_farm', ['val'=>$medicine->pharmagroup->alias]) }}/">
                            <p>{{ $medicine->pharmagroup->title }}</p>
                        </a>
                    </div>
                @endif
                @if(!empty($medicine->reg))
                    <div id="reg">
                        <h5>Регистрация:</h5>
                        <p>{{ $medicine->reg }}</p>
                    </div>
                @endif
                @if(!empty($classes))
                    <div id="kod-atx">
                        <?php
                            $atx = array_slice($classes, -1);
                        ?>
                        <h5>Код АТХ:
                            @foreach($atx as $x=>$name)
                                <sup>{{ $x }}</sup>
                            @endforeach
                        </h5>
                        @foreach($classes as $class=>$name)
                            <a href="{{ route('search_atx', ['val'=>$name['class'] ]) }}/">
                                <p>{{ $class .' - '. $name['name'] }}</p>
                            </a>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </section>
    @if(!empty($editor))
        <section class="content m-top">
            <div class="section-title-meta-icon">
                <h3>
                    Редакция
                </h3>
            </div>
            <div class="editor-block">
                <div class="editor-img">
                    <img src="{{asset('storage/editors/' . $editor->author_img)}}" alt="">
                </div>
                <div class="editor-info">
                    <h3>Автор статьи</h3>
                    <h2>{{$editor->last_name}} {{$editor->first_name}} {{$editor->middle_name}}</h2>
                    <p class="specialty">
                        {{$editor->specialty}}
                    </p>
                    @if(!empty($editor->specialization))
                        <p class="specialization">
                            Специализация {{$editor->specialization}}
                        </p>
                    @endif
                    @switch($editor->academic_degree)
                        @case(1)
                            <p class="academic_degree">
                                Кандидат медицинских наук
                            </p>
                            @break
                        @case(2)
                            <p class="academic_degree">
                                Доктор медицинских наук
                            </p>
                            @break
                    @endswitch
                    <a href="https://medpravda.ua/editors/" class="editor_link">ПОДРОБНЕЕ</a>
                </div>

            </div>

        </section>
    @endif
    {!!  $priceGoogl !!}
@endif

<style>
    .editor-block{
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
    }
    .editor-img{
        width: 35%;
    }
    .editor-img img{
        width: 100%;
    }
    .editor-info{
        padding: 0px 10px 0px 30px;
        width: 65%;
        display: flex;
        flex-direction: column;
    }
    .editor-info h3{
        font-size: 14px;
        color: #2C2C2D;
        margin: 0px;
    }
    .editor-info h2{
        color: #598FBD;
        margin-top: 2px;
        margin-bottom: 10px;
        font-size: 18px;
    }
    p.specialty{
        color: #000;
        margin-bottom: 8px;
    }
    p{
        font-size: 18px;
        padding-bottom: 5px;
        color: #2C2C2D;
    }
    p.academic_degree{
        font-weight: 600;
        font-size: 14px;
    }
    a.editor_link{
        color: #000;
        font-size: 18px;
        margin-top: 15px;
    }
    a.editor_link:after{
        content: '>';
        margin: 0 -8px 3px 7px;
        width: 6px;
        height: 8px;
        font-size: 14px;
        display: inline-block;
        color: #2C2C2D;
    }
    a.editor_link:hover, a.editor_link:hover:after{
        color: #598FBD;
    }
</style>
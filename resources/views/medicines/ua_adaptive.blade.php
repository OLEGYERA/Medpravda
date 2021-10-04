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
                               "@id": "{{ route('main', ['loc'=>'ua']) . '/' }}",
                               "name": "Головна"
                          }
                     }, {
                          "@type": "ListItem",
                          "position": 2,
                          "item": {
                               "@id": "{{ route('search_alpha_u') . '/' }}",
                               "name": "Пошук препаратів"
                          }
                     }, {
                          "@type": "ListItem",
                          "position": 3,
                          "item": {
                            "@id": "{{url()->current() . '/'}}",
                               "name": "Адаптована інструкція"
                          }
                     }]
                }
            </script>

            <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs">
                <div class="button">
                    <a href="{{ route('main', ['loc'=>'ua']) }}">
                        <span class="label1">Головна</span>
                        <meta content="1"/>
                    </a>
                </div>
                <div class="button">
                    <a href="{{ route('search_alpha_u') }}" itemprop="item">
                        <span class="label1">Пошук препаратів</span>
                        <meta content="2"/>
                    </a>
                </div>
                <div class="button">
                    <span class="label1">Адаптована інструкція</span>
                    <meta content="3"/>
                </div>
            </div>
            {{--BreadCrumbs--}}
            <h1>{{ $medicine->title }} - Адаптована інструкція</h1>
            @if(!empty($editor))
                <h2><i style="    font-size: 14px;
    color: #2C2C2D;
    margin: 0px;">Редактор</i> - <a href="https://medpravda.ua/editors/">{{$editor->last_name}} {{$editor->first_name}}</a></h2>
            @endif
            <div class="clone-to" data-number="3"></div>
            <div class="product-nav">
                @if(!empty($medicine->adaptive))
                    <a href="{{ route('medicine_official_ua', ['medicine'=>$medicine->alias]) }}/"
                       class="nav-button-grey">
                        Офіційна інструкція
                    </a>
                @endif
                <a class="nav-button-grey active">Адаптована інструкція</a>
                <a href="{{ route('medicine_analog_ua', ['medicine'=>$medicine->alias]) }}/"
                   class="nav-button-grey">Аналоги</a>
                <a href="{{ route('medicine_faq_ua', ['medicine'=>$medicine->alias]) }}/"
                   class="nav-button-grey">Запитання</a>
            </div>
            <div class="product-nav-img">
                <div class="product-nav-block">

                    <div class="wrap_btn">
                        <a href="{{ route('medicine', ['medicine'=>$medicine->alias]) }}/" class="button-blue">Перекласти</a>
                        <a href="{{ route('medicine_ua', ['medicine'=>$medicine->alias]) }}/price/kiev/" class="button-blue">Ціна</a>
                    </div>
                    @include('medicines.ua_anchor', $medicine)

                </div>
                @if($medicine->image->isNotEmpty())
                    <div class="product-slider clone-from" data-number="3">
                        <div class="product-slider-go">
                            @foreach($medicine->image as $image)
                                <div>
                                    <img src="{{ $image->getImage() }}"
                                         alt="{{ empty($image->alt) ? $medicine->title.' '.$loop->iteration : $image->alt  }}"
                                         title="{{ empty($image->title) ? $title_default.'. '.' '.$loop->iteration : $image->title }}"
                                        {!! image_width_height_return_tags($image->getImage()) !!}
                                    >
                                </div>
                            @endforeach
                        </div>
                        @if(empty($medicine->certified))
                            <div class="no-regist">
                                <div>
                                    Відсутня Реєстрація
                                </div>
                                <a href="{{ route('medicine_analog_ua', ['medicine'=>$medicine->alias]) }}/">Перейти до
                                    аналогів</a>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="product-slider clone-from" data-number="3">
                        <div class="product-slider-go">
                            <div>
                                <img src="{{ asset('asset/images/mp.png') }}"
                                     alt="{{$medicine->title}}. Фото скоро з'явиться"
                                     title="Фото скоро з'явиться" width="270" height="270">
                            </div>
                        </div>
                        @if(empty($medicine->certified))
                            <div class="no-regist">
                                <div>
                                    Відсутня Реєстрація
                                </div>
                                <a href="{{ route('medicine_analog_ua', ['medicine'=>$medicine->alias]) }}/">Перейти до
                                    аналогів</a>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            @include('medicines.ua_content', $medicine)


            <div class="print">
                <a href="{{ route('toprint_ua', ['medicine'=>$medicine->alias, 'vr'=>'adaptive']) }}/">
                    <img src="{{ asset('assets') }}/images/main/icons.png"
                         alt="Версія для друку" width="64" height="98">
                    Версія для друку
                </a>
            </div>
            <div class="product-info-down">
                @if(!empty($medicine->dose))
                    <div id="dozirovka">
                        <h5>Дозування:</h5>
                        <p>{{ $medicine->dose }}</p>
                    </div>
                @endif
                @if(!empty($medicine->fabricator_name->utitle))
                    <div id="proizvoditel">
                        <h5>Виробник:</h5>
                        <a href="{{ route('search_fabricator_u',
                        ['val'=>'A', 'fabricator'=> $medicine->fabricator_name->alias]) }}/">
                            <p>{{ $medicine->fabricator_name->utitle }}</p>
                        </a>
                    </div>
                @endif
                @if(!empty($medicine->innname->title))
                    <div id="mhh">
                        <h5>МНН:</h5>
                        <a href="{{ route('search_mnn_u', ['val'=> $medicine->innname->alias]) }}/">
                            <p>{{ $medicine->innname->title }}</p>
                        </a>
                    </div>
                @endif
                @if(!empty($medicine->pharmagroup->utitle))
                    <div id="farm-group">
                        <h5>Фарм. група:</h5>
                        <a href="{{ route('search_farm_u', ['val'=>$medicine->pharmagroup->alias]) }}/">
                            <p>{{ $medicine->pharmagroup->utitle }}</p>
                        </a>
                    </div>
                @endif
                @if(!empty($medicine->reg))
                    <div id="reg">
                        <h5>Реєстрація:</h5>
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
                            <a href="{{ route('search_atx_u', ['val'=>$name['class'] ]) }}/">
                                <p>{{ $class .' - '. $name['uname'] }}</p>
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
@endif
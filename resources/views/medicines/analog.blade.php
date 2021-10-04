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
                               "@id": "{{ route('medicine', ['medicine'=>$medicine->alias]) . '/' }}",
                               "name": "{{ $medicine->title }}"
                          }

                     }, {
                        "@type": "ListItem",
                        "position": 4,
                        "item": {
                             "@id": "{{url()->current() . '/'}}",
                             "name": "Аналоги"
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
                <a href="{{ route('medicine', ['medicine'=>$medicine->alias]) }}">
                    <span class="label1">{{ $medicine->title }}</span>
                    <meta content="3"/>
                </a>
            </div>
            <div class="button">
                <span class="label1">Аналоги</span>
                <meta content="4"/>
            </div>
        </div>
        {{--BreadCrumbs--}}

        <h1>{{ $medicine->title }}: аналоги</h1>
        <div class="product-nav">
            @if($medicine->adaptive)
                <a href="{{ route('medicine_official', ['medicine'=>$medicine->alias]) }}"
                   class="nav-button-grey">Официальная
                    инструкция</a>
            @endif
            <a href="{{ route('medicine', ['medicine'=>$medicine->alias]) }}"
               class="nav-button-grey">Адаптированная инструкция</a>
            <a class="nav-button-grey active">Аналоги</a>
            <a href="{{ route('medicine_faq', ['medicine'=>$medicine->alias]) }}" class="nav-button-grey">Вопросы</a>
            {{-- TODO добавил текст , что бы не была пустая страница ( нужно выводить только 100 символов) --}}
            <div class="text-analog">
                @php
                    $med_text = (!empty($medicine->application_features))
                    ? $medicine->application_features
                    : $medicine->consist;

                    $features_text = preg_replace('/<p>|<\/p>/','',$med_text);
                    $features_text = str_limit($features_text,1000);
                @endphp
                {{--$medicine->application_features--}}
                @if(!empty($features_text) && $features_text != " ")
                    @if($medicine->adaptive)
                        <p>{!! $features_text !!} <a href="{{route('medicine_official', ['medicine'=>$medicine->alias]).'#osobennostprimeneniya'}}">Продолжить читать</a></p>
                    @else
                        <p>{!! $features_text !!} <a href="{{route('medicine', ['medicine'=>$medicine->alias])}}">Читать инструкцию</a></p>
                    @endif
                @else
                    <p>{{$medicine->title}} - Аналоги препарата <a href="{{route('medicine', ['medicine'=>$medicine->alias])}}">Перейти к иструкции</a></p>
                @endif
            </div>
        </div>
        <div class="product-analog">
            <h2 class="product-title">Форма выпуска</h2>
            <div class="product-nav product-nav-analog">
                @foreach($forms as $alias=>$form)
                    <a class="nav-button-grey" data-form-id="{{ $alias }}">{{ $form }}</a>
                @endforeach
            </div>

            @foreach($analogs as $analog)
                @continue($analog->title == $medicine->title)
                <div class="analog {{ $analog->form->alias }}">
                    <a href="{{ route('medicine', ['medicine'=>$analog->alias]) }}">
                        <h3>{{ $analog->title }}</h3></a>
                    <div>
                        <span>Действующие вещества:</span>
                        @foreach($analog->substance as $substance)
                            <a href="{{ route('search_substance', ['val'=>$substance->alias]) }}">
                                {{ $substance->title }}
                            </a>
                            @if($loop->last)
                                <span>. </span>
                            @else
                                <span>, </span>
                            @endif
                        @endforeach
                    </div>
                    <div>
                        <span>Код АТХ:</span>
                        <a href="{{ route('search_atx', ['val'=>$analog->classification->class ]) }}">
                            {{ $analog->classification->class }}
                        </a>
                    </div>
                    <div>

                    </div>
                </div>
                <!-- TODO на ua_analog работает, не работает тут :( -->
                @if(4 == $loop->iteration)
                    {{--banner 4 for mobile--}}
        </div>
    </div>
    <div class="clone-to" data-number="1">
        @include('layouts.banners.bn3')
    </div>
    <div class="wrap">
        <div class="product-analog">

            @elseif(8 == $loop->iteration)
                {{--banner 5 for mobile--}}
        </div>
    </div>
    <div class="clone-to" data-number="1">
        @include('layouts.banners.bn4')
    </div>
    <div class="wrap">
        <div class="product-analog">
            @elseif(13 == $loop->iteration)
                {{--banner 6 for mobile--}}
        </div>
    </div>
    <div class="clone-to" data-number="1">
        @include('layouts.banners.bn1')
    </div>
    <div class="wrap">
        <div class="product-analog">
            @endif
            @endforeach
        </div>
    </div>
</section>
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
                         "@id": "{{route('medicine_ua', ['medicine'=>$medicine->alias]) . '/'}}",
                            "name": "Адаптована інструкція"
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
                <a href="{{ route('main', ['loc'=>'ua']) }}" >
                    <span class="label1">Головна</span>
                    <meta content="1"/>
                </a>
            </div>
            <div class="button">
                <a href="{{ route('sort') }}">
                    <span class="label1">Пошук препаратів</span>
                    <meta content="2"/>
                </a>
            </div>
            <div class="button">
                <a href="{{ route('medicine_ua', ['medicine'=>$medicine->alias]) }}" >
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
                <a href="{{ route('medicine_official_ua', ['medicine'=>$medicine->alias]) }}"
                   class="nav-button-grey">Офіційна інструкція
                </a>
            @endif
            <a href="{{ route('medicine_ua', ['medicine'=>$medicine->alias]) }}"
               class="nav-button-grey">Адаптована інструкція</a>
            <a class="nav-button-grey active">Аналоги</a>
            <a href="{{ route('medicine_faq_ua', ['medicine'=>$medicine->alias]) }}" class="nav-button-grey">
                Запитання
            </a>

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
                        <p>{!! $features_text !!} <a href="{{route('medicine_official_ua', ['medicine'=>$medicine->alias]).'#osobennostprimeneniya'}}">Продовжити читати</a></p>
                    @else
                        <p>{!! $features_text !!} <a href="{{route('medicine_ua', ['medicine'=>$medicine->alias])}}">Читати інструкцію</a></p>
                    @endif
                @else
                    <p><strong>{{$medicine->title}} - </strong>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci, delectus deleniti doloribus esse, ex fugit id itaque iusto libero minus neque nobis numquam odio porro recusandae repellat soluta vel vitae, voluptatibus! A amet aut ex, harum iste mollitia quia reiciendis! Aspernatur beatae culpa dolore, dolores dolorum eaque eos excepturi facere fugiat hic illum in ipsa ipsam iure magnam, minima neque nulla obcaecati optio quam quis reiciendis sint sit tempora velit veritatis vero! Ad alias aliquid animi, debitis deleniti facere fuga illo iste iusto necessitatibus odio officiis quisquam quod sed sint temporibus tenetur voluptatem. Cupiditate obcaecati quo sed sit veniam!
                        <a href="{{route('medicine', ['medicine_ua'=>$medicine->alias])}}">Перейти до інструкції</a></p>
                @endif
            </div>
        </div>
        <div class="product-analog">
            <h2 class="product-title">форма випуску</h2>
            <div class="product-nav product-nav-analog">
                @foreach($forms as $alias=>$form)
                    <a class="nav-button-grey" data-form-id="{{ $alias }}">{{ $form }}</a>
                @endforeach
            </div>
            @foreach($analogs as $analog)
                @continue($analog->title == $medicine->title)
                <div class="analog {{ $analog->form->alias }}">
                    <a href="{{ route('medicine_ua', ['medicine'=>$analog->alias]) }}">
                        <h3>{{ $analog->title }}</h3></a>
                    <div>
                        <span>Діюча речовина:</span>
                        @foreach($analog->substance as $substance)
                            <a href="{{ route('search_substance_u', ['val'=>$substance->alias]) }}">
                                {{ $substance->utitle }}
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
                        <a href="{{ route('search_atx_u', ['val'=>$analog->classification->class ]) }}">
                            {{ $analog->classification->class }}
                        </a>
                    </div>
                    <div>

                    </div>
                </div>
                <!-- TODO сделать фиксированную ширину картинки баннера -->
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
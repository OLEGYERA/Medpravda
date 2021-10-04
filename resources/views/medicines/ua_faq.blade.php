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
                         "@id": "{{route('medicine_ua', ['medicine'=>$medicine->alias]) . '/'}}",
                            "name": "Адаптована інструкція"
                       }
                  }, {
                      "@type": "ListItem",
                      "position": 4,
                      "item": {
                        "@id": "{{url()->current() . '/'}}",
                           "name": "Запитання"
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
                    <span class="label1">Запитання</span>
                    <meta content="4"/>
                </div>
            </div>
            {{--BreadCrumbs--}}
            <h1>{{ $medicine->title }} - Запитання до препарату</h1>
            <div class="clone-to" data-number="3"></div>
            <div class="product-nav">
                @if($medicine->adaptive)
                    <a href="{{ route('medicine_official_ua', ['medicine'=>$medicine->alias]) }}"
                       class="nav-button-grey">
                        Офіційна інструкція
                    </a>
                @endif
                <a href="{{ route('medicine_ua', ['medicine'=>$medicine->alias]) }}"
                   class="nav-button-grey ">Адаптована інструкція</a>
                <a href="{{ route('medicine_analog_ua', ['medicine'=>$medicine->alias]) }}"
                   class="nav-button-grey">Аналоги</a>
                <a class="nav-button-grey active">Запитання</a>

                <div>
                    <p>Запитання для - {{$medicine->title}}. В даний момент лікарі порталу МедПравда потужно працюють
                        над цим розділом. Скоро тут з'являться відповіді на хвилюючі Вас питання.</p>
                </div>

            </div>
            @if($medicine->questions->isNotEmpty())
                <div class="product-question accordion">
                    <ul>
                        @foreach($medicine->questions as $question)
                            <li class="accordion-item">
                                <h6>{{ $question->question }}</h6>
                                <div class="accordion-target">
                                    {!! $question->answer !!}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>
@endif
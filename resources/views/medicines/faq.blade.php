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
                               "@id": "{{ route('medicine', ['medicine'=>$medicine->alias]) . '/' }}",
                               "name": "{{ $medicine->title }}"
                          }

                     }, {
                        "@type": "ListItem",
                        "position": 4,
                        "item": {
                             "@id": "{{url()->current() . '/'}}",
                             "name": "Вопросы"
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
                    <a href="{{ route('medicine', ['medicine'=>$medicine->alias]) .'/' }}">
                        <span class="label1">{{ $medicine->title }}</span>
                        <meta content="3"/>
                    </a>
                </div>
                <div class="button">
                    <span class="label1">Вопросы</span>
                    <meta content="4"/>
                </div>
            </div>
            {{--BreadCrumbs--}}
            <h1>{{ $medicine->title }} - Вопросы по препарату</h1>
            <div class="clone-to" data-number="3"></div>
            <div class="product-nav">
                @if($medicine->adaptive)
                    <a href="{{ route('medicine_official', ['medicine'=>$medicine->alias]) }}"
                       class="nav-button-grey">
                        Официальная инструкция
                    </a>
                @endif
                <a href="{{ route('medicine', ['medicine'=>$medicine->alias]) }}"
                   class="nav-button-grey ">Адаптированная инструкция</a>
                <a href="{{ route('medicine_analog', ['medicine'=>$medicine->alias]) }}"
                   class="nav-button-grey">Аналоги</a>
                <a class="nav-button-grey active">Вопросы</a>
                <div>
                    <p>Вопросы для - {{$medicine->title}}. В данный момент врачи портала МедПравда активно работают над данным разделом. Скоро здесь появятся ответы на волнующие Вас вопросы.</p>
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
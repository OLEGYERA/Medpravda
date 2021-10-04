@if(!empty($faq))
    <section class="content m-top">
        <div class="wrap">
            {{--BreadCrumbs--}}
            <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs"
                 itemscope itemtype="http://schema.org/BreadcrumbList">
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <a href="{{ route('main', ['loc'=>'ua']) }}" itemprop="item">
                        <span itemprop="name" class="label1">Головна</span>
                        <meta itemprop="position" content="1"/>
                    </a>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <a href="{{ route('search_alpha_u') }}" itemprop="item">
                        <span itemprop="name" class="label1">Пошук препаратів</span>
                        <meta itemprop="position" content="2"/>
                    </a>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <a href="{{ route('cosmetic_get_adapted_ua', ['cosmetic_slug'=>$faq->slug]) }}" itemprop="item">
                        <span itemprop="name" class="label1">{{ $faq->title }}</span>
                        <meta itemprop="position" content="3"/>
                    </a>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <span itemprop="name" class="label1">Запитання</span>
                    <meta itemprop="position" content="4"/>
                </div>
            </div>
            {{--BreadCrumbs--}}
            <h1>{{ $faq->title }}</h1>
            <div class="clone-to" data-number="3"></div>
            <div class="product-nav">
                <a href="{{ route('cosmetic_get_official_ua', ['cosmetic_slug'=>$faq->slug]) }}"
                   class="nav-button-grey">
                    Офіційна інструкція
                </a>
                <a href="{{ route('cosmetic_get_adapted_ua', ['cosmetic_slug'=>$faq->slug]) }}"
                   class="nav-button-grey ">Адаптована інструкція</a>
                <a class="nav-button-grey active">Запитання</a>
            </div>
            @if(null != $faq->questions)
                <div class="product-question accordion">
                    <ul>
                        @foreach($faq->questions['ua'] as $question)
                            <li class="accordion-item">
                                <h6>{{ $question['question'] }}</h6>
                                <div class="accordion-target">
                                    {!! $question['answer'] !!}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>
@endif
@if(!empty($faq))
    <section class="content m-top">
        <div class="wrap">
            {{--BreadCrumbs--}}
            <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs"
                 itemscope itemtype="http://schema.org/BreadcrumbList">
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <a href="{{ route('main') }}" itemprop="item">
                        <span itemprop="name" class="label1">Главная</span>
                        <meta itemprop="position" content="1"/>
                    </a>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <a href="{{ route('sort') }}" itemprop="item">
                        <span itemprop="name" class="label1">Поиск препаратов</span>
                        <meta itemprop="position" content="2"/>
                    </a>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <a href="{{ route('cosmetic_get_adapted', ['cosmetic_slug'=>$faq->slug]) }}" itemprop="item">
                        <span itemprop="name" class="label1">{{ $faq->title }}</span>
                        <meta itemprop="position" content="3"/>
                    </a>
                </div>
                <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                    <span itemprop="name" class="label1">Вопросы</span>
                    <meta itemprop="position" content="4"/>
                </div>
            </div>
            {{--BreadCrumbs--}}
            <h1>{{ $faq->title }} инструкция и цена в аптеках</h1>
            <div class="clone-to" data-number="3"></div>
            <div class="product-nav">
                <a href="{{ route('cosmetic_get_official', ['cosmetic_slug'=>$faq->slug]) }}"
                   class="nav-button-grey">
                    Официальная инструкция
                </a>
                <a href="{{ route('cosmetic_get_adapted', ['cosmetic_slug'=>$faq->slug]) }}"
                   class="nav-button-grey ">Адаптированная инструкция</a>
                <a class="nav-button-grey active">Вопросы</a>
            </div>
            @if(null != $faq->questions)
                <div class="product-question accordion">
                    <ul>
                        @foreach($faq->questions['ru'] as $question)
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
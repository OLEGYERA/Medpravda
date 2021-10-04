<section class="content m-top">
    <div class="wrap">
        {{--BreadCrumbs--}}
        <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
             itemtype="http://schema.org/BreadcrumbList">
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <a href="{{ route('main') }}/" itemprop="item">
                    <span itemprop="name" class="label1">Главная</span>
                </a>
                <meta itemprop="position" content="1"/>
            </div>
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <a itemprop="item" class="none-link">
                    <span itemprop="name" class="label1">Болезни и симптомы</span>
                </a>
                <meta itemprop="position" content="2"/>
            </div>
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <a href="" itemprop="item">
                    <span itemprop="name" class="label1">Болезни</span>
                </a>
                <meta itemprop="position" content="3"/>
            </div>
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <span itemprop="name" class="label1">Бактириальные инфекции</span>
                <meta itemprop="position" content="4"/>
                <meta itemprop="item" content="{{url()->current() . '/'}}">
            </div>
        </div>
        {{--BreadCrumbs--}}
        <div class="flexibal-content-start title-image">
            <img src="{{ asset('assets') }}/images/iscon-des.png"
                 alt="">
            <h1>Бактириальные инфекции</h1>
        </div>
        <div class="list-all-links">
            <p>Бактерии — это микроскопические одноклеточные организмы. Существуют тысячи разных видов бактерий.
                Они живут в любой среде по всему миру. Они живут в земле, морской воде и глубоко в земной коре.
                Некоторые бактерии могут обитать даже в радиоактивных отходах. Многие бактерии живут в организме
                людей и животных — на коже и в дыхательных путях, во рту, пищеварительном тракте, половых и
                мочевыводящих путях, — не причиняя вреда. Такие бактерии получили название резидентной флоры,
                или «бактерии-микробиоты». Многие представители резидентной флоры действительно приносят пользу
                человеку, например, помогая ему переваривать пищу или препятствуя росту других, более опасных
                видов бактерий.</p>
            <a href="" class="title-image">
                <img src="{{ asset('assets') }}/images/list-all-article.png"
                     alt="">
                Общее описание бактерий
            </a>
            <a href="" class="title-image">
                <img src="{{ asset('assets') }}/images/list-all-article.png"
                     alt="">
                Актиномикоз
            </a>
            <a href="" class="title-image">
                <img src="{{ asset('assets') }}/images/list-all-article.png"
                     alt="">
                Сибирская язва
            </a>
            <a href="" class="title-image">
                <img src="{{ asset('assets') }}/images/list-all-article.png"
                     alt="">
                Бессонница и чрезмерная дневная сонливость
            </a>
        </div>


{{--TODO забрать шаблон цытаты в админку--}}
        <div class="admin-content">
            <p>Бактерии — это микроскопические одноклеточные организмы. Существуют тысячи разных видов бактерий.
                Они живут в любой среде по всему миру. Они живут в земле, морской воде и глубоко в земной коре.
                Некоторые бактерии могут обитать даже в радиоактивных отходах. Многие бактерии живут в организме
                людей и животных — на коже и в дыхательных путях, во рту, пищеварительном тракте, половых и
                мочевыводящих путях, — не причиняя вреда. Такие бактерии получили название резидентной флоры,
                или «бактерии-микробиоты». Многие представители резидентной флоры действительно приносят пользу
                человеку, например, помогая ему переваривать пищу или препятствуя росту других, более опасных
                видов бактерий.</p>


            {{--ТОЛЬКО ЭТА ЧАСТЬ--}}
            <blockquote>
                <div class="blockquote-inner">
                    <p>Бактерии — это микроскопические одноклеточные организмы. Существуют тысячи разных видов
                        бактерий.
                        Они живут в любой среде по всему миру. Они живут в земле, морской воде и глубоко в земной
                        коре.
                        Некоторые бактерии могут обитать даже в радиоактивных отходах. </p>
                    <p>Многие бактерии живут в организме
                        людей и животных — на коже и в дыхательных путях, во рту, пищеварительном тракте, половых и
                        мочевыводящих путях, — не причиняя вреда. Такие бактерии получили название резидентной
                        флоры,
                        или «бактерии-микробиоты». Многие представители резидентной флоры действительно приносят
                        пользу
                        человеку, например, помогая ему переваривать пищу или препятствуя росту других, более
                        опасных
                        видов бактерий.</p>
                </div>
            </blockquote>
            {{--до тсюда ТОЛЬКО ЭТА ЧАСТЬ--}}


            <p>Бактерии — это микроскопические одноклеточные организмы. Существуют тысячи разных видов бактерий.
                Они живут в любой среде по всему миру. Они живут в земле, морской воде и глубоко в земной коре.
                Некоторые бактерии могут обитать даже в радиоактивных отходах. Многие бактерии живут в организме
                людей и животных — на коже и в дыхательных путях, во рту, пищеварительном тракте, половых и
                мочевыводящих путях, — не причиняя вреда. Такие бактерии получили название резидентной флоры,
                или «бактерии-микробиоты». Многие представители резидентной флоры действительно приносят пользу
                человеку, например, помогая ему переваривать пищу или препятствуя росту других, более опасных
                видов бактерий.</p>
        </div>



    </div>
    <section class="section-last-arts">
        <div class="section-title-meta-icon">
            <h3>Статьи из раздела Болезни</h3>
            <div class="section-meta-icon">
                <div class="section-icon">
                    <img src="{{ asset('assets') }}/images/title-icons/main-icon-3.png"
                         alt="иконка Последние статьи" width="25" height="25">
                </div>
            </div>
        </div>
        <div>
            <a href="list_articles-blade" class="button-white">Больше статей</a>
        </div>
    </section>
</section>

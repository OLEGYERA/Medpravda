

<footer>
    <div class="minzdrav">
        <img src="{{ asset('assets') }}/images/main/samolikuvannya.svg" alt="minzdrav" title="minzdrav">
    </div>

    <div class="footer-content">
        {{--<div class="title_text_footer">--}}
            {{--<p>САМОЛИЧЕНИЕ МОЖЕТ БЫТЬ ОПАСНЫМ ДЛЯ ВАШЕГО ЗДОРОВЬЯ!</p>--}}
        {{--</div>--}}
        <div class="footer-column-copyright">
            <div class="footer-three-column">
                <div class="footer-column">
                    <div class="meta-btn-footer">
                        <div class="products item_block_three">
                            <a class="footer-item-title" href="{{ route('ua_diseases.symptoms.list', 'bolezni') }}/">ХВОРОБИ ТА СИМПТОМИ</a>
                        </div>

                        <div class="preparation item_block_one">
                            <a class="footer-item-title" href="https://medpravda.ua/ua/sort/alfavit/">ДОВІДНИК Ліків</a>
                            <ul>
                                <li><a href="https://medpravda.ua/ua/sort/farm-gruppa/">ФАРМАКОТЕРАПЕВТИЧНА ГРУПА</a></li>
                                <li><a href="https://medpravda.ua/ua/sort/veshestvo/">ДІЮЧА РЕЧОВИНА</a></li>
                                <li><a href="https://medpravda.ua/ua/sort/mnn/">МІЖНАРОДНА НАЗВА МНН</a></li>
                                <li><a href="https://medpravda.ua/ua/sort/atx/">АТХ-КЛАСИФІКАЦІЯ</a></li>
                                <li><a href="https://medpravda.ua/ua/sort/proizvoditel/">ВИРОБНИКИ</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="footer-column">
                    <div class="supplements item_block_two">
                        <a class="footer-item-title" href="https://medpravda.ua/ua/sort/bads/all/">ДІЄТИЧНІ ДОБАВКИ</a>
                    </div>
                    <div class="cosmetics item_block_two">
                        <a class="footer-item-title" href="https://medpravda.ua/ua/sort/cosmetics/all/">КОСМЕТИЧНІ ЗАСОБИ</a>
                    </div>
                    <div class="products item_block_two">
                        <a class="footer-item-title" href="https://medpravda.ua/ua/sort/ware/all/">ВИРОБИ МЕДИЧНОГО ПРИЗНАЧЕННЯ</a>
                    </div>
                    <div class="advertising item_block_two">
                        @if('ua_adv' == Route::currentRouteName())
                            <div class="footer-item-title">РЕКЛАМА НА САЙТІ</div>
                        @else
                            <a class="footer-item-title" href="{{ route('ua_adv') }}/">РЕКЛАМА НА САЙТІ</a>
                        @endif
                    </div>
                    <div class="cooperation item_block_two">
                        @if('ua_cooperation' == Route::currentRouteName())
                            <div class="footer-item-title">СПІВРОБІТНИЦТВО</div>
                        @else
                            <a class="footer-item-title" href="{{ route('ua_cooperation') }}/">СПІВРОБІТНИЦТВО</a>
                        @endif
                    </div>
                </div>
                <div class="footer-column">
                    <div class="products item_block_three">
                        <a class="footer-item-title" href="https://medpravda.ua/ua/fresh-articles/">СВІЖІ СТАТТІ</a>
                        <ul>
                            <li><a href="https://medpravda.ua/ua/fresh-articles/cat/intimnye-temy/">ІНТИМНІ ТЕМИ</a></li>
                            <li><a href="https://medpravda.ua/ua/fresh-articles/cat/zabluzhdeniya/">ХИБНІ УЯВЛЕННЯ</a></li>
                            <li><a href="https://medpravda.ua/ua/fresh-articles/cat/pitanie-i-dieta/">ХАРЧУВАННЯ ТА ДІЄТА</a></li>
                        </ul>
                    </div>
                    <div class="advertising item_block_two">
                        <a class="footer-item-title" href="https://medpravda.ua/ua/top-themes/">ПОПУЛЯРНІ ТЕМИ</a>
                    </div>

                    <div class="advertising item_block_tree">

                            @if('ua_articles_cat' == Route::currentRouteName())
                                <div class="footer-item-title">МІЙ МАЛЮК</div>
                            @else
                                <a class="footer-item-title" href="{{route('ua_articles_cat', ['cat_alias'=> 'moy-malysh'])}}/">МІЙ МАЛЮК</a>
                            @endif
                    </div>
                    <div class="cooperation item_block_two">
                        <a class="footer-item-title" href="https://medpravda.ua/ua/top-articles/">ТОП СТАТТІ</a>
                    </div>
                </div>
                <div class="footer-column">
                    <div class="about item_block_one">
                        @if('ua_about' == Route::currentRouteName())
                            <div class="footer-item-title">ПРО НАС</div>
                        @else
                            <a class="footer-item-title" href="{{ route('ua_about') }}/">ПРО НАС</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="lang-footer">
            <div class="lang-menu-footer">
                <div>
                    <a href="{{  str_replace('/ua', '', Request::url()) }}/">Рус</a>
                    <span class="active">Укр</span>
                </div>
                <!--https://www.facebook.com/medpravda.ua  -->
                <div class="social_network">
                    <a target="_blank" href="https://www.facebook.com/pg/medpravda.ua/posts/?ref=page"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://t.me/medpravda"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://itunes.apple.com/ua/podcast/medpravda/id1444152598?l=ru&mt=2&fbclid=IwAR3xEMeopvso6xn6rfEOL5FjO7zAg_kCH_ha7RGRZA1AFAfEUxiNAQReQQU"><i class="fa fa-podcast" aria-hidden="true"></i></a>
                </div>
            </div>
            <ul>
                <li>
                    @if('ua_conditions' == Route::currentRouteName())
                        <a>Умови використання сайту</a>
                    @else
                        <a href="{{ route('ua_conditions') }}/">Умови використання сайту</a>
                    @endif
                </li>
                <li>
                    @if('ua_convention' == Route::currentRouteName())
                        <a>Конфіденційності і Cookie-файли</a>
                    @else
                        <a href="{{ route('ua_convention') }}/">Конфіденційності і Cookie-файли</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <div class="copyright-logo">
        <div class="wrap_for_border">
            <div class="copy-block logo">
                @if('main' == Route::currentRouteName())
                    <img src="{{ asset('assets') }}/images/main/logo_ua.png" alt="Головний логотип Медправда" title="Головний логотип">
                @else
                    <a href="{{ route('main') }}/">
                        <img src="{{ asset('assets') }}/images/main/logo_ua.png" alt="Головний логотип Медправда" title="Головний логотип"></a>
                @endif
            </div>
            <div class="copy-block copyright">
                @if(!empty($copyright))
                    {!! $copyright->text !!}
                @endif
            </div>
        </div>
    </div>
    <a class="totop totop-img">
        <img src="{{ asset('assets') }}/images/main/totop.png" alt="totop" title="totop">
    </a>
    <div class="totop totop-color">
        <div class="totop-background">
            <div class="line"></div>
        </div>
    </div>

</footer>
<footer>
    <div class="minzdrav">
        <img src="https://medpravda.ua/assets/images/main/samolikuvannya.svg" alt="minzdrav" title="minzdrav">
    </div>

    {{--{{ asset('assets') }}/images/main/samolechenie.svg--}}
    <div class="footer-content">
        {{--<div class="title_text_footer">--}}
            {{--<p>САМОЛІКУВАННЯ МОЖЕ БУТИ ШКІДЛИВИМ ДЛЯ ВАШОГО ЗДОРОВ'Я!</p>--}}
        {{--</div>--}}
        <div class="footer-column-copyright">
            <div class="footer-three-column">
                <div class="footer-column">
                    <div class="meta-btn-footer">
                        <div class="products item_block_three">
                            <a class="footer-item-title" href="{{ route('diseases.symptoms.list', 'bolezni') }}/">БОЛЕЗНИ И СИМПТОМЫ</a>
                        </div>

                        <div class="preparation item_block_one">
                            @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/farm-gruppa/')
                                <div class="footer-item-title">СПРАВОЧНИК Лекарств</div>
                            @else
                                <a class="footer-item-title" href="https://medpravda.ua/sort/alfavit/">СПРАВОЧНИК Лекарств</a>
                            @endif

                            <ul>
                                @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/farm-gruppa/')
                                    <li>ФАРМАКОТЕРАПЕВТИЧЕСКАЯ ГРУППА</li>
                                    @else
                                    <li><a href="https://medpravda.ua/sort/farm-gruppa/">ФАРМАКОТЕРАПЕВТИЧЕСКАЯ ГРУППА</a></li>
                                @endif

                                    @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/veshestvo/')
                                        <li>ДЕЙСТВУЮЩЕЕ ВЕЩЕСТВО</li>
                                    @else
                                        <li><a href="https://medpravda.ua/sort/veshestvo/">ДЕЙСТВУЮЩЕЕ ВЕЩЕСТВО</a></li>
                                    @endif

                                    @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/mnn/')
                                        <li>МЕЖДУНАРОДНОЕ НАЗВАНИЕ МНН</li>
                                    @else
                                        <li><a href="https://medpravda.ua/sort/mnn/">МЕЖДУНАРОДНОЕ НАЗВАНИЕ МНН</a></li>
                                    @endif


                                    @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/atx/')
                                        <li>АТХ-КЛАССИФИКАЦИЯ</li>
                                    @else
                                        <li><a href="https://medpravda.ua/sort/atx/">АТХ-КЛАССИФИКАЦИЯ</a></li>
                                    @endif

                                    @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/proizvoditel/')
                                        <li>ПРОИЗВОДИТЕЛИ</li>
                                    @else
                                        <li><a href="https://medpravda.ua/sort/proizvoditel/">ПРОИЗВОДИТЕЛИ</a></li>
                                    @endif

                            </ul>
                        </div>
                    </div>

                </div>
                <div class="footer-column">
                    <div class="supplements item_block_two">
                        @if(Request::fullUrl().'/' == 'https://medpravda.ua/sort/bads/all/')
                            <div class="footer-item-title">ДИЕТИЧЕСКИЕ ДОБАВКИ</div>
                            @else
                            <a class="footer-item-title" href="https://medpravda.ua/sort/bads/all/">ДИЕТИЧЕСКИЕ ДОБАВКИ</a>
                        @endif
                    </div>
                    <div class="cosmetics item_block_two">
                        <a class="footer-item-title" href="https://medpravda.ua/sort/cosmetics/all/">КОСМЕТИЧЕСКИЕ СРЕДСТВА</a>
                    </div>
                    <div class="products item_block_two">
                        <a class="footer-item-title" href="https://medpravda.ua/sort/ware/all/">ИЗДЕЛИЯ МЕДИЦИНСКОГО НАЗНАЧЕНИЯ</a>
                    </div>
                    <div class="advertising item_block_two">
                        @if('adv' == Route::currentRouteName())
                            <div class="footer-item-title">РЕКЛАМА НА САЙТЕ</div>
                        @else
                            <a class="footer-item-title" href="{{ route('adv') }}/">РЕКЛАМА НА САЙТЕ</a>
                        @endif
                    </div>
                    <div class="cooperation item_block_two">
                        @if('cooperation' == Route::currentRouteName())
                            <div class="footer-item-title">СОТРУДНИЧЕСТВО</div>
                        @else
                            <a class="footer-item-title" href="{{ route('cooperation') }}/">СОТРУДНИЧЕСТВО</a>
                        @endif
                    </div>
                </div>
                <div class="footer-column">
                    <div class="products item_block_three">
                        @if(Request::fullUrl().'/' == 'https://medpravda.ua/fresh-articles/')
                            <div class="footer-item-title">СВЕЖИЕ СТАТЬИ</div>
                            @else
                            <a class="footer-item-title" href="https://medpravda.ua/fresh-articles/">СВЕЖИЕ СТАТЬИ</a>
                        @endif

                        <ul>
                            @if(Request::fullUrl().'/' == 'https://medpravda.ua/fresh-articles/cat/intimnye-temy/')
                                <li>ИНТИМНЫЕ ТЕМЫ</li>
                                @else
                                <li><a href="https://medpravda.ua/fresh-articles/cat/intimnye-temy/">ИНТИМНЫЕ ТЕМЫ</a></li>
                            @endif

                                @if(Request::fullUrl().'/' == 'https://medpravda.ua/fresh-articles/cat/zabluzhdeniya/')
                                    <li>ЗАБЛУЖДЕНИЯ</li>
                                @else
                                    <li><a href="https://medpravda.ua/fresh-articles/cat/zabluzhdeniya/">ЗАБЛУЖДЕНИЯ</a></li>
                                @endif

                                @if(Request::fullUrl().'/' == 'https://medpravda.ua/fresh-articles/cat/pitanie-i-dieta/')
                                    <li>ПИТАНИЕ И ДИЕТА</li>
                                @else
                                    <li><a href="https://medpravda.ua/fresh-articles/cat/pitanie-i-dieta/">ПИТАНИЕ И ДИЕТА</a></li>
                                @endif
                        </ul>
                    </div>
                    <div class="advertising item_block_two">
                        <a class="footer-item-title" href="https://medpravda.ua/top-themes/">ПОПУЛЯРНЫЕ ТЕМЫ</a>
                    </div>

                    <div class="advertising item_block_two">
                        @if('articles_cat' == Route::currentRouteName())
                            <a class="footer-item-title">МОЙ МАЛЫШ</a>
                        @else
                            <a class="footer-item-title" href="{{route('articles_cat', ['cat_alias'=> 'moy-malysh'])}}/">МОЙ МАЛЫШ</a>
                        @endif
                    </div>

                    <div class="cooperation item_block_two">
                        @if(Request::url() === 'https://medpravda.ua/top-articles/')
                            <div class="footer-item-title">ТОП СТАТЬИ</div>
                            @else
                            <a class="footer-item-title" href="https://medpravda.ua/top-articles/">ТОП СТАТЬИ</a>
                        @endif

                    </div>
                </div>
                <div class="footer-column">
                    <div class="about item_block_one">
                        {{--<p><a href="#!">О НАС</a>--}}
                        @if('about' == Route::currentRouteName())
                            <div class="footer-item-title">О НАС</div>
                        @else
                            <a class="footer-item-title" href="{{ route('about') }}/">О НАС</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="lang-footer">
            <div class="lang-menu-footer">
                <div>
                    <span class="active">Рус</span>
                    <a href="{{ str_replace(env('APP_URL'), env('APP_URL').'/ua', Request::url()) }}/">Укр</a>
                </div>
                <!--  https://www.facebook.com/medpravda.ua   -->
                <div class="social_network">
                    <a target="_blank" href="https://www.facebook.com/pg/medpravda.ua/posts/?ref=page"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://t.me/medpravda"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://itunes.apple.com/ua/podcast/medpravda/id1444152598?l=ru&mt=2&fbclid=IwAR3xEMeopvso6xn6rfEOL5FjO7zAg_kCH_ha7RGRZA1AFAfEUxiNAQReQQU"><i class="fa fa-podcast" aria-hidden="true"></i></a>
                </div>
            </div>
            <ul>
                <li>
                    @if('conditions' == Route::currentRouteName())
                        <a>Условия использования сайта</a>
                    @else
                        <a href="{{ route('conditions') }}/">Условия использования сайта</a>
                    @endif
                </li>
                <li>
                    @if('convention' == Route::currentRouteName())
                        <a>Конфиденциальности и Cookie-файлы</a>
                    @else
                        <a href="{{ route('convention') }}/">Конфиденциальности и Cookie-файлы</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <div class="copyright-logo">
        <div class="wrap_for_border">
            <div class="copy-block logo">
                @if('main' == Route::currentRouteName())
                    <img src="{{ asset('assets') }}/images/main/logo_ru.png" alt="Логотип Медправда">
                @else
                    <a href="{{ route('main') }}/">
                        <img src="{{ asset('assets') }}/images/main/logo_ru.png" alt="Логотип Медправда"></a>
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
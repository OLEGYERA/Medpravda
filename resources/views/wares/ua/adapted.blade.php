@if(!empty($model))
    <section class="content m-top">
        <div class="wrap">

            @include('wares.ua.breadcrumbs')

            <h1>{{ $model->title }}</h1>
            <div class="clone-to" data-number="3"></div>

            @include('wares.ua.product_nav')

            <div class="product-nav-img">
                <div class="product-nav-block">
                    @if('ware_get_official_ua' == Route::currentRouteName())
                        <a href="{{ route('ware_get_official', ['ware_slug'=>$model->slug]) }}" class="button-blue">
                            Перекласти
                        </a>
                    @else
                        <a href="{{ route('ware_get_adapted', ['ware_slug'=>$model->slug]) }}" class="button-blue">
                            Перекласти
                        </a>
                    @endif

                    @include('wares.ua.anchors')

                </div>
                @if($model->slide->isNotEmpty())
                    <div class="product-slider clone-from" data-number="3">
                        <div class="product-slider-go">
                            @foreach($model->slide as $image)
                                <div>
                                    <img src="{{ asset('asset/images/'.$model->folder).'/'.$image->path }}"
                                         alt="{{ $image->alt ?? '' }}" title="{{ $image->title ?? '' }}">
                                </div>
                            @endforeach
                        </div>
                        @if(empty($model->certified))
                            <div class="no-regist">
                                <div>
                                    Відсутня Реєстрація
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="product-slider clone-from" data-number="3">
                        <div class="product-slider-go">
                            <div>
                                <img src="{{ asset('asset/images/mp.png') }}"
                                     alt="Med Pravda" title="Med Pravda">
                            </div>
                        </div>
                        @if(empty($model->certified))
                            <div class="no-regist">
                                <div>
                                    Відсутня Реєстрація
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            @include('wares.ua.content', $model)


            <div class="print">
                @if('ware_get_official' == Route::currentRouteName())
                    <a href="{{ route('ware_print_ua', ['model'=>$model->slug, 'vr'=>'official']) }}">
                        <img src="{{ asset('assets') }}/images/main/icons.png" alt="Версія для друку">
                        Версія для друку
                    </a>
                @else
                    <a href="{{ route('ware_print_ua', ['model'=>$model->slug, 'vr'=>'adapted']) }}">
                        <img src="{{ asset('assets') }}/images/main/icons.png" alt="Версія для друку">
                        Версія для друку
                    </a>
                @endif
            </div>
            <div class="product-info-down">
                @if(!empty($model->packaging))
                    <div id="kod-packaging">
                        <h5>Дозування:</h5>
                        <p>{{$model->packaging}}</p>
                    </div>
                @endif
                @if(!empty($model->fabricator->utitle))
                    <div id="proizvoditel">
                        <h5>Виробник:</h5>
                        <a href="{{ route('search_fabricator_u',
                        ['val'=>'A', 'fabricator'=> $model->fabricator->alias]) }}">
                            <p>{{ $model->fabricator->utitle }}</p>
                        </a>
                    </div>
                @endif
                @if(!empty($model->reg))
                    <div id="reg">
                        <h5>Реєстрація:</h5>
                        <p>{{ $model->reg }}</p>
                    </div>
                @endif
                @if(!empty($model->classification))
                    <div id="kod-atx">
                        <h5>Класифікація:</h5>
                        <p>{{$model->classification->class .' - '. $model->classification->uname}}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
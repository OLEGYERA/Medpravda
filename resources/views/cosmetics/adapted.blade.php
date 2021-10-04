@if(!empty($model))
    <section class="content m-top">
        <div class="wrap">

            @include('cosmetics.breadcrumbs')

            <h1>{{ $model->title }}</h1>
            <div class="clone-to" data-number="3"></div>

            @include('cosmetics.product_nav')

            <div class="product-nav-img">
                <div class="product-nav-block">
                    @if('cosmetic_get_official_ua' == Route::currentRouteName())
                        <a href="{{ route('cosmetic_get_official_ua', ['cosmetic_slug'=>$model->slug]) }}" class="button-blue">
                            Перевести
                        </a>
                    @else
                        <a href="{{ route('cosmetic_get_adapted_ua', ['cosmetic_slug'=>$model->slug]) }}" class="button-blue">
                            Перевести
                        </a>
                    @endif

                    @include('cosmetics.anchors')

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
                                    нет регистрации
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
                                    нет регистрации
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            @include('cosmetics.content', $model)


            <div class="print">
                @if('cosmetic_get_official' == Route::currentRouteName())
                    <a href="{{ route('cosmetic_print', ['model'=>$model->slug, 'vr'=>'official']) }}">
                        <img src="{{ asset('assets') }}/images/main/icons.png" alt="Версия для печати">
                        Версия для печати
                    </a>
                @else
                    <a href="{{ route('cosmetic_print', ['model'=>$model->slug, 'vr'=>'adapted']) }}">
                        <img src="{{ asset('assets') }}/images/main/icons.png" alt="Версия для печати">
                        Версия для печати
                    </a>
                @endif
            </div>
            <div class="product-info-down">
                @if(!empty($model->packaging))
                    <div id="kod-packaging">
                        <h5>Дозировка:</h5>
                        <p>{{$model->packaging}}</p>
                    </div>
                @endif
                @if(!empty($model->fabricator->title))
                    <div id="proizvoditel">
                        <h5>Производитель:</h5>
                        <a href="{{ route('search_fabricator',
                        ['val'=>'A', 'fabricator'=> $model->fabricator->alias]) }}">
                            <p>{{ $model->fabricator->title }}</p>
                        </a>
                    </div>
                @endif
                @if(!empty($model->reg))
                    <div id="reg">
                        <h5>Регистрация:</h5>
                        <p>{{ $model->reg }}</p>
                    </div>
                    @else
                        <div id="reg">
                            <h5>Регистрация:</h5>
                            <p>нету регистрации</p>
                        </div>
                @endif
                @if(!empty($model->classification))
                    <div id="kod-atx">
                        <h5>Классификация:</h5>
                        <p>{{$model->classification->class .' - '. $model->classification->name}}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
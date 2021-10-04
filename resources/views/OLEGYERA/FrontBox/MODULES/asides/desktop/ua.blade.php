<aside class="page-additional-information">
{{--    <a href="#" class="mp-btn module-price">Ціни в аптеках</a>--}}

    @if(!$is_mobile)
        @include('OLEGYERA.FrontBox.MODULES.banners.bn1', ['key_word' => $data->alias])
    @endif

{{--    <div class="mp-helper">--}}
{{--        <h4 class="pointer">Запис до лікаря</h4>--}}
{{--        <div class="helper-box">--}}
{{--            <div class="helper-box-title">Допоможемо знайти лікаря:</div>--}}
{{--            <div class="helper-box-detail">* Мы перезвоним в ближайшее время</div>--}}
{{--            <input type="name" placeholder="Имя">--}}
{{--            <input type="text" placeholder="Телефон">--}}
{{--            <button class="mp-btn">Записаться</button>--}}
{{--        </div>--}}
{{--    </div>--}}
    @if(!$is_mobile)
        @include('OLEGYERA.FrontBox.MODULES.banners.bn2', ['key_word' => $data->alias])
    @endif

    @if(!empty($analogs['data']) && count($analogs['data'][0]['data']) != 0)
        <div class="mp-analogs">
            <h4 class="pointer">Аналоги:</h4>
            @switch($analogs['type'])
                @case('drug')
                    @foreach($analogs['data'] as $analog_box)
                        <h5>Речовина: <span>{{$analog_box['title']->utitle}}</span></h5>
                        <ul class="analog-box">
                            @foreach($analog_box['data'] as $analog)
                                <li class="analog-item">
                                    <a href="{{route('ua.' . $analogs['type'], ['alias' => $analog->alias])}}" title="{{$analog->utitle}}">{{$analog->utitle}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                @break
                @case('bad')
                @case('cosmetic')
                @case('ware')
                    @foreach($analogs['data'] as $analog_box)
                        <ul class="analog-box">
                            @foreach($analog_box['data'] as $analog)
                                <li class="analog-item">
                                    <a href="{{route('ua.' . $analogs['type'], ['alias' => $analog->alias])}}" title="{{$analog->utitle}}">{{$analog->utitle}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                @break
            @endswitch
        </div>
    @endif

    @if(!$is_mobile)
        @include('OLEGYERA.FrontBox.MODULES.banners.bn3', ['key_word' => $data->alias])
    @endif

    @if(isset($fabricator_products) && count($fabricator_products['data']) != 0)
        <div class="mp-fabricators">
            <h4 class="pointer">Також від виробника:</h4>
            <ul class="analog-box">
                @foreach($fabricator_products['data'] as $product)
                    <li class="analog-item">
                        <a href="{{route('ua.' . $fabricator_products['type'], ['alias' => $product->alias])}}" title="{{$product->utitle}}">{{$product->utitle}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(!$is_mobile)
        @include('OLEGYERA.FrontBox.MODULES.banners.bn4', ['key_word' => $data->alias])
    @endif

{{--    <div class="mp-helper">--}}
{{--        <h4 class="pointer">Запись на анализы</h4>--}}
{{--        <div class="helper-box">--}}
{{--            <div class="helper-box-title">Поможем найти лабораторию:</div>--}}
{{--            <div class="helper-box-detail">* Мы перезвоним в ближайшее время</div>--}}
{{--            <input type="name" placeholder="Имя">--}}
{{--            <input type="text" placeholder="Телефон">--}}
{{--            <button class="mp-btn">Записаться</button>--}}
{{--        </div>--}}
{{--    </div>--}}
</aside>

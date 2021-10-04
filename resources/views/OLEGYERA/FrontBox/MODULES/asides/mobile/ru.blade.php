<aside class="page-additional-information">
    <div class="mp-helper mp-anchor" id="ambulanceDoctors">
        <h4 class="pointer">Запись к врачу</h4>
        <div class="helper-box">
            <div class="helper-box-title">Поможем найти врача:</div>
            <div class="helper-box-detail">* Мы перезвоним в ближайшее время</div>
            <input type="name" placeholder="Имя">
            <input type="text" placeholder="Телефон">
            <button class="mp-btn">Записаться</button>
        </div>
    </div>

    @if(!empty($analogs['data']) && count($analogs['data'][0]['data']) != 0)
        <div class="mp-analogs">
            <h4 class="pointer">Аналоги:</h4>
            @switch($analogs['type'])
                @case('drug')
                    @foreach($analogs['data'] as $analog_box)
                        <h5>Вещество: <span>{{$analog_box['title']->title}}</span></h5>
                        <ul class="analog-box">
                            @foreach($analog_box['data'] as $analog)
                                <li class="analog-item">
                                    <a href="{{route('m.ru.' . $analogs['type'], ['alias' => $analog->alias])}}" title="{{$analog->title}}">{{$analog->title}}</a>
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
                                    <a href="{{route('m.ru.' . $analogs['type'], ['alias' => $analog->alias])}}" title="{{$analog->title}}">{{$analog->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                @break
            @endswitch
        </div>
    @endif

    @if(isset($fabricator_products) && count($fabricator_products['data']) != 0)
        <div class="mp-fabricators">
            <h4 class="pointer">Также от производителя:</h4>
            <ul class="analog-box">
                @foreach($fabricator_products['data'] as $product)
                    <li class="analog-item">
                        <a href="{{route('m.ru.' . $fabricator_products['type'], ['alias' => $product->alias])}}" title="{{$product->title}}">{{$product->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mp-helper mp-anchor" id="ambulanceAnalyzes">
        <h4 class="pointer">Запись на анализы</h4>
        <div class="helper-box">
            <div class="helper-box-title">Поможем найти лабораторию:</div>
            <div class="helper-box-detail">* Мы перезвоним в ближайшее время</div>
            <input type="name" placeholder="Имя">
            <input type="text" placeholder="Телефон">
            <button class="mp-btn">Записаться</button>
        </div>
    </div>
</aside>

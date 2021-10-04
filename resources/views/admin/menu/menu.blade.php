<div class="breadcrumb">
    <a>Статьи</a>
    <span>Наполнение меню</span>
</div>

@include('admin.articles.nav')

<div class="two__column">
    <div class="wrap__block">
        <h2>Меню RU</h2>
        @if($cats)
            {!! Form::open(['url'=>route('menus'), 'method'=>'post', 'class'=>'form-horizontal']) !!}
            @foreach($cats as $cat)
                <div class="checkbox__several">
                    <div class="input__group info-check label-stay"><!--чекбокс-->
                        <input type="checkbox"
                               @foreach($menus->where('own', 'ru') as $menu)

                               @if($menu->category_id === $cat->id)
                               checked
                               @endif

                               @endforeach


                               value="{{$cat->id}}"
                               name="cats[]" id="{{$cat->id}}">
                        <label for="{{$cat->id}}" class="check-box"></label>
                        <label for="{{$cat->id}}" class="check-text">{{$cat->title}}</label>
                    </div>
                </div>
            @endforeach
            <input type="hidden" value="ru" name="lang">
            <div>
                {!! Form::button('Сохранить', ['class'=>'btn btn__full', 'type'=>'submit']) !!}
            </div>
            {!! Form::close() !!}
        @endif
    </div>
    <div class="wrap__block">
        <h2>Меню UA</h2>
        @if($cats)
            {!! Form::open(['url'=>route('menus'), 'method'=>'post', 'class'=>'form-horizontal']) !!}
            @foreach($cats as $cat)
                <div class="checkbox__several">
                    <div class="input__group info-check label-stay"><!--чекбокс-->
                        <input type="checkbox"
                               @foreach($menus->where('own', 'ua') as $menu)

                               @if($menu->category_id === $cat->id)
                               checked
                               @endif

                               @endforeach
                               value="{{$cat->id}}"
                               name="cats[]" id="menus_{{$cat->id}}">
                        <label for="menus_{{$cat->id}}" class="check-box"></label>
                        <label for="menus_{{$cat->id}}" class="check-text">{{$cat->utitle}}</label>
                    </div>
                </div>
            @endforeach
            <input type="hidden" value="ua" name="lang">
            {!! Form::button('Сохранить', ['class'=>'btn btn__full', 'type'=>'submit']) !!}
            {!! Form::close() !!}
        @endif
    </div>
</div>

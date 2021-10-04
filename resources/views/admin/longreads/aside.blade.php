<div class="inner_nav_longread">
    @if('longread_create_main' == Route::currentRouteName())
            <a href="" class="active" >Основные данные</a>
    @else
            @if('longread_edit_main' == Route::currentRouteName())
                <a class="active" >Основные данные</a>
            @else
                <a href="{{route('longread_edit_main', ['id'=>$id])}}">Основные данные</a>
            @endif
    @endif

    @if('longread_create_main' == Route::currentRouteName())
            <a class="disabled">Фото Лонгрида</a>
    @else
            @if('longread_edit_photo' == Route::currentRouteName())
                <a class="active" >Фото Лонгрида</a>
            @else
                <a href="{{route('longread_edit_photo', ['id'=>$id])}}">Фото Лонгрида</a>
            @endif
    @endif

    @if('longread_create_main' == Route::currentRouteName())
        <a class="disabled">Seo данные</a>
    @else
        @if('longread_edit_seo' == Route::currentRouteName())
            <a class="active" >Seo данные</a>
        @else
            <a href="{{route('longread_edit_seo', ['id'=>$id])}}">Seo данные</a>
        @endif
    @endif

    @if('longread_create_main' == Route::currentRouteName())
        <a class="disabled">Контент Лонгрида RU</a>
    @else
        @if('longread_edit_content' == Route::currentRouteName() && $lang == 'ru')
            <a class="active" >Контент Лонгрида RU</a>
        @else
            <a href="{{route('longread_edit_content', ['id'=>$id, 'lang' => 'ru'])}}">Контент Лонгрида Ru</a>
        @endif
    @endif

        @if('longread_create_main' == Route::currentRouteName())
            <a class="disabled">Контент Лонгрида UA</a>
        @else
            @if('longread_edit_content' == Route::currentRouteName()  && $lang == 'ua')
                <a class="active" >Контент Лонгрида UA</a>
            @else
                <a href="{{route('longread_edit_content', ['id'=>$id, 'lang' => 'ua'])}}">Контент Лонгрида UA</a>
            @endif
        @endif

</div>
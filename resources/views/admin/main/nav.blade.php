<div class="top__nav">
    @if('main_slider' == Route::currentRouteName())
        <a class="btn btn__full">Главный слайдер</a>
    @else
        <a class="btn" href="{{ route('main_slider') }}">Главный слайдер</a>
    @endif
    @if('numbers' == Route::currentRouteName())
        <a class="btn btn__full">Цифры на главной</a>
    @else
        <a class="btn" href="{{ route('numbers') }}">Цифры на главной</a>
    @endif
    @if('medicine_cats' == Route::currentRouteName())
        <a class="btn btn__full">Редактирование витрины препаратов</a>
    @else
        <a class="btn" href="{{ route('medicine_cats') }}">Редактирование витрины препаратов</a>
    @endif
    @if('blocks' == Route::currentRouteName())
        <a class="btn btn__full">Блоки заголовков</a>
    @else
        <a class="btn" href="{{ route('blocks') }}">Блоки заголовков</a>
    @endif

    @if('med_tags_admin' == Route::currentRouteName())
        <a class="btn btn__full">Тэги-препараты</a>
    @else
        <a class="btn" href="{{ route('med_tags_admin') }}">Тэги-препараты</a>
    @endif
</div>
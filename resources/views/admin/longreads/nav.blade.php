<div class="top__nav">
    @if('longreads' == Route::currentRouteName())
        <a  class="btn btn__full">Лонгриды</a>
    @else
        <a class="btn" href="{{ route('longreads') }}">Лонгриды</a>
    @endif
    @if('longread_create_main' == Route::currentRouteName())
        <a  class="btn btn__full">
            Создание Лонгрида
        </a>
    @else
        <a class="btn" href="{{ route('longread_create_main') }}">
            Создание Лонгрида
        </a>
    @endif
    @if('templates' == Route::currentRouteName())
        <a  class="btn btn__full">
            Макеты
        </a>
    @else
        <a class="btn" href="{{ route('templates') }}">
            Макеты
        </a>
    @endif
    @if('longread_create_template' == Route::currentRouteName())
        <a  class="btn btn__full">
            Создание Макета
        </a>
    @else
        <a class="btn" href="{{ route('longread_create_template') }}">
            Создание Макета
        </a>
    @endif
</div>



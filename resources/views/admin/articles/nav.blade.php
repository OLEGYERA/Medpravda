<div class="top__nav">
        @if('articles_admin' == Route::currentRouteName())
            <a  class="btn btn__full">Статьи</a>
        @else
            <a class="btn" href="{{ route('articles_admin') }}">Статьи</a>
        @endif
        @if('cats' == Route::currentRouteName())
            <a  class="btn btn__full">Категории</a>
        @else
            <a class="btn" href="{{ route('cats') }}">Категории</a>
        @endif
        @if('create_article' == Route::currentRouteName())
            <a  class="btn btn__full">Создать статью</a>
        @else
            <a class="btn" href="{{ route('create_article') }}">Создать статью</a>
        @endif
        @if('tags_admin' == Route::currentRouteName())
            <a  class="btn btn__full">Тэги</a>
        @else
            <a class="btn" href="{{ route('tags_admin') }}">Тэги</a>
        @endif
        @if('menus' == Route::currentRouteName())
            <a  class="btn btn__full">Меню</a>
        @else
            <a class="btn" href="{{ route('menus') }}">Меню</a>
        @endif
</div>

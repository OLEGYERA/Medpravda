<div class="top__nav">
    @if('adv_admin' == Route::currentRouteName())
        <a class="btn btn__full">Страница рекламы</a>
    @else
        <a class="btn" href="{{ route('adv_admin') }}">Страница рекламы</a>
    @endif

    @if('cooperation_admin' == Route::currentRouteName())
        <a class="btn btn__full">Страница сотрудничества</a>
    @else
        <a class="btn" href="{{ route('cooperation_admin') }}">Страница сотрудничества</a>
    @endif

    @if('about_admin' == Route::currentRouteName())
        <a class="btn btn__full">О Нас</a>
    @else
        <a class="btn" href="{{ route('about_admin') }}">О Нас</a>
    @endif
    @if('seo_admin' == Route::currentRouteName())
        <a class="btn btn__full">SEO</a>
    @else
        <a class="btn" href="{{ route('seo_admin') }}">SEO</a>
    @endif
    @if('convention_admin' == Route::currentRouteName())
        <a class="btn btn__full">Конфиденциальность</a>
    @else
        <a class="btn" href="{{ route('convention_admin') }}">Конфиденциальность</a>
    @endif
    @if('conditions_admin' == Route::currentRouteName())
        <a class="btn btn__full">Условия</a>
    @else
        <a class="btn" href="{{ route('conditions_admin') }}">Условия</a>
    @endif
    @if('footer_copyright_admin' == Route::currentRouteName())
        <a class="btn btn__full">Сopyright</a>
    @else
        <a class="btn" href="{{ route('footer_copyright_admin') }}">Сopyright</a>
    @endif
</div>

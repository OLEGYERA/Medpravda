<div class="product-nav">
    @if('bad_get_official_ua' == Route::currentRouteName())
        <a class="nav-button-grey active">Офіційна інструкція</a>
    @else
        <a href="{{ route('bad_get_official_ua', ['bad_slug'=>$model->slug]) }}/"
           class="nav-button-grey">Офіційна інструкція</a>
    @endif
    @if('bad_get_adapted_ua' == Route::currentRouteName())
        <a class="nav-button-grey active">Адаптована інструкція</a>
    @else
        <a href="{{ route('bad_get_adapted_ua', ['bad_slug'=>$model->slug]) }}/"
           class="nav-button-grey">Адаптована інструкція</a>
    @endif

    <a href="{{ route('bad_faq_ua', ['bad'=>$model->slug]) }}/"
       class="nav-button-grey">Запитання</a>
</div>
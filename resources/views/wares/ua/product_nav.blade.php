<div class="product-nav">
    @if('ware_get_official_ua' == Route::currentRouteName())
        <a class="nav-button-grey active">Офіційна інструкція</a>
    @else
        <a href="{{ route('ware_get_official_ua', ['ware_slug'=>$model->slug]) }}"
           class="nav-button-grey">Офіційна інструкція</a>
    @endif
    @if('ware_get_adapted_ua' == Route::currentRouteName())
        <a class="nav-button-grey active">Адаптована інструкція</a>
    @else
        <a href="{{ route('ware_get_adapted_ua', ['ware_slug'=>$model->slug]) }}"
           class="nav-button-grey">Адаптована інструкція</a>
    @endif

    <a href="{{ route('ware_faq_ua', ['ware'=>$model->slug]) }}"
       class="nav-button-grey">Запитання</a>
</div>
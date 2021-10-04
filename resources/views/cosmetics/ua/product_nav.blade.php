<div class="product-nav">
    @if('cosmetic_get_official_ua' == Route::currentRouteName())
        <a class="nav-button-grey active">Офіційна інструкція</a>
    @else
        <a href="{{ route('cosmetic_get_official_ua', ['cosmetic_slug'=>$model->slug]) }}"
           class="nav-button-grey">Офіційна інструкція</a>
    @endif
    @if('cosmetic_get_adapted_ua' == Route::currentRouteName())
        <a class="nav-button-grey active">Адаптована інструкція</a>
    @else
        <a href="{{ route('cosmetic_get_adapted_ua', ['cosmetic_slug'=>$model->slug]) }}"
           class="nav-button-grey">Адаптована інструкція</a>
    @endif

    <a href="{{ route('cosmetic_faq_ua', ['cosmetic'=>$model->slug]) }}"
       class="nav-button-grey">Запитання</a>
</div>
<div class="product-nav">
    @if('cosmetic_get_official' == Route::currentRouteName())
        <a class="nav-button-grey active">Официальная инструкция</a>
    @else
        <a href="{{ route('cosmetic_get_official', ['cosmetic_slug'=>$model->slug]) }}"
           class="nav-button-grey">Официальная инструкция</a>
    @endif
    @if('cosmetic_get_adapted' == Route::currentRouteName())
        <a class="nav-button-grey active">Адаптированная инструкция</a>
    @else
        <a href="{{ route('cosmetic_get_adapted', ['cosmetic_slug'=>$model->slug]) }}"
           class="nav-button-grey">Адаптированная инструкция</a>
    @endif

    <a href="{{ route('cosmetic_faq', ['cosmetic'=>$model->slug]) }}"
       class="nav-button-grey">Вопросы</a>
</div>
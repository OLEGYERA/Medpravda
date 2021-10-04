<div class="product-nav">
    @if('ware_get_official' == Route::currentRouteName())
        <a class="nav-button-grey active">Официальная инструкция</a>
    @else
        <a href="{{ route('ware_get_official', ['ware_slug'=>$model->slug]) }}"
           class="nav-button-grey">Официальная инструкция</a>
    @endif
    @if('ware_get_adapted' == Route::currentRouteName())
        <a class="nav-button-grey active">Адаптированная инструкция</a>
    @else
        <a href="{{ route('ware_get_adapted', ['ware_slug'=>$model->slug]) }}"
           class="nav-button-grey">Адаптированная инструкция</a>
    @endif

    <a href="{{ route('ware_faq', ['ware'=>$model->slug]) }}"
       class="nav-button-grey">Вопросы</a>
</div>
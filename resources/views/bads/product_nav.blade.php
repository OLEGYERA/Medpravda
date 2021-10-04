<div class="product-nav">
    @if('bad_get_official' == Route::currentRouteName())
        <a class="nav-button-grey active">Официальная инструкция</a>
    @else
        <a href="{{ route('bad_get_official', ['bad_slug'=>$model->slug]) }}/"
           class="nav-button-grey">Официальная инструкция</a>
    @endif
    @if('bad_get_adapted' == Route::currentRouteName())
        <a class="nav-button-grey active">Адаптированная инструкция</a>
    @else
        <a href="{{ route('bad_get_adapted', ['bad_slug'=>$model->slug]) }}/"
           class="nav-button-grey">Адаптированная инструкция</a>
    @endif

    <a href="{{ route('bad_faq', ['bad'=>$model->slug]) }}/"
       class="nav-button-grey">Вопросы</a>
</div>
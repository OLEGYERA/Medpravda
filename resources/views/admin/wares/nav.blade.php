<div class="top__nav">
    @if('wares.index' == Route::currentRouteName())
        <a class="btn btn__full">Мед изделия</a>
    @else
        <a class="btn" href="{{ route('wares.index') }}">Мед изделия</a>
    @endif
    @if('wares.create' == Route::currentRouteName())
        <a class="btn btn__full">Создать Мед изделия</a>
    @else
        <a class="btn" href="{{ route('wares.create') }}">Создать Мед изделия</a>
    @endif
    @if('ware-classification.index' == Route::currentRouteName())
        <a class="btn btn__full">Классификации</a>
    @else
        <a class="btn" href="{{ route('ware-classification.index') }}">Классификации</a>
    @endif
    @if('ware-classification.create' == Route::currentRouteName())
        <a class="btn btn__full">Создать классификацию</a>
    @else
        <a class="btn" href="{{ route('ware-classification.create') }}">
            Создать классификацию
        </a>
    @endif
</div>

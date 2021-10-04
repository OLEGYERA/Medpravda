<div class="top__nav">
    @if('bads.index' == Route::currentRouteName())
        <a class="btn btn__full">Диетические добавки</a>
    @else
        <a class="btn" href="{{ route('bads.index') }}">Диетические добавки</a>
    @endif
    @if('bads.create' == Route::currentRouteName())
        <a class="btn btn__full">Создать диетическую добавку</a>
    @else
        <a class="btn" href="{{ route('bads.create') }}">Создать диетическую добавку</a>
    @endif
    @if('badclassification.index' == Route::currentRouteName())
        <a class="btn btn__full">Классификации</a>
    @else
        <a class="btn" href="{{ route('badclassification.index') }}">Классификации</a>
    @endif
    @if('badclassification.create' == Route::currentRouteName())
        <a class="btn btn__full">Создать классификацию</a>
    @else
        <a class="btn" href="{{ route('badclassification.create') }}">
            Создать классификацию
        </a>
    @endif
</div>

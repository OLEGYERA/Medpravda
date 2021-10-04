<div class="top__nav">
    @if('cosmetics.index' == Route::currentRouteName())
        <a class="btn btn__full">Косметические средства</a>
    @else
        <a class="btn" href="{{ route('cosmetics.index') }}">Косметические средства</a>
    @endif
    @if('cosmetics.create' == Route::currentRouteName())
        <a class="btn btn__full">Создать Косметические средства</a>
    @else
        <a class="btn" href="{{ route('cosmetics.create') }}">Создать Косметические средства</a>
    @endif
    @if('cosmetical-classification.index' == Route::currentRouteName())
        <a class="btn btn__full">Классификации</a>
    @else
        <a class="btn" href="{{ route('cosmetical-classification.index') }}">Классификации</a>
    @endif
    @if('cosmetical-classification.create' == Route::currentRouteName())
        <a class="btn btn__full">Создать классификацию</a>
    @else
        <a class="btn" href="{{ route('cosmetical-classification.create') }}">
            Создать классификацию
        </a>
    @endif
</div>

<div class="top__nav">
    @if('stats_medicine' == Route::currentRouteName())
        <a class="btn btn__full">Статистика препаратов</a>
    @else
        <a class="btn" href="{{ route('stats_medicine') }}">Статистика препаратов</a>
    @endif
    @if('stats_class' == Route::currentRouteName())
        <a class="btn btn__full">Статистика ATX</a>
    @else
        <a class="btn" href="{{ route('stats_class') }}">Статистика ATX</a>
    @endif
</div>

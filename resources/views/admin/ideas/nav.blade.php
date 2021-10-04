<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            @if('greatidea.index' == Route::currentRouteName())
                <li><a class="btn btn-default">РК</a></li>
            @else
                <li><a href="{{ route('greatidea.index') }}">РК</a></li>
            @endif
            @if('greatidea.create' == Route::currentRouteName())
                <li>
                    <a class="btn btn-default">Создать компанию</a>
                </li>
            @else
                <li>
                    <a href="{{ route('greatidea.create') }}">
                        Создать компанию
                    </a>
                </li>
            @endif
            @if('scenarios.index' == Route::currentRouteName())
                <li>
                    <a class="btn btn-default">Сценарии</a>
                </li>
            @else
                <li>
                    <a href="{{ route('scenarios.index') }}">
                        Сценарии
                    </a>
                </li>
            @endif
            @if('scenarios.create' == Route::currentRouteName())
                <li>
                    <a class="btn btn-default">Создать сценарий</a>
                </li>
            @else
                <li>
                    <a href="{{ route('scenarios.create') }}">
                        Создать сценарий
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
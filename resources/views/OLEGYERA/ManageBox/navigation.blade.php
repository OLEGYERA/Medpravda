<ul class="manager-menu">
    <li class="mm-item">
        <span class="mm-title">Главная <i class="fas fa-chevron-down"></i></span>
        <ul class="mm-links">
{{--            <li class="mm-link"><a href=""><i class="fas fa-user"></i> Ссылка</a></li>--}}
{{--            <li class="mm-link"><a href=""><i class="fas fa-user"></i> Ссылка</a></li>--}}
{{--            <li class="mm-link"><a href=""><i class="fas fa-user"></i> Ссылка</a></li>--}}
        </ul>
    </li>
    @if('manage.navigation.administration.manager' == Route::currentRouteName() || 'manage.navigation.administration.rolling' == Route::currentRouteName()) <li class="mm-item active">@else<li class="mm-item">@endif
        <span class="mm-title">Администрирование <i class="fas fa-chevron-down"></i></span>
        <ul class="mm-links">
            @if('manage.navigation.administration.manager' == Route::currentRouteName())
                <li class="mm-link active red"><a href="{{route('manage.navigation.administration.manager')}}"><i class="fas fa-users-cog"></i>Менеджеры</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.administration.manager')}}"><i class="fas fa-users-cog"></i>Менеджеры</a></li>
            @endif

            @if('manage.navigation.administration.rolling' == Route::currentRouteName())
                <li class="mm-link active red"><a href="{{route('manage.navigation.administration.rolling')}}"><i class="fas fa-user-shield"></i>Роллирование</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.administration.rolling')}}"><i class="fas fa-user-shield"></i>Роллирование</a></li>
            @endif
        </ul>
    </li>
    @if('manage.navigation.dependency.term' == Route::currentRouteName() || 'manage.navigation.dependency.substance' == Route::currentRouteName() || 'manage.navigation.dependency.inname' == Route::currentRouteName() || 'manage.navigation.dependency.pharma' == Route::currentRouteName() || 'manage.navigation.dependency.pharma_bad' == Route::currentRouteName() || 'manage.navigation.dependency.form' == Route::currentRouteName() || 'manage.navigation.dependency.fabricator' == Route::currentRouteName() || 'manage.navigation.dependency.atx' == Route::currentRouteName() || 'manage.navigation.dependency.class_bad' == Route::currentRouteName() || 'manage.navigation.dependency.class_ware' == Route::currentRouteName() || 'manage.navigation.dependency.class_cosmetic' == Route::currentRouteName() || 'manage.navigation.dependency.tag' == Route::currentRouteName()) <li class="mm-item active">@else<li class="mm-item">@endif
        <span class="mm-title">Зависимости <i class="fas fa-chevron-down"></i></span>
        <ul class="mm-links">

            @if('manage.navigation.dependency.term' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.term')}}"><i class="fas fa-spell-check"></i>Термины</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.term')}}"><i class="fas fa-spell-check"></i>Термины</a></li>
            @endif

            @if('manage.navigation.dependency.tag' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.tag')}}"><i class="fas fa-spell-check"></i>Теги</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.tag')}}"><i class="fas fa-spell-check"></i>Теги</a></li>
            @endif



            @if('manage.navigation.dependency.substance' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.substance')}}"><i class="fas fa-capsules"></i>Вещества</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.substance')}}"><i class="fas fa-capsules"></i>Вещества</a></li>
            @endif

            @if('manage.navigation.dependency.inname' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.inname')}}"><i class="fas fa-file-signature"></i>МНН</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.inname')}}"><i class="fas fa-file-signature"></i>МНН</a></li>
            @endif

            @if('manage.navigation.dependency.pharma' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.pharma')}}"><i class="fas fa-prescription-bottle-alt"></i>Фармгруппы</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.pharma')}}"><i class="fas fa-prescription-bottle-alt"></i>Фармгруппы</a></li>
            @endif

            @if('manage.navigation.dependency.pharma_bad' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.pharma_bad')}}"><i class="fas fa-prescription-bottle-alt"></i>Группы Бадов</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.pharma_bad')}}"><i class="fas fa-prescription-bottle-alt"></i>Группы Бадов</a></li>
            @endif

            @if('manage.navigation.dependency.form' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.form')}}"><i class="fas fa-boxes"></i>Формы выпуска</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.form')}}"><i class="fas fa-boxes"></i>Формы выпуска</a></li>
            @endif

            @if('manage.navigation.dependency.fabricator' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.fabricator')}}"><i class="fab fa-phabricator"></i>Производители</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.fabricator')}}"><i class="fab fa-phabricator"></i>Производители</a></li>
            @endif

            @if('manage.navigation.dependency.atx' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.atx')}}"><i class="fas fa-cubes"></i>ATX</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.atx')}}"><i class="fas fa-cubes"></i>ATX</a></li>
            @endif

            @if('manage.navigation.dependency.class_bad' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.class_bad')}}"><i class="fas fa-cubes"></i>Классификация Бад.</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.class_bad')}}"><i class="fas fa-cubes"></i>Классификация Бад.</a></li>
            @endif

            @if('manage.navigation.dependency.class_ware' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.class_ware')}}"><i class="fas fa-cubes"></i>Классификация Мед.</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.class_ware')}}"><i class="fas fa-cubes"></i>Классификация Мед.</a></li>
            @endif

            @if('manage.navigation.dependency.class_cosmetic' == Route::currentRouteName())
                <li class="mm-link active blue"><a href="{{route('manage.navigation.dependency.class_cosmetic')}}"><i class="fas fa-cubes"></i>Классификация Косм.</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.dependency.class_cosmetic')}}"><i class="fas fa-cubes"></i>Классификация Косм.</a></li>
            @endif
        </ul>
    </li>
    @if('manage.navigation.manual.drug' == Route::currentRouteName() || 'manage.navigation.manual.bad' == Route::currentRouteName() || 'manage.navigation.manual.ware' == Route::currentRouteName() || 'manage.navigation.manual.cosmetic' == Route::currentRouteName()) <li class="mm-item active">@else<li class="mm-item">@endif
        <span class="mm-title">Справочник <i class="fas fa-chevron-down"></i></span>
        <ul class="mm-links">
            @if('manage.navigation.manual.drug' == Route::currentRouteName())
                <li class="mm-link active orange"><a href="{{route('manage.navigation.manual.drug')}}"><i class="fas fa-pills"></i>Препараты</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.manual.drug')}}"><i class="fas fa-pills"></i>Препараты</a></li>
            @endif

            @if('manage.navigation.manual.bad' == Route::currentRouteName())
                <li class="mm-link active orange"><a href="{{route('manage.navigation.manual.bad')}}"><i class="fas fa-capsules"></i>Бады</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.manual.bad')}}"><i class="fas fa-capsules"></i>Бады</a></li>
            @endif

            @if('manage.navigation.manual.ware' == Route::currentRouteName())
                <li class="mm-link active orange"><a href="{{route('manage.navigation.manual.ware')}}"><i class="fas fa-heartbeat"></i>Мед. Изделия</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.manual.ware')}}"><i class="fas fa-heartbeat"></i>Мед. Изделия</a></li>
            @endif

            @if('manage.navigation.manual.cosmetic' == Route::currentRouteName())
                <li class="mm-link active orange"><a href="{{route('manage.navigation.manual.cosmetic')}}"><i class="fas fa-mortar-pestle"></i>Косм. средства</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.manual.cosmetic')}}"><i class="fas fa-mortar-pestle"></i>Косм. средства</a></li>
            @endif
        </ul>
    </li>
    @if('manage.navigation.media.category' == Route::currentRouteName() || 'manage.navigation.media.structure' == Route::currentRouteName() || 'manage.navigation.media.article' == Route::currentRouteName()) <li class="mm-item active">@else<li class="mm-item">@endif
        <span class="mm-title">Медиатека<i class="fas fa-chevron-down"></i></span>
        <ul class="mm-links">
            @if('manage.navigation.media.category' == Route::currentRouteName())
                <li class="mm-link active orange"><a href="{{route('manage.navigation.media.category')}}"><i class="fas fa-newspaper"></i>Категории</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.media.category')}}"><i class="fas fa-newspaper"></i>Категории</a></li>
            @endif

            @if('manage.navigation.media.structure' == Route::currentRouteName())
                <li class="mm-link active orange"><a href="{{route('manage.navigation.media.structure')}}"><i class="fas fa-newspaper"></i>Структура</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.media.structure')}}"><i class="fas fa-newspaper"></i>Структура</a></li>
            @endif

            @if('manage.navigation.media.article' == Route::currentRouteName())
                <li class="mm-link active orange"><a href="{{route('manage.navigation.media.article')}}"><i class="fas fa-newspaper"></i>Статьи</a></li>
            @else
                <li class="mm-link"><a href="{{route('manage.navigation.media.article')}}"><i class="fas fa-newspaper"></i>Статьи</a></li>
            @endif
        </ul>
    </li>
</ul>

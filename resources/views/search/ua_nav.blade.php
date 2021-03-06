<div class="product-nav product-nav-analog">
    <a href="{{ route('search_alpha_u') }}/"
       class="nav-button-grey @if('search_alpha_u' == Route::currentRouteName()) active @endif">алфавітом</a>
    <a href="{{ route('search_substance_u') }}/"
       class="nav-button-grey @if('search_substance_u' == Route::currentRouteName()) active @endif">
        діючою речовиною
    </a>
    <a href="{{ route('search_mnn_u') }}/"
       class="nav-button-grey @if('search_mnn_u' == Route::currentRouteName()) active @endif">
        міжнародною назвою(МНН)
    </a>
    <a href="{{ route('search_atx_u') }}/"
       class="nav-button-grey @if('search_atx_u' == Route::currentRouteName()) active @endif">
        АТX-класифікацією
    </a>
    <a href="{{ route('search_farm_u') }}/"
       class="nav-button-grey @if('search_farm_u' == Route::currentRouteName()) active @endif">
        фармакотерапевтичною групою
    </a>
    <a href="{{ route('search_fabricator_u') }}/"
       class="nav-button-grey @if('search_fabricator_u' == Route::currentRouteName()) active @endif">
        виробником
    </a>
    <a href="{{ route('get_bads_ua') }}/"
       class="nav-button-grey @if('get_bads_ua' == Route::currentRouteName()) active @endif">
        Дієтичні добавки
    </a>

    <a href="{{ route('get_cosmetics_ua') }}"
       class="nav-button-grey @if('get_cosmetics_ua' == Route::currentRouteName()) active @endif">
        Косметичні засоби
    </a>
    <a href="{{ route('get_wares_ua') }}"
       class="nav-button-grey @if('get_wares_ua' == Route::currentRouteName()) active @endif">
        Вироби медичного призначення
    </a>
</div>

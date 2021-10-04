<header class="mp-header">
    <div class="navigation-tool">
        <mp-search :lang="'ru'"></mp-search>
        @include(env('APP_RESOURCE_PATH') . 'SiteView.default.module.menu.ru')
    </div>
    <img class="logo" src="{{asset('img/logo.svg')}}" alt="">
    <div class="lang-switcher">
        @php $segments = Request::segments();@endphp
        <a href="{{env('APP_URL') . (empty($segments) ? '/ua/' : ('/ua/' . implode('/',$segments))) }}">UA</a>
        <a class="switched">RU</a>
    </div>
</header>

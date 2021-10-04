<main class="content-box">
    @if(isset($breadcrumb))
        {!! $breadcrumb !!}
    @endif
    <div class="content-triple">
        <div class="page-anchors-rail">
            <div class="page-anchors">
                @include(env('APP_RESOURCE_PATH') . 'SiteView.' . $category . '.default.anchors.ru')
            </div>
        </div>
        <div class="content-information">
            {!! $content !!}
        </div>
        <aside class="page-aside">
            @include(env('APP_RESOURCE_PATH') . 'SiteView.default.module.aside.ru')
        </aside>
    </div>

</main>

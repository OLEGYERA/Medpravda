@extends('admin.index')

@if(!empty($tiny))
@section('tiny')
    <script src="{{ asset('/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: "textarea.editor",
            themes: "modern",
            language: 'ru',
            branding: false,
            height: "{{ $areaH ?? 500 }}",
            width: "{{ $areaW ?? '100%' }}",
            images_upload_base_path: "{{asset('/photos')}}",
            image_title: true,
            automatic_uploads: true,
            {{--content_css: "{{asset('css')}}/tinimce.css,",--}}
            importcss_file_filter: "{{asset('css')}}/tinimce.css",
            importcss_append: true,
            /*style_formats: [
                {
                    title: 'Шаблоны', items: [

                    {title: 'Две картинки', block: 'div', classes: 'images-block', exact: true, wrapper: 1},
                    {title: 'Одна большая картинка', block: 'div', classes: 'full-image', exact: true, wrapper: 1},
                    {title: 'Картинка слева', block: 'div', classes: 'left-image', exact: true, wrapper: 1},
                    {title: 'Картинка справа', block: 'div', classes: 'right-image', exact: true, wrapper: 1},
//                    {title: 'Заголовок H3', block: 'h3', classes: 'title-text', exact: true, wrapper: 1},
//                    {title: 'Цитата', block: 'blockquote'},
                ]
                },
            ],*/
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern",
                "importcss"
            ],
            rel_list: [
                {title: 'follow', value: 'follow'},
                {title: 'nofollow', value: 'nofollow'}
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endsection
@endif

@if(!empty('js'))
@section('js')
    {!! $js !!}

@endsection
@endif

@section('navbar')
    @isset($nav)
        <nav class="menu">
            <div class="menu__wrapik">
                <a href="https://medpravda.com.ua/admin/medicine" class="medicine_admin nav">Препараты</a>
                <a href="https://medpravda.com.ua/admin/bads" class="bads nav">Диетические добавки</a>
                <a href="https://medpravda.com.ua/admin/cosmetics" class="cosmetics nav">Косметические
                    средства</a>
                <a href="https://medpravda.com.ua/admin/wares" class="wares nav">Мед изделия</a>
                <a href="{{route('editor_all')}}" class="wares nav">Редакторская команда</a>
            </div>
            <div class="menu__wrapik">
                <a href="{{route('problematic.list.index', 1)}}" class="presentation img-problematic nav">Проблематика</a>
            </div>
            <div class="menu__wrapik">
                <a href="https://medpravda.com.ua/admin/articles" class="articles_admin nav">Редактирование статей</a>
                <a href="{{route('longreads')}}" class="articles_admin nav">Лонгриды</a>
                <a href="https://medpravda.com.ua/admin/topthemes" class="themes_admin nav">Популярные Темы</a>
            </div>
            <div class="menu__wrapik">
                <a href="https://medpravda.com.ua/admin/landing" class="presentation nav">Конструктор</a>
            </div>
            <div class="menu__wrapik">
                <a href="https://medpravda.com.ua/admin/fabricator" class="fabricator_admin nav">Производители</a>
                <a href="https://medpravda.com.ua/admin/pharm" class="pharm_admin nav">Фармгруппа</a>
                <a href="https://medpravda.com.ua/admin/atx" class="atx_admin nav">ATX</a>
                <a href="https://medpravda.com.ua/admin/substance" class="substance_admin nav">Вещества</a>
                <a href="https://medpravda.com.ua/admin/inn" class="inn_admin nav">МНН</a>
            </div>
            <div class="menu__wrapik">
                <a href="https://medpravda.com.ua/admin/main-admin" class="main_admin nav">Главная страница</a>
                <a href="https://medpravda.com.ua/admin/static" class="static nav">Статичные страницы</a>
                <a href="https://medpravda.com.ua/admin/presentation" class="presentation nav">Презентация проекта</a>
                {{--<a href="https://medpravda.com.ua/admin/advertising-companies" class="companies nav">Баннеры</a>--}}
                <a href="https://medpravda.com.ua/admin/statistics/medicine" class="stats_medicine nav">Статистика</a>
                <a href="https://medpravda.com.ua/admin/hardware" class="hardware nav">Статистика сервера</a>
            </div>
            <div class="menu__wrapik">
                <a href="{{route('advertising')}}" class="users nav">Управление Рекламой</a>
                <a href="https://medpravda.com.ua/admin/users" class="users nav">Пользователи</a>
            </div>
        </nav>
        {{--<nav class="menu">--}}
        {{--@foreach(Menu::get('adminMenu')->all() as $link)--}}

        {{--@php--}}
        {{--//get route link--}}
        {{--$route_link = null;--}}


        {{--if (array_key_exists('route', $link->link->path)) {$route_link = route($link->link->path['route']); }--}}
        {{--elseif(array_key_exists('url', $link->link->path)) {$route_link = $link->link->path['url'];}--}}

        {{--// get class--}}
        {{--$a_class = "";--}}
        {{--if(array_key_exists('class', $link->attributes)) { $a_class = $link->attributes['class'];}--}}
        {{--else { $a_class = $link->link->attributes['class'];}--}}

        {{--if ($link->title === 'Пользователи')--}}
        {{--{--}}
        {{--$a_class = $link->link->attributes['class'];--}}
        {{--}--}}

        {{--@endphp--}}

        {{--<a href="{{$route_link}}" class="{{$a_class}}">{{$link->title}}</a>--}}

        {{--@endforeach--}}
        {{--<a href="{{route('problematic.list.index', 1)}}" class="presentation img-problematic nav">Проблематика</a>--}}

        {{--</nav>--}}
    @endisset
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('mark')
    @if(!empty($mark))
        <span class="mark-menu" data-class="{{ $mark }}"></span>
    @endif
@endsection

@section('jss')
    @isset($jss)
        {!! $jss !!}
    @endisset
@endsection
@section('css')
    @isset($css)
        {!! $css !!}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

    @endisset
@endsection

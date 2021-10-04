<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">

    <title>{{$title ?? 'Что-то пошло не так =('}} | Медправда</title>
    <link href="{{ asset('/') }}favicon.png" rel="shortcut icon">
    <link rel="stylesheet" href="{{asset('fonts/Ubuntu/ubuntu.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/UbuntuCondensed/ubuntucondensed.css')}}">
    <link rel="stylesheet" href="{{asset('css/ManageBox/basic-manage.css')}}">
    <link rel="stylesheet" href="{{asset('css/ManageBox/basic-reactive.css')}}">
    <link rel="stylesheet" href="{{asset('css/ManageBox/gallery.css')}}">
{{--    <link rel="stylesheet" href="{{ asset('fonts/MedIcons/mp-icons.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('fonts/NewMedIcons/style.css') }}">
{{--    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>--}}
    <script src="{{asset('js/summernote.js')}}" defer></script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous"></script>



</head>
<body>
    <main class="mp-shell flex-row-sb-s">
        <aside class="aside-panel">
            <div class="manager-box">
                <div class="manager-info flex-col-s-c">
                    <a class="manager-avatar flex-row-c-c">
                        <i class="fas fa-user"></i>
                    </a>
                    <h2 class="manager-name">{{$manager->name}} {{$manager->middle_name}}  <i class="fas fa-chevron-down"></i></h2>
                </div>
                <ul class="manager-profile-menu">
                    <li class="mpm-link">
                        <a href="#">Выход</a>
                    </li>
                </ul>
            </div>
            <nav class="manager-navigation flex-col-sb-s">
                @include('OLEGYERA.ManageBox.navigation', $manager)
            </nav>
        </aside>
        <section class="mp-worksection" id="app">
            <reactive></reactive>
        </section>
    </main>

    <script src="https://kit.fontawesome.com/6c81018e8c.js" crossorigin="anonymous"></script>

    <script src="{{asset('js/ManageBox/helper.js')}}"></script>
    {!! $js !!}
</body>
</html>

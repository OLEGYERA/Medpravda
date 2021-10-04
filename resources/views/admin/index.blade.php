<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} : {{ $title ?? '' }}</title>


    <link href="{{ asset('/') }}favicon.png" rel="shortcut icon">

    {{--styles section--}}
    <link rel="stylesheet" href="{{asset('assets/admin/css/normalize.css')}}">
    {{--<link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/admin/css/style_anna.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/infoMessages.css')}}">
    {{--end stiles section--}}

    @yield('css')
<!-- TinyMCE -->
    @yield('tiny')
<!-- TinyMCE -->
    @yield('js')
</head>
<body>
<div class="container__wrap">
    <header>
        <div class="logo">
            <img src="{{asset('assets/images/main/logo_ru.png')}}" alt="logo">
        </div>
        @yield('navbar')
        <div class="header-line"></div>
    </header>
    <main>
        {{--alert message info status--}}
        @if ($errors->any())
            <div class="error-msg">
                <div class="close alert-close"><img src="{{asset('assets/admin/imgs/close-blue.svg')}}" alt="close">
                </div>
                <p class="error">
                    @foreach ($errors->toArray() as $key=>$error)
                    {!! str_replace(str_replace('_', ' ', $key), '<strong>' . trans('admin.' . $key) . '</strong>', $error[0]) !!}</br>
                    @endforeach
                </p>
            </div>
        @endif
        @if (session('status'))
            <div class="success-msg ">
                <div class="close alert-close"><img src="{{asset('assets/admin/imgs/close-blue.svg')}}" alt="close">
                </div>
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </main>
</div>
<footer>
    <img class="angles bottomleft" src="{{asset('assets/admin/imgs/bottomleft.svg')}}" alt="">
    <img class="angles bottomright" src="{{asset('assets/admin/imgs/bottomright.svg')}}" alt="">
</footer>

<div class="to__top">
    <svg version="1.1" id="top" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1877.6 1183.1" style="enable-background:new 0 0 1877.6 1183.1;" xml:space="preserve">
<g>
    <path d="M1849.2,142.5c-1.3,1.3-2.7,2.6-3.9,4c-30.9,34.2-61.7,68.4-92.5,102.6c-75,83.2-149.9,166.3-224.9,249.5
		c-71.7,79.5-143.3,159-215,238.5c-74.6,82.8-149.3,165.6-223.9,248.5c-49.6,55-99.2,110-148.8,165c-1.1,1.2-2,2.5-3,3.7
		c-0.3,0-0.6,0-1,0c-30-33.3-60-66.6-90-99.8C777,977.6,707.7,900.7,638.4,823.8C580.9,760,523.4,696.1,465.8,632.3
		C391.6,550,317.4,467.6,243.1,385.2C171.7,306,100.2,226.7,28.8,147.4c-1.6-1.8-3.2-3.6-4.7-5.2c-0.1-1.9,1.3-2.7,2.3-3.7
		c11.5-12.1,23-24.1,34.5-36.1C88,73.9,115.2,45.5,142.4,17c1.1-1.1,2.2-2.2,3.6-3.6c14.9,16.4,29.5,32.7,44.2,48.9
		c14.6,16.1,29.1,32.3,43.7,48.5c14.7,16.3,29.4,32.6,44,48.8c14.6,16.2,29.1,32.3,43.7,48.5c14.7,16.3,29.4,32.6,44,48.8
		c14.6,16.2,29.1,32.3,43.7,48.5c14.7,16.3,29.4,32.6,44,48.8c14.6,16.2,29.1,32.3,43.7,48.5c14.7,16.3,29.4,32.6,44,48.8
		c14.7,16.3,29.4,32.6,44,48.8c14.6,16.2,29.1,32.3,43.7,48.5c14.7,16.3,29.4,32.6,44,48.8c14.6,16.2,29.1,32.3,43.7,48.5
		c14.7,16.3,29.4,32.6,44,48.8c14.6,16.2,29.1,32.3,43.7,48.5c14.7,16.3,29.4,32.6,44,48.8c14.6,16.2,29.1,32.3,43.7,48.5
		c14.7,16.3,29.3,32.5,44.1,48.9c1.7-0.8,2.6-2.1,3.6-3.3c21.5-23.9,43.1-47.8,64.6-71.7c57-63.2,114-126.4,171-189.7
		c63.2-70.1,126.4-140.2,189.6-210.3c81.2-90.1,162.4-180.2,243.6-270.2c38.2-42.4,76.5-84.8,114.7-127.3c1.2-1.3,2.4-2.5,3.8-4
		c1.3,1.3,2.5,2.3,3.6,3.4c31.7,33.2,63.4,66.4,95.2,99.6c7.4,7.8,14.8,15.5,22.2,23.3c0.3,0.3,0.8,0.5,1.2,0.7
		C1849.2,141.2,1849.2,141.8,1849.2,142.5z"></path>
</g>
</svg>
</div>
@yield('mark')

{{--scripts--}}

<script src="{{asset('js/jquery-3.3.1.js')}}"></script>
@yield('jss')
<script src="{{asset('assets/admin/js/main.js')}}"></script>

</body>
</html>
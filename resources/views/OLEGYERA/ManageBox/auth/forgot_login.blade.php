<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ВОССТАНОВИТЬ ЛОГИН ОТ МЕДПРАВДЫ</title>
    <link rel="stylesheet" href="{{asset('fonts/Ubuntu/ubuntu.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/UbuntuCondensed/ubuntucondensed.css')}}">
    <link rel="stylesheet" href="{{asset('css/ManageBox/auth.css')}}">
</head>
<body>
<div class="mp-background flex-row-c-c">
    <div class="mp-visual-box flex-row-sb-s">
        <div class="mp-preview" style="background-image: url({{asset('img/ManageBox/backgrounds/mp-preview.webp')}});"></div>
        <form action="{{route('manage.forgot.login')}}" method="POST" class="mp-auth-box flex-col-c-c">
            {{ csrf_field()}}
            <h1 class="auth-title">
                ВОССТАНОВИТЬ ЛОГИН
            </h1>
            @if($errors->has('email'))
                <div class="auth-error flex-row-c-s">
                    <strong>* {{$errors->first('email')}}</strong>
                </div>
            @endif

            <div class="inp-forgot-row flex-row-sb-c">
                <input type="text" name="email" placeholder="Введите вашу почту" value="{{old('email')}}" required>
            </div>
            <button class="btn-auth">ОТПРАВИТЬ НОВЫЙ ЛОГИН</button>
            <div class="forgot-row">Забыли <span class="textmark"><a href="{{route('manage.forgot.password')}}">пароль</a>?</span> / Страница <span class="textmark"><a href="{{route('manage.login')}}">входа</a></span></div>
        </form>
    </div>
</div>
</body>
</html>
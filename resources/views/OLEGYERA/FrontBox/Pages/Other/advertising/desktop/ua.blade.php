<div class="full-content">
    <div class="double-wrap">
        <div class="page-content">
            <h1 class="page-title">Рекламные Возможности</h1>
            <div class="row-about">
                @php
                    $date = \Carbon\Carbon::create('2019', '12', '20')
                @endphp
                <p style="margin-bottom: 10px">
                    <time datetime="{{$date->format('Y-m-d')}}">
                        <i>Дата створення: {{$date->format('d')}} {{renderNameOfMonth($date->format('M'), 'ua')}} {{$date->format('Y')}}</i>
                    </time>
                </p>
                <h2 style="text-align: center">Баннера</h2>
                <p style="text-align: center"><img src="{{asset('img/FrontBox/other/bru.png')}}" alt=""></p>
                <h2 style="text-align: center">Брендування</h2>
                <p style="text-align: center"><img src="{{asset('img/FrontBox/other/branding_ua.png')}}" alt=""></p>
                <h2 style="text-align: center">Фармвитіснення</h2>
                <p style="text-align: center"><img src="{{asset('img/FrontBox/other/full_ua.png')}}" alt=""></p>
                <hr>
                <h2 class="page-title">Контакти рекламного відділу:</h2>
                <div class="page-row">
                    <div class="part">
                        <div class="part-title">E-mail:</div>
                        <a href="mailto:reklama@medpravda.ua" class="part-link">reklama@medpravda.ua</a>
                    </div>
                    <div class="part">
                        <div class="part-title">Телефон:</div>
                        <a href="tel:+38 (044) 337-73-71" class="part-link">+38 (044) 337-73-71</a>
                    </div>
                    <div class="part">
                        <div class="part-title">Адреса:</div>
                        <b>Україна, м Київ, 01010, ул.Омельяновіча-Паленка, 4/6</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .row-about ul li a{
        padding: 2px 0!important;
        color: rgb(45, 156, 219);
    }
    .part{
        margin-bottom: 10px;
    }
    .part-title,
    .part-link{
        margin-bottom: 5px;
        padding: 0!important;
    }
    .part-link{
        color: rgb(45, 156, 219);
    }
    .row-about img{
        width: 100%;
    }
</style>

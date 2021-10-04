<div class="full-content">
    <div class="double-wrap">
        <div class="page-content">
            <h1 class="page-title">О нас</h1>
            <div class="row-about">
                @php
                    $date = \Carbon\Carbon::create('2019', '12', '20')
                @endphp
                <p style="margin-bottom: 10px">
                    <time datetime="{{$date->format('Y-m-d')}}">
                        <i>Дата создания: {{$date->format('d')}} {{renderNameOfMonth($date->format('M'), 'ru')}} {{$date->format('Y')}}</i>
                    </time>
                </p>

                <p>Мед Правда – это сборник актуальной информации о лекарственных средствах, диетических добавках, изделиях медицинского назначения и косметических средствах, который пригодится обычному читателю, врачу, провизору и фармацевту.</p>
                <p>Эти же средства можно найти в удобной для Вас аптеке и заказать.</p>
                <p>МедПравда - это портал о здоровье, где Вы ознакомитесь с основными видами заболеваний, симптомов и неотложных состояний. Эта информация подана с акцентом на признаки, которые позволят принять правильное решение по отношению своего здоровья и здоровья Ваших близких.</p>
                <p><b>С уважением, администрация Мед Правды.</b></p>
                <p style="text-align: center"><img src="{{asset('img/FrontBox/other/about-sertificate.png')}}" alt=""></p>
                <hr>
                <p>Мы проверяем информацию опираясь на источники:</p>
                <ul>
                    <li><a href="http://www.drlz.com.ua/"  target="_blank" rel=”noreferrer”>www.drlz.com.ua</a></li>
                    <li><a href="https://www.dls.gov.ua/" target="_blank" rel=”noreferrer”>dls.gov.ua</a></li>
                    <li><a href="https://dec.gov.ua/" target="_blank" rel=”noreferrer”>dec.gov.ua</a></li>
                    <li><a href="https://moz.gov.ua/" target="_blank" rel=”noreferrer”>moz.gov.ua</a></li>
                    <li><a href="https://data.gov.ua/" target="_blank" rel=”noreferrer”>data.gov.ua</a></li>
                    <li><a href="http://ehealth.gov.ua/" target="_blank" rel=”noreferrer”>ehealth.gov.ua</a></li>
                </ul>
                <hr>
                <div class="page-row">
                    <h3 class="page-title">Редакция:</h3>
                    <div class="part">
                        <div class="part-title">E-mail:</div>
                        <a href="mailto:edition@medpravda.ua" class="part-link">edition@medpravda.ua</a>
                    </div>
                </div>
                <div class="page-row">
                    <h3 class="page-title">Реклама:</h3>
                    <div class="part">
                        <div class="part-title">E-mail:</div>
                        <a href="mailto:reklama@medpravda.ua" class="part-link">reklama@medpravda.ua</a>
                    </div>
                    <div class="part">
                        <div class="part-title">Телефон:</div>
                        <a href="tel:+38 (044) 337-73-71" class="part-link">+38 (044) 337-73-71</a>
                    </div>
                    <div class="part">
                        <div class="part-title">Адрес:</div>
                        <b>Украина, г. Киев, 01010, ул. Омельяновича-Паленко, 4/6</b>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5082.169077539847!2d30.54407794070618!3d50.43952597947631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cfa66c08d3a9%3A0x6e800048cfa4262c!2z0YPQuy4g0KHRg9Cy0L7RgNC-0LLQsCwgNC82LCDQmtC40LXQsiwgMDIwMDA!5e0!3m2!1sru!2sua!4v1591958973816!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
</style>

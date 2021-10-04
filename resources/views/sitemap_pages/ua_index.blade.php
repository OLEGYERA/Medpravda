<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name=”robots” content=”noindex, follow, noarchive”>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-grid.css">
    <title>Карта сайта | medpravda.ua</title>
</head>
<body>
<div class="col-md-12">
    <p>Карта сайту (UA-версія) | medpravda.ua</p>
    <hr>
    <p><a href="https://medpravda.ua/sitemap/">RU-версія</a></p>
</div>
<div class="row">
    <div class="col-md-4">
        <p>Статичні сторінки</p>
        <ul>
            <li><a href="https://medpravda.ua/ua/">Головна сторінка</a></li>
            <li><a href="https://medpravda.ua/ua/top-themes">Популярні теми</a></li>
            <li><a href="https://medpravda.ua/ua/top-articles">Топ статі</a></li>
            <li><a href="https://medpravda.ua/ua/fresh-articles">Свіжі статті</a></li>
            <li><a href="https://medpravda.ua/ua/reklama">Реклама</a></li>
            <li><a href="https://medpravda.ua/ua/onas">Про нас</a></li>
            <li><a href="https://medpravda.ua/ua/soglashenie">Угода про конфіденційність</a></li>
        </ul>
    </div>

    <div class="col-md-4">
        <p>Сторінки пошуку препаратів | сортування за:</p>
        <ul>
            <li><a href="https://medpravda.ua/ua//sort/alfavit">Алфавіту</a></li>
            <li><a href="https://medpravda.ua/ua/sort/veshestvo">Діючою речовиною</a></li>
            <li><a href="https://medpravda.ua/ua/sort/mnn">Міжнародною назвою (МНН)</a></li>
            <li><a href="https://medpravda.ua/ua/sort/atx">АТX-класифікацією</a></li>
            <li><a href="https://medpravda.ua/ua/sort/farm-gruppa">фармакотерапевтичною групою</a></li>
            <li><a href="https://medpravda.ua/ua/sort/proizvoditel">Виробником</a></li>
            <li><a href="https://medpravda.ua/ua/sort/bads/all">Дієтичним добавкам</a></li>
        </ul>
    </div>

    <div class="col-md-4">
        <p>Категорії статей</p>
        <ul>
            @foreach($categories as $cat)
                <li><a href="{{"https://medpravda.ua/fresh-articles/cat/".$cat['alias']}}">{{$cat['utitle']}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <p class="col-centered">ПРЕПАРАТИ</p>
    </div>
    <div class="col-md-6">
        <p>Адаптивна інструкція</p>
        <ul>
            @foreach($medicines as $medicine)
                <li><a href="{{"https://medpravda.ua/ua/preparat/".$medicine['alias']}}">{{$medicine['ua_title']}}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="col-md-6">
        <p>Офіційна інструкція</p>
        <ul>
            @foreach($medicines as $medicine)
                @if($medicine['official'])
                    <li><a href="{{"https://medpravda.ua/ua/preparat/".$medicine['alias']."/official"}}">{{$medicine['ua_title']}}</a></li>
                @endif
            @endforeach
        </ul>
    </div>

    <div class="col-md-12">
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <p>ХАРЧОВІ ДОБАВКИ</p>
    </div>
    <div class="col-md-6">
        <p>Адаптована інструкція</p>
        <ul>
            @foreach($bads as $bad)
                <li><a href="{{"https://medpravda.ua/ua/bad/adapted/".$bad['slug']}}">{{$bad['ua_title']}}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="col-md-6">
        <p>Офіційна інструкція</p>
        <ul>
            @foreach($bads as $bad)
                <li><a href="{{"https://medpravda.ua/ua/bad/official/".$bad['slug']}}">{{$bad['ua_title']}}</a></li>
            @endforeach
        </ul>

    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <p>СТАТТІ ПО КАТЕГОРІЙ</p>
    </div>

    @foreach($articles as $article)
        <div class="col-md-4">
            <p>{{$article['title']}}</p>

            <ul>
                @foreach($article['articles'] as $artc)
                    <li><a href="{{"https://medpravda.ua/ua/fresh-articles/".$artc['alias']}}">{{$artc['ua_title']}}</a></li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>


</body>
</html>
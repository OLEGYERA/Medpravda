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
    <p>Карта сайта (RU-версия) | medpravda.ua</p>
    <hr>
    <p><a href="https://medpravda.ua/ua/sitemap/">UA-версия</a></p>
</div>
    <div class="row">
        <div class="col-md-4">
            <p>Статические страницы</p>
            <ul>
                <li><a href="https://medpravda.ua/">Главная страница</a></li>
                <li><a href="https://medpravda.ua/top-themes">Популярные темы</a></li>
                <li><a href="https://medpravda.ua/top-articles">Топ статьи</a></li>
                <li><a href="https://medpravda.ua/fresh-articles">Свежие статьи</a></li>
                <li><a href="https://medpravda.ua/reklama">Реклама</a></li>
                <li><a href="https://medpravda.ua/onas">О нас</a></li>
                <li><a href="https://medpravda.ua/soglashenie">Соглашение о конфиденциальности</a></li>
            </ul>
        </div>

        <div class="col-md-4">
            <p>Страницы поиска препаратов | сортировка по:</p>
            <ul>
                <li><a href="https://medpravda.ua/sort/alfavit">Алфавиту</a></li>
                <li><a href="https://medpravda.ua/sort/veshestvo">Действующему веществу</a></li>
                <li><a href="https://medpravda.ua/sort/mnn">Международному названию
                        (МНН)</a></li>
                <li><a href="https://medpravda.ua/sort/atx">АТХ-классификации</a></li>
                <li><a href="https://medpravda.ua/sort/farm-gruppa">Фармакотерапевтической
                        группе</a></li>
                <li><a href="https://medpravda.ua/sort/proizvoditel">Производителю</a></li>
                <li><a href="https://medpravda.ua/sort/bads/all">Диетическим добавкам</a></li>
            </ul>
        </div>

        <div class="col-md-4">
            <p>Категории статей</p>
            <ul>
                @foreach($categories as $cat)
                    <li><a href="{{"https://medpravda.ua/fresh-articles/cat/".$cat['alias']}}">{{$cat['title']}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p class="col-centered">ПРЕПАРАТЫ</p>
        </div>
        <div class="col-md-6">
            <p>Адаптивная иструкция</p>
            <ul>
                @foreach($medicines as $medicine)
                    <li><a href="{{"https://medpravda.ua/preparat/".$medicine['alias']}}">{{$medicine['title']}}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-6">
            <p>Официальная инструкция</p>
            <ul>
                @foreach($medicines as $medicine)
                    @if($medicine['official'])
                        <li><a href="{{"https://medpravda.ua/preparat/".$medicine['alias']."/official"}}">{{$medicine['title']}}</a></li>
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
            <p>ПИЩЕВЫЕ ДОБАВКИ</p>
        </div>
        <div class="col-md-6">
            <p>Адаптированная иструкция</p>
            <ul>
                @foreach($bads as $bad)
                    <li><a href="{{"https://medpravda.ua/bad/adapted/".$bad['slug']}}">{{$bad['title']}}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-6">
            <p>Официальная инструкция иструкция</p>
            <ul>
                @foreach($bads as $bad)
                    <li><a href="{{"https://medpravda.ua/bad/official/".$bad['slug']}}">{{$bad['title']}}</a></li>
                @endforeach
            </ul>

        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>СТАТЬИ ПО КАТЕГОРИЯМ</p>
        </div>

        @foreach($articles as $article)
            <div class="col-md-4">
                <p>{{$article['title']}}</p>
                
                <ul>
                    @foreach($article['articles'] as $artc)
                        <li><a href="{{"https://medpravda.ua/fresh-articles/".$artc['alias']}}">{{$artc['title']}}</a></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>


</body>
</html>
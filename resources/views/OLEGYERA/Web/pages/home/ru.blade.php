<div class="full-content">
    <div class="box-intro launch" style="background-image: url({{asset('img/FrontBox/home/intro.png')}});">
        <div class="wrap box-intro-wrap">
            <h1 class="page-title">Необходимая медицинская информация, у вас под рукой.</h1>
            <search :lang="'ru'"></search>
            <h3 class="meta-title">Популярные запросы:
                <span class="selected">лоратадин</span>,
                <span class="selected">ибупрофен</span>,
                <span class="selected">цитрин</span>,
            </h3>
        </div>
    </div>
    @if($news['count'] != 0)
        <div class="mp-box box-news">
            <div class="mp-box-title center-align">
                <h2>
                    <a href="{{route('ru.tags.news')}}">Новости</a>
                </h2>
            </div>
            <div class="grid">
                <div class="left-grid">
                    <div class="title-shell">
                        <h3 class="group-title">
                            <a>Последние</a>
                        </h3>
                    </div>
                    @foreach($news['last'] as $latest_new)
                        @php $time_arr = daysOrMonth($latest_new->article->created_at, 'ru') @endphp
                        @include('OLEGYERA.FrontBox.particles.article-list', [
                            'link' => route('ru.pub', ['id' => $latest_new->article->id]),
                            'time' => $time_arr,
                            'title' => $latest_new->article->title,
                            'author' => $latest_new->editor->name . ' ' . $latest_new->editor->surname
                        ])
                    @endforeach
                    <a href="{{route('ru.tags.news')}}" class="special-link">
                        <h4>Все новости</h4>
                    </a>
                </div>
                <div class="right-grid">
                    <div class="title-shell">
                        <h3 class="group-title">
                            <a>Актуальные</a>
                        </h3>
                    </div>
                    @foreach($news['popular'] as $popular_new)
                        @php $time_arr = daysOrMonth($popular_new->article->created_at, 'ru') @endphp
                        @include('OLEGYERA.FrontBox.particles.article', [
                            'type' => 'base',
                            'eclipsed' => true,
                            'link' => route('ru.pub', ['id' => $popular_new->article->id]),
                            'time' => $time_arr,
                            'counter' => 0,
                            'title' => $popular_new->article->title,
                            'author' => $popular_new->editor->name . ' ' . $popular_new->editor->surname,
                            'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_new->image->category_id) . '/large/' . $popular_new->image->path,

                        ])
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if($articles['count'] != 0)
        <div class="mp-box box-articles">
            <div class="mp-box-title">
                <h2>
                    <a href="{{route('ru.tags.articles')}}">Cтатьи</a>
                </h2>
            </div>
            <div class="grid">
                <div class="left-grid">
                    <div class="title-shell">
                        <h3 class="group-title">
                            <a href="#">Набирают популярность</a>
                        </h3>
                    </div>
                    @php $popular_article = $articles['popular'][0] @endphp
                    @include('OLEGYERA.FrontBox.particles.article', [
                           'type' => 'large',
                           'eclipsed' => true,
                           'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                           'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                           'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                           'counter' => 0,
                           'title' => $popular_article->article->title,
                           'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                       ])

                    @php $popular_article = $articles['popular'][1] @endphp
                    @include('OLEGYERA.FrontBox.particles.article', [
                        'type' => 'base',
                        'eclipsed' => true,
                        'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                        'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                        'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                        'counter' => 0,
                        'title' => $popular_article->article->title,
                        'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                    ])
                    @php $popular_article = $articles['popular'][2] @endphp
                    @include('OLEGYERA.FrontBox.particles.article', [
                        'type' => 'base',
                        'eclipsed' => true,
                        'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                        'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                        'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                        'counter' => 0,
                        'title' => $popular_article->article->title,
                        'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                    ])
                    @php $popular_article = $articles['popular'][3] @endphp
                    @include('OLEGYERA.FrontBox.particles.article-banner', [
                        'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                        'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                        'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                        'counter' => 0,
                        'title' => $popular_article->article->title,
                        'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                    ])
                </div>

                <div class="right-grid">
                    <div class="title-shell">
                        <h3 class="group-title">
                            <a>Последние</a>
                        </h3>
                    </div>
                    @foreach($articles['last'] as $popular_article)
                        @php $time_arr = daysOrMonth($popular_article->article->created_at, 'ru') @endphp
                        @include('OLEGYERA.FrontBox.particles.article', [
                            'type' => 'mini',
                            'eclipsed' => true,
                            'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                            'time' => $time_arr,
                            'counter' => 0,
                            'title' => $popular_article->article->title,
                            'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                            'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,

                        ])
                    @endforeach
                    <a href="{{route('ru.tags.articles')}}" class="special-link">
                        <h4>Смотреть еще</h4>
                    </a>
                </div>
            </div>
        </div>
    @endif
    @if($interviews['count'] != 0)
        <div class="mp-box box-interview">
        <div class="mp-box-title inverse">
            <h2>
                <a href="{{route('ru.tags.interviews')}}">Интервью</a>
            </h2>
        </div>
        <div class="grid">
            @foreach($interviews['items'] as $item)
                @php $time_arr = daysOrMonth($item->article->created_at, 'ru') @endphp
                @include('OLEGYERA.FrontBox.particles.article', [
                    'type' => 'base',
                    'eclipsed' => true,
                    'link' => route('ru.pub', ['id' => $item->article->id]),
                    'time' => $time_arr,
                    'counter' => 0,
                    'title' => $item->article->title,
                    'author' => $item->editor->name . ' ' . $item->editor->surname,
                    'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($item->image->category_id) . '/large/' . $item->image->path,
                ])
            @endforeach
        </div>
    </div>
    @endif
    @if($popular['count'] != 0)
        <div class="mp-box box-mixed">
            <div class="mp-box-title">
                <h2>
                    <a>Топ темы</a>
                </h2>
            </div>
            <div class="grid">
                <div class="left-grid">
                    @php $popular_article = $popular['data'][0] @endphp
                    @include('OLEGYERA.FrontBox.particles.article', [
                       'type' => 'base',
                       'eclipsed' => true,
                       'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                       'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                       'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                       'counter' => 0,
                       'title' => $popular_article->article->title,
                       'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                   ])
                    @php $popular_article = $popular['data'][1] @endphp
                    @include('OLEGYERA.FrontBox.particles.article', [
                       'type' => 'base',
                       'eclipsed' => true,
                       'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                       'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                       'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                       'counter' => 0,
                       'title' => $popular_article->article->title,
                       'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                   ])
                    @php $popular_article = $popular['data'][2] @endphp
                    @include('OLEGYERA.FrontBox.particles.article', [
                       'type' => 'base',
                       'eclipsed' => true,
                       'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                       'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                       'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                       'counter' => 0,
                       'title' => $popular_article->article->title,
                       'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                   ])

                    <div class="mini-fix">
                        @php $popular_article = $popular['data'][3] @endphp
                        @include('OLEGYERA.FrontBox.particles.article', [
                           'type' => 'base',
                           'eclipsed' => true,
                           'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                           'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                           'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                           'counter' => 0,
                           'title' => $popular_article->article->title,
                           'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                       ])

                        @php $popular_article = $popular['data'][4] @endphp
                        @include('OLEGYERA.FrontBox.particles.article', [
                           'type' => 'base',
                           'eclipsed' => true,
                           'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                           'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                           'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                           'counter' => 0,
                           'title' => $popular_article->article->title,
                           'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                       ])

                        @php $popular_article = $popular['data'][5] @endphp
                        @include('OLEGYERA.FrontBox.particles.article', [
                           'type' => 'base',
                           'eclipsed' => true,
                           'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                           'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                           'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                           'counter' => 0,
                           'title' => $popular_article->article->title,
                           'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                       ])
                        @php $popular_article = $popular['data'][6] @endphp
                        @include('OLEGYERA.FrontBox.particles.article', [
                           'type' => 'base',
                           'eclipsed' => true,
                           'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                           'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                           'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                           'counter' => 0,
                           'title' => $popular_article->article->title,
                           'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                       ])
                        @php $popular_article = $popular['data'][7] @endphp
                        @include('OLEGYERA.FrontBox.particles.article', [
                           'type' => 'base',
                           'eclipsed' => true,
                           'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                           'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                           'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                           'counter' => 0,
                           'title' => $popular_article->article->title,
                           'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                       ])
                        @php $popular_article = $popular['data'][8] @endphp
                        @include('OLEGYERA.FrontBox.particles.article', [
                           'type' => 'base',
                           'eclipsed' => true,
                           'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                           'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                           'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                           'counter' => 0,
                           'title' => $popular_article->article->title,
                           'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                       ])
                        <a class="special-link">
                            <h4>Все топ темы</h4>
                        </a>
                    </div>
                </div>
                <div class="right-grid">
                    @php $popular_article = $popular['data'][9] @endphp
                    @include('OLEGYERA.FrontBox.particles.article', [
                        'type' => 'large',
                       'eclipsed' => false,
                       'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                       'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                       'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                       'counter' => 0,
                       'title' => $popular_article->article->title,
                       'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                   ])
                </div>
            </div>
        </div>
    @endif
    {{--special--}}
    {{--columns--}}
    {{--podcast--}}
    <div class="mp-box box-directory">
        <div class="mp-box-title center-align">
            <h2>
                <a>Справочник</a>
            </h2>
        </div>
        <div class="grid">
            @include('OLEGYERA.FrontBox.particles.article-plate', [
                       'img_url' => asset('img/FrontBox/home/directory/symptoms.png'),
                       'title' => 'Медицинский справочник симптомов',
                       'description' => 'В справочнике симптомов вы найдете полное описание каждого симптома и методы его снятия.'
                   ])
            @include('OLEGYERA.FrontBox.particles.article-plate', [
                        'img_url' => asset('img/FrontBox/home/directory/disease.png'),
                        'title' => 'Медицинский справочник болезней',
                        'description' => 'В справочнике болезней вы найдете полное описание каждой болезни, их методы лечения и диагностирования.'
                    ])
            @include('OLEGYERA.FrontBox.particles.article-plate', [
                        'img_url' => asset('img/FrontBox/home/directory/emergency.png'),
                        'title' => 'Медицинский справочник неотложных состояний',
                        'description' => 'В справочнике неотложных сотояний вы можете найти и ознакомится с различными острыми заболеваниями, обострениями, хроническими патологиями, травмами и тд.'
                    ])
        </div>
    </div>
    <div class="mp-box box-plates">
        <div class="mp-box-title">
            <h2>
                <a>Инструкции</a>
            </h2>
        </div>
        <div class="grid">
            <div class="inner-block">
                <div class="inner-body">
                    <div class="inner-header">
                        <h3>
                            <a href="{{route('ru.catalog.' . $catalog['drug']['route_name'])}}">Препараты</a>
                        </h3>
                    </div>
                    <div class="inner-img">
                        <picture>
                            <img width="300" height="150" src="{{asset('img/FrontBox/home/drug.svg')}}" alt="">
                        </picture>
                    </div>
                </div>
            </div>
            <div class="inner-block">
                <div class="inner-body">
                    <div class="inner-header">
                        <h3>
                            <a href="{{route('ru.catalog.' . $catalog['ware']['route_name'])}}">Медицинские изделия</a>
                        </h3>
                    </div>
                    <div class="inner-img">
                        <picture>
                            <img width="300" height="150" src="{{asset('img/FrontBox/home/ware.svg')}}" alt="">
                        </picture>
                    </div>
                </div>
            </div>
            <div class="inner-block">
                <div class="inner-body">
                    <div class="inner-header">
                        <h3>
                            <a href="{{route('ru.catalog.' . $catalog['bad']['route_name'])}}">Диетические добавки</a>
                        </h3>
                    </div>
                    <div class="inner-img">
                        <picture>
                            <img width="300" height="150" src="{{asset('img/FrontBox/home/bad.svg')}}" alt="">
                        </picture>
                    </div>
                </div>
            </div>
            <div class="inner-block">
                <div class="inner-body">
                    <div class="inner-header">
                        <h3>
                            <a href="{{route('ru.catalog.' . $catalog['cosmetic']['route_name'])}}">Косметические средства</a>
                        </h3>
                    </div>
                    <div class="inner-img">
                        <picture>
                            <img width="300" height="150" src="{{asset('img/FrontBox/home/cosmetic.svg')}}" alt="">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mp-box box-medical">
        <div class="mp-box-title center-align">
            <h2>
                <a>Недавно добавленные</a>
            </h2>
        </div>
        <div class="grid">
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Препараты</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($drugs['last'] as $drug)
                        <a href="{{route('ru.drug', ['alias' => $drug->alias])}}">{{$drug->title}}</a>
                    @endforeach
                </div>

            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Косметические средства</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($cosmetics['last'] as $cosmetic)
                        <a href="{{route('ru.cosmetic', ['alias' => $cosmetic->alias])}}">{{$cosmetic->title}}</a>
                    @endforeach
                </div>
            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Диетические добавки</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($bads['last'] as $bad)
                        <a href="{{route('ru.bad', ['alias' => $bad->alias])}}">{{$bad->title}}</a>
                    @endforeach
                </div>
            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Медицинские изделия</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($wares['last'] as $ware)
                        <a href="{{route('ru.ware', ['alias' => $ware->alias])}}">{{$ware->title}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="mp-box box-plates box-plates-tiny">
        <div class="mp-box-title right-align">
            <h2>
                <a>Другое</a>
            </h2>
        </div>
        <div class="grid">
            @foreach($catalog as $key => $item)
                @if($key == 'drug' || $key == 'bad' || $key == 'ware' || $key == 'cosmetic') @continue @endif
                <div class="inner-block">
                    <div class="inner-body">
                        <span class="glyph {{$key}}"></span>
                        <div class="inner-header">
                            <h3>
                                <a href="{{route('ru.catalog.' . $item['route_name'])}}">{{$item['title']}}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="inner-block">
                <div class="inner-body">
                        <span class="glyph">
                            <img src="{{asset('img/FrontBox/home/terms.svg')}}" alt="">
                        </span>
                    <div class="inner-header">
                        <h3>
                            <a href="#">Терминология</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mp-box box-medical">
        <div class="mp-box-title center-align">
            <h2>
                <a>Часто ищут</a>
            </h2>
        </div>
        <div class="grid">
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Препараты</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($drugs['popular'] as $drug)
                        <a href="{{route('ru.drug', ['alias' => $drug->alias])}}">{{$drug->title}}</a>
                    @endforeach
                </div>

            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Косметические средства</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($cosmetics['popular'] as $cosmetic)
                        <a href="{{route('ru.cosmetic', ['alias' => $cosmetic->alias])}}">{{$cosmetic->title}}</a>
                    @endforeach
                </div>
            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Диетические добавки</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($bads['popular'] as $bad)
                        <a href="{{route('ru.bad', ['alias' => $bad->alias])}}">{{$bad->title}}</a>
                    @endforeach
                </div>
            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Медицинские изделия</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($wares['popular'] as $ware)
                        <a href="{{route('ru.ware', ['alias' => $ware->alias])}}">{{$ware->title}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="mp-box box-email">
        <div class="grid">
            <div class="email-subscribes">
                <div class="email-body">
                    <div class="email-content">
                        <h3>Хотите быть в курсе последних новостей и событий на фармрынке Украины?<br>Подписывайтесь на нашу рассылку!</h3>
                        <div class="email-form">
                            <input class="email-input" type="email" placeholder="Жду Ваш e-mail">
                            <div class="email-submit">Подписаться</div>
                        </div>
                    </div>
                    <div class="email-img">
                        <img src="{{asset('img/FrontBox/home/emailer.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{--<div class="mp-box special">--}}
{{--    <div class="title-box">--}}
{{--        <h2>Спецпроекты</h2>--}}
{{--    </div>--}}
{{--    <div class="grid">--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="img-wrapper">--}}
{{--                    <picture>--}}
{{--                        <img width="705" height="400" src="https://img.pravda.com/images/doc/1/2/12c06f0-705-395.jpg" alt="">--}}
{{--                    </picture>--}}
{{--                </div>--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Спецоперація "Крим": від курорту і автономії до депресивної околиці</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author special-author">--}}
{{--                        При поддержке Европейского союза--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="img-wrapper">--}}
{{--                    <picture>--}}
{{--                        <img width="705" height="400" src="https://img.pravda.com/images/doc/0/8/085e8f0-400-224.-3jpg.jpg" alt="">--}}
{{--                    </picture>--}}
{{--                </div>--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Инклюзия в руках каждого: что можно сделать прямо сейчас для помощи детям с инвалидностью</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author special-author">--}}
{{--                        При поддержке бренда "Агуша"--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="img-wrapper">--}}
{{--                    <picture>--}}
{{--                        <img width="705" height="400" src="https://img.pravda.com/images/doc/2/6/26bc138-oil-pipeline-mountains-400.jpg" alt="">--}}
{{--                    </picture>--}}
{{--                </div>--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Кто будет удерживать украинскую ГТС с 2025 и сколько это будет стоить?</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author special-author">--}}
{{--                        При поддержке консалтинговой компании ExPro Consulting--}}
{{--                        При поддержке консалтинговой компании ExPro Consulting--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="mp-box columns">--}}
{{--    <div class="title-box right-align">--}}
{{--        <h2>Колонки</h2>--}}
{{--    </div>--}}
{{--    <div class="grid">--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Почему визит премьера Грузии не отменяет курс Тбилиси на дистанцирование от Украины</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author">--}}
{{--                        <div class="author-img-box">--}}
{{--                            <img width="160" height="160" src="https://img.pravda.com/images/doc/9/e/9e2a057-kandelaki31_160x160.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="author-content-box">--}}
{{--                            <span class="author-name">Георгий Канделаки</span>--}}
{{--                            <span class="author-position">экс-депутат Парламента Грузии, журналист</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Донбасс и не только: чего ожидать от встречи Зеленского и Байдена?</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author">--}}
{{--                        <div class="author-img-box">--}}
{{--                            <img width="160" height="160" src="https://img.pravda.com/images/doc/4/a/4a822dd-1denyshchenko_160x160.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="author-content-box">--}}
{{--                            <span class="author-name">Денис Денищенко</span>--}}
{{--                            <span class="author-position">эксперт по вопросам международных отношений</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Почему визит премьера Грузии не отменяет курс Тбилиси на дистанцирование от Украины</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author">--}}
{{--                        <div class="author-img-box">--}}
{{--                            <img width="160" height="160" src="https://img.pravda.com/images/doc/9/e/9e2a057-kandelaki31_160x160.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="author-content-box">--}}
{{--                            <span class="author-name">Георгий Канделаки</span>--}}
{{--                            <span class="author-position">экс-депутат Парламента Грузии, журналист</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Донбасс и не только: чего ожидать от встречи Зеленского и Байдена?</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author">--}}
{{--                        <div class="author-img-box">--}}
{{--                            <img width="160" height="160" src="https://img.pravda.com/images/doc/4/a/4a822dd-1denyshchenko_160x160.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="author-content-box">--}}
{{--                            <span class="author-name">Денис Денищенко</span>--}}
{{--                            <span class="author-position">эксперт по вопросам международных отношений</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Почему визит премьера Грузии не отменяет курс Тбилиси на дистанцирование от Украины</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author">--}}
{{--                        <div class="author-img-box">--}}
{{--                            <img width="160" height="160" src="https://img.pravda.com/images/doc/9/e/9e2a057-kandelaki31_160x160.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="author-content-box">--}}
{{--                            <span class="author-name">Георгий Канделаки</span>--}}
{{--                            <span class="author-position">экс-депутат Парламента Грузии, журналист</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Почему визит премьера Грузии не отменяет курс Тбилиси на дистанцирование от Украины</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author">--}}
{{--                        <div class="author-img-box">--}}
{{--                            <img width="160" height="160" src="https://img.pravda.com/images/doc/9/e/9e2a057-kandelaki31_160x160.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="author-content-box">--}}
{{--                            <span class="author-name">Георгий Канделаки</span>--}}
{{--                            <span class="author-position">экс-депутат Парламента Грузии, журналист</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="mp-box podcast">--}}
{{--    <div class="title-box">--}}
{{--        <h2>Подкасты</h2>--}}
{{--    </div>--}}
{{--    <div class="grid">--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="article-favicon">--}}
{{--                    <img src="{{asset('img/FrontBox/home/podcast.svg')}}" alt="">--}}
{{--                </div>--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Кто такие талибы, как США оказались в Афганистане и почему оттуда ушли? Говорим о последних событиях в Афганистане</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="article-category">--}}
{{--                    @Долбанные вопросы--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="article-favicon">--}}
{{--                    <img src="{{asset('img/FrontBox/home/podcast.svg')}}" alt="">--}}
{{--                </div>--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Кто такие талибы, как США оказались в Афганистане и почему оттуда ушли? Говорим о последних событиях в Афганистане</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="article-category">--}}
{{--                    @Долбанные вопросы--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="article-favicon">--}}
{{--                    <img src="{{asset('img/FrontBox/home/podcast.svg')}}" alt="">--}}
{{--                </div>--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Кто такие талибы, как США оказались в Афганистане и почему оттуда ушли? Говорим о последних событиях в Афганистане</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="article-category">--}}
{{--                    @Долбанные вопросы--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="article-favicon">--}}
{{--                    <img src="{{asset('img/FrontBox/home/podcast.svg')}}" alt="">--}}
{{--                </div>--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">Кто такие талибы, как США оказались в Афганистане и почему оттуда ушли? Говорим о последних событиях в Афганистане</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="article-category">--}}
{{--                    @Долбанные вопросы--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--protocols--}}
{{--<div class="mp-box protocols">--}}
{{--    <div class="title-box">--}}
{{--        <h2>Протоколы лечения</h2>--}}
{{--    </div>--}}
{{--    <div class="grid">--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">УНІФІКОВАНИЙ КЛІНІЧНИЙ ПРОТОКОЛ ПЕРВИННОЇ, ВТОРИННОЇ (СПЕЦІАЛІЗОВАНОЇ) ТА ТРЕТИННОЇ (ВИСОКОСПЕЦІАЛІЗОВАНОЇ) МЕДИЧНОЇ ДОПОМОГИ ДІТЯМ ВІЛ-ІНФЕКЦІЯ</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author">--}}
{{--                        <div class="author-img-box">--}}
{{--                            <img width="160" height="160" src="https://img.pravda.com/images/doc/9/e/9e2a057-kandelaki31_160x160.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="author-content-box">--}}
{{--                            <span class="author-name">Георгий Канделаки</span>--}}
{{--                            <span class="author-position">экс-депутат Парламента Грузии, журналист</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">УНІФІКОВАНИЙ КЛІНІЧНИЙ ПРОТОКОЛ ПЕРВИННОЇ, ВТОРИННОЇ (СПЕЦІАЛІЗОВАНОЇ) ТА ТРЕТИННОЇ (ВИСОКОСПЕЦІАЛІЗОВАНОЇ) МЕДИЧНОЇ ДОПОМОГИ ДІТЯМ ВІЛ-ІНФЕКЦІЯ</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author">--}}
{{--                        <div class="author-img-box">--}}
{{--                            <img width="160" height="160" src="https://img.pravda.com/images/doc/9/e/9e2a057-kandelaki31_160x160.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="author-content-box">--}}
{{--                            <span class="author-name">Георгий Канделаки</span>--}}
{{--                            <span class="author-position">экс-депутат Парламента Грузии, журналист</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">УНІФІКОВАНИЙ КЛІНІЧНИЙ ПРОТОКОЛ ПЕРВИННОЇ, ВТОРИННОЇ (СПЕЦІАЛІЗОВАНОЇ) ТА ТРЕТИННОЇ (ВИСОКОСПЕЦІАЛІЗОВАНОЇ) МЕДИЧНОЇ ДОПОМОГИ ДІТЯМ ВІЛ-ІНФЕКЦІЯ</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author">--}}
{{--                        <div class="author-img-box">--}}
{{--                            <img width="160" height="160" src="https://img.pravda.com/images/doc/9/e/9e2a057-kandelaki31_160x160.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="author-content-box">--}}
{{--                            <span class="author-name">Георгий Канделаки</span>--}}
{{--                            <span class="author-position">экс-депутат Парламента Грузии, журналист</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="article">--}}
{{--            <div class="article-body">--}}
{{--                <div class="content-box">--}}
{{--                    <div class="article-header">--}}
{{--                        <h3>--}}
{{--                            <a href="#">УНІФІКОВАНИЙ КЛІНІЧНИЙ ПРОТОКОЛ ПЕРВИННОЇ, ВТОРИННОЇ (СПЕЦІАЛІЗОВАНОЇ) ТА ТРЕТИННОЇ (ВИСОКОСПЕЦІАЛІЗОВАНОЇ) МЕДИЧНОЇ ДОПОМОГИ ДІТЯМ ВІЛ-ІНФЕКЦІЯ</a>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="article-author">--}}
{{--                        <div class="author-img-box">--}}
{{--                            <img width="160" height="160" src="https://img.pravda.com/images/doc/9/e/9e2a057-kandelaki31_160x160.jpg" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="author-content-box">--}}
{{--                            <span class="author-name">Георгий Канделаки</span>--}}
{{--                            <span class="author-position">экс-депутат Парламента Грузии, журналист</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

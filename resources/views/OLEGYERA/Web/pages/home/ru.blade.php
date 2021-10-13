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
                        @include('OLEGYERA.Web.particles.article-list', [
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
                        @include('OLEGYERA.Web.particles.article', [
                            'type' => 'base',
                            'eclipsed' => true,
                            'link' => route('ru.pub', ['id' => $popular_new->article->id]),
                            'time' => $time_arr,
                            'counter' => $popular_new->article->view,
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
                            <a>Набирают популярность</a>
                        </h3>
                    </div>
                    @foreach($articles['popular'] as $key=>$popular_article)
                            @include('OLEGYERA.Web.particles.article', [
                               'type' => 'large',
                               'eclipsed' => true,
                               'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                               'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                               'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                               'counter' => $popular_article->article->view,
                               'title' => $popular_article->article->title,
                               'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                           ])
                    @endforeach
                </div>

                <div class="right-grid">
                    <div class="title-shell">
                        <h3 class="group-title">
                            <a>Последние</a>
                        </h3>
                    </div>

                    @foreach($articles['last'] as $popular_article)
                        @include('OLEGYERA.Web.particles.article', [
                            'type' => 'mini',
                            'eclipsed' => true,
                            'link' => route('ru.pub', ['id' => $popular_article->article->id]),
                            'time' => daysOrMonth($popular_article->article->created_at, 'ru'),
                            'counter' => $popular_article->article->view,
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
                @include('OLEGYERA.Web.particles.article', [
                    'type' => 'base',
                    'eclipsed' => true,
                    'link' => route('ru.pub', ['id' => $item->article->id]),
                    'time' => daysOrMonth($item->article->created_at, 'ru'),
                    'counter' => $item->article->view,
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
                    @foreach($popular['data'] as $key=>$popular_article)
                        @if($key <= 2)
                            @include('OLEGYERA.Web.particles.article', [
                               'type' => 'base',
                               'eclipsed' => true,
                               'link' => route('ru.pub', ['id' => $popular_article->id]),
                               'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->dependency->image->category_id) . '/large/' . $popular_article->dependency->image->path,
                               'time' => daysOrMonth($popular_article->created_at, 'ru'),
                               'counter' => $popular_article->view,
                               'title' => $popular_article->title,
                               'author' => $popular_article->dependency->editor->name . ' ' . $popular_article->dependency->editor->surname,
                           ])
                        @endif
                    @endforeach

                    <div class="mini-fix">
                        @foreach($popular['data'] as $key=>$popular_article)
                            @if($key > 2 && $key < 9)  @continue @endif
                            @include('OLEGYERA.Web.particles.article', [
                                   'type' => 'base',
                                   'eclipsed' => true,
                                   'link' => route('ru.pub', ['id' => $popular_article->id]),
                                   'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->dependency->image->category_id) . '/large/' . $popular_article->dependency->image->path,
                                   'time' => daysOrMonth($popular_article->created_at, 'ru'),
                                   'counter' => $popular_article->view,
                                   'title' => $popular_article->title,
                                   'author' => $popular_article->dependency->editor->name . ' ' . $popular_article->dependency->editor->surname,
                               ])
                        @endforeach
                    </div>
                </div>
                <div class="right-grid">
                    @if(isset($popular['data'][9]))
                        @php $popular_article = $popular['data'][9] @endphp
                        @include('OLEGYERA.Web.particles.article', [
                           'type' => 'large',
                           'eclipsed' => false,
                           'link' => route('ru.pub', ['id' => $popular_article->id]),
                           'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->dependency->image->category_id) . '/large/' . $popular_article->dependency->image->path,
                           'time' => daysOrMonth($popular_article->created_at, 'ru'),
                           'counter' => $popular_article->view,
                           'title' => $popular_article->title,
                           'author' => $popular_article->dependency->editor->name . ' ' . $popular_article->dependency->editor->surname,
                       ])
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if($specials['count'] != 0)
        <div class="mp-box box-special">
        <div class="mp-box-title center-align">
            <h2>
                <a>Спецпроекты</a>
            </h2>
        </div>
        <div class="grid">
            @if($specials['count'] != 0)
                @foreach($specials['items'] as $special)
                    <div class="article">
                        <div class="article-body">
                            <div class="img-wrapper">
                                <picture>
                                    <img width="705" height="400" src="{{'https://medpravda.ua/gallery/' . getCategoryName($special->image->category_id) . '/large/' . $special->image->path}}" alt="">
                                </picture>
                            </div>
                            <div class="content-box">
                                <div class="article-header">
                                    <h3>
                                        <a href="{{route('ru.pub', ['id' => $special->article->id])}}">{{$special->article->title}}</a>
                                    </h3>
                                </div>
{{--                                <div class="article-author special-author">--}}
{{--                                    --}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    @endif

    @if($columns['count'] != 0)
        <div class="mp-box box-columns">
            <div class="mp-box-title">
                <h2>
                    <a>Колонки</a>
                </h2>
            </div>
            <div class="grid">
                @foreach($columns['items'] as $column)
                    <div class="article">
                        <div class="article-body">
                            <div class="content-box">
                                <div class="article-header">
                                    <h3>
                                        <a href="{{route('ru.pub', ['id' => $column->article->id])}}">{{$column->article->title}}</a>
                                    </h3>
                                </div>
                                <div class="article-author">
                                    <div class="author-img-box">
                                        <img width="160" height="160" src="{{asset('/gallery/' . getCategoryName($column->article->dependency->creator->avatar->category_id) . '/medium/' . $column->article->dependency->creator->avatar->path)}}" alt="">
                                    </div>
                                    <div class="author-content-box">
                                        <span class="author-name">{{$column->editor->name}}</span>
                                        <span class="author-position"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if($podcasts['count'] != 0)
        <div class="mp-box box-podcasts">
            <div class="mp-box-title">
                <h2>
                    <a>Подкасты</a>
                </h2>
            </div>
            <div class="grid">
                @foreach($podcasts['items'] as $podcast)

                    <div class="article">
                        <div class="article-body">
                            <div class="article-favicon">
                                <img src="{{asset('img/FrontBox/home/podcast.svg')}}" alt="">
                            </div>
                            <div class="content-box">
                                <div class="article-header">
                                    <h3>
                                        <a href="{{route('ru.pub', ['id' => $podcast->article->id])}}">{{$podcast->article->title}}</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="article-category">
                                @Без категории
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if($protocols['count'] != 0)
        <div class="mp-box box-protocols">
            <div class="mp-box-title">
                <h2>
                    <a>Протоколы лечения</a>
                </h2>
            </div>
            <div class="grid">
                @foreach($protocols['items'] as $protocol)
                    <div class="article">
                        <div class="article-body">
                            <div class="content-box">
                                <div class="article-header">
                                    <h3>
                                        <a href="{{route('ru.pub', ['id' => $protocol->article->id])}}">{{$protocol->article->title}}</a>
                                    </h3>
                                </div>
                                <div class="article-author">
                                    <div class="author-img-box">
                                        <img width="160" height="160" src="{{asset('/gallery/' . getCategoryName($protocol->article->dependency->creator->avatar->category_id) . '/medium/' . $protocol->article->dependency->creator->avatar->path)}}" alt="">
                                    </div>
                                    <div class="author-content-box">
                                        <span class="author-name">{{$protocol->editor->name}}</span>
                                        <span class="author-position"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="mp-box box-directory">
        <div class="mp-box-title center-align">
            <h2>
                <a>Справочник</a>
            </h2>
        </div>
        <div class="grid">
            @include('OLEGYERA.Web.particles.article-plate', [
                       'img_url' => asset('img/FrontBox/home/directory/symptoms.png'),
                       'title' => 'Медицинский справочник симптомов',
                       'description' => 'В справочнике симптомов вы найдете полное описание каждого симптома и методы его снятия.'
                   ])
            @include('OLEGYERA.Web.particles.article-plate', [
                        'img_url' => asset('img/FrontBox/home/directory/disease.png'),
                        'title' => 'Медицинский справочник болезней',
                        'description' => 'В справочнике болезней вы найдете полное описание каждой болезни, их методы лечения и диагностирования.'
                    ])
            @include('OLEGYERA.Web.particles.article-plate', [
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

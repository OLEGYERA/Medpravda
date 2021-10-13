<div class="full-content">
    <div class="box-intro launch" style="background-image: url({{asset('img/FrontBox/home/intro.png')}});">
        <div class="wrap box-intro-wrap">
            <h1 class="page-title">Необхідна медична інформація, у вас під рукою.</h1>
            <search :lang="'ua'"></search>
            <h3 class="meta-title">Популярні запити:
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
                    <a href="{{route('ua.tags.news')}}">Новини</a>
                </h2>
            </div>
            <div class="grid">
                <div class="left-grid">
                    <div class="title-shell">
                        <h3 class="group-title">
                            <a>Останні</a>
                        </h3>
                    </div>
                    @foreach($news['last'] as $latest_new)
                        @php $time_arr = daysOrMonth($latest_new->article->created_at, 'ua') @endphp
                        @include('OLEGYERA.Web.particles.article-list', [
                            'link' => route('ua.pub', ['id' => $latest_new->article->id]),
                            'time' => $time_arr,
                            'title' => $latest_new->article->utitle,
                            'author' => $latest_new->editor->name . ' ' . $latest_new->editor->surname
                        ])
                    @endforeach
                    <a href="{{route('ua.tags.news')}}" class="special-link">
                        <h4>Всі новини</h4>
                    </a>
                </div>
                <div class="right-grid">
                    <div class="title-shell">
                        <h3 class="group-title">
                            <a>Актуальні</a>
                        </h3>
                    </div>
                    @foreach($news['popular'] as $popular_new)
                        @php $time_arr = daysOrMonth($popular_new->article->created_at, 'ua') @endphp
                        @include('OLEGYERA.Web.particles.article', [
                            'type' => 'base',
                            'eclipsed' => true,
                            'link' => route('ua.pub', ['id' => $popular_new->article->id]),
                            'time' => $time_arr,
                            'counter' => $popular_new->article->view,
                            'title' => $popular_new->article->utitle,
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
                    <a href="{{route('ua.tags.articles')}}">Статті</a>
                </h2>
            </div>
            <div class="grid">
                <div class="left-grid">
                    <div class="title-shell">
                        <h3 class="group-title">
                            <a>Набирають популярність</a>
                        </h3>
                    </div>
                    @foreach($articles['popular'] as $key=>$popular_article)
                        @include('OLEGYERA.Web.particles.article', [
                           'type' => 'large',
                           'eclipsed' => true,
                           'link' => route('ua.pub', ['id' => $popular_article->article->id]),
                           'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,
                           'time' => daysOrMonth($popular_article->article->created_at, 'ua'),
                           'counter' => $popular_article->article->view,
                           'title' => $popular_article->article->utitle,
                           'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                       ])
                    @endforeach
                </div>

                <div class="right-grid">
                    <div class="title-shell">
                        <h3 class="group-title">
                            <a>Останні</a>
                        </h3>
                    </div>

                    @foreach($articles['last'] as $popular_article)
                        @include('OLEGYERA.Web.particles.article', [
                            'type' => 'mini',
                            'eclipsed' => true,
                            'link' => route('ua.pub', ['id' => $popular_article->article->id]),
                            'time' => daysOrMonth($popular_article->article->created_at, 'ua'),
                            'counter' => $popular_article->article->view,
                            'title' => $popular_article->article->utitle,
                            'author' => $popular_article->editor->name . ' ' . $popular_article->editor->surname,
                            'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->image->category_id) . '/large/' . $popular_article->image->path,

                        ])
                    @endforeach
                    <a href="{{route('ua.tags.articles')}}" class="special-link">
                        <h4>Дивитись ще</h4>
                    </a>
                </div>
            </div>
        </div>
    @endif
    @if($interviews['count'] != 0)
        <div class="mp-box box-interview">
            <div class="mp-box-title inverse">
                <h2>
                    <a href="{{route('ua.tags.interviews')}}">Інтерв'ю</a>
                </h2>
            </div>
            <div class="grid">
                @foreach($interviews['items'] as $item)
                    @include('OLEGYERA.Web.particles.article', [
                        'type' => 'base',
                        'eclipsed' => true,
                        'link' => route('ua.pub', ['id' => $item->article->id]),
                        'time' => daysOrMonth($item->article->created_at, 'ua'),
                        'counter' => $item->article->view,
                        'title' => $item->article->utitle,
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
                    <a>Топ теми</a>
                </h2>
            </div>
            <div class="grid">
                <div class="left-grid">
                    @foreach($popular['data'] as $key=>$popular_article)
                        @if($key <= 2)
                            @include('OLEGYERA.Web.particles.article', [
                               'type' => 'base',
                               'eclipsed' => true,
                               'link' => route('ua.pub', ['id' => $popular_article->id]),
                               'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->dependency->image->category_id) . '/large/' . $popular_article->dependency->image->path,
                               'time' => daysOrMonth($popular_article->created_at, 'ua'),
                               'counter' => $popular_article->view,
                               'title' => $popular_article->utitle,
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
                                   'link' => route('ua.pub', ['id' => $popular_article->id]),
                                   'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->dependency->image->category_id) . '/large/' . $popular_article->dependency->image->path,
                                   'time' => daysOrMonth($popular_article->created_at, 'ua'),
                                   'counter' => $popular_article->view,
                                   'title' => $popular_article->utitle,
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
                           'link' => route('ua.pub', ['id' => $popular_article->id]),
                           'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($popular_article->dependency->image->category_id) . '/large/' . $popular_article->dependency->image->path,
                           'time' => daysOrMonth($popular_article->created_at, 'ua'),
                           'counter' => $popular_article->view,
                           'title' => $popular_article->utitle,
                           'author' => $popular_article->dependency->editor->name . ' ' . $popular_article->dependency->editor->surname,
                       ])
                    @endif
                </div>
            </div>
        </div>
    @endif
    {{--special--}}

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
                                            <a href="{{route('ua.pub', ['id' => $special->article->id])}}">{{$special->article->utitle}}</a>
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

    @if($podcasts['count'] != 0)
        <div class="mp-box box-podcasts">
            <div class="mp-box-title">
                <h2>
                    <a>Подкасти</a>
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
                                        <a href="{{route('ua.pub', ['id' => $podcast->article->id])}}">{{$podcast->article->utitle}}</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="article-category">
                                @Без категорії
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
                    <a>Протоколи лікування</a>
                </h2>
            </div>
            <div class="grid">
                @foreach($protocols['items'] as $protocol)
                    <div class="article">
                        <div class="article-body">
                            <div class="content-box">
                                <div class="article-header">
                                    <h3>
                                        <a href="{{route('ua.pub', ['id' => $protocol->article->id])}}">{{$protocol->article->utitle}}</a>
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
                <a>Довідник</a>
            </h2>
        </div>
        <div class="grid">
            @include('OLEGYERA.FrontBox.particles.article-plate', [
                       'img_url' => asset('img/FrontBox/home/directory/symptoms.png'),
                       'title' => 'Медичний довідник симптомів',
                       'description' => 'У довіднику симптомів ви знайдете повний опис кожного симптому та методи його зняття.'
                   ])
            @include('OLEGYERA.FrontBox.particles.article-plate', [
                        'img_url' => asset('img/FrontBox/home/directory/disease.png'),
                        'title' => 'Медичний довідник хвороб',
                        'description' => 'У довіднику хвороб ви знайдете повний опис кожної хвороби, їх методи лікування і діагностування.'
                    ])
            @include('OLEGYERA.FrontBox.particles.article-plate', [
                        'img_url' => asset('img/FrontBox/home/directory/emergency.png'),
                        'title' => 'Медичний довідник невідкладних станів',
                        'description' => 'У довіднику невідкладних станом ви можете знайти і ознайомиться з різними гострими захворюваннями, загостреннями, хронічні патологіями, травмами і тд.'
                    ])
        </div>
    </div>
    <div class="mp-box box-plates">
        <div class="mp-box-title">
            <h2>
                <a>Інструкції</a>
            </h2>
        </div>
        <div class="grid">
            <div class="inner-block">
                <div class="inner-body">
                    <div class="inner-header">
                        <h3>
                            <a href="{{route('ua.catalog.' . $catalog['drug']['route_name'])}}">Препарати</a>
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
                            <a href="{{route('ua.catalog.' . $catalog['ware']['route_name'])}}">Медичні вироби</a>
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
                            <a href="{{route('ua.catalog.' . $catalog['bad']['route_name'])}}">Дієтичні добавки</a>
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
                            <a href="{{route('ua.catalog.' . $catalog['cosmetic']['route_name'])}}">Косметичні засоби</a>
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
                <a>Нещодавно додані</a>
            </h2>
        </div>
        <div class="grid">
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Препарати</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($drugs['last'] as $drug)
                        <a href="{{route('ua.drug', ['alias' => $drug->alias])}}">{{$drug->utitle}}</a>
                    @endforeach
                </div>

            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Косметичні засоби</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($cosmetics['last'] as $cosmetic)
                        <a href="{{route('ua.cosmetic', ['alias' => $cosmetic->alias])}}">{{$cosmetic->utitle}}</a>
                    @endforeach
                </div>
            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Дієтичні добавки</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($bads['last'] as $bad)
                        <a href="{{route('ua.bad', ['alias' => $bad->alias])}}">{{$bad->utitle}}</a>
                    @endforeach
                </div>
            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Медичні вироби</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($wares['last'] as $ware)
                        <a href="{{route('ua.ware', ['alias' => $ware->alias])}}">{{$ware->utitle}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="mp-box box-plates box-plates-tiny">
        <div class="mp-box-title right-align">
            <h2>
                <a>Інше</a>
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
                                <a href="{{route('ua.catalog.' . $item['route_name'])}}">{{$item['utitle']}}</a>
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
                            <a href="#">Термінологія</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mp-box box-medical">
        <div class="mp-box-title center-align">
            <h2>
                <a>Часто шукають</a>
            </h2>
        </div>
        <div class="grid">
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Препарати</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($drugs['popular'] as $duag)
                        <a href="{{route('ua.drug', ['alias' => $drug->alias])}}">{{$drug->utitle}}</a>
                    @endforeach
                </div>

            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Косметичні засоби</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($cosmetics['popular'] as $cosmetic)
                        <a href="{{route('ua.cosmetic', ['alias' => $cosmetic->alias])}}">{{$cosmetic->utitle}}</a>
                    @endforeach
                </div>
            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Дієтичні добавки</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($bads['popular'] as $bad)
                        <a href="{{route('ua.bad', ['alias' => $bad->alias])}}">{{$bad->utitle}}</a>
                    @endforeach
                </div>
            </div>
            <div class="column">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Медичні вироби</a>
                    </h3>
                </div>
                <div class="column-box">
                    @foreach($wares['popular'] as $ware)
                        <a href="{{route('ua.ware', ['alias' => $ware->alias])}}">{{$ware->utitle}}</a>
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
                        <h3>Хочете бути в курсі останніх новин і подій на фармринку України? <br> Підписуйтесь на нашу розсилку!</h3>
                        <div class="email-form">
                            <input class="email-input" type="email" placeholder="Жду Ваш e-mail">
                            <div class="email-submit">Підписатися</div>
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

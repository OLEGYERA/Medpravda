<section class="content m-top" style="width: 100%;">
    <div class="wrap">
        {{--BreadCrumbs--}}
        <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
             itemtype="http://schema.org/BreadcrumbList">
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <a href="{{ route('main') }}" itemprop="item">
                    <span class="label1">Головна</span>
                </a>
                <meta itemprop="position" content="1"/>
                <meta itemprop="name" content="Главная">
            </div>
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">

                <a href="#">Лонгріди</a>
                <meta itemprop="position" content="2"/>
            </div>
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <span itemprop="name" class="label1">{{ $longread->utitle ?? '' }}</span>
                <meta itemprop="position" content="3"/>
                <meta itemprop="item" content="{{url()->current() . '/'}}">
            </div>
        </div>
        {{--BreadCrumbs--}}
        <div class="single-article-info blue-circle">
            <h1>{{ $longread->utitle ?? '' }}</h1>
            <div class="date-link">
                <div class="article-date">
                    {{ $longread->created_at->format('d')
                                    . ' '  . trans('ru.'.$longread->created_at->format('m'))
                                    . ' '  . $longread->created_at->format('Y')
                            }}
                </div>
                <div class="views"><span></span></div>
            </div>
            <div class="admin-content">
                <div class="full-width-image">
                    <img src="{{$longread->image()->first()->upath}}"
                         alt="{{ !empty($longread->image()->first()->ualt) ? $longread->image()->first()->ualt : $longread->utitle. ' 1 '}}"
                         title="{{ !empty($longread->image()->first()->utitle) ? $longread->image()->first()->utitle : $longread->utitle  }}"
                            {!! image_width_height_return_tags($longread->image()->first()->upath) !!}
                    >
                </div>
                {{--Main Content--}}
                <div class="longread-field">
                    @foreach($longread_template->parts()->orderBy('priority', 'asc')->get() as $item)
                        @php($build = $item->build()->where('longreads_id', $longread->id)->where('lang', 'ua')->first())
                        @switch($item->type)
                            @case('tir')
                            <div class="template-row">
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                                <div class="template-img">
                                    <div class="lg-box-img">
                                        @if($build->img)
                                            <img src="{{ ($build->img ?? '') }}"--}} alt="{{ $build->alt ?? "Medpravda" }}" title="{{ $build->title ?? "Medpravda" }}" >
                                        @endif
                                    </div>
                                    <p class="img-title">{{ $build->title ?? "" }}</p>
                                </div>
                            </div>
                            @break
                            @case('itr')
                            <div class="template-row">
                                <div class="template-img">
                                    <div class="lg-box-img">
                                        @if($build->img)
                                            <img src="{{ ($build->img ?? '') }}"--}} alt="{{ $build->alt ?? "Medpravda" }}" title="{{ $build->title ?? "Medpravda" }}" >
                                        @endif
                                    </div>
                                    <p class="img-title">{{ $build->title ?? "" }}</p>
                                </div>
                                <div class="template-text left">
                                    {!! $build->content ?? '' !!}
                                </div>
                            </div>
                            @break

                            @case('tic')
                            <div class="template-col">
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                                <div class="template-img">
                                    <div class="lg-box-img">
                                        @if($build->img)
                                            <img src="{{ ($build->img ?? '') }}"--}} alt="{{ $build->alt ?? "Medpravda" }}" title="{{ $build->title ?? "Medpravda" }}" >
                                        @endif
                                    </div>
                                    <p class="img-title">{{ $build->title ?? "" }}</p>
                                </div>
                            </div>
                            @break
                            @case('itc')
                            <div class="template-col">
                                <div class="template-img">
                                    <div class="lg-box-img">
                                        @if($build->img)
                                            <img src="{{ ($build->img ?? '') }}"--}} alt="{{ $build->alt ?? "Medpravda" }}" title="{{ $build->title ?? "Medpravda" }}" >
                                        @endif
                                    </div>
                                    <p class="img-title">{{ $build->title ?? "" }}</p>
                                </div>
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                            </div>
                            @break

                            @case('btc')
                            <div class="template-col">
                                <div class="template-img">
                                    <div class="lg-bg" style="background-image:url('{{$build->img ?? ''}}');">
                                    </div>
                                </div>
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                            </div>
                            @break
                            @case('tbc')
                            <div class="template-col">
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                                <div class="template-img">
                                    <div class="lg-bg" style="background-image:url('{{$build->img ?? ''}}');">
                                    </div>
                                </div>
                            </div>
                            @break


                            @case('tbr')
                            <div class="template-row">
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                                <div class="template-img">
                                    <div class="lg-bg" style="background-image:url('{{$build->img ?? ''}}');">
                                    </div>
                                </div>
                            </div>
                            @break

                            @case('btr')
                            <div class="template-row">
                                <div class="template-img">
                                    <div class="lg-bg" style="background-image:url('{{$build->img ?? ''}}');">
                                    </div>
                                </div>
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                            </div>
                            @break
                        @endswitch
                    @endforeach
                </div>
                {{--Main Content--}}
            </div>
        </div>
        <div class="down-meta-share" style="display: flex; justify-content: space-between">
            <div class="top-meta">
                <span class="meta-title">Популярні теги:</span>
                <a href="{{ route('articles_tag', ['tag_alias'=>'test']) }}/"
                   class="btn-meta">
                    Тестовий режим
                </a>
            </div>
            <div class="share">
                <span>Поделиться</span>
                <a target="_blank" href="http://www.facebook.com/sharer.php?u={{url()->current() . '/'}}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                {{--<a target="_blank" href="https://t.me/medpravda"><i class="fa fa-telegram" aria-hidden="true"></i></a>--}}
                <a target="_blank" href="https://telegram.me/share/url?url={{url()->current(). '/'}}"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                <a target="_blank" href="https://twitter.com/intent/tweet?text=Актуальные статьи о здоровье и медицине только на https://medpravda.com.ua &url={{url()->current(). '/'}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

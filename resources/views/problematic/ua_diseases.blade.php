    <section class="content m-top">
        <div class="wrap">
            {{--BreadCrumbs--}}
            <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
                 itemtype="http://schema.org/BreadcrumbList">
                @if(isset($bread_crumb))
                    {!! $bread_crumb !!}
                @else
                    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                        <a href="{{ route('main') }}/" itemprop="item">
                            <span itemprop="name" class="label1">Головна</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </div>
                    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                        <span itemprop="name" class="label1">{{$selected_problematic->title}}</span>
                        <meta itemprop="position" content="2"/>
                        <meta itemprop="item" content="{{url()->current() . '/'}}">
                    </div>
                @endif

            </div>
            {{--BreadCrumbs--}}
            <h1>Хвороби та симптоми</h1>
            <div class="product-nav m-smaller-btn">
                @foreach($problematic_categories as $problematic_category)
                    @if($problematic_category->children->get_ua()->approved)
                        <a href="{{route('ua_diseases.symptoms.list', $problematic_category->children->get_ua()->alias)}}"
                           class="nav-button-grey {{$selected_problematic->alias==$problematic_category->children->get_ua()->alias||$main_alias==$problematic_category->children->get_ua()->alias ? 'active' : ''}}">{{$problematic_category->children->get_ua()->title}}</a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="content-bordered">
            <div class="wrap">
                <h2>{{$selected_problematic->title}}</h2>
                <div class="admin-content">
                    @if($selected_problematic->image)
                        <div class="article-img">
                            <img src="{{asset("asset/images/problematic/".$selected_problematic->image)}}"
                                 alt="Проблематика | Медправды" title="">
                        </div>
                    @endif
                    {!! $selected_problematic->content !!}
                </div>
                <div class="image-list-content">
                    <ul class="ware-sort">
                        @foreach($selected_problematic->get_ru2()->get_child_pages() as $child_page)
                            @if($child_page->children)
                                @if($child_page->children->get_ua()->root_page)
                                    @if($child_page->children->get_ua()->approved)
                                        <li>
                                            @if($child_page->children->get_ua()->image!=null&&$child_page->children->get_ua()->image!=false)
                                                <img src="{{ asset('asset/images/problematic/')."/".$child_page->children->get_ua()->image}}"
                                                     alt="">
                                            @else
                                                <img src="{{ asset('assets') }}/images/iscon-des.png"
                                                     alt="">
                                            @endif
                                            {{$child_page->children->get_ua()->title}}
                                            @endif
                                            @if(count($child_page->children->get_child_pages()))
                                                <ul class="ware-sort">
                                                    @foreach($child_page->children->get_child_pages() as $c)
                                                        @if($c->children->get_ua()->approved)

                                                            @if($c->children->get_ua()->root_page)
                                                                <li>
                                                                    <a href="{{route('ua_problematic.check.folder', ["alias2"=>$c->children->get_ua()->alias, 'alias'  => $main_alias])}}">

                                                                        {{$c->children->get_ua()->title}}
                                                                    </a>
                                                                </li>
                                                            @else
                                                                @if(Route::currentRouteName()=="ua_problematic.check.folder")
                                                                    @if($c->children->get_ua()->approved)
                                                                        <li class="sort-list-smaller-img">
                                                                            <a href="{{route('ua_problematic.read_article', ["alias2"=>$c->children->get_ua()->alias, 'alias'  => $main_alias])}}">
                                                                                <img class="smaller_img"
                                                                                     src="{{ asset('asset/images/problematic/jTAXF1557124878.svg')}}"
                                                                                     alt="">
                                                                                {{$c->children->get_ua()->title}}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endif
                                                            @endif

                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                            @if($child_page->children->get_ua()->approved)
                                        </li>
                                    @endif
                                @else
                                    @if(Route::currentRouteName()=="ua_problematic.check.folder")
                                        @if($child_page->children->get_ua()->approved)
                                            <li class="sort-list-smaller-img">
                                                <a href="{{route('ua_problematic.read_article', ["alias2"=>$child_page->children->get_ua()->alias, 'alias'  => $main_alias])}}">

                                                    <img class="smaller_img"
                                                         src="{{ asset('asset/images/problematic/jTAXF1557124878.svg')}}"
                                                         alt="">
                                                    {{$child_page->children->get_ua()->title}}
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <section class="section-last-arts">
            <div class="section-title-meta-icon">
                <h3>Статті з розділу {{$main_problematic->title}}</h3>
                <div class="section-meta-icon">
                    <div class="section-icon">
                        <img src="{{ asset('assets') }}/images/title-icons/main-icon-3.png"
                             alt="иконка Последние статьи" width="25" height="25">
                    </div>
                </div>
            </div>
            <div class="last-arts two-column-articles-mini">
                @include('problematic.partials.uk_find_articles', ['alias' => $selected_problematic->alias])
            </div>

            <div>
                <a href="{{route('ua_problematic.articles_cat', $main_alias)}}" class="button-white">Більше статтей</a>
            </div>
        </section>
    </section>

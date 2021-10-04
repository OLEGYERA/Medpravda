<section class="content m-top">
    <div class="wrap">
        {{--BreadCrumbs--}}
        <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
             itemtype="http://schema.org/BreadcrumbList">
            @isset($bread_crumb)
                {!! $bread_crumb !!}
            @endisset
        </div>
        {{--BreadCrumbs--}}
        <h1>Болезни и симптомы</h1>
        <div class="product-nav m-smaller-btn">
            @foreach($problematic_categories as $problematic_category)
                @if($problematic_category->children->approved)
                    <a href="{{route('diseases.symptoms.list', $problematic_category->children->alias)}}"
                       class="nav-button-grey {{$selected_problematic->alias==$problematic_category->children->alias||$main_alias==$problematic_category->children->alias ? 'active' : ''}}">{{$problematic_category->children->title}}</a>
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
                    @foreach($selected_problematic->get_child_pages() as $child_page)
                        @if(is_object($child_page->children) && $child_page->children->root_page)
                            @if($child_page->children->approved)
                                <li>
                                        @if($child_page->children->image!=null&&$child_page->children->image!=false)
                                            <img src="{{ asset('asset/images/problematic/')."/".$child_page->children->image}}"
                                                 alt="">
                                        @else
                                            <img src="{{ asset('assets') }}/images/iscon-des.png"
                                                 alt="">
                                        @endif
                                        {{$child_page->children->title}}

                                    @if(count($child_page->children->get_child_pages()))
                                        <ul class="ware-sort">
                                            @foreach($child_page->children->get_child_pages() as $c)
                                                @if($c->children->get_parent2()->root->approved)
                                                    @if($c->children->approved)
                                                        @if($c->children->root_page)
                                                            <li>
                                                                <a href="{{route('problematic.check.folder', ["alias2"=>$c->children->alias, 'alias'  => $main_alias])}}">
                                                                    {{$c->children->title}}
                                                                </a>
                                                            </li>
                                                        @else
{{--                                                                @if(Route::currentRouteName()=="problematic.check.folder")--}}
{{--                                                                    @if($c->children->approved)--}}
                                                                    <li class="sort-list-smaller-img">
                                                                        <a href="{{route('problematic.read_article', ["alias2"=>$c->children->alias, 'alias'  => $main_alias])}}">
{{--                                                                                <img class="smaller_img"--}}
{{--                                                                                         src="{{ asset('asset/images/problematic/jTAXF1557124878.svg')}}"--}}
{{--                                                                                         alt="">--}}
                                                                            {{$c->children->title}}
                                                                        </a>
                                                                    </li>
{{--                                                                    @endif--}}
{{--                                                                @endif--}}
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        @else
                            @if(Route::currentRouteName()=="problematic.check.folder")
                                @if($child_page->children->approved)
                                    <li class="sort-list-smaller-img">
                                        <a href="{{route('problematic.read_article', ["alias2"=>$child_page->children->alias, 'alias'  => $main_alias])}}">
                                            <img class="smaller_img"
                                                 src="{{ asset('asset/images/problematic/jTAXF1557124878.svg')}}"
                                                 alt="">
                                            {{$child_page->children->title}}
                                        </a>
                                    </li>
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
            <h3>Статьи из раздела {{$main_problematic->title}}</h3>
            <div class="section-meta-icon">
                <div class="section-icon">
                    <img src="{{ asset('assets') }}/images/title-icons/main-icon-3.png"
                         alt="иконка Последние статьи" width="25" height="25">
                </div>
            </div>
        </div>
        <div class="last-arts two-column-articles-mini">
            @include('problematic.partials.find_articles', ['alias' => $selected_problematic->alias])
        </div>
        <div>
            <a href="{{ route('problematic.articles_cat', ['cat_alias'=>$main_alias]) }}" class="button-white">Больше
                статей</a>
        </div>
    </section>
</section>

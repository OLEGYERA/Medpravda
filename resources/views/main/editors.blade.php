<section class="full-content page-articles m-top">
    <div class="wrap">
        {{--BreadCrumbs--}}
        <div class="bread-crumbs breadcrumbs mobile-display-none" id="breadcrumbs" itemscope
             itemtype="http://schema.org/BreadcrumbList">
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                @if(empty($loc))
                    <a href="{{ route('main') }}/" itemprop="item">Главная</a>
                @else
                    <a href="{{ route('main', ['loc'=>'ua']) }}/" itemprop="item">Головна</a>
                @endif
                <meta itemprop="position" content="1"/>
            </div>
            <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                @if(empty($loc))
                    <span itemprop="name" class="label1">Редакторская группа “Мед Правда”</span>
                @else
                    <span itemprop="name" class="label1">Редакторська група “Мед Правда”</span>
                @endif
                <meta itemprop="position" content="2"/>
            </div>
        </div>
        {{--BreadCrumbs--}}
        <div class="admin-content" style="margin-top: 30px;">
            <div class="section-title-meta-icon">
                <h3>
                    Редакция
                </h3>
            </div>
            @foreach($editors as $editor)
                <h2 class="editor-name">
                    {{$editor->last_name}} {{$editor->first_name}} {{$editor->middle_name}}
                </h2>
                <div class="editor-block">
                    <div class="editor-img">
                        <img src="{{asset('storage/editors/' . $editor->author_img)}}" alt="">
                    </div>
                    <div class="editor-info">
                        <p class="specialty">
                            {{$editor->specialty}}
                        </p>
                        @if(!empty($editor->specialization))
                            <p class="specialization">
                                Специализация {{$editor->specialization}}
                            </p>
                        @endif
                        @switch($editor->academic_degree)
                            @case(1)
                            <p class="academic_degree">
                                Кандидат медицинских наук
                            </p>
                            @break
                            @case(2)
                            <p class="academic_degree">
                                Доктор медицинских наук
                            </p>
                            @break
                        @endswitch
                        <p class="place">
                            {{$editor->place}}
                        </p>
                        <div class="education">
                            <p>Образование: </p>
                            <a href="{{asset('storage/editors/' . $editor->education_img)}}" target="_blank">
                                <img src="{{asset('storage/editors/' . $editor->education_img)}}">
                            </a>
                        </div>
                        <div class="about">
                            {{$editor->about}}
                        </div>
                        @switch($editor->experience)
                            @case(2)
                            @case(3)
                            @case(4)
                                <p><b>Стаж работы:</b> {{$editor->experience}} года</p>
                            @break
                            @default
                                <p><b>Стаж работы:</b> {{$editor->experience}} год</p>
                        @endswitch
                        <p style="margin-top: 15px;">
                            <b>Автор статей:</b>
                            @if($editor->author_1)
                                <a href="https://{{$editor->author_1}}">{{$editor->author_1}}</a>
                            @endif
                            @if($editor->author_2)
                                <a href="{{$editor->author_2}}">{{$editor->author_2}}</a>
                            @endif
                            @if($editor->author_3)
                                <a href="{{$editor->author_3}}">{{$editor->author_3}}</a>
                            @endif
                            @if($editor->author_4)
                                <a href="{{$editor->author_4}}">{{$editor->author_4}}</a>
                            @endif
                        </p>
                    </div>

                </div>
                <div class="section_author">
                    <h4>Автор разделов:</h4>
                    <div>{{$editor->section_author}}</div>
                </div>
            @endforeach

            <style>
                .editor-block{
                    display: flex;
                    justify-content: space-between;
                }
                .editor-img{
                    width: 35%;
                }
                .editor-img img{
                    width: 100%;
                }
                .editor-info{
                    padding: 0px 10px 0px 30px;
                    width: 65%;
                    display: flex;
                    flex-direction: column;
                }
                .editor-info h3{
                    font-size: 14px;
                    color: #2C2C2D;
                    margin: 0px;
                }
                h2.editor-name{
                    color: #598FBD;
                    margin-bottom: 25px;
                    font-weight: bold;
                    font-size: 29px;
                }
                p.specialty{
                    color: #000;
                    margin-bottom: 8px;
                }
                p{
                    font-size: 18px;
                    padding-bottom: 5px;
                    color: #2C2C2D;
                }
                p.academic_degree{
                    font-weight: bold;
                    margin-top: 5px;
                    font-size: 14px;
                }
                p.place{
                    font-size: 16px;
                }
                .education{
                    display: flex;
                    justify-content: flex-start;
                    align-items: center;
                }
                .education p{
                    font-weight: 600;
                }
                .education a{
                    display: flex;
                    width: 70px;
                    margin-left: 15px;
                }
                .education a img {
                    width: 100%;
                    height: 40px;
                }
                .about{
                    margin: 15px 0px;
                    font-size: 18px;
                    line-height: 150%;
                    color: #2C2C2D;
                }
                .section_author{
                    font-size: 16px;
                    color: rgba(44, 44, 45, 0.5);
                    margin-bottom: 35px;
                }
                .section_author h4{
                    font-size: 14px;
                    color: rgba(44, 44, 45, 0.5);
                    margin-bottom: 5px;
                }
            </style>

        </div>
    </div>

</section>
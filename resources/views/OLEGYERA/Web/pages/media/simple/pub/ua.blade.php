<div class="full-content">
    <div class="mp-box pub-simple">
        <div class="grid">
            <div class="pub-content">
                <div class="pub-intro">
                    <h1 class="pub-title">{{$publication->utitle}}</h1>
                    <div class="pub-date">
                        @php $pub_dt = daysOrMonth($publication->created_at, 'ua') @endphp
                        {{$pub_dt['date']}}, {{$pub_dt['time']}}
                    </div>
                    <div class="pub-social">
                        <div class="social-links">
                            <a href="#">
                                <img src="{{asset('Web/img/social/fb.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('Web/img/social/tg.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('Web/img/social/tw.svg')}}" alt="">
                            </a>
                        </div>
                        <div class="watcher-counter">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="11" viewBox="0 0 17 11">
                                <path d="M16.892 5.17482C16.7401 4.96707 13.1215 0.0878906 8.49992 0.0878906C3.87834 0.0878906 0.259583 4.96707 0.107877 5.17462C-0.0359591 5.37172 -0.0359591 5.63904 0.107877 5.83613C0.259583 6.04388 3.87834 10.9231 8.49992 10.9231C13.1215 10.9231 16.7401 6.04385 16.892 5.8363C17.036 5.63924 17.036 5.37172 16.892 5.17482ZM8.49992 9.80219C5.09563 9.80219 2.14715 6.56378 1.27434 5.5051C2.14602 4.44548 5.08833 1.20876 8.49992 1.20876C11.9041 1.20876 14.8523 4.44661 15.7255 5.50586C14.8538 6.56544 11.9115 9.80219 8.49992 9.80219Z" fill="currentColor"/>
                                <path d="M8.49937 2.14293C6.64524 2.14293 5.13672 3.65145 5.13672 5.50558C5.13672 7.35972 6.64524 8.86824 8.49937 8.86824C10.3535 8.86824 11.862 7.35972 11.862 5.50558C11.862 3.65145 10.3535 2.14293 8.49937 2.14293ZM8.49937 7.74733C7.26322 7.74733 6.25762 6.74171 6.25762 5.50558C6.25762 4.26946 7.26325 3.26384 8.49937 3.26384C9.73549 3.26384 10.7411 4.26946 10.7411 5.50558C10.7411 6.74171 9.73552 7.74733 8.49937 7.74733Z" fill="currentColor"/>
                            </svg>
                            <span class="counter">12</span>
                        </div>

                    </div>
                    <div class="pub-photo">
                        <img width="690" height="387" src="{{'https://medpravda.ua/gallery/' . getCategoryName($publication->dependency->image->category_id) . '/large/' . $publication->dependency->image->path}}" alt="{{$publication->title}} фото">
                    </div>
                </div>
                <div class="pub-text">
                    {!! $publication->content->ua !!}
                </div>
            </div>
            <aside class="pub-side">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Топові новини</a>
                    </h3>
                </div>
                @foreach($side_articles as $side_article)
                    @php $time_arr = daysOrMonth($side_article->article->created_at, 'ua') @endphp
                    @include('OLEGYERA.FrontBox.particles.article', [
                        'type' => 'mini',
                        'eclipsed' => true,
                        'link' => route('ua.pub', ['id' => $side_article->article->id]),
                        'time' => $time_arr,
                        'counter' => 0,
                        'title' => $side_article->article->utitle,
                        'author' => $side_article->editor->name . ' ' . $side_article->editor->surname,
                        'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($side_article->image->category_id) . '/large/' . $side_article->image->path,

                    ])
                @endforeach
            </aside>
        </div>
        <div class="pub-author">
            <h2 class="author-box-title">Автор</h2>
            <div class="author-body-box">
                <div class="author-logo">
                    <img src="{{asset('/gallery/' . getCategoryName($publication->dependency->creator->avatar->category_id) . '/medium/' . $publication->dependency->creator->avatar->path)}}" alt="">
                </div>
                <div class="content-box">
                    <a href="{{route('ua.editors')}}" class="author-title">
                        {{$publication->dependency->creator->surname}} {{$publication->dependency->creator->name}} {{$publication->dependency->creator->middle_name}}
                    </a>
                    @if($publication->dependency->creator->editor)
                        <div class="author-links">
                            @if($publication->dependency->creator->editor->facebook)
                                <a target="_blank" href="{{$publication->dependency->creator->editor->facebook}}">
                                    <img src="{{asset('Web/img/social/fb.svg')}}" alt="">
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>

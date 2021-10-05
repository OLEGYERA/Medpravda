<div class="article eclipsed eclipsed-right article-banner">
    <div class="article-body">
        <div class="img-wrapper">
            <picture>
                <img width="650" height="340" src="{{$img_url}}" alt="">
            </picture>
        </div>
        <div class="content-box">
            <div class="article-header">
                <h3>
                    <a href="{{$link}}">{{$title}} {{$title}}</a>
                </h3>
            </div>
            <div class="article-micro-author">
                {{$author}}
            </div>
            <div class="article-info">
                <div class="publish-time">
                    <span class="date">{{$time['date']}},</span>
                    <span class="time">{{$time['time']}}</span>
                </div>
                <div class="top-view-count">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="11" viewBox="0 0 17 11">
                        <path d="M16.892 5.17482C16.7401 4.96707 13.1215 0.0878906 8.49992 0.0878906C3.87834 0.0878906 0.259583 4.96707 0.107877 5.17462C-0.0359591 5.37172 -0.0359591 5.63904 0.107877 5.83613C0.259583 6.04388 3.87834 10.9231 8.49992 10.9231C13.1215 10.9231 16.7401 6.04385 16.892 5.8363C17.036 5.63924 17.036 5.37172 16.892 5.17482ZM8.49992 9.80219C5.09563 9.80219 2.14715 6.56378 1.27434 5.5051C2.14602 4.44548 5.08833 1.20876 8.49992 1.20876C11.9041 1.20876 14.8523 4.44661 15.7255 5.50586C14.8538 6.56544 11.9115 9.80219 8.49992 9.80219Z" fill="currentColor"/>
                        <path d="M8.49937 2.14293C6.64524 2.14293 5.13672 3.65145 5.13672 5.50558C5.13672 7.35972 6.64524 8.86824 8.49937 8.86824C10.3535 8.86824 11.862 7.35972 11.862 5.50558C11.862 3.65145 10.3535 2.14293 8.49937 2.14293ZM8.49937 7.74733C7.26322 7.74733 6.25762 6.74171 6.25762 5.50558C6.25762 4.26946 7.26325 3.26384 8.49937 3.26384C9.73549 3.26384 10.7411 4.26946 10.7411 5.50558C10.7411 6.74171 9.73552 7.74733 8.49937 7.74733Z" fill="currentColor"/>
                    </svg>
                    <span class="counter">{{$counter}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

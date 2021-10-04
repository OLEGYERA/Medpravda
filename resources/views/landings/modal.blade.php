<div class="warning">
    <div class="warning-block">
        <div class="wrapper">
            <p style="color:#{{ $modal->title1['color']??'' }};font-size:{{ $modal->title1['size']??'' }}%;font-family: {{ config('settings.fonts.'.$modal->title1['style']??1) }}">
                {{ $modal->title1['title']??'' }}
            </p>
            <p style="color:#{{ $modal->title2['color']??'' }};font-size:{{ $modal->title2['size']??'' }}%;font-family: {{ config('settings.fonts.'.$modal->title2['style']??1) }}">
                {{ $modal->title2['title']??'' }}
            </p>
            <div class="two-block">
                <div class="one-block">
                    <a class="btn success"
                       style="color:#{{ $modal->button1['color']??'' }};background:#{{ $modal->button1['background']??'' }};border-radius:{{ $modal->button1['style']??'' }}px">
                        {{ $modal->button1['text']??'Подтверждаю' }}
                    </a>
                    <p>
                        {{ $modal->button1['description']??'' }}
                    </p>
                </div>
                <div class="one-block">
                    <a href="{{ $modal->button2['url']??'' }}"
                       class="btn no-btn"
                       style="color:#{{ $modal->button2['color']??'' }};background:#{{ $modal->button2['background']??'' }};border-radius:{{ $modal->button2['style']??'' }}px">
                        {{ $modal->button2['text']??'Нет' }}
                    </a>
                    <p>
                        {{ $modal->button2['description']??'' }}
                    </p>
                </div>
            </div>
        </div>
        <div class="consider">
            <div class="wrapper">
                <div class="label"
                     style="color:#{{ $modal->title3['color']??'' }};font-size:{{ $modal->title3['size']??'' }}%;font-family: {{ config('settings.fonts.'.$modal->title3['style']??1) }}">
                    {{ $modal->title3['title']??'' }}
                    <i class="material-icons">keyboard_arrow_down</i>
                </div>
                <div class="height-block">
                    <ul>
                        @if(!empty($modal->list))
                            @foreach($modal->list as $item)
                                <li>
                                    {{ $item }}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
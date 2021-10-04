<h2 @include('landings.styles.title', ['number'=>1])>
    {{ $block->title1['title']??'' }}
</h2>

<div class="slider-wrapper">
    <div class="slider">
        @if(!empty($block->slider) && $block->slider->isNotEmpty())
            @foreach($block->slider as $slide)
                <div class="slide-block">

                    @if(null == $slide->video)
                        <img src="{{ $slide->getImg() }}" alt="{{ $slide->alt??'' }}" title="{{ $slide->title??'' }}">
                        <div class="text-slide" style="color:#{{ $slide->color??'' }}; font-size:{{$slide->text_size}}px;">
                            <span>
                               {!! $slide->description !!}
                            </span>
                        </div>
                    @else
                        <iframe src="https://www.youtube.com/embed/{{ $slide->video }}" frameborder="0"
                                allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    @endif

                </div>
            @endforeach
        @endif
    </div>
    <div class="paginator-center">
        <div class="arrows slider-prev"><i class="material-icons" style="color: rgba(132, 38, 50, 1)">keyboard_arrow_left</i>
        </div>
        <div class="arrows slider-next"><i class="material-icons" style="color: rgba(4, 59, 136, 1)">keyboard_arrow_right</i>
        </div>
    </div>
</div>
<div class="title-mini" @include('landings.styles.title', ['number'=>2])>
    {{ $block->title2['title']??'' }}
</div>
<div class="desc-p" @include('landings.styles.description', ['number'=>1])>
    {!! $block->description1['contents']??'' !!}
</div>
@if($block->button1['title'])
    <a href="{{ $block->button1['link']??'' }}" class="btn" @include('landings.styles.button', ['number'=>1])>
        {{ $block->button1['title']??'Докладніше' }}
    </a>
@endif
@if($block->button2['title'])
    <a href="{{ $block->button2['link']??'' }}" class="btn" @include('landings.styles.button', ['number'=>2])>
        {{ $block->button2['title']??'Де купити?' }}
    </a>
@endif
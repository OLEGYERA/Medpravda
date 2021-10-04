<h1 @include('landings.styles.title', ['number'=>1])>
    {{ $block->title1['title']??'' }}
</h1>
<div class="title-mini" @include('landings.styles.title', ['number'=>2])>
    {{ $block->title2['title']??'' }}
</div>
<div class="icon-li">
    @if(!empty($block->slider) && $block->slider->isNotEmpty())
        @foreach($block->slider as $slide)

            <div style="color:#{{ $slide->color??'' }}" class="icon-li-inner">
                <img src="{{ $slide->getImg() }}" alt="">
                <div>
                    @if(!empty($slide->title))
                        <p>{{$slide->title}}</p>
                    @endif
                    @if(!empty($slide->description))
                        <span>{{ $slide->description ?? '' }}</span>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="two__btn" style="margin-top: 260px">
    @if(!empty($block->button1['title']))
        <a href="{{ $block->button1['url']??'' }}" class="btn" @include('landings.styles.button', ['number'=>1]) style="border: 2px solid #fff;">
            {{ $block->button1['title']??'Докладніше' }}
        </a>
    @endif
    @if(!empty($block->button2['title']))
        <a href="{{ $block->button2['url']??'' }}" class="btn" @include('landings.styles.button', ['number'=>2])>
            {{ $block->button2['title']??'Де купити?' }}
        </a>
    @endif
</div>
<div class="desc-p" @include('landings.styles.description', ['number'=>1])>
    {!! $block->description1['contents']??'' !!}
</div>
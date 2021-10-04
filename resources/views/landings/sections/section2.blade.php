<h2 @include('landings.styles.title', ['number'=>1])>
    {{ $block->title1['title'] }}
</h2>
<div class="title-mini" @include('landings.styles.title', ['number'=>2])>
    {{ $block->title2['title'] }}
</div>
<div class="desc-p" @include('landings.styles.description', ['number'=>1])>
    {!! $block->description1['contents'] !!}
</div>
<div class="desc-img half-img">
    @if(!empty($block->image['path']))
        <img src="{{ $block->getImg('image') }}" alt="{{ $block->image['alt']??'' }}" title="{{ $block->image['title']??'' }}">
    @endif
</div>
<div class="two__btn">
    @if($block->button1['title'])
        <a href="{{ $block->button1['url']??'' }}" class="btn" @include('landings.styles.button', ['number'=>1])>
            {{ $block->button1['title']??'Де купити?' }}
        </a>
    @endif
    @if($block->button2['title'])
        <a href="{{ $block->button2['url']??'' }}" class="btn" @include('landings.styles.button', ['number'=>2])>
            {{ $block->button2['title']??'Де купити?' }}
        </a>
    @endif
</div>

<div class="desc-p" @include('landings.styles.description', ['number'=>2])>
    {!! $block->description2['contents'] !!}
</div>
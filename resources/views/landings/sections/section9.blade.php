<h2 @include('landings.styles.title', ['number'=>1])>
    {{ $block->title1['title'] }}
</h2>
<div class="title-mini" @include('landings.styles.title', ['number'=>2])>
    {{ $block->title2['title']??'' }}
</div>
<div class="desc-p" @include('landings.styles.description', ['number'=>1])>
    {!! $block->description1['contents']??'' !!}
</div>
<div class="title-mini" @include('landings.styles.title', ['number'=>3])>
    {{ $block->title3['title']??'' }}
</div>
<div @include('landings.styles.description', ['number'=>1]) class="table-mob">
{!! $block->description2['contents']??'' !!}
</div>
<div class="desc-img">
    @if(!empty($block->image['path']))
        <img src="{{ $block->getImg('image') }}" alt="{{ $block->image['alt']??'' }}"
             title="{{ $block->image['title']??'' }}">
    @endif
</div>
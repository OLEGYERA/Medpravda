<h2 @include('landings.styles.title', ['number'=>1])>
    {{ $block->title1['title'] }}
</h2>
<div class="desc-p" @include('landings.styles.description', ['number'=>1])>
    {!! $block->description1['contents'] !!}
</div>
@if(!empty($block->video))
    <div class="video">
        <iframe src="https://www.youtube.com/embed/{{ $block->video }}" frameborder="0"
                allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
@endif
<div class="desc-p" @include('landings.styles.description', ['number'=>2])>
    {!! $block->description2['contents'] !!}
</div>
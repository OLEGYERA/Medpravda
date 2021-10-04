<h2 @include('landings.styles.title', ['number'=>1])>
    {{ $block->title1['title'] }}
</h2>

<div class="tab-block">

    <div class="tab-icons">
        @if(!empty($block->slider) && $block->slider->isNotEmpty())
            @foreach($block->slider as $slide)
                <a href="#icon-content{{ $loop->iteration }}" class="tab-icon">
                    <img src="{{ $slide->getImg() }}" alt="{{ $slide->alt??'' }}" title="{{ $slide->title??'' }}">
                </a>
            @endforeach
        @endif
    </div>

    <div class="tab-icon-block-bg">
        @if(!empty($block->image['path']))
            <img src="{{ $block->getImg('image') }}" alt="{{ $block->image['alt']??'' }}"
                 title="{{ $block->image['title']??'' }}">
        @endif
    </div>

    <div class="tab-content-wrap">
        @if(!empty($block->slider) && $block->slider->isNotEmpty())
            @foreach($block->slider as $slide)
                <div id="icon-content{{ $loop->iteration }}" class="tab-content" style="color:#{{ $slide->color??'' }}">
                    {!! $slide->description !!}
                </div>
            @endforeach
        @endif


    </div>

</div>
@if(!empty($block->video))
    <div class="video">
        <iframe src="https://www.youtube.com/embed/{{ $block->video }}" frameborder="0"
                allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
@endif

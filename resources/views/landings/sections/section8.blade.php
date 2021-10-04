<h2 @include('landings.styles.title', ['number'=>1])>
    {{ $block->title1['title'] }}
</h2>
<div class="slider-wrapper-faded">
    @if(!empty($block->slider) && $block->slider->isNotEmpty())
        @foreach($block->slider as $slide)

            <div class="slide-block-fade">
                <div class="desc-img">
                    <img src="{{ $slide->getImg() }}" alt="{{ $slide->alt??'' }}" title="{{ $slide->title??'' }}">
                </div>
                <div class="desc-p" style="color:#{{ $slide->color??'' }}">
                    {!! $slide->description !!}
                </div>
            </div>

        @endforeach
    @endif
</div>
@if(!empty($block->slider) && $block->slider->isNotEmpty())
    @foreach($block->slider as $slide)
        <h2 style="color:#{{ $slide->color??'' }}">{{ $slide->title??'' }}</h2>
        <div class="desc-img">
            <img src="{{ $slide->getImg() }}" alt="{{ $slide->alt??'' }}" title="{{ $slide->title??'' }}">
        </div>
        <div class="desc-p" style="color:#{{ $slide->color??'' }}">
            {!! $slide->description !!}
        </div>
    @endforeach
@endif
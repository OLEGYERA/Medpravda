<div class="contacts"
     style="background: linear-gradient(to bottom, #{{ $block->background['color'] }} 0%, #{{ $block->background['secondarycolor'] }} 100%);">
    <div class="title-mini" @include('landings.styles.title', ['number'=>1])>
        {{ $block->title1['title']??'' }}
    </div>
    @if(!empty($block->slider) && $block->slider->isNotEmpty())
        @foreach($block->slider as $slide)

            @if($loop->iteration<4)
                <div class="contact-block">
                    <div class="contact-icon">
                        <img src="{{ $slide->getImg() }}" alt="{{ $slide->alt??'' }}" title="{{ $slide->title??'' }}">
                    </div>
                    <div class="contact-desc" style="color:#{{ $slide->color??'' }}">
                        {!! nl2br($slide->description) ?? '' !!}
                    </div>
                </div>
            @else
                @continue
            @endif

        @endforeach
    @endif



    @if(!empty($block->slider) && $block->slider->isNotEmpty())
        <div class="social-block">
            @foreach($block->slider as $slide)

                @if($loop->iteration<4)
                    @continue
                @endif

                <a href="{!! $slide->description ?? '' !!}" target="_blank">
                    <img src="{{ $slide->getImg() }}" alt="{{ $slide->alt??'' }}" title="{{ $slide->title??'' }}">
                </a>

            @endforeach
        </div>
    @endif
</div>

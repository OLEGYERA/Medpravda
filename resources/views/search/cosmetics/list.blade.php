<ul class="cosmetic-sort">
    @foreach($classifications as $classification)
        <li>
            {{ $classification->class }}.
            @if(false == $loc)
                {{ $classification->name }}
            @else
                {{ $classification->uname }}
            @endif
            @if($classification->children->isNotEmpty())
                @include('search.cosmetics.list', ['classifications'=>$classification->children, 'loc'=>$loc])
            @endif

            @if($classification->tools->isNotEmpty())
                @foreach($classification->tools as $cosmetic)
                    @if(false == $loc)
                        <a href="{{ route('cosmetic_get_adapted', ['cosmetic_slug'=>$cosmetic->slug]) }}">{{ $cosmetic->title }}</a>
                    @else
                        <a href="{{ route('cosmetic_get_adapted_ua', ['cosmetic_slug'=>$cosmetic->slug]) }}">{{ $cosmetic->ua->title }}</a>
                    @endif
                @endforeach
            @endif
        </li>
    @endforeach
</ul>
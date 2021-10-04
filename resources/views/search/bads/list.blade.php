<ul class="bad-sort">
    @foreach($classifications as $classification)
        <li>
            {{ $classification->class }}.
            @if(false == $loc)
                {{ $classification->name }}
            @else
                {{ $classification->uname }}
            @endif
            @if($classification->children->isNotEmpty())
                @include('search.bads.list', ['classifications'=>$classification->children, 'loc'=>$loc])
            @endif

            @if($classification->tools->isNotEmpty())
                @foreach($classification->tools as $bad)
                    @if(false == $loc)
                        <a href="{{ route('bad_get_adapted', ['bad_slug'=>$bad->slug]) }}/">{{ $bad->title }}</a>
                    @else
                        <a href="{{ route('bad_get_adapted_ua', ['bad_slug'=>$bad->slug]) }}">{{ $bad->ua->title }}</a>
                    @endif
                @endforeach
            @endif
        </li>
    @endforeach
</ul>
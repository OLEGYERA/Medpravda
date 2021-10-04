<ul class="ware-sort">
    @foreach($classifications as $classification)
        <li>

            {{ $classification->class }}.
            @if(false == $loc)
                {{ $classification->name }}
            @else
                {{ $classification->uname }}
            @endif
            @if($classification->children->isNotEmpty())
                @include('search.wares.list', ['classifications'=>$classification->children, 'loc'=>$loc])
            @endif
            @if($classification->tools->isNotEmpty())
                @foreach($classification->tools as $ware)
                @continue($ware->title == 'Агонист серотониновых рецепторов.')
                    @if(false == $loc)

                          <a href="{{ route('ware_get_adapted', ['ware_slug'=>$ware->slug]) }}">{{ $ware->title }}</a>

                    @else

                           <a href="{{ route('ware_get_adapted_ua', ['ware_slug'=>$ware->slug]) }}">{{ $ware->ua->title }}</a>

                    @endif
                @endforeach
            @endif
        </li>
    @endforeach
</ul>
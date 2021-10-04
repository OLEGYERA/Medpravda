<div class="result">
    @if(isset($result) && count($result)>0)
        @foreach($result as $k=>$collections)
            @if($k != 'def')
                <div class="res-cat">{{ trans('ru.'.$k) }}</div>
            @endif
            <div class="res-links">
                @foreach($collections as $item)
                    @switch($k)
                        @case('medicines')
                        <a href="{{ route('medicine', $item['alias']) }}/">{{ $item['title'] }}</a>
                        <a href="{{ route('medicine_ua', $item['alias']) }}/">{{ $item['utitle'] ?? '' }}</a>
                        @break

                        @case('fabricators')
                        <a href="{{ route('search_fabricator', ['val'=>mb_substr($item->title, 0, 1), 'fabricator'=>$item->alias]) }}/">{{ $item->title }}</a>
                        @break

                        @case('innnames')
                        <a href="{{ route('search_mnn', $item->alias) }}/">{{ $item->title }}</a>
                        @break

                        @case('pharma')
                        <a href="{{ route('search_farm', $item->alias) }}/">{{ $item->title }}</a>
                        @break

                        @case('substances')
                        <a href="{{ route('search_substance', $item->alias) }}/">{{ $item->title }}</a>
                        @break

                        @case('articles')
                        <a href="{{ route('articles', $item->alias) }}/">{{ $item->title }}</a>
                        @break

                        @case('bads')
                        <a href="{{ $item->url }}/">{{ $item->title }}</a>

                        @if($item->getTable() != 'bad_uas')
                            <a href="{{ $item->ua_bud->url }}/">{{ $item->ua_bud->title }}</a>
                        @endif

                        @break

                        @case('cosmetics')
                            <a href="{{ route('cosmetic_get_adapted', $item->slug) }}/">{{ $item->title }}</a>
                        @break

                        @case('wares')
                        <a href="{{ route('ware_get_adapted', $item->slug) }}/">{{ $item->title }}</a>
                        @break

{{--                        @default--}}
{{--                        <a href="{{ route('medicine', $item['ru']->slug) }}/">{{ $item['ru']->title }}</a>--}}
                    @endswitch
                @endforeach
            </div>
        @endforeach
    @else
        <h3>0</h3>
    @endif
</div>
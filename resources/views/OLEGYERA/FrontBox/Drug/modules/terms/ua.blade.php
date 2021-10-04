@foreach($terms as $term)
    <div class="mp-row-present" id="{{$term->id . '-term'}}">
        <h3 class="title-row" itemprop="name">
            <a href="{{route('ua.term', ['alias'=> $term->alias])}}">{{$term->utitle}}</a>
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{!! substr(strip_tags(str_replace('&nbsp;', ' ', $term->uterm)), 0, 300) !!}...</p></div>
    </div>
@endforeach

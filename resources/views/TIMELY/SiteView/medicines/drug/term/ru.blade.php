@foreach($terms as $term)
    <div class="mp-row-icon" id="{{$term->id}}-term">
        <h3 class="title-row" itemprop="name"><a href="" class="external-link" id="">{{$term->title}}</a></h3>
        <div class="content-row atx-mg" itemprop="articleSection">
            <p>{{shortTag($term->term)}}</p>
        </div>
    </div>
@endforeach

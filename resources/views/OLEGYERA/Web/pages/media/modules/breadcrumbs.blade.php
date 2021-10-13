<div class="media-breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
    @foreach($breadcrumbs as $key => $breadcrumb)
        <div class="breadcrumb"
             itemprop="itemListElement" itemscope
             itemtype="https://schema.org/ListItem">

            @if($breadcrumb['alias'])
                <a itemprop="item" href="{{ $breadcrumb['alias'] }}" itemid="{{ $breadcrumb['alias'] }}">
                    <span class="breadcrumb_item" itemprop="name">{{$breadcrumb['title']}}</span>
                    <meta itemprop="position" content="{{$key + 1}}"/>
                </a>
                @if($key !== count($breadcrumbs) - 1) / @endif
            @else
                <a itemprop="item">
                    <span class="breadcrumb_item" itemprop="name">{{$breadcrumb['title']}}</span>
                    <meta itemprop="position" content="{{$key + 1}}"/>
                </a>
                /
            @endif
        </div>
    @endforeach
</div>

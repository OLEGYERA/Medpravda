<div class="breadcrumb-row">
    <div class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
        <div class="breadcrumb"
             itemprop="itemListElement" itemscope
             itemtype="https://schema.org/ListItem">
            <a itemprop="item"
               href="">
                <span class="label" itemprop="name"><i class="icon-home"></i></span>
                <meta itemprop="position" content="1"/>
            </a>
            <i class="icon-darrow"></i>
        </div>
        @foreach($breadcrumbs as $key => $breadcrumb)
            <div class="breadcrumb"
                 itemprop="itemListElement" itemscope
                 itemtype="https://schema.org/ListItem">
                <a itemprop="item"
                   @if($breadcrumb['alias']) href="{{ $breadcrumb['alias'] }}" itemid="{{ $breadcrumb['alias'] }}" @endif>
                    <span class="label" itemprop="name">{{$breadcrumb['title']}}</span>
                    <meta itemprop="position" content="{{$key + 2}}"/>
                </a>
                <i class="icon-darrow"></i>
            </div>
        @endforeach
    </div>
</div>


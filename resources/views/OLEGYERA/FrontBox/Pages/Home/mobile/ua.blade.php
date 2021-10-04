<div class="full-content">
    <div class="page-content">
        <div class="row-manual">
            <h1>ДОВІДНИКИ</h1>
            <div class="manual-links">
                @foreach($catalog as $key => $item)
                    <a href="{{route('m.ua.catalog.' . $item['route_name'])}}" class="link-plate">
                        <span class="glyph {{$key}}"></span>
                    </a>
                @endforeach
            </div>
            <h2>НОВІ ПРЕПАРАТИ</h2>
            <div class="new-item-links">
                @foreach($drugs as $drug)
                    <a href="{{route('m.ua.drug', ['alias' => $drug->alias])}}" class="new-item-link">
                        <figure>
                            <img src="{{asset('/gallery/' . getCategoryName($drug->image->category_id) . '/large/' . $drug->image->path)}}" alt="{{$drug->image->alt}}">
                        </figure>
                        <span class="title">
                            {{$drug->utitle}}
                        </span>
                    </a>
                @endforeach
            </div>
            <h2>НОВІ ДІЄТИЧНІ ДОБАВКИ</h2>
            <div class="new-item-links">
                @foreach($bads as $bad)
                    <a href="{{route('m.ua.bad', ['alias' => $bad->alias])}}" class="new-item-link">
                        <figure>
                            <img src="{{asset('/gallery/' . getCategoryName($bad->image->category_id) . '/large/' . $bad->image->path)}}" alt="{{$bad->image->alt}}">
                        </figure>
                        <span class="title">
                            {{$bad->utitle}}
                        </span>
                    </a>
                @endforeach
            </div>
            <h2>НОВІ КОСМЕТИЧНІ ЗАСОБИ</h2>
            <div class="new-item-links">
                @foreach($cosmetics as $cosmetic)
                    <a href="{{route('m.ua.cosmetic', ['alias' => $cosmetic->alias])}}" class="new-item-link">
                        <figure>
                            <img src="{{asset('/gallery/' . getCategoryName($cosmetic->image->category_id) . '/large/' . $cosmetic->image->path)}}" alt="{{$cosmetic->image->alt}}">
                        </figure>
                        <span class="title">
                            {{$cosmetic->utitle}}
                        </span>
                    </a>
                @endforeach
            </div>
            <h2>НОВІ МЕДИЧНІ ВИРОБИ</h2>
            <div class="new-item-links">
                @foreach($wares as $ware)
                    <a href="{{route('m.ua.ware', ['alias' => $ware->alias])}}" class="new-item-link">
                        <figure>
                            <img src="{{asset('/gallery/' . getCategoryName($ware->image->category_id) . '/large/' . $ware->image->path)}}" alt="{{$ware->image->alt}}">
                        </figure>
                        <span class="title">
                            {{$ware->utitle}}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

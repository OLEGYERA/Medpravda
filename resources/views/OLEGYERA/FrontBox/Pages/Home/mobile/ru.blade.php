<div class="full-content">
    <div class="page-content">
        <div class="row-manual">
            <h1 class="page-title">СПРАВОЧНИКИ</h1>
            <div class="manual-links">
                @foreach($catalog as $key => $item)
                    <a href="{{route('m.ru.catalog.' . $item['route_name'])}}" class="link-plate">
                        <span class="glyph {{$key}}"></span>
                    </a>
                @endforeach
            </div>
            <h2 class="page-title">НОВЫЕ ПРЕПАРАТЫ</h2>
            <div class="new-item-links">
                @foreach($drugs as $drug)
                    <a href="{{route('m.ru.drug', ['alias' => $drug->alias])}}" class="new-item-link">
                        <figure>
                            <img src="{{asset('/gallery/' . getCategoryName($drug->image->category_id) . '/large/' . $drug->image->path)}}" alt="{{$drug->image->alt}}">
                        </figure>
                        <span class="title">
                            {{$drug->title}}
                        </span>
                    </a>
                @endforeach
            </div>
            <h2 class="page-title">НОВЫЕ ДИЕТИЧЕСКИЕ ДОБАВКИ</h2>
            <div class="new-item-links">
                @foreach($bads as $bad)
                    <a href="{{route('m.ru.bad', ['alias' => $bad->alias])}}" class="new-item-link">
                        <figure>
                            <img src="{{asset('/gallery/' . getCategoryName($bad->image->category_id) . '/large/' . $bad->image->path)}}" alt="{{$bad->image->alt}}">
                        </figure>
                        <span class="title">
                            {{$bad->title}}
                        </span>
                    </a>
                @endforeach
            </div>
            <h2 class="page-title">НОВЫЕ КОСМЕТИЧЕСКИЕ СРЕДСТВА</h2>
            <div class="new-item-links">
                @foreach($cosmetics as $cosmetic)
                    <a href="{{route('m.ru.cosmetic', ['alias' => $cosmetic->alias])}}" class="new-item-link">
                        <figure>
                            <img src="{{asset('/gallery/' . getCategoryName($cosmetic->image->category_id) . '/large/' . $cosmetic->image->path)}}" alt="{{$cosmetic->image->alt}}">
                        </figure>
                        <span class="title">
                            {{$cosmetic->title}}
                        </span>
                    </a>
                @endforeach
            </div>
            <h2 class="page-title">НОВЫЕ МЕДИЦИНСКИЕ ИЗДЕЛИЯ</h2>
            <div class="new-item-links">
                @foreach($wares as $ware)
                    <a href="{{route('m.ru.ware', ['alias' => $ware->alias])}}" class="new-item-link">
                        <figure>
                            <img src="{{asset('/gallery/' . getCategoryName($ware->image->category_id) . '/large/' . $ware->image->path)}}" alt="{{$ware->image->alt}}">
                        </figure>
                        <span class="title">
                            {{$ware->title}}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

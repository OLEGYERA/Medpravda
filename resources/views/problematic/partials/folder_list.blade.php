
@foreach($child_page as $c)
    {{--@if($c->children->root_page)--}}
        <ul class="ware-sort">
            @if($c->children->root_page)
                <a href="#">
            @else
                <a href="{{route('problematic.read_article', $c->children->alias)}}">
            @endif
                <li>
                    {{$c->children->title}}
                    {{--@if(count($c->children->get_child_pages()))--}}
                    {{--@include('problematic.partials.folder_list', ['child_page' => $c->children->get_child_pages()])--}}
                    {{--@endif--}}
                </li>
            </a>
        </ul>
    {{--@endif--}}
@endforeach

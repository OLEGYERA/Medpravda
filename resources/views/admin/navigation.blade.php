@if($menu)
    <nav class="menu classic">

        {!! $menu->asUl(['class'=>'menu']) !!}

    </nav>
@endif
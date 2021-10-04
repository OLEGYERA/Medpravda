{{--<h2 style="color:#{{ }}">Як приймати?</h2>--}}
{{--<div class="two__column">--}}
{{--    <div>--}}
{{--        <img src="https://medpravda.ua/asset/images/lendings/blocks/sliders/qpf3D448Th1567589345.png" alt="" title="">--}}
{{--        <div class="title-mini" style="color:#{{ }}">При головному болю</div>--}}
{{--        <div class="bordered__box" style="background:#{{ }}; border-color: #{{}}">--}} 
{{--           <div>--}}
{{--            <img src="https://medpravda.ua/asset/images/lendings/boolpoints/citramon-maksiboolpointCr1567584308.png" alt>--}}
{{--            <span>1-2 таблетки на прийом</span>--}}
{{--           </div>--}}
{{--           <div>--}}
{{--            <img src="https://medpravda.ua/asset/images/lendings/boolpoints/citramon-maksiboolpointCr1567584308.png" alt>--}}
{{--            <span>інтервал 4-6 годин</span>--}}
{{--           </div>--}}
{{--           <div>--}}
{{--            <img src="https://medpravda.ua/asset/images/lendings/boolpoints/citramon-maksiboolpointCr1567584308.png" alt>--}}
{{--            <span>максимум 6 таблеток на добу тривалість лікування до 4 днів</span>--}}
{{--           </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        <img src="https://medpravda.ua/asset/images/lendings/blocks/sliders/qpf3D448Th1567589345.png" alt="" title="">--}}
{{--        <div class="title-mini" style="color:#{{ }}">При головному болю</div>--}}
{{--        <div class="bordered__box" style="background:#{{ }}; border-color: #{{}}">--}}
{{--           <div>--}}
{{--            <img src="https://medpravda.ua/asset/images/lendings/boolpoints/citramon-maksiboolpointCr1567584308.png" alt>--}}
{{--            <span>1-2 таблетки на прийом</span>--}}
{{--           </div>--}}
{{--           <div>--}}
{{--            <img src="https://medpravda.ua/asset/images/lendings/boolpoints/citramon-maksiboolpointCr1567584308.png" alt>--}}
{{--            <span>інтервал 4-6 годин</span>--}}
{{--           </div>--}}
{{--           <div>--}}
{{--            <img src="https://medpravda.ua/asset/images/lendings/boolpoints/citramon-maksiboolpointCr1567584308.png" alt>--}}
{{--            <span>максимум 6 таблеток на добу тривалість лікування до 4 днів</span>--}}
{{--           </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<h2 @include('landings.styles.title', ['number'=>1])>
    {{ $block->title1['title'] }}
</h2>
<div class="two__column">
    <div>
        <img src="{{$block->getImg('image')}}" alt="{{$block->image['alt']}}" title="{{$block->image['title']}}">
        <div class="title-mini" @include('landings.styles.title', ['number'=>2])>{{ $block->title2['title'] }}</div>
        <div class="bordered__box" style="border-color: #{{$block->{'description1'}['color']??''}}; background: #{{$block->{'description1'}['table']??''}}; color: #{{$block->{'description1'}['color']??''}}">
            @if(!empty($block->description1['contents']))
                <?php
                    $lis = explode("</p>\n", $block->description1['contents']);
                ?>
                @foreach($lis as $li)
                    <div>
                        <img src="https://medpravda.ua/asset/images/lendings/boolpoints/citramon-maksiboolpointCr1567584308.png" alt>
                        <span>{{explode("<p>", $li)[1]}}</span>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
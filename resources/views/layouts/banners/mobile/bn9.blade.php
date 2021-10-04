<div class="banner-reklama order-first" style="margin-top:20px;">
    <div class="desktop-display-none">
        <div id="adriver_banner_662371165" class="div-adriver adv-banner-9 banner-reklama"></div>
        @empty($ar_key)
            <script type="text/javascript" async>
                new adriver("adriver_banner_662371165", {sid:221103, bt:52, bn:9});
            </script>
        @else
            <script type="text/javascript" async>
                new adriver("adriver_banner_662371165", {sid:221103, bt:52, bn:9, keyword: '{{$ar_key}}'});
            </script>
        @endempty
    </div>
</div>
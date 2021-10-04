<div id="adriver_banner_bn2" class="div-adriver adv-banner-2 banner-reklama"></div>
@empty($ar_key)
    <script type="text/javascript" async>
        new adriver("adriver_banner_bn2", {sid:221103, bt:52, bn:2});
    </script>
@else
    <script type="text/javascript" async>
        new adriver("adriver_banner_bn2", {sid:221103, bt:52, bn:2, keyword: '{{$ar_key}}'});
    </script>
@endempty
<div id="adriver_banner_bn1" class="adv-banner-1 banner-1-pc"></div>
@empty($ar_key)
    <script type="text/javascript" async>
        new adriver("adriver_banner_bn1", {sid:221103, bt:52, bn:1});
    </script>
@else
    <script type="text/javascript" async>
        new adriver("adriver_banner_bn1", {sid:221103, bt:52, bn:1, keyword:'{{$ar_key}}'});
    </script>
@endempty

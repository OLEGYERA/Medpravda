
<div id="adriver_banner_1861869907" class="div-adriver adv-banner-2 banner-reklama"></div>
@empty($ar_key)
    <script type="text/javascript" async>
        new adriver("adriver_banner_1861869907", {sid:221103, bt:52, bn:2});
    </script>
@else
    <script type="text/javascript" async>
        new adriver("adriver_banner_1861869907", {sid:221103, bt:52, bn:2, keyword: '{{$ar_key}}'});
    </script>
@endempty

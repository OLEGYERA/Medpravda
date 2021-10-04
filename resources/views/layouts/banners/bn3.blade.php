<div id="adriver_banner_bn3" class="adv-banner-3 banner-reklama"></div>
@empty($ar_key)
    <script type="text/javascript">
        new adriver("adriver_banner_bn3", {sid:221103, bt:52, bn:3});
    </script>
@else
    <script type="text/javascript">
        new adriver("adriver_banner_bn3", {sid:221103, bt:52, bn:3, keyword: '{{$ar_key}}', custom: custom});
    </script>
@endempty
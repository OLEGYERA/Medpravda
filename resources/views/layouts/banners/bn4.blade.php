<div id="adriver_banner_bn4" class="adv-banner-4 banner-reklama"></div>
@empty($ar_key)
    <script type="text/javascript">
        new adriver("adriver_banner_bn4", {sid:221103, bt:52, bn:4});
    </script>
@else
    <script type="text/javascript">
        new adriver("adriver_banner_bn4", {sid:221103, bt:52, bn:4, keyword: '{{$ar_key}}', custom: custom});
    </script>
@endempty
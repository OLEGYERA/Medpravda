{{--BANNER FOR ARTICLE:  BN 8 , ID adriver_banner_277038500555--}}
<div id="adriver_banner_277038500555" class="div-adriver adv-banner-3 test-adriver banner-reklama"></div>

@empty($ar_key)
    <script type="text/javascript">
        new adriver("adriver_banner_277038500555", {sid:219776, bt:52, bn:5});
    </script>
@else
    <script type="text/javascript">
        new adriver("adriver_banner_277038500555", {sid:219776, bt:52, bn:5, keyword: '{{$ar_key}}', custom: custom});
    </script>
@endempty
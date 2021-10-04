{{--BANNER FOR ARTICLE:  BN 7 , ID 5797515007--}}
<div id="adriver_banner_5797515007" class="div-adriver adv-banner-3 banner-reklama"></div>

@empty($ar_key)
    <script type="text/javascript">
        new adriver("adriver_banner_5797515007", {sid:219776, bt:52, bn:7});
    </script>
@else
    <script type="text/javascript">
        new adriver("adriver_banner_5797515007", {sid:219776, bt:52, bn:7, keyword: '{{$ar_key}}', custom: custom});

    </script>
@endempty
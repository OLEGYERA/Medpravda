<!--  AdRiver code START. Type:AjaxJS Site: medpravda BN:9 -->

<div id="adriver_banner_2770385003" class="div-adriver adv-banner-3 banner-reklama"></div>

@empty($ar_key)
    <script defer async type="text/javascript">
        new adriver("adriver_banner_2770385003", {sid: 219776, bt: 52, bn: 9});
    </script>
@else

    <script type="text/javascript">

      new adriver("adriver_banner_2770385003", {
            sid: 219776,
            bt: 52,
            bn: 9,
            keyword: '{{$ar_key}}',
            custom: custom
        });
    </script>
@endempty
<!--  AdRiver code END  -->
{{--баннер 6 для моб версии вместо баннера 2 на пк--}}

<!--  AdRiver code START. Type:AjaxJS Site: medpravda BN:6 -->
<div id="adriver_banner_5797515001" class="div-adriver adv-banner-3 banner-aside-3 banner-reklama"></div>

@empty($ar_key)
    <script type="text/javascript">
        new adriver("adriver_banner_5797515001", {sid:219776, bt:52, bn:1});
    </script>
@else
    <script type="text/javascript">
        new adriver("adriver_banner_5797515001", {sid:219776, bt:52, bn:1, keyword: '{{$ar_key}}', custom: custom});
    </script>
@endempty
<!--  AdRiver code END  -->



<!--  AdRiver code START. Type:AjaxJS Site: medpravda BN:2 -->

<div id="adriver_banner_376535356" class="adv-banner-2"></div>

@empty($ar_key)
    <script type="text/javascript">
        new adriver("adriver_banner_376535356", {sid:219776, bt:52, bn:2});
    </script>
@else

    <script type="text/javascript">
       new adriver("adriver_banner_376535356", {sid:219776, bt:52, bn:2, keyword: '{{$ar_key}}', custom: custom});
    </script>
@endempty

<!--  AdRiver code END  -->
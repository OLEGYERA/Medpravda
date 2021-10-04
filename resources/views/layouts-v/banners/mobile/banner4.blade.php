{{--место для баннера 1 ПК версии только для mobile--}}

<!--  AdRiver code START. Type:AjaxJS Site: medpravda BN:6 -->
<div id="adriver_banner_277038512001" class="div-adriver adv-banner-1"></div>

@empty($ar_key)
    <script defer async type="text/javascript">
         new adriver("adriver_banner_277038512001", {sid: 219776, bt: 52, bn: 1});
    </script>
@else
    <script type="text/javascript">
        new adriver("adriver_banner_277038512001", {
            sid: 219776,
            bt: 52,
            bn: 1,
            keyword: '{{$ar_key}}',
            custom: custom
        });


        // document.addEventListener("DOMContentLoaded", function(event) {
        //     //do work
        //     var ard = document.getElementById('adriver_banner_277038512001');
        //     console.log(ard);
        //     ard.style.width = "100px";
        //     ard.style.height = "100px";
        // });
    </script>
@endempty
<!--  AdRiver code END  -->

{{--<div id="adriver_banner_2770385"></div>--}}

{{--@empty($ar_key)--}}
    {{--<script defer async type="text/javascript">--}}
        {{--new adriver("adriver_banner_2770385", {sid: 219776, bt: 52, bn: 6});--}}
    {{--</script>--}}
{{--@else--}}

    {{--<script type="text/javascript">--}}

        {{--new adriver("adriver_banner_2770385", {--}}
            {{--sid: 219776,--}}
            {{--bt: 52,--}}
            {{--bn: 6,--}}
            {{--keyword: '{{$ar_key}}',--}}
            {{--custom: custom--}}
        {{--});--}}
    {{--</script>--}}
{{--@endempty--}}
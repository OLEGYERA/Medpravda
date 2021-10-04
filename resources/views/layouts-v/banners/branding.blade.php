<!-- REKLAMA BODY -->
{{--<style type="text/css">--}}
{{--.body-promotion:before {--}}
{{--background-color: #C2B9FA;--}}
{{--background-image: url('/assets/images/promotion/1920.jpg');--}}
{{--background-repeat: no-repeat;--}}
{{--background-position: 50% 0;--}}
{{--content: '';--}}
{{--height: 100%;--}}
{{--left: 0;--}}
{{--position: fixed;--}}
{{--top: 0;--}}
{{--width: 100%;--}}
{{--z-index: -1;--}}
{{--}--}}
{{--@media (max-width: 1600px) {--}}
{{--.body-promotion:before {--}}
{{--background-image: url('/assets/images/promotion/1600.jpg');--}}
{{--}--}}
{{--}--}}
{{--@media (max-width: 1440px) {--}}
{{--.body-promotion:before {--}}
{{--background-image: url('/assets/images/promotion/1440.jpg');--}}
{{--}--}}
{{--}--}}
{{--@media (max-width: 1366px) {--}}
{{--.body-promotion:before {--}}
{{--background-image: url('/assets/images/promotion/1366.jpg');--}}
{{--}--}}
{{--}--}}
{{--@media (max-width: 1280px) {--}}
{{--.body-promotion:before {--}}
{{--background-image: url('/assets/images/promotion/1280.jpg');--}}
{{--}--}}
{{--}--}}
{{--</style>--}}
{{--<div class="body-promotion desktop">--}}
{{--<img src="/assets/images/promotion/body-rek.jpg" alt="">--}}
{{--</div>--}}

<!-- end REKLAMA BODY -->


<div id="adriver_banner_1014442537" class="body-promotion"></div>
<!--  AdRiver code START. Type:AjaxJS Site: medpravda BN:3 -->

@empty($ar_key)
    <script type="text/javascript">
        new adriver("adriver_banner_1014442537", {sid: 219776, bt: 52, bn: 3});
    </script>
@else

    <script type="text/javascript">
        var custom = [];
        var width = window.innerWidth,
            height = window.innerHeight;
        var std = {width:110, height:111},i;for(i in std){try{custom[std[i]]=eval(i)}catch(e){}}


       new adriver("adriver_banner_1014442537", {sid: 219776, bt: 52, bn: 3, keyword: '{{$ar_key}}', custom: custom});

    </script>
@endempty
<!--  AdRiver code END  -->


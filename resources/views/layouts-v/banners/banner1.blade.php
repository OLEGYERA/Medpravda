<div id="adriver_banner_27703859966" class="adv-banner-1 banner-1-pc"></div>

@empty($ar_key)
    <script type="text/javascript">
        // inner banner 1
        new adriver("adriver_banner_27703859966", {sid: 219776, bt: 52, bn: 1});
    </script>
@else
    <script type="text/javascript">
        // inner banner 2
       new adriver("adriver_banner_27703859966", {
            sid: 219776,
            bt: 52,
            bn: 1,
            keyword: '{{$ar_key}}',
            custom: custom
        });

    </script>
@endempty
<!--  AdRiver code END  -->
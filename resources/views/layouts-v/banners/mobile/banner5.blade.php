{{-- отдельный баннер на mobile--}}

<div id="adriver_banner_2770385001" class="div-adriver adv-banner-2"></div>

@empty($ar_key)
    <script defer async type="text/javascript">
        new adriver("adriver_banner_2770385001", {sid: 219776, bt: 52, bn: 5});
    </script>
@else

    <script type="text/javascript">

        new adriver("adriver_banner_2770385001", {
            sid: 219776,
            bt: 52,
            bn: 5,
            keyword: '{{$ar_key}}',
            custom: custom
        });
    </script>
@endempty
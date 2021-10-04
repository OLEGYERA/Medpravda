<div id="adriver_banner_865406918"></div>
@empty($ar_key)
    <script type="text/javascript" async>
        new adriver("adriver_banner_865406918", {sid:221103, bt:52, bn:1});
    </script>
@else
    <script type="text/javascript" async>
        new adriver("adriver_banner_865406918", {sid:221103, bt:52, bn:1, keyword: '{{$ar_key}}'});
    </script>
@endempty



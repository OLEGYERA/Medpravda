<div id="adriver_banner_branding" class="body-promotion"></div>
@empty($branding_url)
    <script type="text/javascript" async>
        new adriver("adriver_banner_branding", {sid:221103, bt:52, bn:5});
    </script>
@else
    <script type="text/javascript" async>
        var custom = [];
        var width = window.innerWidth,
            height = window.innerHeight;
        var std = {width:110, height:111},i;for(i in std){try{custom[std[i]]=eval(i)}catch(e){}}
        console.log(std);
        new adriver("adriver_banner_branding", {sid:221103, bt:52, bn:5, keyword: '{{$branding_url}}', custom: custom});
    </script>
@endempty


<div id="adriver_banner_cap" class="adriver_cap"></div>

@empty($key_word)
    <script type="text/javascript">
        new adriver("adriver_banner_cap", {sid:221103, bt:52, bn:5});
    </script>
@else
    <script type="text/javascript">
        var custom = [];
        var width = window.innerWidth,
            height = window.innerHeight;
        var std = {width:110, height:111},i;for(i in std){try{custom[std[i]]=eval(i)}catch(e){}}
        new adriver("adriver_banner_cap", {sid:221103, bt:52, bn:5, keyword: '{{$key_word}}', custom: custom});
    </script>
@endempty

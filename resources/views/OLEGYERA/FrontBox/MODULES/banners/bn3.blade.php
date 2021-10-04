<div class="mp-advertisement">
    @if($key_word !== 'proteflazid' &&
    $key_word !== 'novirin' &&
    $key_word !== 'Novirin-sirop' &&
    $key_word !== 'amiksin-ic' &&
    $key_word !== 'groprinozin-rihter' &&
    $key_word !== 'groprinozin-tabletki' &&
    $key_word !== 'ergoferon' &&
    $key_word !== 'amizon' &&
    $key_word !== 'amizon-maks' &&
    $key_word !== 'nazoferon' &&
    $key_word !== 'anaferon' &&
    $key_word !== 'laferobion')
        <div class="advert-atention">Реклама</div>
    @endif
    <div id="adriver_banner_bn3" class="mp-adriver"></div>
</div>
@empty($key_word)
    <script type="text/javascript">
        new adriver("adriver_banner_bn3", {sid:221103, bt:52, bn:3});
    </script>
@else
    <script type="text/javascript">
        new adriver("adriver_banner_bn3", {sid:221103, bt:52, bn:3, keyword: '{{$key_word}}'});
    </script>
@endempty

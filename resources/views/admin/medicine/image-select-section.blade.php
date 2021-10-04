@if(!empty($drug) && $drug->image->isNotEmpty())
    @foreach($drug->image as $pic)
        <div class="img img__full thumbnail" data-id="{{ $pic->id }}" data-spec="{{ $spec }}" data-source="medicine">
            @switch($spec)
                @case('ru')
                {{ Html::image(asset('/asset/images/medicine/main').'/'.$pic->path, 'a picture', array('class' => 'img-thumbnail')) }}
                @break

                @case('ua')
                {{ Html::image(asset('/asset/images/medicine/main_ukr').'/'.$pic->path, 'a picture', array('class' => 'img-thumbnail')) }}
                @break

                @case('aua')
                {{ Html::image(asset('/asset/images/medicine/main_aukr').'/'.$pic->path, 'a picture', array('class' => 'img-thumbnail')) }}
                @break

                @case('aru')
                {{ Html::image(asset('/asset/images/medicine/main_a').'/'.$pic->path, 'a picture', array('class' => 'img-thumbnail')) }}
                @break

                @default
                {{ Html::image(asset('/asset/images/medicine/main_ukr').'/'.$pic->path, 'a picture', array('class' => 'img-thumbnail')) }}
            @endswitch
            <span class="remove-slider"><button type="button" class="btn btn__red">x</button></span>
        </div>
    @endforeach
@else
    <h2>Нет фотографий</h2>
@endif

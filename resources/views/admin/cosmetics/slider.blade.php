<div class="wrap__block">
    <h2>Слайдер</h2>
    @if(!empty($model) && $model->slide->isNotEmpty())
        <div class="two__column"><!--две колонки-->
            @forelse($model->slide as $pic)
                <div class="img img__full">
                    {{ Html::image(asset('/asset/images/'.snake_case(class_basename($model)).'s/main').'/'.$pic->path, 'a picture', array('class' => 'img-thumbnail')) }}
                    @if(!empty($pic->upath))

                        <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                                data-img="{{ $pic->id }}" data-src="ua">x
                        </button>

                    @endif
                </div>

            @empty
                <h4>Изображения отсутствуют</h4>
            @endforelse
        </div>
    @endif

    <label class="input__file"><!--картинка загузить-->
        <span class="btn" data-default='Загрузить файл'>Загрузить файл <small></small></span>
        {!! Form::file('slider[]', ['accept'=>'image/*', 'class'=>'file', 'id' => 'slider_img']) !!}
    </label>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('imgalt[]', null,
                                        ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
            {{ Form::label('imgalt', 'Alt image') }}
        </div>
        <div class="input__group">
            {!! Form::text('imgtitle[]', null,
                                        ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
            {{ Form::label('imgtitle', 'Title image') }}
        </div>
    </div>
</div>
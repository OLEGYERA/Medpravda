<div class="breadcrumb">
    <a href="">Препараты</a>
    <span>Препараты edit</span>
</div>


<div class="top__nav">
    <a class="btn">Статьи</a>
</div>
<div class="wrap__block"> <!--белый блок-->
    <h2>Поиск</h2>
    <div class="two__column"><!--две колонки-->


        <div class="two__column">
            <div></div>
            <div></div>
        </div>


        <div>
            <a href="{{ route('medicine_create') }}" class="btn btn__plus">
                <!--кнопка с иконками, в основном открывает попап-->
                Добавить препарат
            </a>
        </div>

        <div class="input__group"><!--обычный инпут-->

            {!! Form::text('value', old('value') ? : '' , ['placeholder'=>'validol, валидол...', 'id'=>'search-param'])
            !!}
            {{ Form::label('search-param', 'Параметр поиска') }}
        </div>
        <div class="input__group label-stay"><!--выпадающий список-->
            {!! Form::select('param',
            [
            1=>'Название',
            2=>'URL',
            3 =>'На паузе',
            ], old('val') ? : 1, ['class'=>'custom-select sources', 'style' => 'display: none', 'id' => 'kriterii'])
            !!}
            {{ Form::label('param', 'Критерий поиска') }}
        </div>


        <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
            {{ Html::image(asset('/asset/images/rk/ua').'/'.$adv->upath, 'ua picture', array('class' => 'img-thumbnail')) }}
            @if(!empty($adv->upath))

                <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                        data-img="{{ $adv->id }}" data-src="ua">x
                </button>

            @endif
        </div>
        <label class="input__file"><!--картинка загузить-->
            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small></small></span>
            {!! Form::file('img', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
        </label>


        <div class="checkbox__several"><!--этот див если больше одного чекбокса-->
            <div class="input__group info-check label-stay"><!--чекбокс-->
                <input type="checkbox" {{ (old('approved') || !empty($tag->approved)) ? 'checked' : ''}} value="1"
                       name="confirmed" id="approve{{$loop->iteration}}">
                <label for="approve{{$loop->iteration}}" class="check-box"></label>
                <label for="approve{{$loop->iteration}}" class="check-text">Опубликовать</label>
            </div>
        </div>

        <div>
            <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="{{$block->getImg('background')}}" alt="">

                @if($block->getImg('background')!="/asset/images/mp.png")

                    <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                            data-img="{{ $block->id }}" data-src="ua">x
                    </button>

                @endif
            </div>
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>до 5 Мб</small></span>
                {!! Form::file('path', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>
        </div>
    </div>
</div>


<table>
    <thead>
    <tr>
        <th>ID</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <!--иконка опубликовано  /  нет  -->
        <td class="text__center">{!! $drug->approved ? '<img src="'.asset('assets/admin/imgs/img-yes.svg').'"
                                                             alt="confirm">' : '<img
                src="'.asset('assets/admin/imgs/img-no.svg').'" alt="cancel">' !!}
        </td>
    </tr>
    </tbody>
</table>


<div class="pop-up"><!--попап-->
    <div class="pop-header">
        <h3>Дополнительные сведенья</h3>
        <div class="close"><img src="{{asset('assets/admin/imgs/close-blue.svg')}}" alt="close"></div>
    </div>
    <div class="form-inner">

    </div>
    <div class="info-but">
        <button type="submit" class="btn">Создать</button>
    </div>
</div>

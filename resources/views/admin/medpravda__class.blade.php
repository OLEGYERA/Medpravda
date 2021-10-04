
<div class="breadcrumb">
    <a href="">Препараты</a>
    <span>Препараты edit</span>
</div>
<div class="wrap__block"> <!--белый блок-->
    <h2>Поиск</h2>
    <div class="two__column"><!--две колонки-->

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
        <div class="input__group info-check label-stay"><!--чекбокс-->
            <input type="checkbox" {{ (old('approved') || !empty($tag->approved)) ? 'checked' : ''}} value="1"
            name="confirmed">
            <label for="asd" class="check-box"></label>
            <label for="asd" class="check-text">Опубликовать</label>
        </div>
        <label class="input__file"><!--картинка-->
            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small></small></span>
            {!! Form::file('img', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
        </label>
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

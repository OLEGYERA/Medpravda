<div class="breadcrumb">
    <span>Проблематика добавить</span>
</div>
<div class="wrap__block">
    {!! Form::model($new_object, array('route' => array('problematic.create.with_root.post'),
                                        'class' => 'form-horizontal')) !!}
    <h2>Проблематика добавить</h2>
    <div class="input__group">
        {!! Form::text('title',null, ['class' => 'form-control ru-title', 'id' => 'title']) !!}
        {!! Form::label('title', 'Заголовок') !!}
    </div>
    <div class="input__group">
        {!! Form::text('alias',null, ['class' => 'form-control eng-alias', 'id' => 'alias']) !!}
        {!! Form::label('alias', 'URL') !!}
    </div>
    <div class="checkbox__several"><!--этот див если больше одного чекбокса-->
        <div class="input__group info-check label-stay"><!--чекбокс-->
            {!! Form::checkbox('approved', '1' , '0', ['class' => 'cosmetics-checkbox', 'id' => 'approved_page']) !!}
            <label for="approved_page" class="check-box"></label>
            <label for="approved_page" class="check-text">Публикация</label>
        </div>
        <div class="input__group info-check label-stay"><!--чекбокс-->
            {!! Form::checkbox('root_page', '1' , '0', ['class' => 'cosmetics-checkbox', 'id' => 'root_page']) !!}
            <label for="root_page" class="check-box"></label>
            <label for="root_page" class="check-text">Каталог</label>
        </div>
    </div>

    <h3>Контент статьи</h3>
    {!! Form::textarea('content', null , ['class' => 'form-control editor']) !!}
    {!! Form::hidden('root_id', $root_id) !!}


    {!! Form::submit('Создать', ['class' => 'btn btn__full']) !!}
    {!! Form::close() !!}
</div>
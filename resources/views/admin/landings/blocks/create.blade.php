<a class="btn btn-blue" href="{{route('landing_block_create_slider', [$landing->id, 'loc' => $loc])}}">Назад</a>
<h1>Создание блока для лендинга - {{ $landing->title }}</h1>


{{ Form::open(['url'=>route('landing_block_store',
                ['landing_id' => $landing->id, 'loc' => $loc])],
                 ['method'=>'post', 'class' => 'form-horizontal']
                 ) }}

<div class="bads-general">
    <div >
        {{ Form::text('title', null, ['class'=>'form-control', 'placeholder' => 'Название Блока',]) }}
        {{ Form::label('title', 'Название') }}
        <span class="help-block">(до 255 символов)</span>
    </div>
    <div >
        <span class="help-block">Тип - ( 1-10 )</span>
        {{ Form::selectRange('source', 1, 11, null, ['class'=>'select-normal']) }}
        {{ Form::label('source', 'Тип блока') }}
    </div>
    <div >
        <span class="help-block">Расположение в лендинге ( 1-100 )</span>
        {{ Form::selectRange('position', 1, 100, null, ['class'=>'select-normal']) }}
        {{ Form::label('position', 'Позиция') }}
    </div>
    <div >
        {{ Form::checkbox('approved', true, null, ['class'=>'cosmetics-checkbox'] ) }}
        {{ Form::label('approved', 'Опубликовать', ['class'=>'cosmetics-checkbox-label'] ) }}
        <span class="help-block">Отображать \ Поставить на паузу</span>
    </div>
    <div >
        {{ Form::checkbox('banner', true, null, ['class'=>'cosmetics-checkbox'] ) }}
        {{ Form::label('banner', 'Баннер', ['class'=>'cosmetics-checkbox-label']) }}
        <span class="help-block">Показать баннер в данном блоке \ Скрыть</span>
    </div>
    <div style="width: 200px;">
        {{ Form::submit('Сохранить', ['class'=>'btn btn-blue']) }}
    </div>
</div>
{{ Form::close() }}
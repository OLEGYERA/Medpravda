<div class="breadcrumb">
    <span>Создание Лендинга</span>
</div>

{!! Form::open(['url'=>route('landing.store'),
                    'method' => 'post', 'class' => 'form-horizontal']) !!}
<div class="wrap__block">
    <h2>Создание Лендинга</h2>
    <div class="two__column">
        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('title', null,
                            ['placeholder' => 'Название Лендинга', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
            {{ Form::label('title', 'Название') }}
        </div>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('slug', null , ['placeholder'=>'nazvanie', 'id'=>'slug', 'class'=>'form-control eng-alias']) !!}
            {{ Form::label('slug', 'URL страницы') }}
        </div>
    </div>
    {!! Form::button('Добавить', ['class' => 'btn btn__full','type'=>'submit']) !!}
</div>

{!! Form::close() !!}
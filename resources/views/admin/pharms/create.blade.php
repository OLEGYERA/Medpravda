<div class="breadcrumb">
    <span>Создание фармгруппы</span>
</div>

{!! Form::open(['url' => route('PharmGroup_add'), 'class'=>'form-horizontal','method'=>'POST' ]) !!}
<div class="wrap__block">
    <div class="input__group">
        {!! Form::text('title', old('title') ? : '',
                        ['placeholder'=>'Средства, влияющие на...', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
        {{ Form::label('title', 'Название') }}
    </div>

    <div class="input__group">
        {!! Form::text('utitle', old('utitle') ? : '',
                        ['placeholder'=>'farm', 'id'=>'utitle', 'class'=>'form-control']) !!}
        {{ Form::label('utitle', 'UA-Название') }}
    </div>
</div>
    <div class="input__group">
        {!! Form::text('alias', (old('alias') ?? ''),
            ['placeholder' => 'ЧПУ', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('alias', 'ЧПУ') }}
    </div>

<div class="">
    {!! Form::button('Создать', ['class' => 'btn btn__full','type'=>'submit']) !!}
</div>

{!! Form::close() !!}
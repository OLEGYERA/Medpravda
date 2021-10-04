<div class="breadcrumb">
    <span>Редактирование международного названия</span>
</div>

<div class="wrap__block">
    <h2>{{ $inn->title ?? '' }}</h2>
    {!! Form::open(['url' => route('inn_update',['inn'=> $inn->id]), 'class'=>'form-horizontal','method'=>'POST' ]) !!}

    <div class="input__group">
        {!! Form::text('title', old('title') ? : ($inn->title ?? ''),
                            ['placeholder'=>'Средства, влияющие на...', 'id'=>'title', 'class'=>'form-control']) !!}
        {{ Form::label('title', 'Название') }}
    </div>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('name', old('name') ? : ($inn->name ?? ''),
                            ['placeholder'=>'farm', 'id'=>'name', 'class'=>'form-control']) !!}
            {{ Form::label('name', 'RU-Название') }}
        </div>
        <div class="input__group">
            {!! Form::text('uname', old('uname') ? : ($inn->uname ?? ''),
                            ['placeholder'=>'farm', 'id'=>'uname', 'class'=>'form-control']) !!}

            {{ Form::label('uname', 'UA-Название') }}
        </div>
    </div>
    <div>
        {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}

</div>




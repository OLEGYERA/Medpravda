<div class="breadcrumb">
    <span>Редактирование действующего вещества</span>
</div>

<div class="wrap__block">
    <h2>{{ $substance->title ?? '' }}</h2>
    {!! Form::open(['url' => route('substance_update',['substance'=> $substance->id]), 'class'=>'form-horizontal','method'=>'POST' ]) !!}

    <div class="input__group">
        {!! Form::text('title', old('title') ? : ($substance->title ?? ''),
                        ['placeholder'=>'Средства, влияющие на...', 'id'=>'title', 'class'=>'form-control']) !!}
        {{ Form::label('title', 'Название') }}
    </div>
    <div class="input__group">
        {!! Form::text('utitle', old('utitle') ? : ($substance->utitle ?? ''),
                        ['placeholder'=>'farm', 'id'=>'utitle', 'class'=>'form-control']) !!}
        {{ Form::label('utitle', 'UA-Название') }}
    </div>

    <div class="">
        {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>
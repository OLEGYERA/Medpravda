<div class="breadcrumb">
    <span>Редактирование производителей:</span>
</div>


{!! Form::open(['url' => route('fabricator_update',['fabricator'=> $fabricator->id]), 'class'=>'form-horizontal','method'=>'POST' ]) !!}

<div class="wrap__block">
    <h2>Производитель : {{ $fabricator->title ?? '' }}</h2>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('title', old('title') ? : ($fabricator->title ?? ''),
                                    ['placeholder'=>'Средства, влияющие на...', 'id'=>'title', 'class'=>'form-control']) !!}
            {{ Form::label('title', 'Название') }}
        </div>

        <div class="input__group">
            {!! Form::text('utitle', old('utitle') ? : ($fabricator->utitle ?? ''),
                                    ['placeholder'=>'farm', 'id'=>'utitle', 'class'=>'form-control']) !!}
            {{ Form::label('utitle', 'UA-Название') }}
        </div>
    </div>
    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}

</div>
{!! Form::close() !!}
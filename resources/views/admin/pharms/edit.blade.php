<div class="breadcrumb">
    <span>Редактирование фармгруппы</span>
</div>


<div class="wrap__block">
    <h2>Фармгруппа: {{ $pharm->title ?? '' }}</h2>

    {!! Form::open(['url' => route('pharm_update',['pharm'=> $pharm->id]), 'class'=>'form-horizontal','method'=>'POST' ]) !!}
    <div class="two__column">
        <div class="input__group">

            {!! Form::text('title', old('title') ? : ($pharm->title ?? ''),
                                ['placeholder'=>'Средства, влияющие на...', 'id'=>'title', 'class'=>'form-control']) !!}
            {{ Form::label('title', 'Название') }}
        </div>
        <div class="input__group">
            {!! Form::text('utitle', old('utitle') ? : ($pharm->utitle ?? ''),
                                ['placeholder'=>'farm', 'id'=>'utitle', 'class'=>'form-control']) !!}
            {{ Form::label('utitle', 'UA-Название') }}

        </div>
    </div>
    <div>
        {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>



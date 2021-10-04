<div class="breadcrumb">
    <span>ATX</span>
</div>


<div class="wrap__block">
    <h2>Поиск</h2>
    {!! Form::open(['url' => route('atx_admin'), 'class'=>'form-horizontal','method'=>'POST' ]) !!}
    <div class="input__group">
        {!! Form::text('atx', old('atx') ? : '' ,
                    ['placeholder'=>'A01...', 'id'=>'atx', 'class'=>'form-control', 'required'=>'required']) !!}
        {{ Form::label('atx', 'Наименование классификации') }}
    </div>
    {!! Form::button('Поиск', ['class' => 'btn btn__full','type'=>'submit']) !!}
    {!! Form::close() !!}

</div>



@if(!empty($class))
    <div class="wrap__block">
        <h3>{{ $class->class }}</h3>
        <div>
            {!! Form::open(['url' => route('atx_update',['atx'=> $class->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
            {!! Form::button('Редактировать', ['class' => 'btn btn__full','type'=>'submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endif

<script>
    document.title = "Med-Pravda : ATX";
</script>
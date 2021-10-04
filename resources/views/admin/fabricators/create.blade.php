<div class="breadcrumb">
    <span>{{ $title }}</span>
</div>

{!! Form::open(['url'=>route('fabricator_create'), 'method'=>'post', 'class'=>'form-horizontal']) !!}
<div class="wrap__block">
    <h2>{{ $title }}</h2>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('title', (old('title') ?? ''),
                        ['placeholder' => 'Название организации', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
            {{ Form::label('title', 'Название') }}
        </div>

        <div class="input__group">
            {!! Form::text('utitle', (old('utitle') ?? ''),
                ['placeholder' => 'UA-название организации', 'id'=>'utitle', 'class'=>'form-control']) !!}
            {{ Form::label('utitle', 'UA-Название') }}
        </div>
    </div>
    <div class="input__group">
        {!! Form::text('alias', (old('alias') ?? ''),
                    ['placeholder' => 'URL', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('alias', 'URL') }}
    </div>
    {!! Form::button('Создать', ['class' => 'btn btn__full','type'=>'submit']) !!}
</div>
{!! Form::close() !!}


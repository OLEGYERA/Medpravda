<div class="breadcrumb">
    <a href="{{route('bads.index')}}">диетические добавки</a>
    <span>Создание классификации</span>
</div>

@include('admin.bads.nav')


{{ Form::open(['route'=>'badclassification.store', 'class' => 'form-create']) }}

<div class="wrap__block">
    <h2>Классификация диетической добавки</h2>
    <div class="two__column"><!--две колонки-->
        <div class="input__group">
            {{ Form::text('name', null, ['placeholder'=>'Диетические добавки', 'id'=>'name', 'class'=>'form-control']) }}
            {{ Form::label('name', 'RU-название') }}
        </div>

        <div class="input__group">
            {{ Form::text('uname', null, ['placeholder'=>'Диетические добавки', 'id'=>'uname', 'class'=>'form-control']) }}
            {{ Form::label('uname', 'UA-название') }}
        </div>

        <div class="input__group">
            {{ Form::text('class', null, ['placeholder'=>'1.01', 'id'=>'class', 'class'=>'form-control']) }}
            {{ Form::label('class', 'Классификация') }}
        </div>

        <div class="input__group label-stay">
            {{Form::select('parent',
                  $parents,
                  null,
                  ['class' => 'form-control', 'placeholder' => 'Выберите классификацию...', 'class' => 'custom-select sources'])
              }}
            {{ Form::label('parent', 'Родительская классификация') }}
        </div>
    </div>
</div>


@include('layouts.seo')

{{ Form::submit('Создать', ['class'=>'btn btn__full']) }}


{{ Form::close() }}
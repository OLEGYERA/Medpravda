<div class="breadcrumb">
    <a href="{{route('bads.index')}}">диетические добавки</a>
    <span>Редактирование классификации : {{$classification->name}} </span>
</div>
@include('admin.bads.nav')


{{ Form::open(['url'=>route('badclassification.update', $classification->id), 'method'	=>	'put', 'class' => 'form-search']) }}

<div class="wrap__block">
    <h2>Добавить</h2>
    <div class="two__column"><!--две колонки-->
        <div class="input__group">
            {{ Form::text('name', $classification->name, ['placeholder'=>'Диетические добавки', 'id'=>'name', 'class'=>'form-control']) }}
            {{ Form::label('name', 'RU-название') }}
        </div>

        <div class="input__group">
            {{ Form::text('uname', $classification->uname, ['placeholder'=>'Диетические добавки', 'id'=>'uname', 'class'=>'form-control']) }}
            {{ Form::label('uname', 'UA-название') }}
        </div>

        <div class="input__group">
            {{ Form::text('class', $classification->class, ['placeholder'=>'1.01', 'id'=>'class', 'class'=>'form-control']) }}
            {{ Form::label('class', 'Классификация') }}
        </div>

        <div class="input__group label-stay">
            {{Form::select('parent',
                      $parents,
                      $classification->parent,
                      ['class' => 'form-control form-control custom-select sources', 'placeholder' => 'Выберите классификацию...'])
                  }}
            {{ Form::label('parent', 'Родительская классификация') }}
        </div>
    </div>
</div>

@include('layouts.seo')

<div style="width: 300px">
    {{ Form::submit('Сохранить', ['class'=>'btn btn__full']) }}
    {{ Form::close() }}
</div>
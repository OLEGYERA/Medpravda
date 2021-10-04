<div class="breadcrumb">
    <a href="{{url('admin/cosmetics')}}">Косметические средства</a>
    <span>Редактирование классификации : {{$classification->name}} </span>
</div>

@include('admin.cosmetics.nav')

{{ Form::open(['url'=>route('cosmetical-classification.update', $classification->id), 'method'	=>	'put']) }}

<div class="wrap__block">
    <h2>Редактирование классификации : {{$classification->name}} </h2>
    <div class="input__group"><!--обычный инпут-->
        {{ Form::text('name', $classification->name, ['placeholder'=>'Диетические добавки', 'id'=>'name', 'class'=>'form-control']) }}
        {{ Form::label('name', 'RU-название') }}
    </div>

    <div class="input__group"><!--обычный инпут-->
        {{ Form::text('uname', $classification->uname, ['placeholder'=>'Диетические добавки', 'id'=>'uname', 'class'=>'form-control']) }}
        {{ Form::label('uname', 'UA-название') }}
    </div>

    <div class="input__group"><!--обычный инпут-->
        {{ Form::text('class', $classification->class, ['placeholder'=>'1.01', 'id'=>'class', 'class'=>'form-control']) }}
        {{ Form::label('class', 'Классификация') }}
    </div>

    <div class="input__group label-stay"><!--обычный инпут-->
        {{Form::select('parent',
              	$parents,
              	$classification->parent,
              	['class' => 'custom-select sources', 'placeholder' => 'Выберите классификацию...'])
              }}
        {{ Form::label('parent', 'Родительская классификация') }}
    </div>
</div>
@include('layouts.seo')


{{ Form::submit('Сохранить', ['class'=>'btn btn__full']) }}
{{ Form::close() }}
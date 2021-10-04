<div class="breadcrumb">
   <a href="{{url('admin/cosmetics')}}">Косметические средства</a>
    <span>Создание классификации</span>
</div>

@include('admin.cosmetics.nav')



{{ Form::open(['route'=>'cosmetical-classification.store', 'class' => 'form-create']) }}
<div class="wrap__block">
        <h2>Классификация диетической добавки</h2>

    <div class="input__group"><!--обычный инпут-->
        {{ Form::text('name', null, ['placeholder'=>'Диетические добавки', 'id'=>'name', 'class'=>'form-control']) }}
        {{ Form::label('name', 'RU-название') }}
    </div>

    <div class="input__group"><!--обычный инпут-->
        {{ Form::text('uname', null, ['placeholder'=>'Диетические добавки', 'id'=>'uname', 'class'=>'form-control']) }}
        {{ Form::label('uname', 'UA-название') }}
    </div>

    <div class="input__group"><!--обычный инпут-->
        {{ Form::text('class', null, ['placeholder'=>'1.01', 'id'=>'class', 'class'=>'form-control']) }}
        {{ Form::label('class', 'Классификация') }}
    </div>

    <div class="input__group label-stay"><!--обычный инпут-->
            {{Form::select('parent',
              	$parents,
              	null,
              	['class' => 'form-control', 'placeholder' => 'Выберите классификацию...', 'class' => 'custom-select sources'])
              }}
        {{ Form::label('parent', 'Родительская классификация') }}
    </div>
</div>
@include('layouts.seo')
<div style="width: 300px">
    {{ Form::submit('Создать', ['class'=>'btn btn__full']) }}
    {{ Form::close() }}
</div>
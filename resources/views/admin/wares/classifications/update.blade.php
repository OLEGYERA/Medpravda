<div class="breadcrumb">
    <span>Редактирование классификации</span>
</div>

@include('admin.wares.nav')
<div class="wrap__block"> <!--белый блок-->
    <h2>Редактирование классификации</h2>
    <div class="two__column">
        <div class="input__group"><!--обычный инпут-->
            {{ Form::open(['url'=>route('ware-classification.update', $classification->id), 'method'	=>	'put']) }}
            {{ Form::label('name', 'RU-название') }}
        </div>
        <div class="input__group"><!--обычный инпут-->
            {{ Form::text('name', $classification->name, ['placeholder'=>'Диетические добавки', 'id'=>'name', 'class'=>'form-control']) }}
            {{ Form::label('uname', 'UA-название') }}
        </div>
        <div class="input__group"><!--обычный инпут-->
            {{ Form::text('uname', $classification->uname, ['placeholder'=>'Диетические добавки', 'id'=>'uname', 'class'=>'form-control']) }}
            {{ Form::label('class', 'Классификация') }}
        </div>
        <div class="input__group"><!--обычный инпут-->
            {{ Form::text('class', $classification->class, ['placeholder'=>'1.01', 'id'=>'class', 'class'=>'form-control']) }}
            {{ Form::label('parent', 'Родительская классификация') }}
        </div>
        <div class="input__group label-stay"><!--обычный инпут-->
            {{Form::select('parent',
                              $parents,
                              $classification->parent,
                              ['class' => 'custom-select', 'placeholder' => 'Выберите классификацию...'])
                          }}
        </div>
    </div>
</div>
@include('layouts.seo')
<div>
    {{ Form::submit('Сохранить', ['class'=>'btn btn__full']) }}
    {{ Form::close() }}
</div>
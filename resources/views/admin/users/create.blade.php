<div class="breadcrumb">
    <a href="{{url('admin/users')}}">Пользователи</a>
    <span>Создание пользователя</span>
</div>

{!! Form::open(['url'=>route('users_create'), 'class'=>'form-create', 'method'=>'post']) !!}
<div class="wrap__block">
    <h2>Новый пользователь</h2>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('name', old('name') ? : '', ['class'=>'form-control', 'required'=>'required']) !!}
            {!! Form::label('name', 'Имя') !!}
        </div>

        <div class="input__group">
            {!! Form::email('email', old('email') ? : '', ['class'=>'form-control', 'required'=>'required']) !!}
            {!! Form::label('email', 'Электронная почта') !!}
        </div>

        <div class="input__group">
            {!! Form::password('password', ['class' => 'form-control']) !!}
            {!! Form::label('pass', 'Пароль') !!}
        </div>

        <div class="input__group">
            {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
            {!! Form::label('class', 'Подтверждение пароля') !!}
        </div>
    </div>
    <h3>Роль</h3>
    <div class="checkbox__several"><!--этот див если больше одного чекбокса-->
        @foreach($roles as $id=>$role)
            <div class="input__group info-check label-stay"><!--чекбокс-->
                <input type="radio" {{ $id == old('role') ? 'checked' : '' }} value="{{ $id }}"
                       name="role" id="{{ $role }}">
                <label for="{{ $role }}" class="check-box"></label>
                <label for="{{ $role }}" class="check-text">{{ $role }}</label>
            </div>

        @endforeach
    </div>
    {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
</div>
{!! Form::close() !!}


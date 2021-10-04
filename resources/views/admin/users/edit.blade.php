<div class="breadcrumb">
    <a href="{{url('admin/users')}}">Пользователи</a>
    <span>
        Редактирование пользователя
    </span>
</div>


<div class="wrap__block">
        <h2>Редактирование пользователя: {{$user->email}}</h2>

    {!! Form::open(['url' => route('users_update', $user->id), 'class'=>'form-create','method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

    <div class="two__column">
    <div class="input__group">
        {!! Form::text('name', old('name') ? : $user->name, ['class'=>'form-control', 'required'=>'required']) !!}
        {!! Form::label('name', 'Имя') !!}
    </div>
    <div class="input__group">
        {!! Form::email('email', old('email') ? : $user->email, ['class'=>'form-control', 'required'=>'required']) !!}
        {!! Form::label('email', 'Электронная почта') !!}
    </div>
    <div class="input__group">
        {!! Form::password('password') !!}
        {!! Form::label('pass', 'Пароль') !!}
    </div>
    <div class="input__group">
        {!! Form::password('password_confirmation') !!}
        {!! Form::label('cpass', 'Подтверждение пароля') !!}
    </div>

    </div>
        <h3>{!! Form::label('role', 'Роль') !!}</h3>

    <div class="checkbox__several"><!--этот див если больше одного чекбокса-->
    @foreach($roles as $id=>$role)
        @if($user->role_id == $id)
                <div class="input__group info-check label-stay"><!--чекбокс-->
                    <input checked type="radio" {{ $id == old('role') ? 'checked' : '' }} value="{{ $id }}"
                           name="role" id="{{ $role }}">
                    <label for="{{ $role }}" class="check-box"></label>
                    <label for="{{ $role }}" class="check-text">{{ $role }}</label>
                </div>

        @else
                <div class="input__group info-check label-stay"><!--чекбокс-->
                    <input type="radio" {{ $id == old('role') ? 'checked' : '' }} value="{{ $id }}"
                           name="role" id="{{ $role }}">
                    <label for="{{ $role }}" class="check-box"></label>
                    <label for="{{ $role }}" class="check-text">{{ $role }}</label>
                </div>
        @endif
    @endforeach
    </div>
    <div>
        {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>

<!-- END CONTENT -->
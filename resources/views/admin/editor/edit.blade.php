<div class="breadcrumb">
    <a href="{{route('editor_all')}}">Редакторы</a>
    <span>Редактирование Редактора</span>
</div>
{!! Form::open(['url'=>route('editor_edit', ['id' => $editor->id]),
                    'method' => 'post', 'class' => 'form-create', 'files'=>true, 'novalidate' => true]) !!}

<div class="wrap__block two__column flex__center" style="flex-direction: column; justify-content: flex-start; align-items: flex-start">
    <div>
        <h2>ФИО Редактора</h2>
    </div>
    <div style="display: flex; justify-content: space-between; width: 100%;">
        <div class="input__group" style="width: 30%;">
            {!! Form::text('first_name', old('first_name') ? : $editor->first_name,
                    ['placeholder' => 'Имя', 'id'=>'first_name', 'class'=>'form-control']) !!}
            {{ Form::label('first_name', 'Имя') }}
        </div>
        <div class="input__group" style="width: 30%;">
            {!! Form::text('middle_name', old('middle_name') ? : $editor->middle_name,
                    ['placeholder' => 'Отчество', 'id'=>'middle_name', 'class'=>'form-control']) !!}
            {{ Form::label('middle_name', 'Отчество') }}
        </div>
        <div class="input__group" style="width: 30%;">
            {!! Form::text('last_name', old('last_name') ? : $editor->last_name,
                    ['placeholder' => 'Фамилия', 'id'=>'last_name', 'class'=>'form-control']) !!}
            {{ Form::label('last_name', 'Фамилия') }}
        </div>
    </div>
    <div>
        <h2>Фото</h2>
    </div>
    <div style="display: flex;">
        <label class="input__file">
            <span class="btn" data-default='Загрузить фото'>Загрузить фото</span>
            {!! Form::file('author_img', ['accept'=>'image/*', 'class'=>'file', 'id' => 'author_img']) !!}
        </label>
        <img src="{{asset('storage/editors/' . $editor->author_img)}}" style="margin-left: 100px; width: 350px; min-height: 60px;">
    </div>
    <hr>
    <div>
        <h2>Область направления редактора</h2>
    </div>
    <div style="display: flex; justify-content: space-between; width: 100%;">
        <div class="input__group" style="width: 30%;">
            {!! Form::text('specialty', old('specialty') ? : $editor->specialty,
                    ['placeholder' => 'Специальность', 'id'=>'specialty', 'class'=>'form-control']) !!}
            {{ Form::label('specialty', 'Специальность') }}
        </div>
        <div class="input__group" style="width: 30%;">
            {!! Form::text('specialization', old('specialization') ? : $editor->specialization,
                    ['placeholder' => 'Специализация', 'id'=>'specialization', 'class'=>'form-control']) !!}
            {{ Form::label('specialization', 'Специализация') }}
        </div>
        <div class="input__group" style="width: 30%;">
            <label for="academic_degree" class='form-control' style="position: relative; top: 0; margin-right: 10px;">Ученая степень</label>
            <select name="academic_degree" id="academic_degree" class='form-control' style="margin-top: 20px;">
                @if(old('academic_degree'))
                    @switch(old('academic_degree'))
                        @case(0)
                        <option value="0" selected>Отсутсвует</option>
                        <option value="1">Кандидат медицинских наук</option>
                        <option value="2">Доктор медицинских наук</option>
                        @break
                        @case(1)
                        <option value="0">Отсутсвует</option>
                        <option value="1" selected>Кандидат медицинских наук</option>
                        <option value="2">Доктор медицинских наук</option>
                        @break
                        @case(2)
                        <option value="0">Отсутсвует</option>
                        <option value="1">Кандидат медицинских наук</option>
                        <option value="2" selected>Доктор медицинских наук</option>
                        @break
                    @endswitch
                @else
                    @switch($editor->academic_degree)
                        @case(0)
                        <option value="0" selected>Отсутсвует</option>
                        <option value="1">Кандидат медицинских наук</option>
                        <option value="2">Доктор медицинских наук</option>
                        @break
                        @case(1)
                        <option value="0">Отсутсвует</option>
                        <option value="1" selected>Кандидат медицинских наук</option>
                        <option value="2">Доктор медицинских наук</option>
                        @break
                        @case(2)
                        <option value="0">Отсутсвует</option>
                        <option value="1">Кандидат медицинских наук</option>
                        <option value="2" selected>Доктор медицинских наук</option>
                        @break
                    @endswitch
                @endif
            </select>
        </div>
    </div>
    <div>
        <h2>Регион</h2>
    </div>
    <div style="display: flex; justify-content: space-between; width: 100%;">
        <div class="input__group" style="width: 100%;">
            {!! Form::text('place', old('place') ? : $editor->place,
                    ['placeholder' => 'Регион', 'id'=>'place', 'class'=>'form-control']) !!}
            {{ Form::label('place', 'Регион') }}
        </div>
    </div>
    <div>
        <h2>Образование</h2>
    </div>
    <div style="display: flex;">
        <label class="input__file">
            <span class="btn" data-default='Загрузить фото'>Загрузить фото</span>
            {!! Form::file('education_img', ['accept'=>'image/*', 'class'=>'file', 'id' => 'author_img']) !!}
        </label>
        <img src="{{asset('storage/editors/' . $editor->education_img)}}" style="margin-left: 100px; width: 350px; min-height: 60px;">
    </div>
    <hr>
    <div>
        <h2>Общие сведения</h2>
    </div>
    <div>
        <textarea name="about" cols="60" rows="10">{{old('about') ?? $editor->about}}</textarea>
    </div>
    <hr>
    <div style="display: flex; justify-content: space-between; width: 100%; flex-wrap: wrap">
        <div class="input__group" style="width: 30%;">
            {!! Form::number('experience', old('experience') ? : $editor->experience,
                    ['placeholder' => 'Стаж работы', 'id'=>'experience', 'class'=>'form-control']) !!}
            {{ Form::label('experience', 'Стаж работы') }}
        </div>
        <div class="input__group" style="width: 30%;">
            {!! Form::text('author_1', old('author_1') ? : $editor->author_1,
                    ['placeholder' => 'Ссылка на авторство статей', 'id'=>'author_1', 'class'=>'form-control']) !!}
            {{ Form::label('author_1', 'Ссылка на авторство статей') }}
        </div>
        <div class="input__group" style="width: 30%;">
            {!! Form::text('author_2', old('author_2') ? : $editor->author_2,
                    ['placeholder' => 'Ссылка на авторство статей', 'id'=>'author_2', 'class'=>'form-control']) !!}
            {{ Form::label('author_2', 'Ссылка на авторство статей') }}
        </div>
        <div class="input__group" style="width: 48%;">
            {!! Form::text('author_3', old('author_3') ? : $editor->author_3,
                    ['placeholder' => 'Ссылка на авторство статей', 'id'=>'author_3', 'class'=>'form-control']) !!}
            {{ Form::label('author_3', 'Ссылка на авторство статей') }}
        </div>
        <div class="input__group" style="width: 48%;">
            {!! Form::text('author_4', old('author_4') ? : $editor->author_4,
                    ['placeholder' => 'Ссылка на авторство статей', 'id'=>'author_4', 'class'=>'form-control']) !!}
            {{ Form::label('author_4', 'Ссылка на авторство статей') }}
        </div>
        <div class="input__group" style="width: 100%;">
            {!! Form::text('section_author', old('section_author') ? :  $editor->section_author,
                    ['placeholder' => 'Автор разделов', 'id'=>'section_author', 'class'=>'form-control']) !!}
            {{ Form::label('section_author', 'Автор разделов') }}
        </div>
    </div>
</div>


<!-- SEO -->
<div>
    {!! Form::button('Добавить', ['class' => 'btn btn__full','type'=>'submit']) !!}
</div>
{!! Form::close() !!}

{{--popup sections--}}




<div class="breadcrumb">
    <a href="{{route('medicine_admin')}}">Редакторы</a>
    <span>Создать Редактора</span>
</div>
{!! Form::open(['url'=>route('editor_create'),
                    'method' => 'post', 'class' => 'form-create', 'files'=>true, 'novalidate' => true]) !!}

<div class="wrap__block two__column flex__center" style="flex-direction: column; justify-content: flex-start; align-items: flex-start">
    <div>
        <h2>ФИО Редактора</h2>
    </div>
    <div style="display: flex; justify-content: space-between; width: 100%;">
        <div class="input__group" style="width: 30%;">
            {!! Form::text('first_name', old('first_name') ? : '',
                    ['placeholder' => 'Имя', 'id'=>'first_name', 'class'=>'form-control']) !!}
            {{ Form::label('first_name', 'Имя') }}
        </div>
        <div class="input__group" style="width: 30%;">
            {!! Form::text('middle_name', old('middle_name') ? : '',
                    ['placeholder' => 'Отчество', 'id'=>'middle_name', 'class'=>'form-control']) !!}
            {{ Form::label('middle_name', 'Отчество') }}
        </div>
        <div class="input__group" style="width: 30%;">
            {!! Form::text('last_name', old('last_name') ? : '',
                    ['placeholder' => 'Фамилия', 'id'=>'last_name', 'class'=>'form-control']) !!}
            {{ Form::label('last_name', 'Фамилия') }}
        </div>
    </div>
    <div>
        <h2>Фото</h2>
    </div>
    <div>
        <label class="input__file">
            <span class="btn" data-default='Загрузить фото'>Загрузить фото</span>
            {!! Form::file('author_img', ['accept'=>'image/*', 'class'=>'file', 'id' => 'author_img']) !!}
        </label>
    </div>
    <hr>
    <div>
        <h2>Область направления редактора</h2>
    </div>
    <div style="display: flex; justify-content: space-between; width: 100%;">
        <div class="input__group" style="width: 30%;">
            {!! Form::text('specialty', old('specialty') ? : '',
                    ['placeholder' => 'Специальность', 'id'=>'specialty', 'class'=>'form-control']) !!}
            {{ Form::label('specialty', 'Специальность') }}
        </div>
        <div class="input__group" style="width: 30%;">
            {!! Form::text('specialization', old('specialization') ? : '',
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
                    <option value="0" selected>Отсутсвует</option>
                    <option value="1">Кандидат медицинских наук</option>
                    <option value="2">Доктор медицинских наук</option>
                @endif
            </select>
        </div>
    </div>
    <div>
        <h2>Регион</h2>
    </div>
    <div style="display: flex; justify-content: space-between; width: 100%;">
        <div class="input__group" style="width: 100%;">
            {!! Form::text('place', old('place') ? : 'г. Киев, Украина',
                    ['placeholder' => 'Регион', 'id'=>'place', 'class'=>'form-control']) !!}
            {{ Form::label('place', 'Регион') }}
        </div>
    </div>
    <div>
        <h2>Образование</h2>
    </div>
    <div>
        <label class="input__file">
            <span class="btn" data-default='Загрузить документ'>Загрузить документ</span>
            {!! Form::file('education_img', ['accept'=>'image/*', 'class'=>'file', 'id' => 'education_img']) !!}
        </label>
    </div>
    <hr>
    <div>
        <h2>Общие сведения</h2>
    </div>
    <div>
        <textarea name="about" cols="60" rows="10">{{old('about')}}</textarea>
    </div>
    <hr>
    <div style="display: flex; justify-content: space-between; width: 100%; flex-wrap: wrap">
        <div class="input__group" style="width: 30%;">
            {!! Form::number('experience', old('experience') ? : '',
                    ['placeholder' => 'Стаж работы', 'id'=>'experience', 'class'=>'form-control']) !!}
            {{ Form::label('experience', 'Стаж работы') }}
        </div>
        <div class="input__group" style="width: 30%;">
            {!! Form::text('author_1', old('author_1') ? : '',
                    ['placeholder' => 'Ссылка на авторство статей', 'id'=>'author_1', 'class'=>'form-control']) !!}
            {{ Form::label('author_1', 'Ссылка на авторство статей') }}
        </div>
        <div class="input__group" style="width: 30%;">
            {!! Form::text('author_2', old('author_2') ? : '',
                    ['placeholder' => 'Ссылка на авторство статей', 'id'=>'author_2', 'class'=>'form-control']) !!}
            {{ Form::label('author_2', 'Ссылка на авторство статей') }}
        </div>
        <div class="input__group" style="width: 48%;">
            {!! Form::text('author_3', old('author_3') ? : '',
                    ['placeholder' => 'Ссылка на авторство статей', 'id'=>'author_3', 'class'=>'form-control']) !!}
            {{ Form::label('author_3', 'Ссылка на авторство статей') }}
        </div>
        <div class="input__group" style="width: 48%;">
            {!! Form::text('author_4', old('author_4') ? : '',
                    ['placeholder' => 'Ссылка на авторство статей', 'id'=>'author_4', 'class'=>'form-control']) !!}
            {{ Form::label('author_4', 'Ссылка на авторство статей') }}
        </div>
        <div class="input__group" style="width: 100%;">
            {!! Form::text('section_author', old('author_4') ? : '',
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




<div class="valid-errors"></div>

{!! Form::open(['url'=>route('modal.update', ['modal' => $modal->id, 'loc' => $loc]),
                    'method' => 'post', 'class' => 'form-horizontal modals-form']) !!}

<div class="wrap__block">
    <div class="two__column">
        <div><h2>Окно приветствия</h2></div>
        <div>
            <div class="help__block" id="panelPrecios">
                <button class="btn btn-blue" data-toggle="tooltip" title="<img src='/landing/img/modal.png'/>">?
                </button>
            </div>
        </div>
    </div>

    <hr>
    <h3>Кнопка №1</h3>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('button1[color]', $modal->button1['color'] ?? null,
                            ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button1[color]', 'Цвет текста кнопки (0-9abcdf)') }}
        </div>
        <div class="input__group">
            {!! Form::text('button1[background]', $modal->button1['background'] ?? null,
                            ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button1[background]', 'Цвет кнопки (0-9abcdf)') }}
        </div>
        <div class="input__group">
            {!! Form::text('button1[text]', $modal->button1['text'] ?? null,
                            ['placeholder' => 'Перейти', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button1[text]', 'Текст кнопки (до 255 символов') }}
        </div>
        <div class="input__group label-stay">
            {{ Form::selectRange('button1[style]',
                1, 10,
                $modal->button1['style']??null,
                ['class' => 'custom-select'])
            }}
            {{ Form::label('button1[style]', 'Основной стиль (1-10)') }}
        </div>
        <div class="input__group">
            {!! Form::text('button1[url]', $modal->button1['url'] ?? null,
                            ['placeholder' => 'url', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button1[url]', 'url') }}
        </div>
        <div class="input__group">
            {!! Form::text('button1[description]', $modal->button1['description'] ?? null,
                            ['placeholder' => 'description', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button1[description]', 'Описание (до 255 символов)') }}
        </div>
    </div>
    <hr>
    <h3>Кнопка №2</h3>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('button2[color]', $modal->button2['color'] ?? null,
                            ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button2[color]', 'Цвет текста кнопки (0-9abcdf)') }}
        </div>
        <div class="input__group">
            {!! Form::text('button2[background]', $modal->button2['background'] ?? null,
                            ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button2[background]', 'Цвет кнопки (0-9abcdf)') }}
        </div>
        <div class="input__group">
            {!! Form::text('button2[text]', $modal->button2['text'] ?? null,
                            ['placeholder' => 'Перейти', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button2[text]', 'Текст кнопки (до 255 символов)') }}
        </div>
        <div class="input__group label-stay">
            {{ Form::selectRange('button2[style]',
                1, 10,
                $modal->button2['style']??null,
                ['class' => 'custom-select'])
            }}
            {{ Form::label('button2[style]', 'Основной стиль (1-10)') }}
        </div>
        <div class="input__group">
            {!! Form::text('button2[url]', $modal->button2['url'] ?? null,
                            ['placeholder' => 'url', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button2[url]', 'url') }}
        </div>
        <div class="input__group">
            {!! Form::text('button2[description]', $modal->button2['description'] ?? null,
                            ['placeholder' => 'description', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button2[description]', 'Описание (до 255 символов)') }}
        </div>
    </div>
    <hr>

    <h3>Заголовок 1</h3>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('title1[title]', $modal->title1['title'] ?? null,
                            ['placeholder' => 'Название', 'id'=>'title1[title]', 'class'=>'form-control']) !!}
            {{ Form::label('title1[title]', 'Заголовок (до 255 символов)') }}
        </div>
        <div class="input__group">
            {!! Form::text('title1[color]', $modal->title1['color'] ?? null,
                        ['placeholder' => 'ddd888', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('color', 'Цвет (0-9abcdf)') }}
        </div>
        <div class="input__group">
            {{ Form::number('title1[size]',
                $modal->title1['size'] ?? 100,
                ['class' => 'landing-number'])
            }}
            {{ Form::label('size', 'Размер шрифта (0-1000%)') }}
        </div>
        <div class="input__group label-stay">
            {{Form::select('title1[style]',
                $fonts,
                $modal->title1['style'] ?? 1,
                ['class' => 'custom-select'])
            }}
            {{ Form::label('title1[style]', 'Шрифт (1-10)') }}
        </div>
    </div>
    <hr>

    <h3>Заголовок 2</h3>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('title2[title]', $modal->title2['title'] ?? null,
                                        ['placeholder' => 'Название', 'id'=>'title2[title]', 'class'=>'form-control']) !!}
            {{ Form::label('title2[title]', 'Заголовок (до 255 символов)') }}
        </div>
        <div class="input__group">
            {!! Form::text('title2[color]', $modal->title2['color'] ?? null,
                        ['placeholder' => 'ddd888', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('color', 'Цвет (0-9abcdf)') }}
        </div>
        <div class="input__group">
            {{ Form::number('title2[size]',
                $modal->title2['size'] ?? 100,
                ['class' => 'landing-number'])
            }}
            {{ Form::label('size', 'Размер шрифта (0-1000%)') }}
        </div>
        <div class="input__group label-stay">
            {{Form::select('title2[style]',
                $fonts,
                $modal->title2['style'] ?? 1,
                ['class' => 'custom-select'])
            }}
            {{ Form::label('title2[style]', 'Шрифт (1-10)') }}
        </div>
    </div>
    <hr>

    <h3>Заголовок 3</h3>
    <div class="two__column">
        <div class="input__group">

            {!! Form::text('title3[title]', $modal->title3['title'] ?? null,
                                        ['placeholder' => 'Название', 'id'=>'title3[title]', 'class'=>'form-control']) !!}
            {{ Form::label('title3[title]', 'Заголовок (до 255 символов)') }}
        </div>
        <div class="input__group">

            {!! Form::text('title3[color]', $modal->title3['color'] ?? null,
                        ['placeholder' => 'ddd888', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('color', 'Цвет (0-9abcdf)') }}
        </div>
        <div class="input__group">
            {{ Form::number('title3[size]',
                $modal->title3['size'] ?? 100,
                ['class' => 'landing-number'])
            }}
            {{ Form::label('size', 'Размер шрифта (0-1000%)') }}
        </div>
        <div class="input__group label-stay">
            {{Form::select('title3[style]',
                $fonts,
                $modal->title3['style'] ?? 1,
                ['class' => 'custom-select'])
            }}
            {{ Form::label('title3[style]', 'Шрифт (1-10)') }}
        </div>
    </div>
    <hr>

    <div class="two__column">
        <div><h3>Список</h3></div>
        <div><div class="add-new">
                <button type="button" class="btn">+</button>
            </div></div>
    </div>

    <div class="panel-body block-to-add">
        @if(!empty($modal->list))
            @foreach($modal->list as $li)
                <div class="two__column">
                    <div class="input__group">
                        {!! Form::text('list[]', $li ?? null,
                                    ['placeholder' => 'Название', 'class'=>'form-control']) !!}
                        {{ Form::label('list[]', 'Список (до 500 символов)') }}
                    </div>
                    <div>
                        <span class="remove-this"><button type="button" class="btn btn__red">-</button></span>
                    </div>

                </div>
            @endforeach
        @endif

    </div>

    {{Form::submit('Сохранить', ['class'=>'btn btn__full'])}}
</div>
{{ Form::close() }}
{{--Cписок--}}
<div class="shablon" style="display:none">
    <div>
        <div class="row">
            {!! Form::text('list[]', null,
                        ['placeholder' => 'Название', 'class'=>'form-control']) !!}
            {{ Form::label('list[]', 'Список') }}
            <span class="help-block">Текст (до 500 символов)</span>
        </div>
        <span class="remove-this"><button type="button" class="btn btn-blue">-</button></span>
    </div>
</div>
{{--Cписок--}}
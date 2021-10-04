<div class="breadcrumb">
    <span>O нас</span>
</div>

@include('admin.static.nav')

@if(is_object($abouts) && $abouts->isNotEmpty())
    <div class="two__column">
        <div class="wrap__block">
            <h2># RU</h2>

            @if('about_admin' == Route::CurrentRouteName())
                {!! Form::open(['url' => route('about_admin'), 'method' => 'post', 'files' => true]) !!}
            @elseif('convention_admin' == Route::CurrentRouteName())
                {!! Form::open(['url' => route('convention_admin'), 'method' => 'post', 'files' => true]) !!}
            @else
                {!! Form::open(['url' => route('conditions_admin'), 'method' => 'post', 'files' => true]) !!}
            @endif

            <div class="input__group">
                {!! Form::text('title', $abouts{0}->title ?? '',
                                             ['placeholder'=>'О портале', 'class'=>'form-control']) !!}
                {{ Form::label('title', 'Заголовок') }}
            </div>
            <div class="input__group">
                {!! Form::text('alt', $abouts{0}->alt ?? '',
                                                                ['placeholder'=>'Alt', 'id'=>'alt', 'class'=>'form-control']) !!}
                {{ Form::label('alt', 'Alt') }}
            </div>

            <div class="input__group">
                {!! Form::text('imgtitle', $abouts{0}->img_title ?? '',
                                                                ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
                {{ Form::label('imgtitle', 'Title') }}
            </div>

            <div class="img__full">
                {{ Html::image(asset('/asset/images/about/ru').'/'.$abouts{0}->path, 'ru picture', array('class' => 'img-thumbnail')) }}
            </div>

            <label class="input__file"><!--картинка-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(1020х660, не более 5Мб)</small></span>
                {!! Form::file('image', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>

            <h3>Текст</h3>
            {{ Form::textarea('text', $abouts{0}->text ?? '', ['placeholder'=>'RU-Text', 'class'=>'form-control editor']) }}
            {{ Form::hidden('loc', 'ru') }}
            {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
        </div>
        {!! Form::close() !!}

        <div class="wrap__block">
            <h2># UA</h2>

            @if('about_admin' == Route::CurrentRouteName())
                {!! Form::open(['url' => route('about_admin'), 'method' => 'post', 'files' => true]) !!}
            @elseif('convention_admin' == Route::CurrentRouteName())
                {!! Form::open(['url' => route('convention_admin'), 'method' => 'post', 'files' => true]) !!}
            @else
                {!! Form::open(['url' => route('conditions_admin'), 'method' => 'post', 'files' => true]) !!}
            @endif

            <div class="input__group">
                {!! Form::text('title', $abouts{1}->title ?? '',
                                             ['placeholder'=>'О портале', 'class'=>'form-control']) !!}
                {{ Form::label('title', 'Заголовок') }}
            </div>
            <div class="input__group">
                {!! Form::text('alt', $abouts{1}->alt ?? '',
                                                                ['placeholder'=>'Alt', 'id'=>'alt', 'class'=>'form-control']) !!}
                {{ Form::label('alt', 'Alt') }}
            </div>

            <div class="input__group">
                {!! Form::text('imgtitle', $abouts{1}->img_title ?? '',
                                                                ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
                {{ Form::label('alt', 'Title') }}
            </div>

            <div class="img__full">
                {{ Html::image(asset('/asset/images/about/ua').'/'.$abouts{1}->path, 'ru picture', array('class' => 'img-thumbnail')) }}
            </div>
            <label class="input__file"><!--картинка-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(1020х660, не более 5Мб)</small></span>
                {!! Form::file('image', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>

            <h3>Текст</h3>
            {{ Form::textarea('text', $abouts{1}->text ?? '', ['placeholder'=>'RU-Text', 'class'=>'form-control editor']) }}

            {{ Form::hidden('loc', 'ua') }}
            {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endif

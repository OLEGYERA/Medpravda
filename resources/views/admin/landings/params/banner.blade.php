<div class="valid-banner-errors"></div>

{!! Form::open(['url'=>route('banner.update', ['banner' => $banner->id, 'loc' => $loc]),
                    'method' => 'post', 'class' => 'form-horizontal banner-form', 'files'=> true]) !!}
<div class="wrap__block">
    <h2>Баннер</h2>
    <hr>
    <h3>Заголовок</h3>
    <div class="two__column">

        <div class="input__group">
            {!! Form::text('title[title]', $banner->title['title'] ?? null,
                            ['placeholder' => 'Название', 'id'=>'title-title', 'class'=>'form-control']) !!}
            {{ Form::label('title-title', 'Название') }}
        </div>
        <div class="input__group">
            {!! Form::text('title[color]', $banner->title['color'] ?? null,
                        ['placeholder' => 'ddd888', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('title[color]', 'Цвет (0-9abcdf') }}
        </div>
        <div class="input__group">
            {{ Form::number('title[size]',
                $banner->title['size'] ?? 100,
                ['class' => 'landing-number'])
            }}
            {{ Form::label('title[size]', 'Размер шрифта (0-1000%)') }}
        </div>
        <div class="input__group label-stay">
            {{Form::select('title[style]',
                $fonts,
                $banner->title['style'] ?? 1,
                ['class' => 'custom-select'])
            }}
            {{ Form::label('title[style]', 'Шрифт (1-10)') }}
        </div>
    </div>
    <hr>
    <h3>Описание</h3>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('description[text]', $banner->description['text'] ?? null,
                            ['placeholder' => 'Текст', 'id'=>'description-text', 'class'=>'form-control']) !!}
            {{ Form::label('description[text]', 'Описание (до 255 символов)') }}
        </div>
        <div class="input__group">
            {!! Form::text('description[color]', $banner->description['color'] ?? null,
                        ['placeholder' => 'ddd888', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('description[color]', 'Цвет (0-9abcdf)') }}
        </div>
        <div class="input__group">
            {{ Form::number('description[size]',
                $banner->description['size'] ?? 100,
                ['class' => 'landing-number'])
            }}
            {{ Form::label('description[size]', 'Размер шрифта (0-1000%)') }}
        </div>
        <div class="input__group label-stay">
            {{Form::select('description[style]',
                $fonts,
                $banner->description['style'] ?? 1,
                ['class' => 'custom-select'])
            }}
            {{ Form::label('description[style]', 'Шрифт (1-10)') }}
        </div>
    </div>
    <hr>
    <h3>Изображение</h3>
    <div class="two__column">
        <div>
            <div class="input__group">
                {{ Form::text('imgalt', $banner->imgalt??null, ['class'=>'form-control']) }}
                {{ Form::label('imgalt', 'Alt (до 255 символов)') }}
            </div>
            <div class="input__group">
                {{ Form::text('imgtitle', $banner->imgtitle??null, ['class'=>'form-control']) }}
                {{ Form::label('imgtitle', 'Title (до 255 символов)') }}
            </div>
        </div>
        <div>
            <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="{{ $banner->getImage() }}" alt=""/>
                @if($banner->image)
                    <button class="btn btn__red delete-landing-image-btn"
                            data-url="{{route('landing-block.remove-img-db')}}" data-source="image"
                            data-id="{{$banner->id}}" data-model="LandingBanner">х
                    </button>
                @endif
            </div>
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>5 Мб, в формате jpg,bmp,png,jpeg</small></span>
                {!! Form::file('image', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>
        </div>
    </div>
    <hr>
    <h3>Заливка</h3>
    <div class="two__column">
        <div>
            <div class="input__group">
                {!! Form::text('background[color]', $banner->background['color'] ?? null,
                             ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control color-background']) !!}
                {{ Form::label('background[color]', 'Основной цвет ( 0-9abcdf )') }}
            </div>
            <div class="input__group">
                {!! Form::text('background[secondarycolor]', $banner->background['secondarycolor'] ?? null,
                             ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control secondarycolor-background']) !!}
                {{ Form::label('background[secondarycolor]', 'Дополнительный цвет ( 0-9abcdf )') }}
            </div>

        </div>
        <div>
            <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="{{$banner->getBgImage()}}" alt="">
                @if($banner->getBgImage()!="/asset/images/mp.png")
                    <button class="btn btn__red delete-landing-image-btn"
                            data-url="{{route('landing-block.remove-img-db')}}" data-source="background"
                            data-id="{{$banner->id}}" data-model="LandingBanner">х
                    </button>
                @endif
            </div>
            <label class="input__file"><!--картинка загузить-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>5 Мб, в формате jpg,bmp,png,jpeg</small></span>
                {!! Form::file('background.image', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>
        </div>
    </div>
    <hr>
    <h2>Кнопка</h2>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('button[color]', $banner->button['color'] ?? null,
                            ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button[color]', 'Цвет текста кнопки (0-9abcdf)') }}
        </div>
        <div class="input__group">
            {!! Form::text('button[background]', $banner->button['background'] ?? null,
                            ['placeholder' => 'ссс999', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button[background]', 'Основной цвет (0-9abcdf)') }}
        </div>
        <div class="input__group label-stay">
            {{ Form::selectRange('button[style]',
                1, 10,
                $banner->button['style'],
                ['class' => 'custom-select'])
            }}
            {{ Form::label('style', 'Основной стиль (1-10)') }}
        </div>
        <div class="input__group">
            {!! Form::text('button[text]', $banner->button['text'] ?? null,
                            ['placeholder' => 'Перейти', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button[text]', 'Текст') }}
        </div>
        <div class="input__group">
            {!! Form::text('button[url]', $banner->button['url'] ?? null,
                            ['placeholder' => 'url', 'id'=> str_random(7), 'class'=>'form-control']) !!}
            {{ Form::label('button[url]', 'url') }}
        </div>
    </div>


    {{Form::submit('Сохранить', ['class'=>'btn btn__full'])}}
</div>
{{ Form::close() }}

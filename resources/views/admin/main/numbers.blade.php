<div class="breadcrumb">
    <span>Цифры на главной</span>
</div>
@include('admin.main.nav')
<div class="two__column"><!--две колонки-->
    @forelse($blocks as $block)
        <div class="wrap__block">
            <h2># {{ strtoupper($block->loc) }}</h2>

            {!! Form::open([
                'url'=>route('numbers', $block->id),
                 'method'=>'post',
                  'class'=>'form-topic',
                  'files' => true
                  ]) !!}


            <div class="input__group">
                {!! Form::text('description', $block->description ?? null,
                 ['placeholder'=>'Описание', 'class'=>'form-control']) !!}
                {{ Form::label('description', 'Заголовок. Обязательное поле(255 символов)') }}
            </div>


            <div class="input__group">
                {!! Form::number('nums', $block->nums ?? null,
                 ['placeholder'=>'Популярные тэги', 'class'=>'form-control']) !!}
                {{ Form::label('nums', 'Цифры. Обязательное поле(цифры от 1 до 99999999)') }}
            </div>

            <h3>Картинка</h3>
            <div class="input__group">
                {!! Form::text('alt', $block->alt ?? null , ['placeholder'=>'Alt', 'class'=>'form-control']) !!}
                {{ Form::label('alt', 'Alt. Обязательное поле(255 символов)') }}
            </div>
            <div class="input__group">
                {!! Form::text('title', $block->title ?? null , ['placeholder'=>'title', 'class'=>'form-control']) !!}
                {{ Form::label('title', 'Название. Обязательное поле(255 символов)') }}
            </div>
            <div class="img img__full"><!--img__full -большая картинка   /  img__medium   /  img__small-->
                <img src="{{$block->getImg()}}" alt="">
                @if(!empty($block->getImg()))

                    <button type="button" class="btn btn__red remove-image" title="удалить эту картинку"
                            data-img="{{ $block->id }}" data-src="ua">x
                    </button>

                @endif
            </div>

            <label class="input__file"><!--картинка-->
                <span class="btn" data-default='Загрузить файл'>Загрузить файл <small>(5 Мб,360х240px)</small></span>
                {!! Form::file('image', ['accept'=>'image/*', 'class'=>'file', 'id'=>'img']) !!}
            </label>

            <h3>Кнопка</h3>
            <div class="input__group">
                {!! Form::text('button', $block->button ?? null,
                 ['placeholder'=>'Надпись', 'class'=>'form-control']) !!}
                {{ Form::label('button', 'Надпись.Обязательное поле(255 символов)') }}
            </div>
            <div class="input__group">
                {!! Form::text('link', $block->link ?? null,
                 ['placeholder'=>'URL', 'class'=>'form-control']) !!}
                {{ Form::label('link', 'URL.Обязательное поле(латиница, 255 символов)') }}
            </div>

            {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
            {!! Form::close() !!}
        </div>
        {{--{!! (0 == $loop->iteration%2) ? '<hr>' : ''  !!}--}}
    @empty
        <div>
            <h3>Нет данных.</h3>
        </div>
    @endforelse
</div>
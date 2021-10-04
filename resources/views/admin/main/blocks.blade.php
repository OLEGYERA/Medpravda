<div class="breadcrumb">
    <span>Блоки заголовков</span>
</div>

@include('admin.main.nav')

@foreach($blocks as $block)
    <div class="wrap__block">
        <h2>
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $loop->iteration }}">
                # {{ $block->title }}:</a>
        </h2>

        {!! Form::open(['url'=>route('blocks', $block->id), 'method'=>'post', 'style' => 'display: contents;']) !!}
        <div class="two__column">
            <div class="input__group">
                {!! Form::text('title', $block->title ?? '',
                    ['placeholder'=>'Популярные тэги', 'class'=>'form-control']) !!}
                {{ Form::label('title', 'Заголовок') }}
            </div>
            <div class="input__group">
                {!! Form::text('utitle', $block->utitle ?? '',
                    ['placeholder'=>'Популярные тэги', 'class'=>'form-control']) !!}

                {{ Form::label('utitle', 'UA-Заголовок') }}
            </div>
            <div class="two__column">
                <div class="input__group">
                    {!! Form::text('first', $block->first ?? '',
                     ['placeholder'=>'Морфин', 'class'=>'form-control']) !!}
                    {{ Form::label('first', 'Тэг-1') }}
                </div>
                <div class="input__group">
                    {!! Form::text('first_url', $block->first_url ?? '',
                     ['placeholder'=>'omez', 'class'=>'form-control']) !!}

                    {{ Form::label('first_url', 'url-1') }}
                </div>
                <div class="input__group">
                    {!! Form::text('second', $block->second ?? '',
                     ['placeholder'=>'Морфин', 'class'=>'form-control']) !!}
                    {{ Form::label('second', 'Тэг-2') }}
                </div>
                <div class="input__group">
                    {!! Form::text('second_url', $block->second_url ?? '',
                     ['placeholder'=>'omez', 'class'=>'form-control']) !!}
                    {{ Form::label('second_url', 'url-2') }}
                </div>
                <div class="input__group">
                    {!! Form::text('third', $block->third ?? '',
                     ['placeholder'=>'Морфин', 'class'=>'form-control']) !!}
                    {{ Form::label('third', 'Тэг-3') }}
                </div>
                <div class="input__group">
                    {!! Form::text('third_url', $block->third_url ?? '',
                     ['placeholder'=>'omez', 'class'=>'form-control']) !!}
                    {{ Form::label('third_url', 'url-3') }}
                </div>
            </div>
            <div class="two__column">
                <div class="input__group">
                    {!! Form::text('fourth', $block->fourth ?? '',
                     ['placeholder'=>'Морфин', 'class'=>'form-control']) !!}
                    {{ Form::label('fourth', 'Тэг-4') }}
                </div>
                <div class="input__group">
                    {!! Form::text('fourth_url', $block->fourth_url ?? '',
                     ['placeholder'=>'omez', 'class'=>'form-control']) !!}
                    {{ Form::label('fourth_url', 'url-4') }}
                </div>

                <div class="input__group">
                    {!! Form::text('fifth', $block->fifth ?? '',
                     ['placeholder'=>'Морфин', 'class'=>'form-control']) !!}
                    {{ Form::label('fifth', 'Тэг-5') }}
                </div>
                <div class="input__group">
                    {!! Form::text('fifth_url', $block->fifth_url ?? '',
                     ['placeholder'=>'omez', 'class'=>'form-control']) !!}
                    {{ Form::label('fifth_url', 'url-5') }}
                </div>
                <div class="input__group">
                    {!! Form::text('sixth', $block->sixth ?? '',
                     ['placeholder'=>'Морфин', 'class'=>'form-control']) !!}
                    {{ Form::label('sixth', 'Тэг-6') }}
                </div>
                <div class="input__group">
                    {!! Form::text('sixth_url', $block->sixth_url ?? '',
                     ['placeholder'=>'omez', 'class'=>'form-control']) !!}
                    {{ Form::label('sixth_url', 'url-6') }}
                </div>
            </div>
        </div>
        {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
        {!! Form::close() !!}

    </div>
@endforeach


<div class="breadcrumb">
    <span>Сopyright</span>
</div>

@include('admin.static.nav')
@if(is_object($abouts) && $abouts->isNotEmpty())
    <div class="two__column"><!--две колонки-->
        <div class="wrap__block">
            <h2># RU</h2>

            {!! Form::open(['url' => route('footer_copyright_admin'),
                        'method' => 'post', 'class' => 'form-topic']) !!}
            <h3>Текст</h3>
            {{ Form::textarea('text', $abouts{0}->text ?? '',
                    ['placeholder'=>'RU-Text', 'class'=>'form-control editor', 'style' => 'style="width: 100%"']) }}

            {{ Form::hidden('loc', 'ru') }}
            <div>
                {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
            </div>

            {!! Form::close() !!}
        </div>


        <div class="wrap__block">
            <h2> # UA</h2>
            {!! Form::open(['url' => route('footer_copyright_admin'),
                        'method' => 'post', 'class' => 'form-horizontal']) !!}
            <h3>Текст</h3>
            {{ Form::textarea('text', $abouts{1}->text ?? '',
                    ['placeholder'=>'RU-Text', 'class'=>'form-control editor', 'style' => 'style="width: 100%"']) }}

            {{ Form::hidden('loc', 'ua') }}

            <div>
                {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endif

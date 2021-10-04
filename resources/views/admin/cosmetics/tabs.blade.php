<div class="top__nav">
    @if('cosmetics.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('cosmetics.edit',['cosmetic'=> $model->slug]),'class'=>'form-horizontal','method'=>'GET']) !!}
        {!! Form::button('Официальная инструкция', ['class' => 'btn btn__full','type'=>'submit']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['url' => route('cosmetic_questions',['cosmetic'=> $model->slug]),'class'=>'form-horizontal','method'=>'GET']) !!}
        {!! Form::button('FAQ', ['class' => 'btn','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
    @if('cosmetics-adapted.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('cosmetics-adapted.edit',['cosmetics_adapted'=> $model->slug]),'class'=>'form-horizontal','method'=>'GET']) !!}
        {!! Form::button('Адаптированная инструкция', ['class' => 'btn btn__full','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
    @if('cosmetics-ua.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('cosmetics-ua.edit',['cosmetics_adapted'=> $model->slug]),'class'=>'form-horizontal','method'=>'GET']) !!}
        {!! Form::button('UA инструкция', ['class' => 'btn','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
    @if('cosmetics-ua-adapted.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('cosmetics-ua-adapted.edit',['cosmetics_adapted'=> $model->slug]),'class'=>'form-horizontal','method'=>'GET']) !!}
        {!! Form::button('UA адаптированная инструкция', ['class' => 'btn btn__full','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
</div>
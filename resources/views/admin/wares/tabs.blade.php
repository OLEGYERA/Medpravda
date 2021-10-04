<div  class="top__nav">
    @if('wares.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('wares.edit',['bad'=> $model->slug]),'class'=>' ','method'=>'GET']) !!}
        {!! Form::button('Официальная инструкция', ['class' => 'btn','type'=>'submit']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['url' => route('bad_questions',['bad'=> $model->slug]),'class'=>' ','method'=>'GET']) !!}
        {!! Form::button('FAQ', ['class' => 'btn btn-sm','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
    @if('wares-adapted.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('wares-adapted.edit',['wares_adapted'=> $model->slug]),'class'=>' ','method'=>'GET']) !!}
        {!! Form::button('Адаптированная инструкция', ['class' => 'btn','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
    @if('wares-ua.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('wares-ua.edit',['wares_adapted'=> $model->slug]),'class'=>' ','method'=>'GET']) !!}
        {!! Form::button('UA инструкция', ['class' => 'btn','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
    @if('wares-ua-adapted.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('wares-ua-adapted.edit',['wares_adapted'=> $model->slug]),'class'=>' ','method'=>'GET']) !!}
        {!! Form::button('UA адаптированная инструкция', ['class' => 'btn','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
</div>
<div  class="top__nav">
    @if('bads.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('bads.edit',['bad'=> $model->slug]),'class'=>' ','method'=>'GET']) !!}
        {!! Form::button('Официальная инструкция', ['class' => 'btn btn__full','type'=>'submit']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['url' => route('bad_questions',['bad'=> $model->slug]),'class'=>' ','method'=>'GET']) !!}
        {!! Form::button('FAQ', ['class' => 'btn','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
    @if('bads-adapted.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('bads-adapted.edit',['bads_adapted'=> $model->slug]),'class'=>' ','method'=>'GET']) !!}
        {!! Form::button('Адаптированная инструкция', ['class' => 'btn btn__full','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
    @if('bads-ua.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('bads-ua.edit',['bads_adapted'=> $model->slug]),'class'=>' ','method'=>'GET']) !!}
        {!! Form::button('UA инструкция', ['class' => 'btn btn__full','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
    @if('bads-ua-adapted.edit' !== Route::currentRouteName())
        {!! Form::open(['url' => route('bads-ua-adapted.edit',['bads_adapted'=> $model->slug]),'class'=>' ','method'=>'GET']) !!}
        {!! Form::button('UA адаптированная инструкция', ['class' => 'btn','type'=>'submit']) !!}
        {!! Form::close() !!}
    @endif
</div>
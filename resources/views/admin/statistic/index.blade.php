<div class="breadcrumb">
    <span>{{ $title }}</span>
</div>
@include('admin.statistic.navigation')

@if(!empty($res->alias))
    <h2>{{ $res->alias .' - '. $res->nums . ' просмотра(ов)'}}</h2>
@endif



<div class="wrap__block">
    <h2>Статистика</h2>
    @if('stats_medicine' == Route::currentRouteName())
        {!! Form::open(['url' => route('stats_medicine'), 'method' => 'post', 'class' => 'form-search']) !!}
    @else
        {!! Form::open(['url' => route('stats_class'), 'method' => 'post', 'class' => 'form-search']) !!}
    @endif
    <div class="two__column"><!--две колонки-->
        <div class="input__group">
            {!! Form::text('alias', null, ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
            {{ Form::label('alias', 'URL') }}
        </div>

        <div class="input__group label-stay">
            {!! Form::select('period', [
                                                1=>'Месяц',
                                                2=>'Квартал',
                                                3=>'Полугодие',
                                                4=>'Год',
                                             ], null,
             [ 'class'=>'custom-select sources', 'placeholder'=>'Неделя'])
            !!}
            {{ Form::label('period', 'Период') }}
        </div>
    </div>
    <div>
        {!! Form::button('Поиск', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>

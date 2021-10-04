<ul class="breadcrumb">
    <li><a href="{{ route('advertising-companies.index') }}">Назад</a></li>
    <li class="active">Новая</li>
</ul>

<div class="panel panel-success">
    <div class="panel-heading">Добавление рекламной кампании.</div>
    <div class="panel-body">
        <div class="">
            {{ Form::label('title', 'Название кампании') }}
            {!! Form::text('title', '', ['class' => 'form-control']) !!}
        </div>
        <div class="">
            <div class="col-md-6">{{ Form::label('start', 'Дата старта показа (MM.DD.YYYY):') }}
                <div>
                    {{ Form::date('start', \Carbon\Carbon::now(), ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="col-md-6">{{ Form::label('stop', 'Дата окончания показа (MM.DD.YYYY):') }}
                <div>
                    {{ Form::date('stop', \Carbon\Carbon::now()->endOfMonth(), ['class'=>'form-control']) }}
                </div>
            </div>
        </div>
        <div class="">
            {{ Form::label('status', 'Показывать') }}
            {!! Form::select(
                'status',
                 ['Влючённые', 'Выключенные', 'Завершенные'],
                  null ,
                   ['class' => 'form-control', 'placeholder' => 'Все'])
            !!}
        </div>
        <div>
            <label>	{!! Form::checkbox('approved', '1',  null, ['id' => 'approved']) !!}	Включить</label>
        </div>
    </div>
    <div class="panel-footer">
        {!! Form::submit('Создать', ['class' => 'form-control btn btn-primary']) !!}
    </div>
</div>
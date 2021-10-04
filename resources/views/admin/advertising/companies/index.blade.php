<h1>Рекламные кампании</h1>


<a href="{{ route('advertising-companies.create') }}" class="btn btn-success btn-block">Создать кампанию</a>
<hr>

<h2>Фильтры</h2>

<div class="panel panel-success">
    <div class="panel-heading">Выбор кампаний по периоду показа</div>
    <div class="panel-body">
        <div class="">
            <div class="col-md-6">{{ Form::label('start', 'C') }}
                <div>
                    {{ Form::date('start', \Carbon\Carbon::now()->startOfMonth(), ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="col-md-6">{{ Form::label('stop', 'По') }}
                <div>
                    {{ Form::date('stop', \Carbon\Carbon::now()->endOfMonth(), ['class'=>'form-control']) }}
                </div>
            </div>
        </div>
        <div class="">
            {{ Form::label('title', 'Название кампании') }}
            {!! Form::text('title', '', ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<hr>
{!! Form::submit('Найти', ['class' => 'form-control btn btn-primary']) !!}
<div class="breadcrumb">
    <span>Конструктор</span>
</div>


{!! Form::open(['url' => route('landing.index'), 'class'=>'form-horizontal','method'=>'GET' ]) !!}
<div class="wrap__block">
    <h2>Поиск</h2>
    <div class="input__group">
        {!! Form::text('param', null , ['placeholder'=>'validol, валидол...', 'id'=>'param', 'class'=>'form-control']) !!}
        {{ Form::label('param', 'Параметр поиска') }}
    </div>
    <div class="two__column"><!--две колонки-->
        <div>
            {!! Form::button('Поиск', ['class' => 'btn btn__full','type'=>'submit']) !!}
        </div>
        <div>
            <a href="{{ route('landing.create') }}" class="btn btn-blue">Создать</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>


<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Статус</th>
        <th>Публикация</th>
        <th>Название</th>
        <th>URL</th>
        <th>Редактировать</th>
    </tr>
    </thead>
    <tbody>
    @forelse($landings as $landing)
        <tr>
            <td class="text__center">{{$landing->id}}</td>
            <td>
                <a href="{{ route('landing.show', $landing->id) }}" target="_blank">Show</a>
            </td>

            <td>{!! $landing->approved ? '<img src="'.asset('assets/admin/imgs/img-yes.svg').'"
                                                             alt="confirm">' : '<img
                src="'.asset('assets/admin/imgs/img-no.svg').'" alt="cancel">' !!}
            </td>

            <td>{{$landing->title}}</td>
            <td>{{$landing->slug}}</td>

            <td>
                {!! Form::open(['url' => route('landing.edit',['landing'=> $landing->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                {!! Form::button('Редактировать', ['class' => 'btn btn-white','type'=>'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>

    @empty
        <div class="row">
            <div>Нет результатов</div>
        </div>
    @endforelse
    @include('layouts.admin.pagination', ['items'=>$landings])
    </tbody>
</table>
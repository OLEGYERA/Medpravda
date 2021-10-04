<div class="breadcrumb">
    <span>Косметические средства</span>
</div>
@include('admin.cosmetics.nav')


<div class="wrap__block">
        <h3>Поиск</h3>

    {!! Form::open(['url' => route('cosmetics.index'), 'class'=>'form-search','method'=>'GET' ]) !!}

    <div class="input__group">
        {!! Form::text('param', null , ['placeholder'=>'validol, валидол...', 'id'=>'param', 'class'=>'form-control']) !!}
        {{ Form::label('param', 'Параметр поиска') }}
    </div>

    <div class="input__group label-stay">
        {!! Form::select('lang',
            [
                1=>'Русский',
                2=>'Украинский',
            ], old('val') ? : 1, ['class'=>'custom-select sources', 'style' => 'display: none', 'id' => 'lang'])
        !!}
        {{ Form::label('lang', 'Язык поиска') }}
    </div>

    <div>
        {!! Form::button('Поиск', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>


@include('layouts.admin.pagination', ['items'=>$drugs])

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Статус публикации</th>
            <th>Название</th>
            <th>URL</th>
            <th>Редактировать</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @forelse($drugs as $drug)
            <tr>

                <td class="text__center">{{$drug->id}}</td>
                <td>
                    {!! $drug->approved ? '<div><img src="'.asset('assets/admin/imgs/img-yes.svg').'" alt="confirm"></div>' : '<div><img src="'.asset('assets/admin/imgs/img-no.svg').'" alt="cancel"></div>' !!}
                </td>
                <td>{{$drug->title}}</td>
                <td>{{$drug->slug}}</td>
                <td>
                    {!! Form::open(['url' => route('cosmetics.edit',['bad'=> $drug->slug]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('Редактировать', ['class' => 'btn','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
                <td></td>
            </tr>
        @empty
            <div class="row">
                <div>Нет результатов</div>
            </div>
        @endforelse
        </tbody>
    </table>

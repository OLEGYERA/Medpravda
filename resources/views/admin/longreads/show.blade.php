<div class="breadcrumb">
    <span>Лонгриды</span>
</div>

@include('admin.longreads.nav')
<!-- START CONTENT -->
{{--<div class="wrap__block">--}}
{{--    <h2>Поиск</h2>--}}

{{--    {!! Form::open(['url' => route('articles_admin'), 'class'=>'form-search','method'=>'GET' ]) !!}--}}
{{--    <div class="two__column">--}}
{{--        <div class="input__group">--}}
{{--            {!! Form::text('value', old('value') ? : '' , ['placeholder'=>'id, link...', 'id'=>'value', 'class'=>'form-control']) !!}--}}
{{--            {{ Form::label('value', 'Параметр поиска') }}--}}
{{--        </div>--}}
{{--        <div class="input__group label-stay">--}}
{{--            {!! Form::select('param',--}}
{{--                    [--}}
{{--                        1=>'Заголовок',--}}
{{--                        2=>'URL статьи',--}}
{{--                        3 =>'На паузе',--}}
{{--                        4 =>'Все',--}}
{{--                    ], old('val') ? : 1, ['class'=>'custom-select sources'])--}}
{{--            !!}--}}
{{--            {{ Form::label('param', 'Критерий поиска') }}--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    {!! Form::button('Поиск', ['class' => 'btn btn__full','type'=>'submit']) !!}--}}
{{--    {!! Form::close() !!}--}}
{{--</div>--}}

{{--START PAGINATION DIV--}}

<div class="pagination">
    @if(is_object($longreads) && !empty($longreads->lastPage()) && $longreads->lastPage() > 1)
        @if($longreads->lastPage() > 1)
            @if($longreads->currentPage() !== 1)
                <a rel="prev" href="{{ $longreads->url(($longreads->currentPage() - 1)) }}"
                   class="prev">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @else
            @endif
            @if($longreads->currentPage() >= 3)
                <a class="pagin" href="{{ $longreads->url($longreads->url(1)) }}">1</a>
            @endif
            @if($longreads->currentPage() >= 4)
                <a class="pagin">...</a>
            @endif
            @if($longreads->currentPage() !== 1)
                <a class="pagin"
                   href="{{ $longreads->url($longreads->currentPage()-1) }}">{{ $longreads->currentPage()-1 }}</a>
            @endif
            <a class="pagin active">{{ $longreads->currentPage() }}</a>
            @if($articles->currentPage() !== $longreads->lastPage())
                <a class="pagin"
                   href="{{ $longreads->url($longreads->currentPage()+1) }}">{{ $longreads->currentPage()+1 }}</a>
            @endif
            @if($longreads->currentPage()+1 < $longreads->lastPage())
                <a class="pagin"
                   href="{{ $longreads->url($longreads->currentPage()+2) }}">{{ $longreads->currentPage()+2 }}</a>
            @endif
            @if($longreads->currentPage()+2 < $longreads->lastPage())
                <a class="pagin"
                   href="{{ $longreads->url($longreads->currentPage()+3) }}">{{ $longreads->currentPage()+3 }}</a>
            @endif
            @if($longreads->currentPage()+3 < $articles->lastPage())
                <a class="pagin"
                   href="{{ $longreads->url($longreads->currentPage()+4) }}">{{ $longreads->currentPage()+4 }}</a>
            @endif
            @if($longreads->currentPage() < ($longreads->lastPage()-5))
                {{--<li><a href="#">...</a></li>--}}
                <span>...</span>
            @endif
            @if($longreads->currentPage() < ($longreads->lastPage()-4))
                <a class="pagin" href="{{ $longreads->url($articles->lastPage()) }}">{{ $longreads->lastPage() }}</a>
            @endif
            @if($longreads->currentPage() !== $longreads->lastPage())
                <a rel="next" href="{{ $longreads->url(($longreads->currentPage() + 1)) }}"
                   class="next">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @endif
        @endif
    @endif
</div>
{{--END PAGINATION DIV--}}

<div class="table-medicine">
    <table>
        <thead>
        <tr>
            <th>Приритет</th>
            <th>Дата публикации</th>
            <th>Заголовок Ru</th>
            <th>Заголовок Ua</th>
            <th>Ссылка</th>
            <th>Статус</th>
            <th>Редактировать</th>
            <th>Перейти</th>
            @if(Auth::user()->hasRole('admin'))
                <th>Удалить</th>
            @endif

        </tr>
        </thead>
        @if (!empty($longreads[0]))
            <tbody>
            @foreach ($longreads as $longread)
                <tr>
                    <td class="text__center">{{ $longread->priority }}</td>
                    <td class="text__center">{{ $longread->created_at }}</td>
                    <td>{{ $longread->title }}</td>
                    <td>{{ $longread->utitle }}</td>
                    <td>{{ $longread->alias }}</td>
                    <td class="text__center">{!! $longread->approved ? '<img src="'.asset('assets/admin/imgs/img-yes.svg').'" alt="confirm">' : '<img src="'.asset('assets/admin/imgs/img-no.svg').'" alt="cancel">' !!}</td>
                    <td>
                        {!! Form::open(['url' => route('longread_edit_main',['id' => $longread->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button('Редактировать', ['class' => 'btn btn-white','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td><a href="{{route('longread_show', ['alias' => $longread->alias])}}" class ='btn btn-white'>Перейти</a></td>
                    @if(Auth::user()->hasRole('admin'))
                        <td>
                            {!! Form::open(['url' => route('longread_delete',['id'=> $longread->id]),'class'=>'form-horizontal','method'=>'DELETE']) !!}
                            {!! Form::button('Удалить', ['class' => 'btn btn__red','type'=>'submit']) !!}
                            {!! Form::close() !!}
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
</div>
<!-- END CONTENT -->
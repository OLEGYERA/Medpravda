<div class="breadcrumb">
    <span>Добавление \ Редактирование производителей</span>
</div>


<div class="wrap__block">
    <h2>Поиск производителей:</h2>
    {!! Form::open(['url' => route('fabricator_admin'), 'class'=>'form-search','method'=>'get' ]) !!}

    <div class="two__column"><!--две колонки-->
        <div class="input__group">
            {!! Form::text('value', old('value') ? : '' , ['placeholder'=>'id, link...', 'id'=>'value', 'class'=>'form-control']) !!}
            {{ Form::label('value', 'Параметр поиска') }}
        </div>
        <div class="input__group label-stay">
            {!! Form::select('param',
                    [
                        1=>'Заголовок',
                        2=>'URL',
                    ], old('val') ? : 1, ['class'=>'custom-select sources'])
            !!}
            {{ Form::label('param', 'Критерий поиска') }}
        </div>
        <div>
            {!! Form::button('Поиск', ['class' => 'btn btn__full','type'=>'submit']) !!}
        </div>
        <div>
            <a href="{{ route('fabricator_create') }}" class="btn btn__plus">
                Добавить производителя
            </a>
        </div>
    </div>
    {!! Form::close() !!}
</div>


<!-- START PAGINATION DIV -->
<div class="pagination">
    @if(is_object($fabricators) && !empty($fabricators->lastPage()) && $fabricators->lastPage() > 1)
        @if($fabricators->lastPage() > 1)
            @if($fabricators->currentPage() !== 1)
                <a rel="prev" href="{{ $fabricators->url(($fabricators->currentPage() - 1)) }}"
                   class="prev">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @else

            @endif
            @if($fabricators->currentPage() >= 3)
                <a class="pagin" href="{{ $fabricators->url($fabricators->url(1)) }}">1</a>
            @endif
            @if($fabricators->currentPage() >= 4)
                <a class="pagin">...</a>
            @endif
            @if($fabricators->currentPage() !== 1)
                <a class="pagin"
                   href="{{ $fabricators->url($fabricators->currentPage()-1) }}">{{ $fabricators->currentPage()-1 }}</a>
            @endif
            <a class="pagin active">{{ $fabricators->currentPage() }}</a>
            @if($fabricators->currentPage() !== $fabricators->lastPage())
                <a class="pagin"
                   href="{{ $fabricators->url($fabricators->currentPage()+1) }}">{{ $fabricators->currentPage()+1 }}</a>
            @endif
            @if($fabricators->currentPage()+1 < $fabricators->lastPage())
                <a class="pagin"
                   href="{{ $fabricators->url($fabricators->currentPage()+2) }}">{{ $fabricators->currentPage()+2 }}</a>
            @endif
            @if($fabricators->currentPage()+2 < $fabricators->lastPage())
                <a class="pagin"
                   href="{{ $fabricators->url($fabricators->currentPage()+3) }}">{{ $fabricators->currentPage()+3 }}</a>
            @endif
            @if($fabricators->currentPage()+3 < $fabricators->lastPage())
                <a class="pagin"
                   href="{{ $fabricators->url($fabricators->currentPage()+4) }}">{{ $fabricators->currentPage()+4 }}</a>
            @endif
            @if($fabricators->currentPage() < ($fabricators->lastPage()-5))
                {{--<li><a href="#">...</a></li>--}}
                <span>...</span>
            @endif
            @if($fabricators->currentPage() < ($fabricators->lastPage()-4))
                <a class="pagin"
                   href="{{ $fabricators->url($fabricators->lastPage()) }}">{{ $fabricators->lastPage() }}</a>
            @endif
            @if($fabricators->currentPage() !== $fabricators->lastPage())
                <a rel="next" href="{{ $fabricators->url(($fabricators->currentPage() + 1)) }}"
                   class="next">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @endif
        @endif
    @endif
</div>
<!-- END PAGINATION DIV -->

<table>
    <thead>
    <tr>
        <th style="width: 50vw">Заголовок</th>
        <th>Seo</th>
        <th>Редактировать</th>
    </tr>
    </thead>
    @if (!empty($fabricators[0]))
        <tbody>
        @foreach ($fabricators as $fabricator)
            <tr>
                <td>{{ $fabricator->title }}</td>
                <td align="right" class="buttons">
                    {!! Form::open(['url' => route('fabricator_seo_update', ['fabricator'=> $fabricator->id]),
                                                                'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('SEO', ['class' => 'btn btn-white','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
                <td align="right" class="buttons">
                    {!! Form::open(['url' => route('fabricator_update', ['fabricator'=> $fabricator->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('Редактировать', ['class' => 'btn btn-white','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    @endif
</table>
<!-- END CONTENT -->
<div class="breadcrumb">
    <span>Редактирование международных названий</span>
</div>
<div class="wrap__block">

    <h2>Поиск международных названий:</h2>
    {!! Form::open(['route' => 'inn_admin', 'class'=>'form-search','method'=>'get' ]) !!}
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('value', old('value') ? : '' , ['placeholder'=>'id, link...', 'id'=>'value', 'class'=>'form-control']) !!}
            {{ Form::label('value', 'Параметр поиска') }}
        </div>
        <div class="input__group label-stay">
            {!! Form::select('param',
                        [
                            1=>'Заголовок',
                            2=>'URL',
                        ], old('val') ? : 1, ['class'=>'custom-select'])
                !!}

            {{ Form::label('param', 'Критерий поиска') }}
        </div>
    </div>
    {!! Form::button('Поиск', ['class' => 'btn btn__full','type'=>'submit']) !!}
    {!! Form::close() !!}
</div>

@if (!empty($inns[0]))

    <!-- START PAGINATION DIV -->
    <div class="pagination">
        @if(is_object($inns) && !empty($inns->lastPage()) && $inns->lastPage() > 1)
            @if($inns->lastPage() > 1)
                @if($inns->currentPage() !== 1)
                    <a rel="prev" href="{{ $inns->url(($inns->currentPage() - 1)) }}"
                       class="prev">
                        <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                    </a>
                @else
                @endif
                @if($inns->currentPage() >= 3)
                    <a class="pagin" href="{{ $inns->url($inns->url(1)) }}">1</a>
                @endif
                @if($inns->currentPage() >= 4)
                    <a class="pagin">...</a>
                @endif
                @if($inns->currentPage() !== 1)
                    <a class="pagin" href="{{ $inns->url($inns->currentPage()-1) }}">{{ $inns->currentPage()-1 }}</a>
                @endif
                <a class="pagin active">{{ $inns->currentPage() }}</a>
                @if($inns->currentPage() !== $inns->lastPage())
                    <a class="pagin" href="{{ $inns->url($inns->currentPage()+1) }}">{{ $inns->currentPage()+1 }}</a>
                @endif
                @if($inns->currentPage()+1 < $inns->lastPage())
                    <a class="pagin" href="{{ $inns->url($inns->currentPage()+2) }}">{{ $inns->currentPage()+2 }}</a>
                @endif
                @if($inns->currentPage()+2 < $inns->lastPage())
                    <a class="pagin" href="{{ $inns->url($inns->currentPage()+3) }}">{{ $inns->currentPage()+3 }}</a>
                @endif
                @if($inns->currentPage()+3 < $inns->lastPage())
                    <a class="pagin" href="{{ $inns->url($inns->currentPage()+4) }}">{{ $inns->currentPage()+4 }}</a>
                @endif
                @if($inns->currentPage() < ($inns->lastPage()-5))
                    {{--<li><a href="#">...</a></li>--}}
                    <span>...</span>
                @endif
                @if($inns->currentPage() < ($inns->lastPage()-4))
                    <a class="pagin" href="{{ $inns->url($inns->lastPage()) }}">{{ $inns->lastPage() }}</a>
                @endif
                @if($inns->currentPage() !== $inns->lastPage())
                    <a rel="next" href="{{ $inns->url(($inns->currentPage() + 1)) }}"
                       class="next">
                        <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                    </a>
                @endif
            @endif
        @endif
    </div>
    <!-- END PAGINATION DIV -->

@endif
<table>
    <thead>
    <tr>
        <th>Заголовок</th>
        <th>Название</th>
        <th>Seo</th>
        <th>Редактировать</th>
    </tr>
    </thead>
    @if (!empty($inns[0]))
        <tbody>
        @foreach ($inns as $inn)
            <tr>
                <td>{{ $inn->title }}</td>
                <td>{{ $inn->name }}</td>
                <td align="right" class="buttons">
                    {!! Form::open(['url' => route('inn_seo_update', ['inn'=> $inn->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('SEO', ['class' => 'btn btn-white','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
                <td align="right" class="buttons">
                    {!! Form::open(['url' => route('inn_update', ['inn'=> $inn->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('Редактировать', ['class' => 'btn btn-white','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    @endif
</table>
<!-- END CONTENT -->
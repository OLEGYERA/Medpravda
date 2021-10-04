<div class="breadcrumb">
    <span>Вещества</span>
</div>
<div class="wrap__block">

    <h2>Поиск Действующих веществ:</h2>
    {!! Form::open(['route' => 'substance_admin', 'class'=>'form-search','method'=>'get' ]) !!}
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
                        ], old('val') ? : 1, ['class'=>'custom-select sources'])
                !!}

            {{ Form::label('param', 'Критерий поиска') }}
        </div>
    </div>
    {!! Form::button('Поиск', ['class' => 'btn btn__full','type'=>'submit']) !!}
    {!! Form::close() !!}
</div>

@if (!empty($substances[0]))

    <!-- START PAGINATION DIV -->
    <div class="pagination">
        @if(is_object($substances) && !empty($substances->lastPage()) && $substances->lastPage() > 1)
            @if($substances->lastPage() > 1)
                @if($substances->currentPage() !== 1)
                    <a rel="prev" href="{{ $substances->url(($substances->currentPage() - 1)) }}"
                       class="prev">
                        <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                    </a>
                @else
                @endif
                @if($substances->currentPage() >= 3)
                    <a class="pagin" href="{{ $substances->url($substances->url(1)) }}">1</a>
                @endif
                @if($substances->currentPage() >= 4)
                    <a class="pagin">...</a>
                @endif
                @if($substances->currentPage() !== 1)
                    <a class="pagin"
                       href="{{ $substances->url($substances->currentPage()-1) }}">{{ $substances->currentPage()-1 }}</a>
                @endif
                <a class="pagin active">{{ $substances->currentPage() }}</a>
                @if($substances->currentPage() !== $substances->lastPage())
                    <a class="pagin"
                       href="{{ $substances->url($substances->currentPage()+1) }}">{{ $substances->currentPage()+1 }}</a>
                @endif
                @if($substances->currentPage()+1 < $substances->lastPage())
                    <a class="pagin"
                       href="{{ $substances->url($substances->currentPage()+2) }}">{{ $substances->currentPage()+2 }}</a>
                @endif
                @if($substances->currentPage()+2 < $substances->lastPage())
                    <a class="pagin"
                       href="{{ $substances->url($substances->currentPage()+3) }}">{{ $substances->currentPage()+3 }}</a>
                @endif
                @if($substances->currentPage()+3 < $substances->lastPage())
                    <a class="pagin"
                       href="{{ $substances->url($substances->currentPage()+4) }}">{{ $substances->currentPage()+4 }}</a>
                @endif
                @if($substances->currentPage() < ($substances->lastPage()-5))
                    {{--<li><a href="#">...</a></li>--}}
                    <span>...</span>
                @endif
                @if($substances->currentPage() < ($substances->lastPage()-4))
                    <a class="pagin"
                       href="{{ $substances->url($substances->lastPage()) }}">{{ $substances->lastPage() }}</a>
                @endif
                @if($substances->currentPage() !== $substances->lastPage())
                    <a rel="next" href="{{ $substances->url(($substances->currentPage() + 1)) }}"
                       class="next">
                        <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                    </a>
                @endif
            @endif
        @endif
    </div>
    <!-- END PAGINATION DIV -->

@endif

<div class="table-medicine">
    <table>
        <thead>
        <tr>
            <th style="width: 40%">Заголовок</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        @if (!empty($substances[0]))
            <tbody>
            @foreach ($substances as $substance)
                <tr>
                    <td>{{ $substance->title }}</td>
                    <td align="right" class="buttons">
                        {!! Form::open(['url' => route('substance_seo_update', ['substance'=> $substance->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button('SEO', ['class' => 'btn btn-white','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td align="right" class="buttons">
                        {!! Form::open(['url' => route('substance_update', ['substance'=> $substance->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button('Редактировать', ['class' => 'btn btn-white','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>


        @endif
    </table>
</div>
<!-- END CONTENT -->
<script>
    document.title = "Med-Pravda : Вещества";
</script>
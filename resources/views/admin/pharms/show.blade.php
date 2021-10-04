<div class="breadcrumb">
    <span>Фармгруппа</span>
</div>

<div class="wrap__block">
    <h2>Создание фармгруппы:</h2>

    {!! Form::open(['url' => route('PharmGroup_add'), 'class'=>'form-horizontal','method'=>'POST' ]) !!}
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('title', old('title') ? : '',
                            ['placeholder'=>'Средства, влияющие на...', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
            {{ Form::label('title', 'Название') }}
        </div>
        <div class="input__group">
            {!! Form::text('utitle', old('utitle') ? : '',
                            ['placeholder'=>'farm', 'id'=>'utitle', 'class'=>'form-control']) !!}
            {{ Form::label('utitle', 'UA-Название') }}
        </div>
    </div>

    <div class="input__group">
        {!! Form::text('alias', (old('alias') ?? ''),
            ['placeholder' => 'ЧПУ', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('alias', 'ЧПУ') }}
    </div>

    <div class="">
        {!! Form::button('Создать', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>


<div class="wrap__block">
    <h2>Поиск</h2>
    {!! Form::open(['url' => route('pharm_admin'), 'class'=>'form-search','method'=>'get' ]) !!}

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
                        ], old('val') ? : 1, ['class'=>'form-control custom-select sources'])
                !!}
            {{ Form::label('param', 'Критерий поиска') }}
        </div>
    </div>

    {!! Form::button('Поиск', ['class' => 'btn btn__full','type'=>'submit']) !!}
    {!! Form::close() !!}
</div>


@if (!empty($pharms[0]))

    <!-- START PAGINATION DIV -->
    <div class="pagination">
        @if(is_object($pharms) && !empty($pharms->lastPage()) && $pharms->lastPage() > 1)
            @if($pharms->lastPage() > 1)
                @if($pharms->currentPage() !== 1)
                    <a rel="prev" href="{{ $pharms->url(($pharms->currentPage() - 1)) }}"
                       class="prev">
                        <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                    </a>
                @else
                @endif
                @if($pharms->currentPage() >= 3)
                    <a class="pagin" href="{{ $pharms->url($pharms->url(1)) }}">1</a>
                @endif
                @if($pharms->currentPage() >= 4)
                    <a class="pagin">...</a>
                @endif
                @if($pharms->currentPage() !== 1)
                    <a class="pagin"
                       href="{{ $pharms->url($pharms->currentPage()-1) }}">{{ $pharms->currentPage()-1 }}</a>
                @endif
                <a class="pagin active">{{ $pharms->currentPage() }}</a>
                @if($pharms->currentPage() !== $pharms->lastPage())
                    <a class="pagin"
                       href="{{ $pharms->url($pharms->currentPage()+1) }}">{{ $pharms->currentPage()+1 }}</a>
                @endif
                @if($pharms->currentPage()+1 < $pharms->lastPage())
                    <a class="pagin"
                       href="{{ $pharms->url($pharms->currentPage()+2) }}">{{ $pharms->currentPage()+2 }}</a>
                @endif
                @if($pharms->currentPage()+2 < $pharms->lastPage())
                    <a class="pagin"
                       href="{{ $pharms->url($pharms->currentPage()+3) }}">{{ $pharms->currentPage()+3 }}</a>
                @endif
                @if($pharms->currentPage()+3 < $pharms->lastPage())
                    <a class="pagin"
                       href="{{ $pharms->url($pharms->currentPage()+4) }}">{{ $pharms->currentPage()+4 }}</a>
                @endif
                @if($pharms->currentPage() < ($pharms->lastPage()-5))
                    {{--<li><a href="#">...</a></li>--}}
                    <span>...</span>
                @endif
                @if($pharms->currentPage() < ($pharms->lastPage()-4))
                    <a class="pagin" href="{{ $pharms->url($pharms->lastPage()) }}">{{ $pharms->lastPage() }}</a>
                @endif
                @if($pharms->currentPage() !== $pharms->lastPage())
                    <a rel="next" href="{{ $pharms->url(($pharms->currentPage() + 1)) }}"
                       class="next">
                        <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                    </a>
                @endif
            @endif
        @endif
    </div>
    <!-- END PAGINATION DIV -->

@endif
@if (!empty($pharms[0]))
    <table>
        <thead>
        <tr>
            <th>Заголовок</th>
            <th>Seo</th>
            <th>Редактировать</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pharms as $pharm)
            <tr>
                <td>{{ $pharm->title }}</td>
                <td align="right" class="buttons">
                    {!! Form::open(['url' => route('pharm_seo_update', ['pharm'=> $pharm->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('SEO', ['class' => 'btn btn-white','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
                <td align="right" class="buttons">
                    {!! Form::open(['url' => route('pharm_update', ['pharm'=> $pharm->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('Редактировать', ['class' => 'btn btn-white','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
<!-- END CONTENT -->
<script>
    document.title = "Med-Pravda : Фармгруппа";
</script>
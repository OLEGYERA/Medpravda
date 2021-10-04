<!-- START CONTENT -->
<div class="breadcrumb">
    <span>Препараты</span>
</div>
{!! Form::open(['url' => route('medicine_admin'), 'class'=>'form-search','method'=>'GET' ]) !!}
<div class="wrap__block two__column flex__center">
    <div>
        <h2>Поиск</h2>
    </div>
    <div>
        <a href="{{ route('medicine_create') }}" class="btn btn__plus">
            Добавить препарат
        </a>
    </div>

    <div class="input__group">
        {!! Form::text('value', old('value') ? : '' , ['placeholder'=>'validol, валидол...', 'id'=>'search-param']) !!}
        {{ Form::label('search-param', 'Параметр поиска') }}
    </div>
    <div class="input__group label-stay">
        {!! Form::select('param',
            [
                1=>'Название',
                2=>'URL',
                3 =>'На паузе',
            ], old('val') ? : 1, ['class'=>'custom-select sources', 'style' => 'display: none', 'id' => 'kriterii'])
    !!}
        {{ Form::label('param', 'Критерий поиска') }}
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
        <button type="submit" class="btn btn__full">Поиск</button>
    </div>
</div>
{!! Form::close() !!}

<!-- START PAGINATION DIV -->
<div class="pagination">
    @if(is_object($drugs) && !empty($drugs->lastPage()) && $drugs->lastPage() > 1)
        @if($drugs->lastPage() > 1)
            @if($drugs->currentPage() !== 1)
                <a rel="prev" href="{{ $drugs->url(($drugs->currentPage() - 1)) }}"
                   class="prev">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @else
            @endif
            @if($drugs->currentPage() >= 3)
                <a class="pagin" href="{{ $drugs->url($drugs->url(1))."&lang=".$lang}}">1</a>
            @endif
            @if($drugs->currentPage() >= 4)
                <a class="pagin">...</a>
            @endif
            @if($drugs->currentPage() !== 1)
                <a class="pagin"
                   href="{{ $drugs->url($drugs->currentPage()-1)."&lang=".$lang }}">{{ $drugs->currentPage()-1 }}</a>
            @endif
            <a class="pagin active">{{ $drugs->currentPage() }}</a>
            @if($drugs->currentPage() !== $drugs->lastPage())
                <a class="pagin"
                   href="{{ $drugs->url($drugs->currentPage()+1)."&lang=".$lang }}">{{ $drugs->currentPage()+1 }}</a>
            @endif
            @if($drugs->currentPage()+1 < $drugs->lastPage())
                <a class="pagin"
                   href="{{ $drugs->url($drugs->currentPage()+2)."&lang=".$lang }}">{{ $drugs->currentPage()+2 }}</a>
            @endif
            @if($drugs->currentPage()+2 < $drugs->lastPage())
                <a class="pagin"
                   href="{{ $drugs->url($drugs->currentPage()+3)."&lang=".$lang }}">{{ $drugs->currentPage()+3 }}</a>
            @endif
            @if($drugs->currentPage()+3 < $drugs->lastPage())
                <a class="pagin"
                   href="{{ $drugs->url($drugs->currentPage()+4)."&lang=".$lang }}">{{ $drugs->currentPage()+4 }}</a>
            @endif
            @if($drugs->currentPage() < ($drugs->lastPage()-5))
                <span>...</span>
            @endif
            @if($drugs->currentPage() < ($drugs->lastPage()-4))
                <a class="pagin"
                   href="{{ $drugs->url($drugs->lastPage())."&lang=".$lang }}">{{ $drugs->lastPage() }}</a>
            @endif
            @if($drugs->currentPage() !== $drugs->lastPage())
                <a rel="next" href="{{ $drugs->url(($drugs->currentPage() + 1))."&lang=".$lang }}"
                   class="next">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @endif
        @endif
    @endif
</div>
<!-- END PAGINATION DIV -->

@if((is_array($drugs) || is_object($drugs)) && !empty($drugs[0]))
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Статус публикации</th>
            <th>Название</th>
            <th>URL</th>
            <th>Cвязка с аптеками</th>
            <th>Связанные препараты</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach ($drugs as $drug)
            <tr>
                <td class="text__center">{{ $drug->id }}</td>
                <td class="text__center">{!! $drug->approved ? '<img src="'.asset('assets/admin/imgs/img-yes.svg').'" alt="confirm">' : '<img src="'.asset('assets/admin/imgs/img-no.svg').'" alt="cancel">' !!}</td>
                <td>{{ $drug->title }}</td>
                <td>{{ $drug->alias }}</td>
                <td class="text__center">{{ $drug->drug_stores['has_in_drug_store'] }}
                    /{{ $drug->drug_stores['total_drug_store'] }}</td>
                <td>
                    <a href="{{route('goods.medicine.related.get',['medicine'=> $drug->alias])}}">
                        <button class="btn">Препараты аптек</button>
                    </a>
                </td>
                <td>
                    {!! Form::open(['url' => route('medicine_edit',['spec'=>'ru', 'medicine'=> $drug->alias]),'method'=>'GET']) !!}
                    {!! Form::button('Редактировать', ['class' => 'btn','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['url' => route('seo_analog',['medicine'=> $drug->id]),'method'=>'GET']) !!}
                    {!! Form::button('SEO-аналоги', ['class' => 'btn','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['url' => route('seo_faq',['medicine'=> $drug->id]),'method'=>'GET']) !!}
                    {!! Form::button('SEO-вопросы', ['class' => 'btn','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
<!-- END CONTENT -->


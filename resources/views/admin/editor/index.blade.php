<!-- START CONTENT -->
<div class="breadcrumb">
    <span>Редакторы</span>
</div>
{!! Form::open(['url' => route('editor_all'), 'class'=>'form-search','method'=>'GET' ]) !!}
<div class="wrap__block two__column flex__center">
    <div>
        <h2>Поиск</h2>
    </div>
    <div>
        <a href="{{ route('editor_create') }}" class="btn btn__plus">
            Добавить Редактора
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
    @if(is_object($editors) && !empty($editors->lastPage()) && $editors->lastPage() > 1)
        @if($editors->lastPage() > 1)
            @if($editors->currentPage() !== 1)
                <a rel="prev" href="{{ $editors->url(($editors->currentPage() - 1)) }}"
                   class="prev">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @else
            @endif
            @if($editors->currentPage() >= 3)
                <a class="pagin" href="{{ $editors->url($editors->url(1))."&lang=".$lang}}">1</a>
            @endif
            @if($editors->currentPage() >= 4)
                <a class="pagin">...</a>
            @endif
            @if($editors->currentPage() !== 1)
                <a class="pagin"
                   href="{{ $editors->url($editors->currentPage()-1)."&lang=".$lang }}">{{ $editors->currentPage()-1 }}</a>
            @endif
            <a class="pagin active">{{ $editors->currentPage() }}</a>
            @if($editors->currentPage() !== $editors->lastPage())
                <a class="pagin"
                   href="{{ $editors->url($editors->currentPage()+1)."&lang=".$lang }}">{{ $editors->currentPage()+1 }}</a>
            @endif
            @if($editors->currentPage()+1 < $editors->lastPage())
                <a class="pagin"
                   href="{{ $editors->url($editors->currentPage()+2)."&lang=".$lang }}">{{ $editors->currentPage()+2 }}</a>
            @endif
            @if($editors->currentPage()+2 < $editors->lastPage())
                <a class="pagin"
                   href="{{ $editors->url($editors->currentPage()+3)."&lang=".$lang }}">{{ $editors->currentPage()+3 }}</a>
            @endif
            @if($editors->currentPage()+3 < $editors->lastPage())
                <a class="pagin"
                   href="{{ $editors->url($editors->currentPage()+4)."&lang=".$lang }}">{{ $editors->currentPage()+4 }}</a>
            @endif
            @if($editors->currentPage() < ($editors->lastPage()-5))
                <span>...</span>
            @endif
            @if($editors->currentPage() < ($editors->lastPage()-4))
                <a class="pagin"
                   href="{{ $editors->url($editors->lastPage())."&lang=".$lang }}">{{ $editors->lastPage() }}</a>
            @endif
            @if($editors->currentPage() !== $editors->lastPage())
                <a rel="next" href="{{ $editors->url(($editors->currentPage() + 1))."&lang=".$lang }}"
                   class="next">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @endif
        @endif
    @endif
</div>
<!-- END PAGINATION DIV -->

@if((is_array($editors) || is_object($editors)) && !empty($editors[0]))
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Фото</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Фамилия</th>
                <th>Специальность</th>
                <th>Страница</th>
                <th>Управление</th>
                <th>Удалить</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($editors as $editor)
            <tr>
                <td class="text__center">{{ $editor->id }}</td>
                <td class="text__center">
                    <img src="{{asset('storage/editors/' . $editor->author_img)}}" style="width: 70px; min-height: 60px;">
                </td>
                <td class="text__center">{{ $editor->first_name }}</td>
                <td class="text__center">{{ $editor->middle_name }}</td>
                <td class="text__center">{{ $editor->last_name }}</td>
                <td class="text__center">{{ $editor->specialty }}</td>
                <td>
                    <a href="{{route('goods.medicine.related.get',['medicine'=> $editor->alias])}}">
                        <button class="btn">Препараты аптек</button>
                    </a>
                </td>
                <td>
                    <a href="{{route('editor_edit',['id'=> $editor->id])}}">
                        <button class="btn">Редактировать</button>
                    </a>
                </td>
                <td>
                    <a href="{{route('editor_delete',['id'=> $editor->id])}}">
                        <button class="btn" style="border-color: red; color: red;">Удалить</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
<!-- END CONTENT -->


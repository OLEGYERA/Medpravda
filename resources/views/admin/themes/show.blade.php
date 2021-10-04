<div class="breadcrumb">
    <span>Популярные темы</span>
</div>

<!-- START CONTENT -->
<div class="wrap__block">
    <div class="two__column">
        <div><h2>Поиск</h2></div>
        <div>
            <a href="{{route('themes_add')}}" class="btn btn__plus">
                Добавить тему
            </a>
        </div>
    </div>

    {!! Form::open(['url' => route('themes_admin'), 'class'=>'form-search','method'=>'GET' ]) !!}
    <div class="input__group">
        {!! Form::text('value', old('value') ? : '' , ['placeholder'=>'id, link...', 'id'=>'value', 'class'=>'form-control']) !!}
        {{ Form::label('value', 'Заголовок') }}
    </div>
    <div>
        {!! Form::button('Поиск', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>

<!--PAGINATION-->
@if (!empty($themes[0]))
    <div class="pagination">
        @if(is_object($themes) && !empty($themes->lastPage()) && $themes->lastPage() > 1)
            @if($themes->lastPage() > 1)
                @if($themes->currentPage() !== 1)
                    <a rel="prev" href="{{ $themes->url(($themes->currentPage() - 1)) }}"
                       class="prev"></a>
                @endif
                @if($themes->currentPage() >= 3)
                    <a href="{{ $themes->url($themes->url(1)) }}">1</a>
                @endif
                @if($themes->currentPage() >= 4)
                    <a href="#">...</a>
                @endif
                @if($themes->currentPage() !== 1)
                    <a href="{{ $themes->url($themes->currentPage()-1) }}">{{ $themes->currentPage()-1 }}</a>
                @endif
                <a class="active disabled">{{ $themes->currentPage() }}</a>
                @if($themes->currentPage() !== $themes->lastPage())
                    <a href="{{ $themes->url($themes->currentPage()+1) }}">{{ $themes->currentPage()+1 }}</a>
                @endif
                @if($themes->currentPage() <= ($themes->lastPage()-3))
                    <a href="#">...</a>
                @endif
                @if($themes->currentPage() <= ($themes->lastPage()-2))
                    <a href="{{ $themes->url($themes->lastPage()) }}">{{ $themes->lastPage() }}</a>
                @endif
                @if($themes->currentPage() !== $themes->lastPage())
                    <a rel="next" href="{{ $themes->url(($themes->currentPage() + 1)) }}"
                       class="next">
                    </a>
                @endif
            @endif
        @endif
    </div>
@endif


<table>
    <thead>
    <tr>
        <th>Приоритет вывода</th>
        <th>Заголовок</th>
        <th>Локализация</th>

        <th>Редактировать</th>
        @if(Auth::user()->hasRole('admin'))
            <th></th>
        @endif
    </tr>
    </thead>

    <tbody>
    @foreach ($themes as $theme)
        <tr>
            <td class="text__center">{{ $theme->priority }}</td>
            <td>{{ $theme->title }}</td>
            <td class="text__center">{{ $theme->loc }}</td>
            <td>
                {!! Form::open(['url' => route('themes_update',['theme'=> $theme->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                {!! Form::button('Редактировать', ['class' => 'btn btn-white','type'=>'submit']) !!}
                {!! Form::close() !!}
            </td>
            @if(Auth::user()->hasRole('admin'))
                <td>
                    {!! Form::open(['url' => route('delete_theme',['theme'=> $theme->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('Удалить', ['class' => 'btn btn-danger-admin','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>

</table>
<!-- END CONTENT -->
<div class="breadcrumb">
    <span>Макеты</span>
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
    @if(is_object($templates) && !empty($templates->lastPage()) && $templates->lastPage() > 1)
        @if($templates->lastPage() > 1)
            @if($templates->currentPage() !== 1)
                <a rel="prev" href="{{ $templates->url(($templates->currentPage() - 1)) }}"
                   class="prev">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @else
            @endif
            @if($templates->currentPage() >= 3)
                <a class="pagin" href="{{ $templates->url($templates->url(1)) }}">1</a>
            @endif
            @if($templates->currentPage() >= 4)
                <a class="pagin">...</a>
            @endif
            @if($templates->currentPage() !== 1)
                <a class="pagin"
                   href="{{ $templates->url($templates->currentPage()-1) }}">{{ $templates->currentPage()-1 }}</a>
            @endif
            <a class="pagin active">{{ $templates->currentPage() }}</a>
            @if($articles->currentPage() !== $templates->lastPage())
                <a class="pagin"
                   href="{{ $templates->url($templates->currentPage()+1) }}">{{ $templates->currentPage()+1 }}</a>
            @endif
            @if($templates->currentPage()+1 < $templates->lastPage())
                <a class="pagin"
                   href="{{ $templates->url($templates->currentPage()+2) }}">{{ $templates->currentPage()+2 }}</a>
            @endif
            @if($templates->currentPage()+2 < $articles->lastPage())
                <a class="pagin"
                   href="{{ $templates->url($templates->currentPage()+3) }}">{{ $templates->currentPage()+3 }}</a>
            @endif
            @if($templates->currentPage()+3 < $articles->lastPage())
                <a class="pagin"
                   href="{{ $templates->url($templates->currentPage()+4) }}">{{ $templates->currentPage()+4 }}</a>
            @endif
            @if($templates->currentPage() < ($templates->lastPage()-5))
                {{--<li><a href="#">...</a></li>--}}
                <span>...</span>
            @endif
            @if($templates->currentPage() < ($templates->lastPage()-4))
                <a class="pagin" href="{{ $templates->url($articles->lastPage()) }}">{{ $templates->lastPage() }}</a>
            @endif
            @if($templates->currentPage() !== $templates->lastPage())
                <a rel="next" href="{{ $templates->url(($templates->currentPage() + 1)) }}"
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
            <th>Дата публикации</th>
            <th>Название</th>
            <th>Кол-во компонентов</th>
            <th>Редактировать</th>
            @if(Auth::user()->hasRole('admin'))
                <th>Удалить</th>
            @endif
        </tr>
        </thead>
        @if (!empty($templates[0]))
            <tbody>
            @foreach ($templates as $template)
                <tr>
                    <td class="text__center">{{ $template->created_at }}</td>
                    <td>{{ $template->title }}</td>
                    <td>{{ $template->parts()->count() }}</td>
                    <td>
                        {!! Form::open(['url' => route('longread_edit_template',['id' => $template->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button('Редактировать', ['class' => 'btn btn-white','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
{{--                    @if(Auth::user()->hasRole('admin'))--}}
{{--                        <td>--}}
{{--                            {!! Form::open(['url' => route('longread_delete',['id'=> $template->id]),'class'=>'form-horizontal','method'=>'DELETE']) !!}--}}
{{--                            {!! Form::button('Удалить', ['class' => 'btn btn__red','type'=>'submit']) !!}--}}
{{--                            {!! Form::close() !!}--}}
{{--                        </td>--}}
{{--                    @endif--}}
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
</div>
<!-- END CONTENT -->
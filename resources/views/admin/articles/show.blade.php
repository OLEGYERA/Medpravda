<div class="breadcrumb">
    <span>Редактирование статей</span>
</div>

@include('admin.articles.nav')
<!-- START CONTENT -->
<div class="wrap__block">
    <h2>Поиск</h2>

    {!! Form::open(['url' => route('articles_admin'), 'class'=>'form-search','method'=>'GET' ]) !!}
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('value', old('value') ? : '' , ['placeholder'=>'id, link...', 'id'=>'value', 'class'=>'form-control']) !!}
            {{ Form::label('value', 'Параметр поиска') }}
        </div>
        <div class="input__group label-stay">
            {!! Form::select('param',
                    [
                        1=>'Заголовок',
                        2=>'URL статьи',
                    ], old('val') ? : 1, ['class'=>'custom-select sources'])
            !!}
            {{ Form::label('param', 'Критерий поиска') }}
        </div>
    </div>


    {!! Form::button('Поиск', ['class' => 'btn btn__full','type'=>'submit']) !!}
    {!! Form::close() !!}
</div>

{{--START PAGINATION DIV--}}

<div class="pagination">
    @if(is_object($articles) && !empty($articles->lastPage()) && $articles->lastPage() > 1)
        @if($articles->lastPage() > 1)
            @if($articles->currentPage() !== 1)
                <a rel="prev" href="{{ $articles->url(($articles->currentPage() - 1)) }}"
                   class="prev">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @else
            @endif
            @if($articles->currentPage() >= 3)
                <a class="pagin" href="{{ $articles->url($articles->url(1)) }}">1</a>
            @endif
            @if($articles->currentPage() >= 4)
                <a class="pagin">...</a>
            @endif
            @if($articles->currentPage() !== 1)
                <a class="pagin"
                   href="{{ $articles->url($articles->currentPage()-1) }}">{{ $articles->currentPage()-1 }}</a>
            @endif
            <a class="pagin active">{{ $articles->currentPage() }}</a>
            @if($articles->currentPage() !== $articles->lastPage())
                <a class="pagin"
                   href="{{ $articles->url($articles->currentPage()+1) }}">{{ $articles->currentPage()+1 }}</a>
            @endif
            @if($articles->currentPage()+1 < $articles->lastPage())
                <a class="pagin"
                   href="{{ $articles->url($articles->currentPage()+2) }}">{{ $articles->currentPage()+2 }}</a>
            @endif
            @if($articles->currentPage()+2 < $articles->lastPage())
                <a class="pagin"
                   href="{{ $articles->url($articles->currentPage()+3) }}">{{ $articles->currentPage()+3 }}</a>
            @endif
            @if($articles->currentPage()+3 < $articles->lastPage())
                <a class="pagin"
                   href="{{ $articles->url($articles->currentPage()+4) }}">{{ $articles->currentPage()+4 }}</a>
            @endif
            @if($articles->currentPage() < ($articles->lastPage()-5))
                {{--<li><a href="#">...</a></li>--}}
                <span>...</span>
            @endif
            @if($articles->currentPage() < ($articles->lastPage()-4))
                <a class="pagin" href="{{ $articles->url($articles->lastPage()) }}">{{ $articles->lastPage() }}</a>
            @endif
            @if($articles->currentPage() !== $articles->lastPage())
                <a rel="next" href="{{ $articles->url(($articles->currentPage() + 1)) }}"
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
            <th>Прио- ритет</th>
            <th>Дата публикации</th>
            <th>Заголовок</th>
            <th>Категория</th>
            <th>Ссылка</th>
            <th>Статус</th>
            <th>Редактировать</th>
            <th>Редактировать</th>
            @if(Auth::user()->hasRole('admin'))
            <th>Удалить</th>
            @endif
        </tr>
        </thead>
        @if (!empty($articles[0]))
            <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td class="text__center">{{ $article->priority }}</td>
                    <td class="text__center">{{ $article->created_at }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->title }}</td>
                    <td>{{ $article->alias }}</td>
                    <td class="text__center">{!! $article->approved ? '<img src="'.asset('assets/admin/imgs/img-yes.svg').'" alt="confirm">' : '<img src="'.asset('assets/admin/imgs/img-no.svg').'" alt="cancel">' !!}</td>
                    <td>
                        {!! Form::open(['url' => route('edit_article',['spec' => 'ru','article'=> $article->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button('Редактировать RU', ['class' => 'btn btn-white','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['url' => route('edit_article',['spec' => 'ua','article'=> $article->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button('Редактировать UA', ['class' => 'btn btn-white','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                    @if(Auth::user()->hasRole('admin'))
                        <td>
                            {!! Form::open(['url' => route('delete_article',['article'=> $article->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
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
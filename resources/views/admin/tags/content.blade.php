<div class="breadcrumb">
    <span>Добавление \ Редактирование тегов</span>
</div>

@include('admin.articles.nav')


<div class="wrap__block">
    <h2>Добавить новый тег</h2>

    {!! Form::open(['url' => route('tags_admin'), 'class'=>'form-horizontal','method'=>'POST' ]) !!}
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('tag', old('tag') ? : '' ,
            ['placeholder'=>'Валидол...', 'id'=>'tag', 'class'=>'form-control ru-title', 'required'=>'required']) !!}
            {{ Form::label('tag', 'Название тега') }}
        </div>
        <div class="input__group">
            {!! Form::text('utag', old('utag') ? : '' ,
            ['placeholder'=>'Валiдол...', 'id'=>'utag', 'class'=>'form-control', 'required'=>'required']) !!}
            {{ Form::label('utag', 'UA-Название тега') }}
        </div>
    </div>
    <div class="input__group">
        {!! Form::text('alias', old('alias') ? : '' ,
        ['placeholder'=>'validol...', 'id'=>'alias', 'class'=>'form-control eng-alias', 'required'=>'required']) !!}
        {{ Form::label('alias', 'URL') }}
    </div>
    <div>
        {!! Form::button('Добавить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>


@if(!empty($tags))
    <table>
        <thead>
        <tr>
            <th>На главной</th>
            <th>Тэг</th>
            <th>UA-тэг</th>
            <th>URL</th>
            <th>Редактировать</th>
            @if(Auth::user()->hasRole('admin'))
                <th></th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{!! $tag->approved ? '<img src="'.asset('assets/admin/imgs/img-yes.svg').'" alt="confirm">' : '<img src="'.asset('assets/admin/imgs/img-no.svg').'" alt="cancel">' !!}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->uname }}</td>
                <td>{{ $tag->alias }}</td>
                <td>
                    {!! Form::open(['url' => route('edit_tags',['cat'=> $tag->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('Редактировать', ['class' => 'btn','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
                @if(Auth::user()->hasRole('admin'))
                    <td>
                        {!! Form::open(['url' => route('delete_tag',['tag'=> $tag->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button('Удалить', ['class' => 'btn btn__red','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    <!--PAGINATION-->

    <div class="pagination">
        @if($tags->lastPage() > 1)
            @if($tags->currentPage() !== 1)
                <a href="{{ $tags->url(($tags->currentPage() - 1)) }}">Предыдущие</a>
            @endif
            @for($i = 1; $i <= $tags->lastPage(); $i++)
                @if($tags->currentPage() == $i)
                    <a class="selected disabled">{{ $i }}</a>
                @else
                    <a href="{{ $tags->url($i) }}">{{ $i }}</a>
                @endif
            @endfor
            @if($tags->currentPage() !== $tags->lastPage())
                <a href="{{ $tags->url(($tags->currentPage() + 1)) }}">Следующие</a>
            @endif
        @endif
    </div>
@endif
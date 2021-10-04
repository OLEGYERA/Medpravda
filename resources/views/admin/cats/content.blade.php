<div class="breadcrumb">
    <a href="{{route('articles_admin')}}">Статьи</a>
    <span>Добавление & Редактирование категорий</span>
</div>

@include('admin.articles.nav')


<div class="wrap__block">
    <h2>Добавить категорию</h2>
    {!! Form::open(['url' => route('cats'), 'class'=>'form-search','method'=>'POST' ]) !!}
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('title', old('title') ? : '' , ['placeholder'=>'Психиатрия...', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
            {{ Form::label('title', 'Название категории') }}
        </div>

        <div class="input__group">
            {!! Form::text('utitle', old('utitle') ? : '' , ['placeholder'=>'Психиатрия...', 'id'=>'utitle', 'class'=>'form-control']) !!}
            {{ Form::label('utitle', 'UA-название') }}
        </div>
    </div>
    <div class="input__group">
        {!! Form::text('alias', old('alias') ? : '' , ['placeholder'=>'psihiatriya...', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('alias', 'URL') }}
    </div>
    <div>
        {!! Form::button('Добавить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>
@if(!empty($categories))
    <div class="table-pagination">
        <table class="table-medicine">
            <thead>
            <tr>
                <th style="width: 15%">Имя</th>
                <th style="width: 40%">UA-Имя</th>
                <th>URL</th>
                <th>Редактировать</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->utitle }}</td>
                    <td>{{ $category->alias }}</td>
                    <td>
                        {!! Form::open(['url' => route('edit_cats',['cat'=> $category->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button('Редактировать', ['class' => 'btn btn-white','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!--PAGINATION-->

    <div class="general-pagination group">

        @if($categories->lastPage() > 1)
            <ul class="pagination">
                @if($categories->currentPage() !== 1)
                    <li>
                        <a href="{{ $categories->url(($categories->currentPage() - 1)) }}">{{ Lang::get('pagination.previous') }}</a>
                    </li>
                @endif

                @for($i = 1; $i <= $categories->lastPage(); $i++)
                    @if($categories->currentPage() == $i)
                        <li><a class="selected disabled">{{ $i }}</a></li>
                    @else
                        <li><a href="{{ $categories->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor

                @if($categories->currentPage() !== $categories->lastPage())
                    <li>
                        <a href="{{ $categories->url(($categories->currentPage() + 1)) }}">{{ Lang::get('pagination.next') }}</a>
                    </li>
                @endif
            </ul>

        @endif

    </div>
@endif
<div class="breadcrumb">
    <span>Добавление \ Редактирование тегов препаратов</span>
</div>

@include('admin.main.nav')

<div class="wrap__block">
    <h2>Добавить</h2>
    {!! Form::open(['url' => route('med_tags_admin'), 'class'=>'form-horizontal','method'=>'POST' ]) !!}

    <div class="input__group">
        {!! Form::text('alias', old('alias') ? : '' ,
                    ['placeholder'=>'validol...', 'id'=>'alias', 'class'=>'form-control', 'required'=>'required']) !!}

        {{ Form::label('alias', 'URL препарата') }}
    </div>

    {!! Form::button('Добавить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    {!! Form::close() !!}
</div>

@if(!empty($tags))
    <table>
        <thead>
        <tr>
            <th>Препарат</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->alias }}</td>
                <td>
                    {!! Form::open(['url' => route('delete_medtag',['tag'=> $tag->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('Удалить', ['class' => 'btn btn__red','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!--PAGINATION-->

    <div class="general-pagination group">

        @if($tags->lastPage() > 1)
            <ul class="pagination">
                @if($tags->currentPage() !== 1)
                    <li><a href="{{ $tags->url(($tags->currentPage() - 1)) }}">Предыдущие</a></li>
                @endif

                @for($i = 1; $i <= $tags->lastPage(); $i++)
                    @if($tags->currentPage() == $i)
                        <li><a class="selected disabled">{{ $i }}</a></li>
                    @else
                        <li><a href="{{ $tags->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor

                @if($tags->currentPage() !== $tags->lastPage())
                    <li><a href="{{ $tags->url(($tags->currentPage() + 1)) }}">Следующие</a></li>
                @endif
            </ul>

        @endif

    </div>
@endif
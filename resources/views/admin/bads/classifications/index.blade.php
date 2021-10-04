<div class="breadcrumb">
    <a href="{{route('bads.index')}}">диетические добавки</a>
    <span>Список классификаций</span>
</div>


@include('admin.bads.nav')

<table class="collapse__table">
    <thead>
    <tr>
        <th>Класс</th>
        <th>RU-название</th>
        <th>UA-название</th>
        <th>Редактировать</th>
    </tr>
    </thead>

    <tbody>
    @forelse($parents as $parent)
        <tr data-parent="{{$parent->class}}">
            <td class="text__center">{{ $parent->class }}</td>
            <td>{{ $parent->name }}</td>
            <td>{{ $parent->uname }}</td>
            <td>
                {!! Form::open(['url' => route('badclassification.edit',['classification'=> $parent->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                {!! Form::button('Редактировать', ['class' => 'btn btn-blue','type'=>'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @if($parent->children_count>0)
            @include('admin.bads.classifications.children', ['parent'=>$parent])
        @endif

    @empty
        <div class="row">
            <div>No result</div>
        </div>
    @endforelse
    </tbody>
</table>

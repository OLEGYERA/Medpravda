<div class="breadcrumb">
    <a href="{{url('admin/wares')}}">медицинские изделия</a>
    <span>Список классификаций</span>
</div>

@include('admin.wares.nav')
<table class="collapse__table">
    <thead>
    <tr>
        <th>Класс</th>
        <th style="width: 400px">RU-название</th>
        <th style="width: 400px">UA-название</th>
        <th>Редактировать</th>
    </tr>
    </thead>

    <tbody>
    @forelse($parents as $parent)
        <tr data-parent="{{$parent->class}}">
            <td>{{ $parent->class }}</td>
            <td>{{ $parent->name }}</td>
            <td>{{ $parent->uname }}</td>
            <td>
                {!! Form::open(['url' => route('badclassification.edit',['classification'=> $parent->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                {!! Form::button('Редактировать', ['class' => 'btn','type'=>'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @if($parent->children_count>0)
            @include('admin.wares.classifications.children', ['parent'=>$parent])
        @endif

    @empty
        <div class="row">
            <div>No result</div>
        </div>
    @endforelse
    </tbody>
</table>

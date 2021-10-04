@foreach($parent->children as $child)
    <tr style="background: #dbf3fb;" data-child="{{$child->class}}" data-for="{{$parent->class}}">
        <td>{{ $child->class }}</td>
        <td>{{ $child->name }}</td>
        <td>{{ $child->uname }}</td>
        <td>
            {!! Form::open(['url' => route('badclassification.edit',['classification'=> $child->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
            {!! Form::button('Редактировать', ['class' => 'btn btn-blue','type'=>'submit']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @if($child->children()->count()>0)
        @include('admin.bads.classifications.children', ['parent'=>$child])
    @endif
@endforeach





@if(!$empty)
    @foreach($goods as $good)
        <tr>
            <td>{{$good->id}}</td>
            <td>{{$good->name}}</td>
            <td>{{$good->producer->name}}</td>
            <td>{{$good->network->name}}</td>
            <td>
                <label><input type="checkbox" class="checkItem" name="selected_{{$good->id}}" value="{{$good->id}},{{$good->network_id}}"> Выбрать</label>
            </td>
        </tr>
    @endforeach
    {{--@section('paginate')--}}
        {{--{{$goods->links()}}--}}
    {{--@stop--}}
    @else
    <h3>Результатов не найдено</h3>
@endif
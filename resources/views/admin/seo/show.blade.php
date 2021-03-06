<div class="breadcrumb">
    <span>Seo</span>
</div>

@include('admin.static.nav')


<table>
    <thead>
    <tr>
        <th>Страница</th>
        <th>Редактировать</th>
    </tr>
    </thead>
    @if (!empty($seos[0]))
        <tbody>
        @foreach ($seos as $seo)
            <tr>
                <td>{{ trans('ru.' . $seo->uri) }}</td>
                <td>
                    {!! Form::open(['url' => route('seo_update',['seo'=> $seo->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('Редактировать', ['class' => 'btn','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    @endif
</table>

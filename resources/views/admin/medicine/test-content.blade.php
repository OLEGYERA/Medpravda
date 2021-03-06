<!-- START CONTENT -->
<div class="">
    {!! Form::open(['url' => route('medicine_admin'), 'class'=>'form-horizontal','method'=>'GET' ]) !!}
    <h1>Поиск препаратов:</h1>
    <div class="">
        {{ Form::label('value', 'Параметр поиска') }}
        {!! Form::text('value', old('value') ? : '' , ['placeholder'=>'validol, валидол...', 'id'=>'value', 'class'=>'form-control']) !!}
        {{ Form::label('param', 'Критерий поиска') }}
        {!! Form::select('param',
                    [
                        1=>'Название',
                        2=>'URL',
                        3 =>'На паузе',
                    ], old('val') ? : 1, ['class'=>'form-control'])
            !!}
    </div>
    <hr>
    <div class="bth-min-width">
        {!! Form::button('Поиск', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        {!! Html::link(route('medicine_create'),'Добавить препарат',['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
</div>
<hr>
<div class="table-pagination">
    <table class="table status2">
        <thead>
        <tr>
            <th>ID</th>
            <th>Статус публикации</th>
            <th>Название</th>
            <th>URL</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        @if((is_array($drugs) || is_object($drugs)) && !empty($drugs[0]))
            <tbody>
            @foreach ($drugs as $drug)
                <tr>
                    <td>{{ $drug->id }}</td>
                    <td>{!! $drug->approved ? '<a><span class="glyphicon glyphicon-plus"></span></a>' : '' !!}</td>
                    <td>{{ $drug->title }}</td>
                    <td>{{ $drug->alias }}</td>
                    <td>
                        <a href="{{route('goods.medicine.related.get',['medicine'=> $drug->alias])}}"><button class="btn btn-success">Препараты аптек</button></a>
                    </td>
                    <td>
                        {!! Form::open(['url' => route('medicine_edit',['spec'=>'ru', 'medicine'=> $drug->alias]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button('Редактировать', ['class' => 'btn btn-white','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['url' => route('seo_analog',['medicine'=> $drug->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button('SEO-аналоги', ['class' => 'btn btn-white','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['url' => route('seo_faq',['medicine'=> $drug->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button('SEO-вопросы', ['class' => 'btn btn-white','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                    {{--<td>
                        --}}{{--@if(Auth::user()->hasRole('admin'))
                            {!! Form::open(['url' => route('medicine_delete',['drug'=> $drug->alias]),'class'=>'form-horizontal','method'=>'GET']) !!}
                            {!! Form::button('Удалить', ['class' => 'btn btn-danger','type'=>'submit']) !!}
                            {!! Form::close() !!}
                        @endif--}}{{--
                    </td>--}}
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
    <!--PAGINATION-->
    <div class="general-pagination group">
        @if(is_object($drugs) && !empty($drugs->lastPage()) && $drugs->lastPage() > 1)
            @if($drugs->lastPage() > 1)
                <ul class="pagination">
                    @if($drugs->currentPage() !== 1)
                        <li>
                            <a rel="prev" href="{{ $drugs->url(($drugs->currentPage() - 1)) }}"
                               class="prev">
                                <
                            </a>
                        </li>
                    @endif
                    @if($drugs->currentPage() >= 3)
                        <li><a href="{{ $drugs->url($drugs->url(1)) }}">1</a></li>
                    @endif
                    @if($drugs->currentPage() >= 4)
                        <li><a href="#">...</a></li>
                    @endif
                    @if($drugs->currentPage() !== 1)
                        <li>
                            <a href="{{ $drugs->url($drugs->currentPage()-1) }}">{{ $drugs->currentPage()-1 }}</a>
                        </li>
                    @endif
                    <li class="active"><a class="active disabled">{{ $drugs->currentPage() }}</a></li>
                    @if($drugs->currentPage() !== $drugs->lastPage())
                        <li>
                            <a href="{{ $drugs->url($drugs->currentPage()+1) }}">{{ $drugs->currentPage()+1 }}</a>
                        </li>
                    @endif
                    @if($drugs->currentPage()+1 < $drugs->lastPage())
                        <li>
                            <a href="{{ $drugs->url($drugs->currentPage()+2) }}">{{ $drugs->currentPage()+2 }}</a>
                        </li>
                    @endif
                    @if($drugs->currentPage()+2 < $drugs->lastPage())
                        <li>
                            <a href="{{ $drugs->url($drugs->currentPage()+3) }}">{{ $drugs->currentPage()+3 }}</a>
                        </li>
                    @endif
                    @if($drugs->currentPage()+3 < $drugs->lastPage())
                        <li>
                            <a href="{{ $drugs->url($drugs->currentPage()+4) }}">{{ $drugs->currentPage()+4 }}</a>
                        </li>
                    @endif
                    @if($drugs->currentPage() < ($drugs->lastPage()-5))
                        <li><a href="#">...</a></li>
                    @endif
                    @if($drugs->currentPage() < ($drugs->lastPage()-4))
                        <li>
                            <a href="{{ $drugs->url($drugs->lastPage()) }}">{{ $drugs->lastPage() }}</a>
                        </li>
                    @endif
                    @if($drugs->currentPage() !== $drugs->lastPage())
                        <li>
                            <a rel="next" href="{{ $drugs->url(($drugs->currentPage() + 1)) }}"
                               class="next">
                                >
                            </a>
                        </li>
                    @endif
                </ul>
            @endif
        @endif
    </div>
</div>
<!-- END CONTENT -->
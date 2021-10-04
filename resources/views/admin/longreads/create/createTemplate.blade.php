<div class="breadcrumb">
    <a href="{{route('longreads')}}">Лонгриды</a>
    <span>Создание Лонгрида</span>
</div>

@include('admin.longreads.nav')

{!! Form::open(['url'=>route('longread_create_template'), 'method'=>'POST', 'class'=>'form-horizontal']) !!}
<div class="lg">
    <div class="wrap__block">
        <h2>Макет Лонгрида</h2>
        <div class="input__group">
            {!! Form::text('title', old('title') ? : '' , ['placeholder'=>'Название макета', 'id'=>'utitle', 'class'=>'form-control']) !!}
            {{ Form::label('title', 'Название Макета') }}
        </div>
    </div>
    <div class="template-field">

    </div>
{{--    grip-lines-solid.svg--}}
   <div class="btn-add-part">Добавить Элемент Лонгрида </div>
    <div class="lg-palette" style="display: none">
        <div class="lg-close">
            Закрыть
        </div>
        <div class="palette-col">
            <div class="double-row" id="tir">
                <div><img src="{{asset('assets/admin/longread/img/align-justify-solid.svg')}}" alt=""></div>
                <div><img src="{{asset('assets/admin/longread/img/image-regular.svg')}}" alt=""></div>
            </div>
            <div class="double-row" id="itr">
                <div><img src="{{asset('assets/admin/longread/img/image-regular.svg')}}" alt=""></div>
                <div><img src="{{asset('assets/admin/longread/img/align-justify-solid.svg')}}" alt=""></div>
            </div>
        </div>
        <div class="palette-col">
            <div class="double-col" id="tic">
                <div><img src="{{asset('assets/admin/longread/img/align-justify-solid.svg')}}" alt=""></div>
                <div><img src="{{asset('assets/admin/longread/img/image-regular.svg')}}" alt=""></div>
            </div>
        </div>
        <div class="palette-col">
            <div class="double-col" id="itc">
                <div><img src="{{asset('assets/admin/longread/img/image-regular.svg')}}" alt=""></div>
                <div><img src="{{asset('assets/admin/longread/img/align-justify-solid.svg')}}" alt=""></div>
            </div>
        </div>
        <div class="palette-col">
            <div class="double-col-w" id="btc">
                <div><img src="{{asset('assets/admin/longread/img/image-solid.svg')}}" alt=""></div>
                <div><img src="{{asset('assets/admin/longread/img/align-justify-solid.svg')}}" alt=""></div>
            </div>
        </div>
        <div class="palette-col">
            <div class="double-col-w" id="tbc">
                <div><img src="{{asset('assets/admin/longread/img/align-justify-solid.svg')}}" alt=""></div>
                <div><img src="{{asset('assets/admin/longread/img/image-solid.svg')}}" alt=""></div>
            </div>
        </div>
        <div class="palette-col">
            <div class="double-row-h" id="tbr">
                <div><img src="{{asset('assets/admin/longread/img/align-justify-solid.svg')}}" alt=""></div>
                <div><img src="{{asset('assets/admin/longread/img/image-solid.svg')}}" alt=""></div>
            </div>
        </div>
        <div class="palette-col">
            <div class="double-row-h" id="btr">
                <div><img src="{{asset('assets/admin/longread/img/image-solid.svg')}}" alt=""></div>
                <div><img src="{{asset('assets/admin/longread/img/align-justify-solid.svg')}}" alt=""></div>
            </div>
        </div>
    </div>
</div>

{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
{!! Form::close() !!}




<div class="breadcrumb">
    <a href="{{route('longreads')}}">Лонгриды</a>
    <span>Редактирование Макета Лонгрида</span>
</div>

@include('admin.longreads.nav')

{!! Form::open(['url'=>route('longread_edit_template', ['id' => $template->id]), 'method'=>'POST', 'class'=>'form-horizontal']) !!}
<div class="lg">
    <div class="wrap__block">
        <h2>Макет Лонгрида</h2>
        <div class="input__group">
            {!! Form::text('title', old('title') ? : ($template->title ?? '') , ['placeholder'=>'Название макета', 'id'=>'utitle', 'class'=>'form-control']) !!}
            {{ Form::label('title', 'Название Макета') }}
        </div>
    </div>
    <div class="template-field">
        @foreach($template->parts()->orderBy('priority', 'asc')->get() as $item)
            @switch($item->type)
                @case('tir')
                    <div data-priority="{{$item->priority}}" data-id="{{$item->id}}" class="template-row" >
                        <svg class="moover">
                           <image class="moover-item" xlink:href="/assets/admin/longread/img/grip-lines-solid.svg" width="30" height="20" />
                        </svg>
                        <div class="template-text-block"><img src="/assets/admin/longread/img/align-justify-solid.svg" alt=""><b>Текст слева</b></div>
                        <div class="template-img-block"><img src="/assets/admin/longread/img/image-regular.svg" alt=""><b>Изображение справа</b></div>
                        <input type="hidden" class="hid_val" name="{{'v' . $item->priority . '/id' . $item->id}}" value="tir">
                    </div>
                @break

                @case('itr')
                    <div data-priority="{{$item->priority}}" data-id="{{$item->id}}" class="template-row" >
                        <svg class="moover">
                            <image class="moover-item" xlink:href="/assets/admin/longread/img/grip-lines-solid.svg" width="30" height="20" />
                        </svg>
                        <div class="template-img-block"><img src="/assets/admin/longread/img/image-regular.svg" alt=""><b>Изображение слева</b></div>
                        <div class="template-text-block"><img src="/assets/admin/longread/img/align-justify-solid.svg" alt=""><b>Текст справа</b></div>
                        <input type="hidden" class="hid_val" name="{{'v' . $item->priority . '/id' . $item->id}}" value="itr">
                    </div>
                @break

                @case('tic')
                    <div data-priority="{{$item->priority}}" data-id="{{$item->id}}" class="template-col" >
                        <svg class="moover">
                            <image class="moover-item" xlink:href="/assets/admin/longread/img/grip-lines-solid.svg" width="30" height="20" />
                        </svg>
                        <div class="template-text-block"><img src="/assets/admin/longread/img/align-justify-solid.svg" alt=""><b>Текст сверху</b></div>
                        <div class="template-img-block"><img src="/assets/admin/longread/img/image-regular.svg" alt=""><b>Изображение снизу</b></div>
                        <input type="hidden" class="hid_val" name="{{'v' . $item->priority . '/id' . $item->id}}" value="tic">
                    </div>
                @break

                @case('itc')
                    <div data-priority="{{$item->priority}}" data-id="{{$item->id}}" class="template-col" >
                        <svg class="moover">
                            <image class="moover-item" xlink:href="/assets/admin/longread/img/grip-lines-solid.svg" width="30" height="20" />
                        </svg>
                        <div class="template-img-block"><img src="/assets/admin/longread/img/image-regular.svg" alt=""><b>Изображение сверху</b></div>
                        <div class="template-text-block"><img src="/assets/admin/longread/img/align-justify-solid.svg" alt=""><b>Текст снизу</b></div>
                        <input type="hidden" class="hid_val" name="{{'v' . $item->priority . '/id' . $item->id}}" value="itc">
                    </div>
                @break

                @case('btc')
                    <div data-priority="{{$item->priority}}" data-id="{{$item->id}}" class="template-col" >
                        <svg class="moover">
                            <image class="moover-item" xlink:href="/assets/admin/longread/img/grip-lines-solid.svg" width="30" height="20" />
                        </svg>
                        <div class="template-img-block"><img src="/assets/admin/longread/img/image-solid.svg" alt=""><b>Плавающий фон сверху</b></div>
                        <div class="template-text-block"><img src="/assets/admin/longread/img/align-justify-solid.svg" alt=""><b>Текст снизу</b></div>
                        <input type="hidden" class="hid_val" name="{{'v' . $item->priority . '/id' . $item->id}}" value="btc">
                    </div>
                @break

                @case('tbc')
                    <div data-priority="{{$item->priority}}" data-id="{{$item->id}}" class="template-col" >
                        <svg class="moover">
                            <image class="moover-item" xlink:href="/assets/admin/longread/img/grip-lines-solid.svg" width="30" height="20" />
                        </svg>
                        <div class="template-text-block"><img src="/assets/admin/longread/img/align-justify-solid.svg" alt=""><b>Текст сверху</b></div>
                        <div class="template-img-block"><img src="/assets/admin/longread/img/image-solid.svg" alt=""><b>Плавающий фон снизу</b></div>
                        <input type="hidden" class="hid_val" name="{{'v' . $item->priority . '/id' . $item->id}}" value="tbc">
                    </div>
                @break

                @case('tbr')
                    <div data-priority="{{$item->priority}}" data-id="{{$item->id}}"" class="template-row" >
                        <svg class="moover">
                            <image class="moover-item" xlink:href="/assets/admin/longread/img/grip-lines-solid.svg" width="30" height="20" />
                        </svg>
                        <div class="template-text-block"><img src="/assets/admin/longread/img/align-justify-solid.svg" alt=""><b>Текст слева</b></div>
                        <div class="template-img-block"><img src="/assets/admin/longread/img/image-solid.svg" alt=""><b>Плавающий фон справа</b></div>
                        <input type="hidden" class="hid_val" name="{{'v' . $item->priority . '/id' . $item->id}}" value="tbr">
                    </div>
                @break

                @case('btr')
                    <div data-priority="{{$item->priority}}" data-id="{{$item->id}}" class="template-row" >
                        <svg class="moover">
                            <image class="moover-item" xlink:href="/assets/admin/longread/img/grip-lines-solid.svg" width="30" height="20" />
                        </svg>
                        <div class="template-img-block"><img src="/assets/admin/longread/img/image-solid.svg" alt=""><b>Плавающий фон слева</b></div>
                        <div class="template-text-block"><img src="/assets/admin/longread/img/align-justify-solid.svg" alt=""><b>Текст справа</b></div>
                        <input type="hidden" class="hid_val" name="{{'v' . $item->priority . '/id' . $item->id}}" value="btr">
                    </div>
                @break
            @endswitch
        @endforeach
    </div>
</div>

{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
{!! Form::close() !!}




<div class="breadcrumb">
    <a href="{{route('longreads')}}">Лонгриды</a>
    <span>Редактирование Макета Лонгрида</span>
</div>

@include('admin.longreads.nav')
@include('admin.longreads.aside', ['id' => $longread->id, 'lang' => 'ua'])

{!! Form::open(['url'=>route('longread_edit_content', ['id' => $longread->id, 'lang' => 'ua']), 'method'=>'POST', 'class'=>'form-horizontal', 'files'=>true]) !!}
<div class="lg">
    <div class="wrap__block">
        <h2>Контент Лонгрида [ Тип макета: <i>{{$longread_template->title}}</i> ]</h2>
    </div>
    <div class="template-field edit">
        @foreach($longread_template->parts()->orderBy('priority', 'asc')->get() as $item)
            @php($build = $item->build()->where('longreads_id', $longread->id)->where('lang', 'ua')->first())
            @switch($item->type)
                @case('tir')
                    <h2>#{{$item->priority}}</h2>
                    <input type="hidden" name="element{{$item->id}}" value="tir">
                    <div class="template-row edit">
                        <div class="template-edit-text">
                            <textarea name="content{{$item->id}}" class="form-control editor">
                                {!! old('content' . $item->id) ? : ($build->content ?? '') !!}
                            </textarea>
                        </div>
                        <div class="template-edit-img">
                            <div class="lg-box-img">
                                <img src="{!! ($build->img ?? '') !!}" alt="">
                            </div>

                            <div class="input__group">
                                {!! Form::text('title' . $item->id, old('title' . $item->id) ? : ($build->title ?? '') , ['placeholder'=>'Подпись изображения', 'id'=>'title' . $item->id, 'class'=>'form-control']) !!}
                                {{ Form::label('title' . $item->id, 'Подпись изображения') }}
                            </div>
                            <div class="input__group">
                                {!! Form::text('alt' . $item->id, old('alt' . $item->id) ? : ($build->alt ?? '') , ['placeholder'=>'Alt изображения', 'id'=>'alt' . $item->id, 'class'=>'form-control']) !!}
                                {{ Form::label('alt' . $item->id, 'Alt изображения') }}
                            </div>
                            <label class="input__file">
                                <span class="btn" data-default='Загрузить изображение'>Загрузить изображение <small>(не более 5Мб)</small></span>
                                {!! Form::file('img' . $item->id, ['accept'=>'image/*', 'class'=>'file', 'id'=>'img' . $item->id]) !!}
                            </label>
                        </div>
                    </div>
                @break
                @case('itr')
                    <h2>#{{$item->priority}}</h2>
                    <input type="hidden" name="element{{$item->id}}" value="itr">
                    <div class="template-row edit">
                        <div class="template-edit-img left">
                            <div class="lg-box-img">
                                <img src="{!! ($build->img ?? '') !!}" alt="">
                            </div>

                            <div class="input__group">
                                {!! Form::text('title' . $item->id, old('title' . $item->id) ? : ($build->title ?? '') , ['placeholder'=>'Подпись изображения', 'id'=>'title' . $item->id, 'class'=>'form-control']) !!}
                                {{ Form::label('title' . $item->id, 'Подпись изображения') }}
                            </div>
                            <div class="input__group">
                                {!! Form::text('alt' . $item->id, old('alt' . $item->id) ? : ($build->alt ?? '') , ['placeholder'=>'Alt изображения', 'id'=>'alt' . $item->id, 'class'=>'form-control']) !!}
                                {{ Form::label('alt' . $item->id, 'Alt изображения') }}
                            </div>
                            <label class="input__file">
                                <span class="btn" data-default='Загрузить изображение'>Загрузить изображение <small>(не более 5Мб)</small></span>
                                {!! Form::file('img' . $item->id, ['accept'=>'image/*', 'class'=>'file', 'id'=>'img' . $item->id]) !!}
                            </label>
                        </div>
                        <div class="template-edit-text">
                            <textarea name="content{{$item->id}}" class="form-control editor">
                                {!! old('content' . $item->id) ? : ($build->content ?? '') !!}
                            </textarea>
                        </div>
                    </div>
                @break

                @case('tic')
                    <h2>#{{$item->priority}}</h2>
                    <input type="hidden" name="element{{$item->id}}" value="tic">
                    <div class="template-col edit">
                        <div class="template-edit-text">
                                <textarea name="content{{$item->id}}" class="form-control editor">
                                    {!! old('content' . $item->id) ? : ($build->content ?? '') !!}
                                </textarea>
                        </div>

                        <div class="template-edit-img left">
                            <div class="lg-box-img">
                                <img src="{!! ($build->img ?? '') !!}" alt="">
                            </div>

                            <div class="input__group">
                                {!! Form::text('title' . $item->id, old('title' . $item->id) ? : ($build->title ?? '') , ['placeholder'=>'Подпись изображения', 'id'=>'title' . $item->id, 'class'=>'form-control']) !!}
                                {{ Form::label('title' . $item->id, 'Подпись изображения') }}
                            </div>
                            <div class="input__group">
                                {!! Form::text('alt' . $item->id, old('alt' . $item->id) ? : ($build->alt ?? '') , ['placeholder'=>'Alt изображения', 'id'=>'alt' . $item->id, 'class'=>'form-control']) !!}
                                {{ Form::label('alt' . $item->id, 'Alt изображения') }}
                            </div>
                            <label class="input__file">
                                <span class="btn" data-default='Загрузить изображение'>Загрузить изображение <small>(не более 5Мб)</small></span>
                                {!! Form::file('img' . $item->id, ['accept'=>'image/*', 'class'=>'file', 'id'=>'img' . $item->id]) !!}
                            </label>
                        </div>
                    </div>
                @break
                @case('itc')
                    <h2>#{{$item->priority}}</h2>
                    <input type="hidden" name="element{{$item->id}}" value="itc">
                    <div class="template-col edit">
                        <div class="template-edit-img left">
                            <div class="lg-box-img">
                                <img src="{!! ($build->img ?? '') !!}" alt="">
                            </div>

                            <div class="input__group">
                                {!! Form::text('title' . $item->id, old('title' . $item->id) ? : ($build->title ?? '') , ['placeholder'=>'Подпись изображения', 'id'=>'title' . $item->id, 'class'=>'form-control']) !!}
                                {{ Form::label('title' . $item->id, 'Подпись изображения') }}
                            </div>
                            <div class="input__group">
                                {!! Form::text('alt' . $item->id, old('alt' . $item->id) ? : ($build->alt ?? '') , ['placeholder'=>'Alt изображения', 'id'=>'alt' . $item->id, 'class'=>'form-control']) !!}
                                {{ Form::label('alt' . $item->id, 'Alt изображения') }}
                            </div>
                            <label class="input__file">
                                <span class="btn" data-default='Загрузить изображение'>Загрузить изображение <small>(не более 5Мб)</small></span>
                                {!! Form::file('img' . $item->id, ['accept'=>'image/*', 'class'=>'file', 'id'=>'img' . $item->id]) !!}
                            </label>
                        </div>
                        <div class="template-edit-text">
                            <textarea name="content{{$item->id}}" class="form-control editor">
                                {!! old('content' . $item->id) ? : ($build->content ?? '') !!}
                            </textarea>
                        </div>
                    </div>
                @break
                @case('btc')
                    <h2>#{{$item->priority}}</h2>
                    <input type="hidden" name="element{{$item->id}}" value="btc">
                    <div class="template-col edit">
                        <div class="template-edit-img left">
                            <div class="lg-box-img">
                                <img src="{!! ($build->img ?? '') !!}" alt="">
                            </div>
                            <label class="input__file">
                                <span class="btn" data-default='Загрузить фоновое изображение'>Загрузить фоновое изображение <small>(не более 5Мб)</small></span>
                                {!! Form::file('img' . $item->id, ['accept'=>'image/*', 'class'=>'file', 'id'=>'img' . $item->id]) !!}
                            </label>
                        </div>
                        <div class="template-edit-text">
                            <textarea name="content{{$item->id}}" class="form-control editor">
                                {!! old('content' . $item->id) ? : ($build->content ?? '') !!}
                            </textarea>
                        </div>
                    </div>
                @break
                @case('tbc')
                    <h2>#{{$item->priority}}</h2>
                    <input type="hidden" name="element{{$item->id}}" value="tbc">
                    <div class="template-col edit">
                        <div class="template-edit-text">
                            <textarea name="content{{$item->id}}" class="form-control editor">
                                {!! old('content' . $item->id) ? : ($build->content ?? '') !!}
                            </textarea>
                        </div>
                        <div class="template-edit-img left">
                            <div class="lg-box-img">
                                <img src="{!! ($build->img ?? '') !!}" alt="">
                            </div>
                            <label class="input__file">
                                <span class="btn" data-default='Загрузить фоновое изображение'>Загрузить фоновое изображение <small>(не более 5Мб)</small></span>
                                {!! Form::file('img' . $item->id, ['accept'=>'image/*', 'class'=>'file', 'id'=>'img' . $item->id]) !!}
                            </label>
                        </div>
                    </div>
                @break


                @case('tbr')
                    <h2>#{{$item->priority}}</h2>
                    <input type="hidden" name="element{{$item->id}}" value="tbr">
                    <div class="template-row edit">
                        <div class="template-edit-text">
                            <textarea name="content{{$item->id}}" class="form-control editor">
                                {!! old('content' . $item->id) ? : ($build->content ?? '') !!}
                            </textarea>
                        </div>
                        <div class="template-edit-img">
                            <div class="lg-box-img">
                                <img src="{!! ($build->img ?? '') !!}" alt="">
                            </div>
                            <label class="input__file">
                                <span class="btn" data-default='Загрузить фоновое изображение'>Загрузить фоновое изображение <small>(не более 5Мб)</small></span>
                                {!! Form::file('img' . $item->id, ['accept'=>'image/*', 'class'=>'file', 'id'=>'img' . $item->id]) !!}
                            </label>
                        </div>
                    </div>
                @break

                @case('btr')
                    <h2>#{{$item->priority}}</h2>
                    <input type="hidden" name="element{{$item->id}}" value="tbr">
                    <div class="template-row edit">
                        <div class="template-edit-img left">
                            <div class="lg-box-img">
                                <img src="{!! ($build->img ?? '') !!}" alt="">
                            </div>
                            <label class="input__file">
                                <span class="btn" data-default='Загрузить фоновое изображение'>Загрузить фоновое изображение <small>(не более 5Мб)</small></span>
                                {!! Form::file('img' . $item->id, ['accept'=>'image/*', 'class'=>'file', 'id'=>'img' . $item->id]) !!}
                            </label>
                        </div>
                        <div class="template-edit-text">
                            <textarea name="content{{$item->id}}" class="form-control editor">
                                {!! old('content' . $item->id) ? : ($build->content ?? '') !!}
                            </textarea>
                        </div>
                    </div>
                @break
            @endswitch
        @endforeach
    </div>
</div>

{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
{!! Form::close() !!}




<div class="breadcrumb">
    <a href="{{route('articles_admin')}}">Редактирование статей</a>
    <span>Частые вопросы, препарат - {{ $drug->title }}</span>
</div>
{!! Form::open(['url' => route('faq', ['medicine'=>$drug->alias, 'spec'=>$spec]), 'method' => 'post', 'class' => 'form-horizontal']) !!}

    @if($drug->questions->isNotEmpty())
        @foreach($drug->questions as $faq)
            <div class="wrap__block">
            <h2># {{ $faq->question }}</h2>

            <div class="input__group">
                {!! Form::text('question[]', $faq->question ?? '',
                 ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
                {{ Form::label('question', 'Вопрос (не больше 255 символов)') }}
            </div>
            <h3>Ответ</h3>
            <textarea name="answer[]" class="form-control editor">
                            {{ $faq->answer ?? '' }}
                        </textarea>
            <span class="remove-this"><button type="button" class="btn btn__red">Удалить</button></span>
            </div>
        @endforeach
    @endif
<div id="add"></div>

<div class="two__column">
    <div class="">
        {!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
    </div>

    <div id="add-new">
        <button type="button" class="btn">Добавить</button>
    </div>
</div>

{!! Form::close() !!}


<div id="123" style="display:none">
    <div class="wrap__block">
        <h2>#Новый (если не используется - удалить):</h2>

        <div class="input__group">
            {!! Form::text('question[]', null,
             ['placeholder'=>'aspirin', 'class'=>'form-control','id'=>'question' ]) !!}
            {{ Form::label('question', 'Вопрос(не больше 255 символов)') }}
        </div>
        <h3>Ответ</h3>
        <textarea name="answer[]" class="form-control editor" id="added">
                                    {{--{!! old('faq') ? : ($drug->packaging ?? '') !!}--}}
                                </textarea>

        <span class="remove-this"><button type="button" class="btn btn__red">Удалить</button></span>
    </div>
</div>

<script>
    setTimeout(function () {
        // document.getElementById('answer[]_ifr').style.height = '100px';
        $('.mce-edit-area iframe').css('height', '100px');
    }, 3000)
</script>
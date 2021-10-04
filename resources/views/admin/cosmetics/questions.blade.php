<div class="breadcrumb">
    <span>Частые вопросы - {{ $tool->title }}</span>
</div>

{!! Form::open(['url' => route('cosmetic_questions', ['medicine'=>$tool->slug]), 'method' => 'post', 'class' => 'form-horizontal blocks_questions__remove']) !!}
<div class="wrap__block"> <!--белый блок-->
    <div class="two__column"><!--две колонки-->
        <div class="">
            <h2>RU</h2>
            <div class="panel-group block-to-add ru" id="accordion">
                @if(null !== $tool->questions['ru'])
                    @foreach($tool->questions['ru'] as $faq)
                        <div class="blocks_questions">
                                    <span class="remove-this">
                                        <button type="button" class="btn btn__red">-</button>
                                    </span>
                            <h4> # {{ $faq['question'] }}</h4>
                            <div class="input__group"><!--обычный инпут-->
                                {!! Form::text('ru['.$loop->index.'][question]', $faq['question'] ?? '',
                                 ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
                                {{ Form::label('question', 'Вопрос (не больше 255 символов)') }}
                            </div>
                            <div class="input__group"><!--обычный инпут-->
                                {!! Form::text('ru['.$loop->index.'][answer]', $faq['answer'] ?? '') !!}
                                {{ Form::label('answer', 'Ответ') }}
                                {{--<textarea name="ru[{{$loop->index}}][answer]" class="form-control editor">--}}
                                {{--{{ $faq['answer'] ?? '' }}--}}
                                {{--</textarea>--}}
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="blocks_questions">
                        <span class="remove-tool"><button type="button" class="btn btn__red">-</button></span>
                        <h4 class="panel-title">#Новый (если не используется - удалить):</h4>
                        <div class="input__group"><!--обычный инпут-->
                            {!! Form::text('ru[0][question]', null,
                             ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
                            {{ Form::label('question', 'Вопрос(не больше 255 символов)') }}
                        </div>
                        <div class="input__group"><!--обычный инпут-->
                            {!! Form::text('ru[0][answer]', null,
                             ['placeholder'=>'', 'class'=>'editor']) !!}
                            {{ Form::label('answer', 'Ответ') }}
                        </div>
                        {{--<textarea name="ru[0][answer]" class="form-control editor">--}}
                        {{--</textarea>--}}

                    </div>
                @endif
            </div>
            <div class="add-new-tool">
                <button type="button" class="btn btn-primary">+</button>
            </div>
        </div>
        <div class="">
            <h2>UA</h2>
            <div class="panel-group block-to-add ua" id="accordion1">
                @if(null !== $tool->questions['ua'])
                    @foreach($tool->questions['ua'] as $faq)
                        <div class="blocks_questions">
                             <span class="remove-this"><button type="button"
                                                               class="btn btn__red">-</button></span>
                            <h4 class="panel-title"># {{ $faq['question'] }}</h4>
                            <div class="input__group"><!--обычный инпут-->
                                {!! Form::text('ua['.$loop->index.'][question]', $faq['question'] ?? '',
                                 ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
                                {{ Form::label('question', 'Вопрос(не больше 255 символов)') }}
                            </div>
                            <div class="input__group"><!--обычный инпут-->
                                {!! Form::text('ua['.$loop->index.'][answer]', $faq['answer'] ?? '',
                                 ['placeholder'=>'', 'class'=>'editor']) !!}
                                {{ Form::label('answer', 'Ответ') }}
                            </div>
                            {{--<textarea name="ua[{{$loop->index}}][answer]" class="form-control editor">--}}
                            {{--{{ $faq['answer'] ?? '' }}--}}
                            {{--</textarea>--}}

                        </div>
                    @endforeach
                @else
                    <div class="blocks_questions">
                        <span class="remove-tool"><button type="button" class="btn btn__red">-</button></span>
                        <h4 class="panel-title">#Новый(если не используется - удалить):</h4>
                        <div class="input__group"><!--обычный инпут-->
                            {!! Form::text('ua[0][question]', null,
                                        ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
                            {{ Form::label('question', 'Вопрос(не больше 255 символов)') }}

                        </div>
                        <div class="input__group"><!--обычный инпут-->
                            {!! Form::text('ua[0][answer]', null,
                                        ['placeholder'=>'', 'class'=>'editor']) !!}
                            {{ Form::label('answer', 'Ответ') }}
                        </div>
                        {{--<textarea name="ua[0][answer]" class="form-control editor">--}}
                        {{--</textarea>--}}

                    </div>
                @endif
            </div>
            <div class="add-new-tool">
                <button type="button" class="btn">+</button>
            </div>
        </div>
    </div>
</div>
{!! Form::button('Сохранить', ['class' => 'btn btn__full','type'=>'submit']) !!}
{!! Form::close() !!}
{{--Slider--}}
<div class="shablon" style="display:none">
    <div class="blocks_questions">
        <span class="remove-tool"><button type="button" class="btn btn__red">-</button></span>
        <h4 class="panel-title">#Новый(если не используется - удалить):</h4>

        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('[10000][question]', null,
                        ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
            {{ Form::label('question', 'Вопрос(не больше 255 символов)') }}
        </div>
        <div class="input__group"><!--обычный инпут-->
            {!! Form::text('[10000][answer]', null,
                        ['placeholder'=>'', 'class'=>'editor']) !!}
            {{ Form::label('answer', 'Ответ') }}
            {{--<textarea name="[10000][answer]" class="form-control editor">--}}
            {{--</textarea>--}}
        </div>
    </div>
</div>
{{--Slider--}}
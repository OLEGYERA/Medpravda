<h2>Частые вопросы - {{ $tool->title }}</h2>
<div class="row">
    <div class="col-lg-6"><h3>RU</h3></div>
    <div class="col-lg-6"><h3>UA</h3></div>
</div>
<div>
    {!! Form::open(['url' => route('ware_questions', ['medicine'=>$tool->slug]), 'method' => 'post', 'class' => 'form-horizontal']) !!}
    <div class="row">
        <div class="col-lg-6">
            <div class="panel-group block-to-add ru" id="accordion">
                @if(null !== $tool->questions['ru'])
                    @foreach($tool->questions['ru'] as $faq)
                        <div class="blocks_questions">
                            <hr>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse{{ $loop->index }}">
                                            # {{ $faq['question'] }}</a>
                                    </h4>
                                </div>
                                <div id="collapse{{ $loop->index }}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        {{ Form::label('question', 'Вопрос(не больше 255 символов)') }}
                                        <div>
                                            {!! Form::text('ru['.$loop->index.'][question]', $faq['question'] ?? '',
                                             ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
                                        </div>
                                        {{ Form::label('answer', 'Ответ') }}
                                        <textarea name="ru[{{$loop->index}}][answer]" class="form-control editor">
                                        {{ $faq['answer'] ?? '' }}
                                    </textarea>
                                    </div>
                                </div>
                                <span class="remove-this"><button type="button" class="btn btn-danger">-</button></span>
                            </div>
                        </div>
                    @endforeach
                @else

                    <div class="blocks_questions">
                        <hr>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsenew">
                                        #Новый(если не используется - удалить):</a>
                                </h4>
                            </div>
                            <div id="collapsenew" class="panel-collapse collapse">
                                <div class="panel-body">
                                    {{ Form::label('question', 'Вопрос(не больше 255 символов)') }}
                                    <div>
                                        {!! Form::text('ru[0][question]', null,
                                         ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
                                    </div>
                                    {{ Form::label('answer', 'Ответ') }}
                                    <textarea name="ru[0][answer]" class="form-control editor">
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <span class="remove-tool"><button type="button" class="btn btn-danger">-</button></span>
                    </div>
                @endif
            </div>

            <div class="add-new-tool">
                <button type="button" class="btn btn-primary">+</button>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-group block-to-add ua" id="accordion1">
                @if(null !== $tool->questions['ua'])
                    @foreach($tool->questions['ua'] as $faq)
                        <div class="blocks_questions">
                            <hr>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion1"
                                           href="#collapse{{ $loop->index }}_ua">
                                            # {{ $faq['question'] }}</a>
                                    </h4>
                                </div>
                                <div id="collapse{{ $loop->index }}_ua" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        {{ Form::label('question', 'Вопрос(не больше 255 символов)') }}
                                        <div>
                                            {!! Form::text('ua['.$loop->index.'][question]', $faq['question'] ?? '',
                                             ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
                                        </div>
                                        {{ Form::label('answer', 'Ответ') }}
                                        <textarea name="ua[{{$loop->index}}][answer]" class="form-control editor">
                            {{ $faq['answer'] ?? '' }}
                        </textarea>
                                    </div>
                                </div>
                                <span class="remove-this"><button type="button" class="btn btn-danger">-</button></span>
                            </div>
                        </div>
                    @endforeach
                @else

                    <div class="blocks_questions">
                        <hr>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapsenew_ua">
                                        #Новый(если не используется - удалить):</a>
                                </h4>
                            </div>
                            <div id="collapsenew_ua" class="panel-collapse collapse">
                                <div class="panel-body">
                                    {{ Form::label('question', 'Вопрос(не больше 255 символов)') }}
                                    <div>
                                        {!! Form::text('ua[0][question]', null,
                                         ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
                                    </div>
                                    {{ Form::label('answer', 'Ответ') }}
                                    <textarea name="ua[0][answer]" class="form-control editor">
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <span class="remove-tool"><button type="button" class="btn btn-danger">-</button></span>
                    </div>
                @endif
            </div>

            <div class="add-new-tool">
                <button type="button" class="btn btn-primary">+</button>
            </div>
        </div>
    </div>
    <div class="row">
        <hr>
        {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
    </div>
    {!! Form::close() !!}
</div>

{{--Slider--}}
<div class="shablon" style="display:none">
    <div class="blocks_questions">
        <hr>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="">
                        #Новый(если не используется - удалить):</a>
                </h4>
            </div>
            <div class="panel-collapse collapse">
                <div class="panel-body">
                    {{ Form::label('question', 'Вопрос(не больше 255 символов)') }}
                    <div>
                        {!! Form::text('[10000][question]', null,
                         ['placeholder'=>'aspirin', 'class'=>'form-control']) !!}
                    </div>
                    {{ Form::label('answer', 'Ответ') }}
                    <textarea name="[10000][answer]" class="form-control editor">
                                </textarea>
                </div>
            </div>
        </div>
        <span class="remove-tool"><button type="button" class="btn btn-danger">-</button></span>
    </div>
    <hr>
</div>
{{--Slider--}}
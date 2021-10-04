<div class="breadcrumb">
    <span>Редактирование презентации</span>
</div>


    <div class="wrap__block">
        <h2>Форма обновления презентации</h2>
        {!!   Form::open(array('route' => 'presentation.edit',
                               'method' => 'post',
                               'files' => true,
                               'class' => 'editPresentation')) !!}
        <label class="input__file"><!--картинка загузить-->
            <span class="btn" data-default='Загрузить файл'>Загрузить файл <small></small></span>
            {!! Form::file('pdf_presentation', ['class'=>'file','id'=>'img']) !!}
        </label>

        <div>
            {!! Form::submit('Сохранить', ['class' => 'btn btn__full']) !!}
        </div>
        {!!  Form::close() !!}
    </div>

    <div class="wrap__block">
        <h2>Текущая перезентация</h2>
        <div>
            <a href="{{env('APP_URL').'/presentation.pdf'}}" target="_blank"><button class="btn presentation-btn" style="margin-bottom: 20px">Показать в отдельном окне</button></a>
            <embed src="{{asset('/presentation.pdf')}}" type="application/pdf" width="1000px" height="600px">
        </div>
    </div>



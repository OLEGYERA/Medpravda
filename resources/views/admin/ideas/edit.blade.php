@include('admin.ideas.nav')
{{ Form::open(['route'=>'greatidea.store', 'method'=>'post']) }}
<div>
    <div class="col-md-6">{{ Form::label('title', 'Название Компании') }}
        <div>
            {!! Form::text('title', $idea->title , ['placeholder'=>'Title', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
        </div>
    </div>

</div>
<div>
    <div class="col-md-6">{{ Form::label('slug', 'URL(Ссылка компании)') }}
        <div>
            {!! Form::text('slug', $idea->slug, ['placeholder'=>'URL', 'id'=>'slug', 'class'=>'form-control eng-alias']) !!}
        </div>
    </div>
    <div class="col-md-6">{{ Form::label('url', 'Ссылка внутренней страницы') }}
        <div>
            {!! Form::text('url', $idea->url, ['placeholder'=>'preparat/ibuprofen', 'id'=>'url', 'class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div>
    <div class="col-md-6">{{ Form::label('utm_source', 'utm_source') }}
        <div>
            {!! Form::text('utm_source', $idea->utm_source, ['placeholder'=>'utm_source', 'id'=>'utm_source', 'class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">{{ Form::label('utm_medium', 'utm_medium') }}
        <div>
            {!! Form::text('utm_medium', $idea->utm_medium, ['placeholder'=>'utm_medium', 'id'=>'utm_medium', 'class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div>
    <div class="col-md-6">{{ Form::label('utm_campaign', 'utm_campaign') }}
        <div>
            {!! Form::text('utm_campaign', $idea->utm_campaign, ['placeholder'=>'utm_campaign', 'id'=>'utm_campaign', 'class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">{{ Form::label('utm_content', 'utm_content') }}
        <div>
            {!! Form::text('utm_content', $idea->utm_content, ['placeholder'=>'utm_content', 'id'=>'utm_content', 'class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div>
    <div class="col-md-6">{{ Form::label('transition', 'План показов') }}
        <div>
            {{ Form::number('transition', $idea->transition, ['class'=>'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">{{ Form::label('start', 'Дата старта') }}
        <div>
            {{ Form::date('start', \Carbon\Carbon::now(), ['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">{{ Form::label('stop', 'Дата окончания') }}
        <div>
            {{ Form::date('stop', $idea->stop, ['class'=>'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <div class="col-md-4">{{ Form::label('approved', 'Запуск компании') }}
            {{Form::checkbox('approved', 1, $idea->approved, ['class'=>'checkbox'])}}
        </div>

        <div class="col-md-3">{{ Form::label('banner', 'Переход на баннер') }}
            {{Form::checkbox('banner', 1, $idea->banner?1:0, ['class'=>'checkbox banner-click'])}}
        </div>
        <div class="col-md-5">{{ Form::label('banners', 'Выбор баннера') }}
            {{Form::select('banners',
              	$banners,
              	$idea->banner??null,
              	['class' => 'form-control banners', 'placeholder' => 'Выберите баннер.'])
              }}
        </div>
    </div>
    <div class="col-md-5">{{ Form::label('scenario_id', 'Сценарий переходов') }}
        <div>
            {{Form::select('scenario_id',
              	$scenarios,
              	$idea->scenario_id,
              	['class' => 'form-control scenarios', 'placeholder' => 'Выберите сценарий переходов.'])
              }}
        </div>
    </div>
</div>
{{ Form::submit('Сохранить', ['class'=>'btn btn-success']) }}
{{ Form::close() }}
@include('admin.ideas.nav')
<h1>Добавление сценария</h1>
<img src="{{ asset('/assets/images/index/scenarios.png') }}">
<hr>
{!! Form::open(['url'=>route('scenarios.store'),
                    'method' => 'post', 'class' => 'form-horizontal']) !!}
<div>
    <div class="">{{ Form::label('title', 'Название сценария') }}
        <div>
            {!! Form::text('title', null , ['placeholder'=>'Title', 'id'=>'title', 'class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row bg-info">
    <h3>Шаг №1</h3>
    <div class="col-md-6">{{ Form::label('step1[option]', 'Вариант перехода') }}
        {{Form::select('step1[option]',
              	[
              	    'v.1'=>'v.1',
              	    'v.2'=>'v.2',
              	    'v.3'=>'v.3',
              	    'v.4'=>'v.4',
              	    'v.5'=>'v.5',
              	    'v.6'=>'v.6',
              	    'v.7'=>'v.7',
              	    'v.8'=>'v.8',
              	    'v.9'=>'v.9',
              	],
              	'v.1',
              	['class' => 'form-control', 'placeholder' => 'Выберите вариант перехода...'])
              }}
    </div>
    <div class="col-md-6">{{ Form::label('step1[delay]', 'Задержка(сек.)') }}
        {{Form::selectRange('step1[delay]', 1, 10, 5, ['class' => 'form-control'])}}
    </div>
</div>

<div class="row">
    <h3>Шаг №2</h3>
    <div class="col-md-6">{{ Form::label('step2[option]', 'Вариант перехода') }}
        {{Form::select('step2[option]',
              	[
              	    'v.1'=>'v.1',
              	    'v.2'=>'v.2',
              	    'v.3'=>'v.3',
              	    'v.4'=>'v.4',
              	    'v.5'=>'v.5',
              	    'v.6'=>'v.6',
              	    'v.7'=>'v.7',
              	    'v.8'=>'v.8',
                    'v.9'=>'v.9',
              	],
              	null,
              	['class' => 'form-control', 'placeholder' => 'Выберите вариант перехода...'])
              }}
    </div>
    <div class="col-md-6">{{ Form::label('step2[delay]', 'Задержка(сек.)') }}
        {{Form::selectRange('step2[delay]', 1, 10, 5, ['class' => 'form-control'])}}
    </div>
</div>

<div class="row bg-info">
    <h3>Шаг №3</h3>
    <div class="col-md-6">{{ Form::label('step3[option]', 'Вариант перехода') }}
        {{Form::select('step3[option]',
              	[
              	    'v.1'=>'v.1',
              	    'v.2'=>'v.2',
              	    'v.3'=>'v.3',
              	    'v.4'=>'v.4',
              	    'v.5'=>'v.5',
              	    'v.6'=>'v.6',
              	    'v.7'=>'v.7',
              	    'v.8'=>'v.8',
                    'v.9'=>'v.9',
              	],
              	null,
              	['class' => 'form-control', 'placeholder' => 'Выберите вариант перехода...'])
              }}
    </div>
    <div class="col-md-6">{{ Form::label('step3[delay]', 'Задержка(сек.)') }}
        {{Form::selectRange('step3[delay]', 1, 10, 5, ['class' => 'form-control'])}}
    </div>
</div>

<div class="row">
    <h3>Шаг №4</h3>
    <div class="col-md-6">{{ Form::label('step4[option]', 'Вариант перехода') }}
        {{Form::select('step4[option]',
              	[
              	    'v.1'=>'v.1',
              	    'v.2'=>'v.2',
              	    'v.3'=>'v.3',
              	    'v.4'=>'v.4',
              	    'v.5'=>'v.5',
              	    'v.6'=>'v.6',
              	    'v.7'=>'v.7',
              	    'v.8'=>'v.8',
                    'v.9'=>'v.9',
              	],
              	null,
              	['class' => 'form-control', 'placeholder' => 'Выберите вариант перехода...'])
              }}
    </div>
    <div class="col-md-6">{{ Form::label('step4[delay]', 'Задержка(сек.)') }}
        {{Form::selectRange('step4[delay]', 1, 10, 5, ['class' => 'form-control'])}}
    </div>
</div>

<div class="row bg-info">
    <h3>Шаг №5</h3>
    <div class="col-md-6">{{ Form::label('step5[option]', 'Вариант перехода') }}
        {{Form::select('step5[option]',
              	[
              	    'v.1'=>'v.1',
              	    'v.2'=>'v.2',
              	    'v.3'=>'v.3',
              	    'v.4'=>'v.4',
              	    'v.5'=>'v.5',
              	    'v.6'=>'v.6',
              	    'v.7'=>'v.7',
              	    'v.8'=>'v.8',
                    'v.9'=>'v.9',
              	],
              	null,
              	['class' => 'form-control', 'placeholder' => 'Выберите вариант перехода...'])
              }}
    </div>
    <div class="col-md-6">{{ Form::label('step5[delay]', 'Задержка(сек.)') }}
        {{Form::selectRange('step5[delay]', 1, 10, 5, ['class' => 'form-control'])}}
    </div>
</div>
<hr>
{!! Form::button('Добавить', ['class' => 'btn btn-primary','type'=>'submit']) !!}

{{ Form::close() }}
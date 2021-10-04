<div class="breadcrumb">
    <a href="{{route('medicine_admin')}}">Препараты</a>
    <span>Создание препарата</span>
</div>
{!! Form::open(['url'=>route('medicine_create'),
                    'method' => 'post', 'class' => 'form-create', 'files'=>true, 'novalidate' => true]) !!}

<div class="wrap__block two__column flex__center">
    <div>
        <h2>Создание препaрата</h2>
    </div>
    <div class="">
        <a href="javascript:void(0)" class="btn btn__plus btn__plus__info add-info">
            Дополнительные сведенья
        </a>
    </div>
    <div class="input__group">
        {!! Form::text('title', old('title') ? : '',
                ['placeholder' => 'Название преперата', 'id'=>'title', 'class'=>'form-control ru-title']) !!}
        {{ Form::label('title', 'Название') }}
    </div>
    <div class="input__group">
        {!! Form::text('alias', old('alias') ? : '',
             ['placeholder'=>'aspirin', 'id'=>'alias', 'class'=>'form-control eng-alias']) !!}
        {{ Form::label('alias', 'URL страницы') }}
    </div>
    <div class="input__group">
        {!! Form::text('reg', old('reg') ? : '',
                    ['placeholder' => 'Регистрация', 'id'=>'reg', 'class'=>'form-control']) !!}
        {{ Form::label('reg', 'Регистрация') }}
    </div>
    <div class="input__group">
        {!! Form::text('dose', old('dose') ? : '',
                    ['placeholder' => 'Дозировка', 'id'=>'dose', 'class'=>'form-control']) !!}
        {{ Form::label('dose', 'Дозировка') }}
    </div>
</div>

<div class="wrap__block">
    <h2>Слайдер</h2>
    @include('admin.medicine.image-select-section')

    <hr>
    <h3>Новый елемент слайдера</h3>
    <div>
        <label class="input__file">
            <span class="btn" data-default='Загрузить файл'>Загрузить файл</span>
            {!! Form::file('slider[]', ['accept'=>'image/*', 'class'=>'file', 'id' => 'slider_img']) !!}
        </label>
    </div>

    <div class="input__group">
        {!! Form::text('imgalt[]', null,
                                    ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
        {{ Form::label('imgalt', 'Alt image') }}
    </div>
    <div class="input__group">
        {!! Form::text('imgtitle[]', null,
                        ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
        {{ Form::label('imgtitle', 'Image Title') }}
    </div>
</div>

{{--TODO нижний блок block-text сделать компонентом, который уже существует @include('admin.medicine.content-block', $drug) --}}
<div class="block-text">
    <div class="rubrics">
        <div class="rubric active">
            <div class="rub-num">
                <p>#1</p>
            </div>
            <div class="rub-name">Склад</div>
            <div class="nacc-content">
                <textarea  rows="5" name="consist" class="form-control editor">
                        {!! old('consist') ? : ($drug->consist ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#2</p>
            </div>
            <div class="rub-name">Лікарська форма</div>
            <div class="nacc-content">
                <textarea  rows="5" name="docs_form" class="form-control editor">
                        {!! old('docs_form') ? : ($drug->docs_form ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#3</p>
            </div>
            <div class="rub-name">Основні фізико-хімічні властивості</div>
            <div class="nacc-content">
                 <textarea  rows="5" name="physicochemical_char" class="form-control editor">
                    {!! old('physicochemical_char') ? : ($drug->physicochemical_char ?? '') !!}
                </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#4</p>
            </div>
            <div class="rub-name">Виробник</div>
            <div class="nacc-content">
                <textarea  rows="5" name="fabricator" class="form-control editor">
                    {!! old('fabricator') ? : ($drug->fabricator ?? '') !!}
                </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#5</p>
            </div>
            <div class="rub-name">Місцезнаходження виробника</div>
            <div class="nacc-content">
 <textarea  rows="5" name="addr_fabricator" class="form-control editor">
                    {!! old('addr_fabricator') ? : ($drug->addr_fabricator ?? '') !!}
                </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#6</p>
            </div>
            <div class="rub-name">Фармакотерапевтична група</div>
            <div class="nacc-content">
 <textarea  rows="5" name="pharm_group" class="form-control editor">
                    {!! old('pharm_group') ? : ($drug->pharm_group ?? '') !!}
                     </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#7</p>
            </div>
            <div class="rub-name">Фармакологічні властивості</div>
            <div class="nacc-content">
  <textarea  rows="5" name="pharm_prop" class="form-control editor">
                    {!! old('pharm_prop') ? : ($drug->pharm_prop ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#8</p>
            </div>
            <div class="rub-name">Показання до застосування</div>
            <div class="nacc-content">
  <textarea  rows="5" name="indications" class="form-control editor">
                    {!! old('indications') ? : ($drug->indications ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#9</p>
            </div>
            <div class="rub-name"> Протипоказання</div>
            <div class="nacc-content">
 <textarea  rows="5" name="contraindications" class="form-control editor">
                    {!! old('contraindications') ? : ($drug->contraindications ?? '') !!}
                     </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#10</p>
            </div>
            <div class="rub-name">Особливості застосування</div>
            <div class="nacc-content">
 <textarea  rows="5" name="application_features" class="form-control editor">
                    {!! old('application_features') ? : ($drug->application_features ?? '') !!}
                     </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#11</p>
            </div>
            <div class="rub-name">Міри безпеки</div>
            <div class="nacc-content">
  <textarea  rows="5" name="security" class="form-control editor">
                    {!! old('security') ? : ($drug->security ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#12</p>
            </div>
            <div class="rub-name">Застосування в період вагітності або годування груддю</div>
            <div class="nacc-content">
  <textarea  rows="5" name="pregnancy" class="form-control editor">
                    {!! old('pregnancy') ? : ($drug->pregnancy ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#13</p>
            </div>
            <div class="rub-name">Вплив на здатність керувати транспортними засобами і механізмами</div>
            <div class="nacc-content">
  <textarea  rows="5" name="cars" class="form-control editor">
                    {!! old('cars') ? : ($drug->cars ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#14</p>
            </div>
            <div class="rub-name">Діти</div>
            <div class="nacc-content">
  <textarea  rows="5" name="children" class="form-control editor">
                    {!! old('children') ? : ($drug->children ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#15</p>
            </div>
            <div class="rub-name">Спосіб застосування та дози</div>
            <div class="nacc-content">
                <textarea  rows="5" name="app_mode" class="form-control editor">
                    {!! old('app_mode') ? : ($drug->app_mode ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#16</p>
            </div>
            <div class="rub-name">Передозування</div>
            <div class="nacc-content">
                <textarea  rows="5" name="overdose" class="form-control editor">
                    {!! old('overdose') ? : ($drug->overdose ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#17</p>
            </div>
            <div class="rub-name">Побічні дії</div>
            <div class="nacc-content">
                  <textarea  rows="5" name="side_effects" class="form-control editor">
                    {!! old('side_effects') ? : ($drug->side_effects ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#18</p>
            </div>
            <div class="rub-name">Лікарська взаємодія</div>
            <div class="nacc-content">
                  <textarea  rows="5" name="interaction" class="form-control editor">
                    {!! old('interaction') ? : ($drug->interaction ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#19</p>
            </div>
            <div class="rub-name">Термін придатності</div>
            <div class="nacc-content">
                  <textarea  rows="5" name="shelf_life" class="form-control editor">
                    {!! old('shelf_life') ? : ($drug->shelf_life ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#20</p>
            </div>
            <div class="rub-name">Умови зберігання</div>
            <div class="nacc-content">
                 <textarea  rows="5" name="saving" class="form-control editor">
                    {!! old('saving') ? : ($drug->saving ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#21</p>
            </div>
            <div class="rub-name">Упаковка</div>
            <div class="nacc-content">
                  <textarea  rows="5" name="packaging" class="form-control editor">
                    {!! old('packaging') ? : ($drug->packaging ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#22</p>
            </div>
            <div class="rub-name">Категорія відпуску</div>
            <div class="nacc-content">
                 <textarea  rows="5" name="leave_cat" class="form-control editor">
                        {!! old('leave_cat') ? : ($drug->leave_cat ?? '') !!}
                    </textarea>
            </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#23</p>
            </div>
            <div class="rub-name">Додатково</div>
            <div class="nacc-content">
                <textarea  rows="5" name="additionally" class="form-control editor">
                    {!! old('additionally') ? : ($drug->additionally ?? '') !!}
                    </textarea>
            </div>
        </div>
    </div>
</div>
{{--<div class="block-text">--}}
    {{--<div class="rubrics">--}}
        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#1</p>--}}
                {{--<p>перший блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Склад</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}
        {{--<div class="rubric active">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#2</p>--}}
                {{--<p>другий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Лікарська форма</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}
        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#3</p>--}}
                {{--<p>третій блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Основні фізико-хімічні властивості</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}
        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#4</p>--}}
                {{--<p>четвертий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Виробник</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}
        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#5</p>--}}
                {{--<p>п’ятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Місцезнаходження виробника</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}
        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#6</p>--}}
                {{--<p>шостий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Фармакотерапевтична група</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}
        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#7</p>--}}
                {{--<p>сьомий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Фармакологічні властивості</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}
        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#8</p>--}}
                {{--<p>восьмий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Показання до застосування</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}
        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#9</p>--}}
                {{--<p>дев'ятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name"> Протипоказання</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}
        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#10</p>--}}
                {{--<p>десятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Особливості застосування</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}
        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#11</p>--}}
                {{--<p>одинадцятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Міри безпеки</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}
        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#12</p>--}}
                {{--<p>дванадцятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Застосування в період вагітності або годування груддю</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#13</p>--}}
                {{--<p>тринадцятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Вплив на здатність керувати транспортними засобами і механізмами</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#14</p>--}}
                {{--<p>чотирнадцятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Діти</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#15</p>--}}
                {{--<p>п'ятнадцятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Спосіб застосування та дози</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#16</p>--}}
                {{--<p>шістнадцятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Передозування</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#17</p>--}}
                {{--<p>сімнадцятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Побічні дії</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#18</p>--}}
                {{--<p>вісімнадцятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Лікарська взаємодія</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#19</p>--}}
                {{--<p>дев'ятнадцятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Термін придатності</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#20</p>--}}
                {{--<p>двадцятий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Умови зберігання</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#21</p>--}}
                {{--<p>двадцять перший блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Упаковка</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#22</p>--}}
                {{--<p>двадцять другий блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Категорія відпуску</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

        {{--<div class="rubric">--}}
            {{--<div class="rub-num">--}}
                {{--<p>#23</p>--}}
                {{--<p>двадцять третій блок</p>--}}
            {{--</div>--}}
            {{--<div class="rub-name">Додатково</div>--}}
            {{--<div class="rub-text"></div>--}}
        {{--</div>--}}

    {{--</div>--}}
    {{--<div class="tiny-content">--}}
        {{--<div class="nacc">--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Склад</h3>--}}
                {{--<textarea name="consist" class="form-control editor">--}}
                    {{--{!! old('consist') ? : ($drug->consist ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class=" nacc-content active">--}}
                {{--<h3>Лікарська форма</h3>--}}
                {{--<textarea name="docs_form" class="form-control editor">--}}
                    {{--{!! old('docs_form') ? : ($drug->docs_form ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Основні фізико-хімічні властивості--}}
                {{--</h3>--}}

                {{--<textarea name="physicochemical_char" class="form-control editor">--}}
                    {{--{!! old('physicochemical_char') ? : ($drug->physicochemical_char ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Виробник</h3>--}}

                {{--<textarea name="fabricator" class="form-control editor">--}}
                    {{--{!! old('fabricator') ? : ($drug->fabricator ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Місцезнаходження виробника</h3>--}}

                {{--<textarea name="addr_fabricator" class="form-control editor">--}}
                    {{--{!! old('addr_fabricator') ? : ($drug->addr_fabricator ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Фармакотерапевтична група</h3>--}}

                {{--<textarea name="pharm_group" class="form-control editor">--}}
                    {{--{!! old('pharm_group') ? : ($drug->pharm_group ?? '') !!}--}}
                     {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Фармакологічні властивості</h3>--}}

                {{--<textarea name="pharm_prop" class="form-control editor">--}}
                    {{--{!! old('pharm_prop') ? : ($drug->pharm_prop ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Показання до застосування</h3>--}}

                {{--<textarea name="indications" class="form-control editor">--}}
                    {{--{!! old('indications') ? : ($drug->indications ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Протипоказання</h3>--}}

                {{--<textarea name="contraindications" class="form-control editor">--}}
                    {{--{!! old('contraindications') ? : ($drug->contraindications ?? '') !!}--}}
                     {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Особливості застосування</h3>--}}

                {{--<textarea name="application_features" class="form-control editor">--}}
                    {{--{!! old('application_features') ? : ($drug->application_features ?? '') !!}--}}
                     {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Міри безпеки</h3>--}}
                {{--<textarea name="security" class="form-control editor">--}}
                    {{--{!! old('security') ? : ($drug->security ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Застосування в період вагітності або годування груддю</h3>--}}
                {{--<textarea name="pregnancy" class="form-control editor">--}}
                    {{--{!! old('pregnancy') ? : ($drug->pregnancy ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Вплив на здатність керувати транспортними засобами і механізмами</h3>--}}
                {{--<textarea name="cars" class="form-control editor">--}}
                    {{--{!! old('cars') ? : ($drug->cars ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Діти</h3>--}}
                {{--<textarea name="children" class="form-control editor">--}}
                    {{--{!! old('children') ? : ($drug->children ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Спосіб застосування та дози</h3>--}}
                {{--<textarea name="app_mode" class="form-control editor">--}}
                    {{--{!! old('app_mode') ? : ($drug->app_mode ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Передозування</h3>--}}
                {{--<textarea name="overdose" class="form-control editor">--}}
                    {{--{!! old('overdose') ? : ($drug->overdose ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Побічні дії</h3>--}}
                {{--<textarea name="side_effects" class="form-control editor">--}}
                    {{--{!! old('side_effects') ? : ($drug->side_effects ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Лікарська взаємодія</h3>--}}
                {{--<textarea name="interaction" class="form-control editor">--}}
                    {{--{!! old('interaction') ? : ($drug->interaction ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Термін придатності</h3>--}}
                {{--<textarea name="shelf_life" class="form-control editor">--}}
                    {{--{!! old('shelf_life') ? : ($drug->shelf_life ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Умови зберігання</h3>--}}
                {{--<textarea name="saving" class="form-control editor">--}}
                    {{--{!! old('saving') ? : ($drug->saving ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Форма випуску / упаковка</h3>--}}
                {{--<textarea name="packaging" class="form-control editor">--}}
                    {{--{!! old('packaging') ? : ($drug->packaging ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Категорія відпуску</h3>--}}
                {{--<textarea name="leave_cat" class="form-control editor">--}}
                        {{--{!! old('leave_cat') ? : ($drug->leave_cat ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Додатково</h3>--}}
                {{--<textarea name="additionally" class="form-control editor">--}}
                    {{--{!! old('additionally') ? : ($drug->additionally ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<!-- SEO -->
<div class="wrap__block">
    <h2>SEO контент</h2>
    <div class="two__column">
        <div class="input__group">
            {!! Form::text('seo_title', old('seo_title') ? : '',
                 ['placeholder'=>'seo_title', 'id'=>'seo_title', 'class'=>'form-control']) !!}
            {{ Form::label('seo_title', 'SEO_TITLE') }}
        </div>
        <div class="input__group">
            {!! Form::text('seo_description', old('seo_description') ? : '',
                     ['placeholder'=>'seo_description', 'id'=>'seo_description', 'class'=>'form-control']) !!}
            {{ Form::label('seo_description', 'SEO_DESCRIPTION') }}
        </div>

        <div class="input__group">
            {!! Form::text('og_image', old('og_image') ? : '',
                    ['placeholder'=>'og_image', 'id'=>'og_image', 'class'=>'form-control']) !!}
            {{ Form::label('og_image', 'OG_IMAGE') }}
        </div>
        <div class="input__group">
            {!! Form::text('og_title', old('og_title') ? :'',
                     ['placeholder'=>'og_title', 'id'=>'og_title', 'class'=>'form-control']) !!}
            {{ Form::label('og_title', 'OG_TITLE') }}
        </div>
        <div class="input__group">
            {!! Form::text('og_description', old('og_description') ? : '',
                     ['placeholder'=>'og_description', 'id'=>'og_description', 'class'=>'form-control', 'rows'=>20]) !!}
            {{ Form::label('og_description', 'OG_DESCRIPTION') }}
        </div>
    </div>
    <h4>SEO_TEXT</h4>
    <textarea name="seo_text"
              rows="20">{!! old('seo_text') ? : '' !!}</textarea>
</div>
<!-- SEO -->
<div>
    {!! Form::button('Добавить', ['class' => 'btn btn__full','type'=>'submit']) !!}
</div>
{!! Form::close() !!}

{{--popup sections--}}


<div class="pop-up">
    <div class="pop-header">
        <h3>Дополнительные сведенья</h3>
        <div class="close"><img src="{{asset('assets/admin/imgs/close-blue.svg')}}" alt="close"></div>
    </div>
    <div class="form-inner">
        <div class="add-background">
            <div class="input__group">
                {!! Form::text('backcolor', old('backcolor') ? : '',
                     ['placeholder'=>'FFF000', 'id'=>'backcolor', 'class'=>'form-control']) !!}
                {{ Form::label('backcolor', 'Фон страницы (#)') }}
            </div>
            <div class="checkbox__several">
            <div class="input__group info-check label-stay">
                <input type="checkbox"
                       {{ old('approved') ? 'checked' : '' }} value="1"
                       name="approved" class="checkbox" id="asd">
                <label for="asd" class="check-box"></label>
                <label for="asd" class="check-text">Опубликовать</label>
            </div>
            <div class="input__group info-check label-stay">
                <input type="checkbox"
                       {{ (old('certified') || !empty($drug->certified)) ? 'checked' : '' }} value="1"
                       name="certified" id="certification">
                <label for="certification" class="check-box"></label>
                <label for="certification" class="check-text">Сертифицирован</label>
            </div>
            </div>
        </div>

        <div class="input__group">
            {!! Form::text('form', old('form') ? : '',
             ['placeholder'=>'ATX', 'id'=>'form', 'class'=>'form-control autocomplete',
               'autocomplete'=>'off', 'data-id'=>10000]) !!}
            {!! Form::hidden('form_id', old('form_id') ? : '', ['id'=>'form_id']) !!}
            {{ Form::label('form', 'Форма выпуска') }}
        </div>
        <div class="input__group">
            {!! Form::text('innname', old('innname') ? : '',
              ['placeholder'=>'...', 'id'=>'innname', 'autocomplete'=>'off',
                 'class'=>'form-control autocomplete', 'data-id'=>10000]) !!}
            {!! Form::hidden('innname_id', old('innname_id') ? : '', ['id'=>'innname_id']) !!}
            {{ Form::label('innname', 'Международное название') }}
        </div>
        <div class="input__group">
            {!! Form::text('classification', old('classification') ? : '',
             ['placeholder'=>'ATX', 'id'=>'classification', 'class'=>'form-control autocomplete',
               'autocomplete'=>'off', 'data-id'=>10000]) !!}
            {!! Form::hidden('classification_id', old('classification_id') ? : '', ['id'=>'classification_id']) !!}
            {{ Form::label('classification', 'Классификация') }}
        </div>
        <div class="input__group">
            {!! Form::text('pharmagroup_name', old('pharmagroup_name') ? : '',
             ['placeholder'=>'Фарм. группа', 'id'=>'pharmagroup_name', 'class'=>'form-control autocomplete',
               'autocomplete'=>'off','data-id'=>1000]) !!}
            {!! Form::hidden('pharmagroup_name_id', old('pharmagroup_name_id') ? : '', ['id'=>'pharmagroup_name_id']) !!}
            {{ Form::label('pharmagroup_name', 'Фарм. группа') }}
        </div>
        <div class="input__group">
            {!! Form::text('fabricator_name', old('fabricator_name') ? : '',
             ['placeholder'=>'...', 'id'=>'fabricator_name', 'class'=>'form-control autocomplete',
               'autocomplete'=>'off', 'data-id'=>1000]) !!}
            {!! Form::hidden('fabricator_name_id', old('fabricator_name_id') ? : '', ['id'=>'fabricator_name_id']) !!}
            {{ Form::label('fabricator_name', 'Производитель') }}
        </div>
        <div class="input__group label-stay"><!--выпадающий список-->
            {{ Form::select('substance[]', $substance, null,
            ['multiple' => 'multiple',
            'class'=>'custom-select substance',
            'style' => 'width:100%, display: none']) }}

            {{ Form::label('substance','Действующее вещество') }}
        </div>
    </div>
    <div class="info-but">
        <button type="submit" class="btn">Создать</button>
    </div>
</div>

<div class="shablon" style="display:none">
    <div>
        {!! Form::file('slider[]', ['accept'=>'image/*', 'class'=>'form-control']) !!}
        <span class="remove-this"><button type="button" class="btn btn__red">-</button></span>
        {{ Form::label('imgalt', 'Параметры картинки') }}
        <div class="two__column"><!--две колонки-->
            <div class="">
                {!! Form::text('imgalt[]', null,
                                ['placeholder'=>'Alt', 'id'=>'imgalt', 'class'=>'form-control']) !!}
            </div>
            <div class="">
                {!! Form::text('imgtitle[]', null,
                                ['placeholder'=>'Title', 'id'=>'imgtitle', 'class'=>'form-control']) !!}
            </div>
            <hr>
        </div>
    </div>
    <hr>
</div>
<div class="shablon-substance" style="display:none">
    <div>
        {!! Form::text('substance[]', null, ['placeholder'=>'...', 'class'=>'form-control autocomplete',
              'autocomplete'=>'off']) !!}
        {!! Form::hidden('substance_id[]') !!}
        <span class="remove-this"><button type="button" class="btn btn__red">-</button></span>
    </div>
</div>


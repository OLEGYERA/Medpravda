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
    {{--<div class="tiny-content">--}}
        {{--<div class="nacc">--}}
            {{--<div class="nacc-content">--}}
            {{--<h3>Склад</h3>--}}
            {{--<textarea  rows="5" name="consist" class="form-control editor">--}}
            {{--{!! old('consist') ? : ($drug->consist ?? '') !!}--}}
            {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class=" nacc-content active">--}}
            {{--<h3>Лікарська форма</h3>--}}
            {{--<textarea  rows="5" name="docs_form" class="form-control editor">--}}
            {{--{!! old('docs_form') ? : ($drug->docs_form ?? '') !!}--}}
            {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
            {{--<h3>Основні фізико-хімічні властивості</h3>--}}
            {{--<textarea  rows="5" name="physicochemical_char" class="form-control editor">--}}
            {{--{!! old('physicochemical_char') ? : ($drug->physicochemical_char ?? '') !!}--}}
            {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
            {{--<h3>Виробник</h3>--}}
            {{--<textarea  rows="5" name="fabricator" class="form-control editor">--}}
            {{--{!! old('fabricator') ? : ($drug->fabricator ?? '') !!}--}}
            {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Місцезнаходження виробника</h3>--}}
                {{--<textarea  rows="5" name="addr_fabricator" class="form-control editor">--}}
                    {{--{!! old('addr_fabricator') ? : ($drug->addr_fabricator ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Фармакотерапевтична група</h3>--}}
                {{--<textarea  rows="5" name="pharm_group" class="form-control editor">--}}
                    {{--{!! old('pharm_group') ? : ($drug->pharm_group ?? '') !!}--}}
                     {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Фармакологічні властивості</h3>--}}
                {{--<textarea  rows="5" name="pharm_prop" class="form-control editor">--}}
                    {{--{!! old('pharm_prop') ? : ($drug->pharm_prop ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Показання до застосування</h3>--}}
                {{--<textarea  rows="5" name="indications" class="form-control editor">--}}
                    {{--{!! old('indications') ? : ($drug->indications ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3> Протипоказання</h3>--}}
                {{--<textarea  rows="5" name="contraindications" class="form-control editor">--}}
                    {{--{!! old('contraindications') ? : ($drug->contraindications ?? '') !!}--}}
                     {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Особливості застосування</h3>--}}
                {{--<textarea  rows="5" name="application_features" class="form-control editor">--}}
                    {{--{!! old('application_features') ? : ($drug->application_features ?? '') !!}--}}
                     {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>Міри безпеки</h3>--}}
                {{--<textarea  rows="5" name="security" class="form-control editor">--}}
                    {{--{!! old('security') ? : ($drug->security ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Застосування в період вагітності або годування груддю</h3>--}}
                {{--<textarea  rows="5" name="pregnancy" class="form-control editor">--}}
                    {{--{!! old('pregnancy') ? : ($drug->pregnancy ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Вплив на здатність керувати транспортними засобами і механізмами</h3>--}}
                {{--<textarea  rows="5" name="cars" class="form-control editor">--}}
                    {{--{!! old('cars') ? : ($drug->cars ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Діти</h3>--}}
                {{--<textarea  rows="5" name="children" class="form-control editor">--}}
                    {{--{!! old('children') ? : ($drug->children ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Спосіб застосування та дози</h3>--}}
                {{--<textarea  rows="5" name="app_mode" class="form-control editor">--}}
                    {{--{!! old('app_mode') ? : ($drug->app_mode ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Передозування</h3>--}}
                {{--<textarea  rows="5" name="overdose" class="form-control editor">--}}
                    {{--{!! old('overdose') ? : ($drug->overdose ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Побічні дії</h3>--}}
                {{--<textarea  rows="5" name="side_effects" class="form-control editor">--}}
                    {{--{!! old('side_effects') ? : ($drug->side_effects ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Лікарська взаємодія</h3>--}}
                {{--<textarea  rows="5" name="interaction" class="form-control editor">--}}
                    {{--{!! old('interaction') ? : ($drug->interaction ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Термін придатності</h3>--}}
                {{--<textarea  rows="5" name="shelf_life" class="form-control editor">--}}
                    {{--{!! old('shelf_life') ? : ($drug->shelf_life ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Умови зберігання</h3>--}}
                {{--<textarea  rows="5" name="saving" class="form-control editor">--}}
                    {{--{!! old('saving') ? : ($drug->saving ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Форма випуску / упаковка</h3>--}}
                {{--<textarea  rows="5" name="packaging" class="form-control editor">--}}
                    {{--{!! old('packaging') ? : ($drug->packaging ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Категорія відпуску</h3>--}}
                {{--<textarea  rows="5" name="leave_cat" class="form-control editor">--}}
                        {{--{!! old('leave_cat') ? : ($drug->leave_cat ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="nacc-content">--}}
                {{--<h3>Додатково</h3>--}}
                {{--<textarea  rows="5" name="additionally" class="form-control editor">--}}
                    {{--{!! old('additionally') ? : ($drug->additionally ?? '') !!}--}}
                    {{--</textarea>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
</div>
<div class="block-text">
    <div class="rubrics">
        <div class="rubric active">
            <div class="rub-num">
                <p>#1</p>
            </div>
            <div class="rub-name">
                @if(strstr($spec, 'ru'))
                    Состав:
                @else
                    Склад:
                @endif
            </div>
             <div class="nacc-content">
  <textarea name="consist" class="form-control editor">
                    {!! old('consist') ? : ($drug->consist ?? '') !!}
                </textarea>
             </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#2</p>
            </div>
            <div class="rub-name">
                @if(strstr($spec, 'ru'))
                    Свойства:
                @else
                    Властивості:
                @endif</div>
             <div class="nacc-content">
 <textarea name="pharm_prop" class="form-control editor">
                    {!! old('pharm_prop') ? : ($drug->pharm_prop ?? '') !!}
                </textarea>
             </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#3</p>
            </div>
            <div class="rub-name">
                @if(strstr($spec, 'ru'))
                    Рекомендации по применению:
                @else
                    Рекомендації щодо застосування:
                @endif
            </div>
             <div class="nacc-content">
 <textarea name="recommendations" class="form-control editor">
                    {!! old('recommendations') ? : ($drug->recommendations ?? '') !!}
                </textarea>
             </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#4</p>
            </div>
            <div class="rub-name">
                @if(strstr($spec, 'ru'))
                    Особые указания:
                @else
                    Особливі вказівки:
                @endif
            </div>
             <div class="nacc-content">
 <textarea name="special_instructions" class="form-control editor">
                    {!! old('special_instructions') ? : ($drug->special_instructions ?? '') !!}
                </textarea>
             </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#5</p>
            </div>
            <div class="rub-name">
                @if(strstr($spec, 'ru'))
                    Противопоказания:
                @else
                    Протипоказання:
                @endif
            </div>
             <div class="nacc-content">
  <textarea name="contraindications" class="form-control editor">
                    {!! old('contraindications') ? : ($drug->contraindications ?? '') !!}
                </textarea>
             </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#6</p>
            </div>
            <div class="rub-name">
                @if(strstr($spec, 'ru'))
                    Способ применения:
                @else
                    Спосіб застосування:
                @endif
            </div>
             <div class="nacc-content">
  <textarea name="app_mode" class="form-control editor">
                    {!! old('app_mode') ? : ($drug->app_mode ?? '') !!}
                </textarea>
             </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#7</p>
            </div>
            <div class="rub-name">
                @if(strstr($spec, 'ru'))
                    Форма выпуска / упаковка:
                @else
                    Форма випуску / упаковка:
                @endif
            </div>
             <div class="nacc-content">
  <textarea name="packaging" class="form-control editor">
                    {!! old('packaging') ? : ($drug->packaging ?? '') !!}
                </textarea>
             </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#8</p>
            </div>
            <div class="rub-name">
                @if(strstr($spec, 'ru'))
                    Условия хранения:
                @else
                    Умови зберігання:
                @endif
            </div>
             <div class="nacc-content">
  <textarea name="saving" class="form-control editor">
                    {!! old('saving') ? : ($drug->saving ?? '') !!}
                </textarea>
             </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#9</p>
            </div>
            <div class="rub-name">
                @if(strstr($spec, 'ru'))
                    Производитель:
                @else
                    Виробник:
                @endif
            </div>
             <div class="nacc-content">
 <textarea name="fabricator_name" class="form-control editor">
                    {!! old('fabricator_name') ? : ($drug->fabricator_name ?? '') !!}
                </textarea>
             </div>
        </div>
        <div class="rubric">
            <div class="rub-num">
                <p>#10</p>
            </div>
            <div class="rub-name">
                @if(strstr($spec, 'ru'))
                    Дополнительно:
                @else
                    Додатково:
                @endif
            </div>
             <div class="nacc-content">
<textarea name="additionally" class="form-control editor">
                    {!! old('additionally') ? : ($drug->additionally ?? '') !!}
                </textarea>
             </div>
        </div>
    </div>

    {{--<div class="tiny-content">--}}
        {{--<div class="nacc">--}}
            {{--content of form inputs--}}

            {{--#1--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>--}}
                    {{--@if(strstr($spec, 'ru'))--}}
                        {{--Состав:--}}
                    {{--@else--}}
                        {{--Склад:--}}
                    {{--@endif--}}
                    {{--<a href="javascript:void(0)">Посмотреть</a></h3>--}}
                {{--<textarea name="consist" class="form-control editor">--}}
                    {{--{!! old('consist') ? : ($drug->consist ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>--}}
                    {{--@if(strstr($spec, 'ru'))--}}
                        {{--Свойства:--}}
                    {{--@else--}}
                        {{--Властивості:--}}
                    {{--@endif--}}
                    {{--<a href="javascript:void(0)">Посмотреть</a></h3>--}}

                {{--<textarea name="pharm_prop" class="form-control editor">--}}
                    {{--{!! old('pharm_prop') ? : ($drug->pharm_prop ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}

            {{--4--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>--}}
                    {{--@if(strstr($spec, 'ru'))--}}
                        {{--Рекомендации по применению:--}}
                    {{--@else--}}
                        {{--Рекомендації щодо застосування:--}}
                    {{--@endif--}}

                    {{--<a href="javascript:void(0)">Посмотреть</a></h3>--}}

                {{--<textarea name="recommendations" class="form-control editor">--}}
                    {{--{!! old('recommendations') ? : ($drug->recommendations ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}

            {{--5--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>--}}
                    {{--@if(strstr($spec, 'ru'))--}}
                        {{--Особые указания:--}}
                    {{--@else--}}
                        {{--Особливі вказівки:--}}
                    {{--@endif--}}
                    {{--<a href="javascript:void(0)">Посмотреть</a></h3>--}}

                {{--<textarea name="special_instructions" class="form-control editor">--}}
                    {{--{!! old('special_instructions') ? : ($drug->special_instructions ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}

            {{--6--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>--}}
                    {{--@if(strstr($spec, 'ru'))--}}
                        {{--Противопоказания:--}}
                    {{--@else--}}
                        {{--Протипоказання:--}}
                    {{--@endif--}}
                    {{--<a href="javascript:void(0)">Посмотреть</a></h3>--}}

                {{--<textarea name="contraindications" class="form-control editor">--}}
                    {{--{!! old('contraindications') ? : ($drug->contraindications ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}

            {{--7--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>--}}
                    {{--@if(strstr($spec, 'ru'))--}}
                        {{--Способ применения и дозы:--}}
                    {{--@else--}}
                        {{--Спосіб застосування та дози:--}}
                    {{--@endif--}}
                    {{--<a href="javascript:void(0)">Посмотреть</a></h3>--}}

                {{--<textarea name="app_mode" class="form-control editor">--}}
                    {{--{!! old('app_mode') ? : ($drug->app_mode ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}

            {{--8--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>--}}
                    {{--@if(strstr($spec, 'ru'))--}}
                        {{--Форма выпуска / упаковка:--}}
                    {{--@else--}}
                        {{--Форма випуску / упаковка:--}}
                    {{--@endif--}}
                    {{--<a href="javascript:void(0)">Посмотреть</a></h3>--}}

                {{--<textarea name="packaging" class="form-control editor">--}}
                    {{--{!! old('packaging') ? : ($drug->packaging ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}

            {{--9--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>--}}
                    {{--@if(strstr($spec, 'ru'))--}}
                        {{--Условия хранения:--}}
                    {{--@else--}}
                        {{--Умови зберігання:--}}
                    {{--@endif--}}
                    {{--<a href="javascript:void(0)">Посмотреть</a></h3>--}}

                {{--<textarea name="saving" class="form-control editor">--}}
                    {{--{!! old('saving') ? : ($drug->saving ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}

            {{--10--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>@if(strstr($spec, 'ru'))--}}
                        {{--Производитель:--}}
                    {{--@else--}}
                        {{--Виробник:--}}
                    {{--@endif--}}

                    {{--<a href="javascript:void(0)">Посмотреть</a></h3>--}}

                {{--<textarea name="fabricator_name" class="form-control editor">--}}
                    {{--{!! old('fabricator_name') ? : ($drug->fabricator_name ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}
            {{--11--}}
            {{--<div class="nacc-content">--}}
                {{--<h3>--}}
                    {{--@if(strstr($spec, 'ru'))--}}
                        {{--Дополнительно:--}}
                    {{--@else--}}
                        {{--Додатково:--}}
                    {{--@endif--}}
                    {{--<a href="javascript:void(0)">Посмотреть</a></h3>--}}
                {{--<textarea name="content" class='form-control editor'></textarea>--}}
                {{--<textarea name="additionally" class="form-control editor">--}}
                    {{--{!! old('additionally') ? : ($drug->additionally ?? '') !!}--}}
                {{--</textarea>--}}
            {{--</div>--}}

            {{--{!! Form::button('Добавить', ['class' => 'btn btn-blue','type'=>'submit']) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
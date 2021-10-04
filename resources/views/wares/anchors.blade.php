<ul class="top-product-nav">
    @if(!empty($model->consist))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/1_sostav.png" alt="Состав">
            <a href="#sostav">Состав</a>
        </li>
    @endif
    @if(!empty($model->pharm_prop))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/2_svoystva.png"
                 alt="Свойства">
            <a href="#farmsvoistva">Свойства</a>
        </li>
    @endif
    @if(!empty($model->recommendations))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/3_pokazaniya.png"
                 alt="Рекомендации по применению">
            <a href="#recomendacii">Рекомендации по применению</a>
        </li>
    @endif
    @if(!empty($model->special_instructions))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/12_mery_bezopasnosti.png"
                 alt="Особые указания">
            <a href="#ukazaniya">Особые указания</a>
        </li>
    @endif
    @if(!empty($model->contraindications))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/6_protivopokazaniya.png"
                 alt="Противопоказания">
            <a href="#protivipokazaniya">Противопоказания</a>
        </li>
    @endif
    @if(!empty($model->app_mode))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/23_sposob_primineniya.png"
                 alt="Способ применения и дозы">
            <a href="#premenenieidosa">Способ применения и дозы</a>
        </li>
    @endif
    @if(!empty($model->packaging))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/16_upakovka.png"
                 alt="Форма выпуска / упаковка">
            <a href="#upakovka">Форма выпуска / упаковка</a>
        </li>
    @endif
    @if(!empty($model->saving))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/15_hranenie.png"
                 alt="Условия хранения">
            <a href="#usloviyahraneniya">Условия хранения</a>
        </li>
    @endif
    @if(!empty($model->fabricator_name))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/20_proizvoditel.png"
                 alt="Производитель">
            <a href="#proizvoditel">Производитель</a>
        </li>
    @endif
    @if(!empty($model->additionally))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/22_dopolnitelno.png"
                 alt="Дополнительно">
            <a href="#dopolnitelno">Дополнительно</a>
        </li>
    @endif
</ul>
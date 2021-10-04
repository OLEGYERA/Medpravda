<ul class="top-product-nav">
    @if(!empty($model->consist))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/1_sostav.png" alt="Склад" title="Склад" width="16" height="8">
            <a href="#sostav">Склад</a>
        </li>
    @endif
    @if(!empty($model->pharm_group))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/18_farm_gruppa.png"
                 alt="Група" title="Група" width="15" height="13">
            <a href="#farmgruppa">Група</a>
        </li>
    @endif
    @if(!empty($model->pharm_prop))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/2_svoystva.png"
                 alt="Властивості" title="Властивості" width="14" height="13">
            <a href="#farmsvoistva">Властивості</a>
        </li>
    @endif
    @if(!empty($model->recommendations))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/8_vzabmodeystvie.png"
                 alt="Рекомендації щодо застосування"
                 title="Рекомендації щодо застосування" width="14" height="14">
            <a href="#recomendacii">Рекомендації щодо застосування</a>
        </li>
    @endif
    @if(!empty($model->special_instructions))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/8_vzabmodeystvie.png"
                 alt="Особливі вказівки"
                 title="Особливі вказівки" width="14" height="14">
            <a href="#ukazaniya">Особливі вказівки</a>
        </li>
    @endif
    @if(!empty($model->contraindications))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/6_protivopokazaniya.png"
                 alt="Протипоказання"
                 title="Протипоказання" width="14" height="14">
            <a href="#protivipokazaniya">Протипоказання</a>
        </li>
    @endif
    @if(!empty($model->app_mode))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/23_sposob_primineniya.png"
                 alt="Спосіб застосування та дози"
                 title="Спосіб застосування та дози" width="11" height="15">
            <a href="#premenenieidosa">Спосіб застосування та дози</a>
        </li>
    @endif
    @if(!empty($model->packaging))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/16_upakovka.png"
                 alt="Форма випуску / упаковка"
                 title="Форма випуску / упаковка" width="11" height="15">
            <a href="#upakovka">Форма випуску / упаковка</a>
        </li>
    @endif
    @if(!empty($model->saving))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/15_hranenie.png"
                 alt="Умови зберігання"
                 title="Умови зберігання" width="13" height="16">
            <a href="#usloviyahraneniya">Умови зберігання</a>
        </li>
    @endif
    @if(!empty($model->fabricator_name))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/20_proizvoditel.png"
                 alt="Виробник"
                 title="Виробник" width="14" height="14">
            <a href="#proizvoditel">Виробник</a>
        </li>
    @endif
    @if(!empty($model->additionally))
        <li>
            <img src="{{ asset('assets') }}/images/product-icon/22_dopolnitelno.png"
                 alt="Додатково"
                 title="Додатково" width="14" height="14">
            <a href="#dopolnitelno">Додатково</a>
        </li>
    @endif
</ul>
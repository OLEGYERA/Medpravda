<div class="full-content">
    <div class="double-wrap">
        <div class="page-content">
            <h1 class="page-title">Угода з користувачем про отримання інформації про рецептурні препарати</h1>
            <div class="row-prescription">
                @php
                    $date = \Carbon\Carbon::create('2019', '12', '20')
                @endphp
                <p style="margin-bottom: 10px">
                    <time datetime="{{$date->format('Y-m-d')}}">
                        <i>Дата створення: {{$date->format('d')}} {{renderNameOfMonth($date->format('M'), 'ua')}} {{$date->format('Y')}}</i>
                    </time>
                </p>
                <p>В даному розділі сайту компанія <b>ТОВ «ДІДЖІО»</b> надає інформацію про рецептурні препарати, зокрема про</p>
                <ul>
                    <li>їхню назву</li>
                    <li>характеристику</li>
                    <li>лікувальні властивості</li>
                    <li>можливу побічну дію</li>
                    <li>та іншу професійну спеціалізовану інформацію</li>
                </ul>
                <p>виключно спеціалістам охорони здоров’я (особам, що мають вищу або середню спеціальну медичну освіту).</p>
                <p>У випадку, якщо Ви не є спеціалістом охорони здоров’я, проте, порушуючи ці умови, підписуєте дану угоду, компанія <b>ТОВ «ДІДЖІО»</b> не несе відповідальності за можливі негативні наслідки, що можуть виникнути в результаті самостійного використання Вами інформації з цього розділу сайту, без попередньої консультації зі спеціалістом. Ви робите це самостійно та осмислено, усвідомлюючи, що застосування рецептурних препаратів можливо тільки після попередньої консультації зі спеціалістом охорони здоров’я.</p>
                <p>Інформація про рецептурні препарати надається виключно для ознайомлення з препаратами і не є рекламою,  та не є керівництвом для самостійної діагностики або лікування, а також, не може бути використана в якості медичних порад або рекомендацій. Компанія <b>ТОВ «ДІДЖІО»</b> не несе відповідальності за можливу шкоду, спричинену Вашому здоров’ю у разі самостійного лікування, що проводиться на базі використання рецептурних препаратів (без попередньої консультації зі спеціалістом).</p>
                <a><span class="under-title">Цим я підтверджую, що є дипломованим спеціалістом охорони здоров’я.</span></a>
            </div>
        </div>
    </div>
</div>

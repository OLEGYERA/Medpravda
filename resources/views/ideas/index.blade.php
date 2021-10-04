<h1>TEST</h1>
<a href="/preparat/ibuprofen?utm_source=piluli_kharkov&utm_medium=cpm&utm_campaign=wobenzym&utm_content=Branding_AjaxJS" id="test123">Ибупрофен</a>
<a href="/preparat/ibuprofen?utm_source=test_ru" id="test-ru">Ибупрофен</a>
<a href="/preparat/ibuprofen?utm_source=test_ru" id="RbVaaAl1bOE0lSUeRUMWgpv8M1534408310" target="_self">Ибупрофен-test</a>
<a href="https://medpravda.ua/preparat/atsik" id="jhjjhhjhj"  target="_self">Ибупрофен-test</a>

@forelse($ideas as $idea)
    <a href="{{env('APP_URL')}}/{{$idea->url.$idea->utm}}" id="{{$idea->href_id}}">{{ $idea->title }}</a>
@empty
    <h3>Нет активных компаний</h3>
@endforelse

<div class="breadcrumb">
    <a href="{{ route('landing.index') }}">Назад</a>
    <span>Редактирование лендинга - {{ $model->title ?? '' }}</span>
</div>

<!-- Nav tabs -->
<div class="top__nav">
    <a href="#home" class="btn btn__full">Основные параметры</a>
    <a href="#logo" class="btn">Лого</a>
    <a href="#boolpoint" class="btn">Бул-поинты</a>
    <a href="#background" class="btn">Заливка</a>
    <a href="#button" class="btn">Кнопки</a>
    <a href="#banner" class="btn">Баннер</a>
    <a href="#modal1" class="btn">Окно приветствия</a>
    <a href="#healing_block" class="btn">Блок "Самолечение"</a>
</div>
<!-- Tab panes -->
<div id="home">@include('admin.landings.params.general')</div>
<div id="logo">@include('admin.landings.params.logo')</div>
<div id="boolpoint">@include('admin.landings.params.boolpoint')</div>
<div id="background">@include('admin.landings.params.background')</div>
<div id="button">@include('admin.landings.params.button')</div>
<div id="banner">@include('admin.landings.params.banner')</div>
<div id="modal1">@include('admin.landings.params.modal')</div>
<div id="healing_block">@include('admin.landings.params.healing_block')</div>

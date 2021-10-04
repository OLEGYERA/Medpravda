<div class="breadcrumb">
    <a href="{{ route('landing.edit',['landing'=> $block->landing_id]) }}">Назад</a>
    <span>Редактирование блока - {{ $block->title }}</span>
</div>
<!-- Nav tabs -->
<div class="top__nav">
    <a href="#home" class="btn btn__full">Основные параметры</a>
    <a href="#boolpoint" class="btn">Бул-поинты</a>
    <a href="#background" class="btn">Заливка</a>
    <a href="#button1" class="btn">Кнопка №1</a>
    <a href="#button2" class="btn">Кнопка №2</a>
    <a href="#title1" class="btn">Заголовок №1</a>
    <a href="#title2" class="btn">Заголовок №2</a>
    <a href="#title3" class="btn">Заголовок №3</a>
    <a href="#description1" class="btn">Описание №1</a>
    <a href="#description2" class="btn">Описание №2</a>
    <a href="#image" class="btn">Изображение</a>
    <a href="#video" class="btn">Видео</a>
    <a href="#slides" class="btn">Слайдер</a>
    <a href="#script" class="btn">Скрипт</a>
    <a href="#custom" class="btn">Дополнительно(Карта)</a>
</div>

<!-- Tab panes -->
    <div id="home">@include('admin.landings.blocks.general')</div>
    <div id="boolpoint">@include('admin.landings.blocks.boolpoint')</div>
    <div id="background">@include('admin.landings.blocks.background')</div>
    <div id="button1">@include('admin.landings.blocks.button', ['button'=>1])</div>
    <div id="button2">@include('admin.landings.blocks.button', ['button'=>2])</div>
    <div id="title1">@include('admin.landings.blocks.title', ['title'=>1])</div>
    <div id="title2">@include('admin.landings.blocks.title', ['title'=>2])</div>
    <div id="title3">@include('admin.landings.blocks.title', ['title'=>3])</div>
    <div id="description1">@include('admin.landings.blocks.description', ['description'=>1])</div>
    <div id="description2">@include('admin.landings.blocks.description', ['description'=>2])</div>
    <div id="image">@include('admin.landings.blocks.image')</div>
    <div id="video">@include('admin.landings.blocks.video')</div>
    <div id="slides">@include('admin.landings.blocks.slides')</div>
    <div id="script">@include('admin.landings.blocks.script')</div>
    <div id="custom">@include('admin.landings.blocks.custom')</div>

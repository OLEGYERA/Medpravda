@extends('layouts.main')

@section('branding')
    {!! $branding ?? '' !!}
@endsection

@section('header')
    {!! $header ?? ''!!}
@endsection

@section('content')
    <div class="page-four wrap m-top">
        <div class="text-four">Будь ласка, поверніться назад.
            Такої сторінки не існує.</div>
        <img src="{{ asset('assets') }}/images/404-final.svg" alt="error" title="404">
        {{--<h2>Возможно Вы искали:</h2>--}}
        {{--<div class="admin-content">--}}
        {{--<ul>--}}
        {{--<li><a href="{{ route('articles_cat', 'zabluzhdeniya') }}">Заблуждения</a></li>--}}
        {{--<li><a href="{{ route('articles_cat', 'pitanie-i-dieta') }}">Питание и диета</a></li>--}}
        {{--<li><a href="{{ route('articles_cat', 'intimnye-temy') }}">Интимные темы</a></li>--}}
        {{--</ul>--}}
        {{--</div>--}}
    </div>
    {{--<div class="wrap">--}}
    {{--<div class="product-nav product-nav-analog">--}}
    {{--<a href="{{ route('search_alpha') }}"--}}
    {{--class="nav-button-grey">По алфавиту</a>--}}
    {{--<a href="{{ route('search_substance') }}"--}}
    {{--class="nav-button-grey">По действующему--}}
    {{--веществу</a>--}}
    {{--<a href="{{ route('search_mnn') }}"--}}
    {{--class="nav-button-grey">По международному названию--}}
    {{--(МНН)</a>--}}
    {{--<a href="{{ route('search_atx') }}"--}}
    {{--class="nav-button-grey">По АТХ-классификации</a>--}}
    {{--<a href="{{ route('search_farm') }}"--}}
    {{--class="nav-button-grey">По фармакотерапевтической--}}
    {{--группе</a>--}}
    {{--<a href="{{ route('search_fabricator') }}"--}}
    {{--class="nav-button-grey">По производителю</a>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection

@section('footer')
    {!! $footer ?? ''!!}
@endsection

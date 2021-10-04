
@extends('layouts-v.main')

@section('branding')
    {!! $branding ?? '' !!}
@endsection

@section('header')
    {!! $header !!}
@endsection

@section('content')
    {!! $content ?? '' !!}
@endsection

@if(!empty($aside))
@section('aside')
    {!! $aside !!}
@endsection
@endif


@section('module_price_section')
    {!! $module_price_section ?? '' !!}
@endsection

@section('slider')
    {!! $slider ?? '' !!}
@endsection

@if(!empty($jss))
@section('jss')
    {!! $jss !!}
@endsection
@endif

@if(!empty($targeting_url))
    @include('layouts.banners.targeting', ['url' => $targeting_url])
@endif

@section('footer')
    {!! $footer !!}
@endsection
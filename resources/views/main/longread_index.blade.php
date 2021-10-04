
@extends('layouts.main')

@section('branding')
    {!! $branding ?? '' !!}
@endsection

@section('header')
    {!! $header !!}
@endsection

@section('content')
    {!! $content ?? '' !!}
@endsection

@section('aside')
@endsection
@section('module_price_section')
@endsection
@section('slider')
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
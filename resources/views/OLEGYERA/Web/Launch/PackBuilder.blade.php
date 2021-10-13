@php $is_mobile = $DeviceAgent->isMobile(); @endphp

@extends('OLEGYERA.Web.Launch.BaseBuilder', [
    'lang' => $lang,
    'title' => $title,
    'description' => $description,
    'fullWidth' => $fullWidth,
    'is_mobile' => $is_mobile,
    'is_admin' => $isAdmin
])

@if(!empty($branding_url) && !$is_mobile)
    @section('branding')
        @include('OLEGYERA.FrontBox.MODULES.banners.branding', ['url' => $branding_url])
    @endsection
@endif

@section('header')
    {!! $header ?? '' !!}
@endsection

@section('page')
    {!! $page ?? '' !!}
@endsection

@if(!empty($aside))
    @section('aside')
        {!! $aside !!}
    @endsection
@endif

@section('footer')
    {!! $footer ?? '' !!}
@endsection

{{--@if(!empty($jss))--}}
{{--    @section('jss')--}}
{{--        {!! $jss !!}--}}
{{--    @endsection--}}
{{--@endif--}}

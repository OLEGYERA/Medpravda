@extends(env('APP_RESOURCE_PATH') . 'SiteView.default.app')
{{--@if(!empty($branding_url))--}}
{{--@section('branding')--}}
{{--    @include('OLEGYERA.FrontBox.MODULES.banners.branding', ['url' => $branding_url])--}}
{{--@endsection--}}
{{--@endif--}}

@section('header')
    {!! $header ?? '' !!}
@endsection

@section('content')
    {!! $content ?? '' !!}
@endsection

{{--@if(!empty($aside))--}}
{{--@section('aside')--}}
{{--    {!! $aside !!}--}}
{{--@endsection--}}
{{--@endif--}}




{{--@section('footer')--}}
{{--    {!! $footer !!}--}}
{{--@endsection--}}

{{--@if(!empty($jss))--}}
{{--@section('jss')--}}
{{--    {!! $jss !!}--}}
{{--@endsection--}}
{{--@endif--}}

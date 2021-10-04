@if ($agent->isMobile())
    @php $is_mobile = true; @endphp
@else
    @php $is_mobile = false; @endphp
@endif

@extends('OLEGYERA.FrontBox.basicHTML', ['title' => $title, 'description' => $description, 'fullWidth' => $fullWidth, 'is_mobile' => $is_mobile])

@if(!empty($branding_url) && !$is_mobile)
    @section('branding')
        @include('OLEGYERA.FrontBox.MODULES.banners.branding', ['url' => $branding_url])
    @endsection
@endif

@section('header')
    {!! $header ?? '' !!}
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


@section('footer')
    {!! $footer !!}
@endsection

@if(!empty($jss))
@section('jss')
    {!! $jss !!}
@endsection
@endif

@extends('longreads.index')
{{dd(5)}}
@section('content')
<aside class="left-bar bar">
    <a href="#">
        <i class="fa fa-angle-left"></i>
    </a>
</aside>
<aside class="right-bar bar">
    <a href="#" class="close"><i class="fa fa-times"></i></a>
    <a href="#">
        <i class="fa fa-angle-right"></i>
    </a>
</aside>
<section class="full-longread">
    <header>
        <img src="{{asset('assets/images/main/logo_ru.png')}}" alt="">
    </header>
    <div class="longread-content">
        <div class="longread-preview" style="background-image: url('{{$longread->image()->first()->path ?? ''}}');"></div>
            <h1 class="longread-title">{{$longread->title}}</h1>
            <div class="longread-field">
                @foreach($longread_template->parts()->orderBy('priority', 'asc')->get() as $item)
                    @php($build = $item->build()->where('longreads_id', $longread->id)->first())
                    @switch($item->type)
                        @case('tir')
                            <div class="template-row">
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                                <div class="template-img">
                                    <div class="lg-box-img">
                                        <img src="{{ ($build->img ?? '') }}"--}} alt="{{ $build->alt ?? "Medpravda" }}" title="{{ $build->title ?? "Medpravda" }}" >
                                    </div>
                                    <p class="img-title">{{ $build->title ?? "Medpravda" }}</p>
                                </div>
                            </div>
                        @break
                        @case('itr')
                            <div class="template-row">
                                <div class="template-img">
                                    <div class="lg-box-img">
                                        <img src="{{ ($build->img ?? '') }}"--}} alt="{{ $build->alt ?? "Medpravda" }}" title="{{ $build->title ?? "Medpravda" }}" >
                                    </div>
                                    <p class="img-title">{{ $build->title ?? "Medpravda" }}</p>
                                </div>
                                <div class="template-text left">
                                    {!! $build->content ?? '' !!}
                                </div>
                            </div>
                        @break

                        @case('tic')
                            <div class="template-col">
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                                <div class="template-img">
                                    <div class="lg-box-img">
                                        <img src="{{ ($build->img ?? '') }}"--}} alt="{{ $build->alt ?? "Medpravda" }}" title="{{ $build->title ?? "Medpravda" }}" >
                                    </div>
                                    <p class="img-title">{{ $build->title ?? "Medpravda" }}</p>
                                </div>
                            </div>
                        @break
                        @case('itc')
                            <div class="template-col">
                                <div class="template-img">
                                    <div class="lg-box-img">
                                        <img src="{{ ($build->img ?? '') }}"--}} alt="{{ $build->alt ?? "Medpravda" }}" title="{{ $build->title ?? "Medpravda" }}" >
                                    </div>
                                    <p class="img-title">{{ $build->title ?? "Medpravda" }}</p>
                                </div>
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                            </div>
                        @break

                        @case('btc')
                            <div class="template-col">
                                <div class="template-img">
                                    <div class="lg-bg" style="background-image:url('{{$build->img ?? ''}}');">
                                    </div>
                                </div>
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                            </div>
                        @break
                        @case('tbc')
                            <div class="template-col">
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                                <div class="template-img">
                                    <div class="lg-bg" style="background-image:url('{{$build->img ?? ''}}');">
                                    </div>
                                </div>
                            </div>
                        @break


                        @case('tbr')
                            <div class="template-row">
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                                <div class="template-img">
                                    <div class="lg-bg" style="background-image:url('{{$build->img ?? ''}}');">
                                    </div>
                                </div>
                            </div>
                        @break

                        @case('btr')
                            <div class="template-row">
                                <div class="template-img">
                                    <div class="lg-bg" style="background-image:url('{{$build->img ?? ''}}');">
                                    </div>
                                </div>
                                <div class="template-text">
                                    {!! $build->content ?? '' !!}
                                </div>
                            </div>
                        @break
                    @endswitch
                @endforeach
            </div>
        </div>
    </section>
@endsection
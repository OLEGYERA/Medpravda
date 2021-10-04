@extends('longreads.index')

@section('content')
    <aside class="left-bar bar">
    </aside>
    <aside class="right-bar bar">
        <a href="#" class="close"><i class="fa fa-times"></i></a>
    </aside>
    <section class="full-longread">
        <header>
            <img src="{{asset('assets/images/main/logo_ru.png')}}" alt="">
        </header>
        <main class="catalog">
            <h1>Свежие Лонгриды</h1>
            @foreach($longreads as $longread)
                <a class="catalog-item" href="{{route('longread_show', ['alias'=>$longread->alias])}}">
                    <div class="catalog-img">
                        <img src="{{$longread->image()->first()->path}}" alt="">
                    </div>
                    <div class="" style="display: flex; flex-direction: column;">
                        <h2 class="catalog-title">{{$longread->title}}</h2>
                        <div class="long-desc">
                            {{$longread->description}}
                        </div>
                    </div>
                </a>
            @endforeach
        </main>
    </section>
@endsection
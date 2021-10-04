<section class="other-product mobile-display-none">

    <div class="section-title-meta-icon">
        <h3>Также ищут</h3>
        <div class="section-meta-icon">
            <div class="section-title-meta-icon-btn-meta">
                <a href="#">Аллергия</a>
                <a href="#">Болеутоляющие</a>
                <a href="#">Сердечные</a>
            </div>

            <div class="section-icon">
                <img src="{{ asset('assets') }}/images/title-icons/found.png"
                     alt="иконка Также ищут" width="25" height="25">
            </div>
        </div>
    </div>
    <div class="wrap">
        <div class="other-product-slider product-down-slider-go">

            @if(!empty($medicines) && $medicines->isNotEmpty())
                @foreach($medicines as $medicine)
                    @if(0 != $loop->iteration%2)
                        <div>
                            @endif
                            <article class="article-products">
                                <a href="{{ route('medicine', ['medicine'=>$medicine->alias]) }}/">
                                    <div class="article-img">
                                        @if(!empty($medicine->image[0]->path))
                                            <img src="{{ asset('asset/images/medicine/main/').'/'.$medicine->image[0]->path }}"
                                                 alt="{{ $medicine->image[0]->alt or 'Препарат - '.$medicine->title }}"
                                                 title="{{ $medicine->image[0]->title or 'Препарат - '.$medicine->title }}" width="405" height="405">
                                        @else
                                            <img src="{{ asset('asset/images/mp.png') }}"
                                                 alt="Фото скоро появится" title="Фото скоро появится" width="270" height="270">
                                        @endif
                                    </div>
                                    <div class="article-info">
                                        <div class="article-title">{{ $medicine->title }}</div>
                                        <div class="date-link">
                                            <span class="btn-link">Подробнее</span>
                                        </div>
                                    </div>
                                </a>
                            </article>
                            @if((0 == $loop->iteration%2) || $loop->last)
                        </div>
                    @endif
                @endforeach
            @endif

        </div>
        <div>
            <a href="{{ route('sort') }}" class="button-white">Больше препаратов</a>
        </div>

</section>
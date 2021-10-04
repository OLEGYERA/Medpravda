<section class="other-product mobile-display-none">

    <div class="section-title-meta-icon">
        <h3>Також шукають</h3>
        <div class="section-meta-icon">
            <div class="section-title-meta-icon-btn-meta">
            {{ link_to_route('search', 'Алергія', ['search' =>'Алергія']) }}
            {{ link_to_route('search', 'Ібупрофен', ['search' =>'Ібупрофен']) }}
            {{ link_to_route('search', 'Головний біль', ['search' =>'Головний біль']) }}
            </div>
            <div class="section-icon">
                <img src="{{ asset('assets') }}/images/title-icons/found.png" alt="иконка Также ищут">
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
                                <a href="{{ route('medicine_ua', ['medicine'=>$medicine->alias]) }}/">
                                    <div class="article-img">
                                        @if(!empty($medicine->image[0]->path))
                                            <img src="{{ asset('asset/images/medicine/main_ukr/').'/'.$medicine->image[0]->path }}"
                                                 alt="{{ $medicine->image[0]->alt or $medicine->title.' '. $loop->iteration }}"
                                                 title="{{ $medicine->image[0]->title or $medicine->title.' '. $loop->iteration }}">
                                        @else
                                            <img src="{{ asset('asset/images/mp.png') }}"
                                                 alt="Фото скоро з'явиться" title="Фото скоро з'явиться">
                                        @endif
                                    </div>
                                    <div class="article-info">
                                        <div class="article-title">{{ $medicine->title }}</div>
                                        <div class="date-link">
                                            <span class="btn-link">Докладніше</span>
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
            <a href="{{ route('search_alpha_u') }}/" class="button-white">Більше препаратів</a>
        </div>
    </div>
</section>
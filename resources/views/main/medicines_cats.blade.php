@if(!empty($med_cats))
    @foreach($med_cats as $cat)
        <div class="product-search-column">
            <div class="product-search-column-title">
                <img src="{{ asset('asset') .'/images/showcase/'. $cat->path }}"
                     alt="{{ $cat->alt }}" title="{{ $cat->imgtitle }}"
                     {!! image_width_height_return_tags(asset('asset') .'/images/showcase/'. $cat->path) !!}
                >
                <h3>{{ $cat->title }}</h3>
            </div>
            @if(!empty($cat->alias_1[0]))
                <article class="article-products">
                    <a href="{{ route('medicine', ['medicine'=>$cat->alias_1[0]->alias]) }}/">
                        <div class="article-img">
                            @if(!empty($cat->alias_1[0]->image[0]->path))
                                <img src="{{ asset('asset/images/medicine/main/').'/'.$cat->alias_1[0]->image[0]->path }}"
                                     alt="{{ !empty($cat->alias_1[0]->image[0]->alt) ? $cat->alias_1[0]->image[0]->alt : $cat->alias_1[0]->title . ' | Медправда ' }}"
                                     title="{{ !empty($cat->alias_1[0]->image[0]->alt) ? $cat->alias_1[0]->image[0]->alt : $cat->alias_1[0]->title . ' | Медправда ' }}"
                                {!! image_width_height_return_tags(asset('asset/images/medicine/main/').'/'.$cat->alias_1[0]->image[0]->path) !!}
                                >
                            @else
                                <img src="{{ asset('asset/images/showcase/mp-mini.jpg')}}"
                                     alt="{{$cat->alias_1[0]->title}}. Фото скоро появится"
                                     title="{{$cat->alias_1[0]->title}}. Фото скоро появится"
                                    {!! image_width_height_return_tags(asset('asset/images/showcase/mp-mini.jpg')) !!}
                                >
                            @endif
                        </div>
                        <div class="article-info">
                            <div class="article-title">{{ $cat->alias_1[0]->title }}</div>
                        </div>
                    </a>
                </article>
            @endif
            @if(!empty($cat->alias_2[0]))
                <article class="article-products">
                    <a href="{{ route('medicine', ['medicine'=>$cat->alias_2[0]->alias]) }}/">
                        <div class="article-img">
                            @if(!empty($cat->alias_2[0]->image[0]->path))
                                <img src="{{ asset('asset/images/medicine/main/').'/'.$cat->alias_2[0]->image[0]->path }}"
                                     alt="{{ !empty($cat->alias_2[0]->image[0]->alt) ? $cat->alias_2[0]->image[0]->alt : $cat->alias_2[0]->title . ' | Медправда' }}"
                                     title="{{ !empty($cat->alias_2[0]->image[0]->alt) ? $cat->alias_2[0]->image[0]->alt : $cat->alias_2[0]->title . ' | Медправда' }}"
                                    {!! image_width_height_return_tags(asset('asset/images/medicine/main/').'/'.$cat->alias_2[0]->image[0]->path) !!}
                                >
                            @else
                                <img src="{{ asset('asset/images/showcase/mp-mini.jpg')}}"
                                     alt="{{$cat->alias_1[0]->title}}. Фото скоро появится"
                                     title="{{$cat->alias_1[0]->title}}. Фото скоро появится"
                                    {!! image_width_height_return_tags(asset('asset/images/showcase/mp-mini.jpg')) !!}
                                >
                            @endif
                        </div>
                        <div class="article-info">
                            <div class="article-title">{{ $cat->alias_2[0]->title }}</div>
                        </div>
                    </a>
                </article>
            @endif
            @if(!empty($cat->alias_3[0]))
                <article class="article-products mobile-display-none">
                    <a href="{{ route('medicine', ['medicine'=>$cat->alias_3[0]->alias]) }}/">
                        <div class="article-img">
                            @if(!empty($cat->alias_3[0]->image[0]->path))
                                <img src="{{ asset('asset/images/medicine/main/').'/'.$cat->alias_3[0]->image[0]->path }}"
                                     alt="{{ !empty($cat->alias_3[0]->image[0]->alt) ? $cat->alias_3[0]->image[0]->alt : $cat->alias_3[0]->title . ' | Медправда' }}"
                                     title="{{ !empty($cat->alias_3[0]->image[0]->alt) ? $cat->alias_3[0]->image[0]->alt : $cat->alias_3[0]->title . ' | Медправда' }}"
                                {!! image_width_height_return_tags(asset('asset/images/medicine/main/').'/'.$cat->alias_3[0]->image[0]->path) !!}
                                >
                            @else
                                <img src="{{ asset('asset/images/showcase/mp-mini.jpg')}}"
                                     alt="{{$cat->alias_1[0]->title}}. Фото скоро появится"
                                     title="{{$cat->alias_1[0]->title}}. Фото скоро появится"
                                {!! image_width_height_return_tags(asset('asset/images/showcase/mp-mini.jpg')) !!}
                                >
                            @endif
                        </div>
                        <div class="article-info">
                            <div class="article-title">{{ $cat->alias_3[0]->title }}</div>
                        </div>
                    </a>
                </article>
            @endif
        </div>
    @endforeach
@endif
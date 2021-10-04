<div class="full-content">
    <section class="sec-interview">
        <div class="mp-box pres-row">
            <div class="title-shell">
                <h3 class="group-title">
                    <a>Интервью</a>
                </h3>
            </div>
            @foreach($media_items as $key=>$media_item)
                @if($key >= 3)
                    @break
                @endif
                @php $time_arr = daysOrMonth($media_item->article->created_at, 'ru') @endphp
                @include('OLEGYERA.FrontBox.particles.article', [
                    'type' => 'base',
                    'eclipsed' => true,
                    'link' => route('ru.pub', ['id' => $media_item->article->id]),
                    'time' => $time_arr,
                    'counter' => 0,
                    'title' => $media_item->article->title,
                    'author' => $media_item->editor->name . ' ' . $media_item->editor->surname,
                    'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($media_item->image->category_id) . '/large/' . $media_item->image->path,

                ])
            @endforeach
        </div>
        <div class="mp-box list-row">
            <div class="grid">
                <div class="left-grid">
                    @foreach($media_items as $key=>$media_item)
                        @if($key < 3)
                            @continue
                        @endif
                        @php $time_arr = daysOrMonth($media_item->article->created_at, 'ru') @endphp
                        @include('OLEGYERA.FrontBox.particles.article', [
                            'type' => 'base',
                            'eclipsed' => true,
                            'link' => route('ru.pub', ['id' => $media_item->article->id]),
                            'time' => $time_arr,
                            'counter' => 0,
                            'title' => $media_item->article->title,
                            'author' => $media_item->editor->name . ' ' . $media_item->editor->surname,
                            'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($media_item->image->category_id) . '/large/' . $media_item->image->path,

                        ])
                    @endforeach
                </div>
                <div class="right-grid">
                    <div class="title-shell">
                        <h3 class="group-title">
                            <a>Популярные Новости</a>
                        </h3>
                    </div>
                    @foreach($side_articles as $side_article)
                        @php $time_arr = daysOrMonth($side_article->article->created_at, 'ru') @endphp
                        @include('OLEGYERA.FrontBox.particles.article', [
                            'type' => 'mini',
                            'eclipsed' => true,
                            'link' => route('ru.pub', ['id' => $side_article->article->id]),
                            'time' => $time_arr,
                            'counter' => 0,
                            'title' => $side_article->article->title,
                            'author' => $side_article->editor->name . ' ' . $side_article->editor->surname,
                            'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($side_article->image->category_id) . '/large/' . $side_article->image->path,

                        ])
                    @endforeach
                </div>
        </div>
    </section>
</div>

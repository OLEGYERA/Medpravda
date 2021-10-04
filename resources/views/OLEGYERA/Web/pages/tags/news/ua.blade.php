<div class="full-content">
    <div class="mp-box box-news">
        <div class="grid">
            <div class="right-grid">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Всі новини</a>
                    </h3>
                </div>
                @foreach($media_items as $media_item)
                    @php $time_arr = daysOrMonth($media_item->article->created_at, 'ua') @endphp
                    @include('OLEGYERA.FrontBox.particles.article', [
                        'type' => 'base',
                        'eclipsed' => true,
                        'link' => route('ua.pub', ['id' => $media_item->article->id]),
                        'time' => $time_arr,
                        'counter' => 0,
                        'title' => $media_item->article->utitle,
                        'author' => $media_item->editor->name . ' ' . $media_item->editor->surname,
                        'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($media_item->image->category_id) . '/large/' . $media_item->image->path,

                    ])
                @endforeach
            </div>
            <div class="left-grid">
                <div class="title-shell">
                    <h3 class="group-title">
                        <a>Популярні Статті</a>
                    </h3>
                </div>
                @foreach($side_articles as $side_article)
                    @php $time_arr = daysOrMonth($side_article->article->created_at, 'ua') @endphp
                    @include('OLEGYERA.FrontBox.particles.article', [
                        'type' => 'mini',
                        'eclipsed' => true,
                        'link' => route('ua.pub', ['id' => $side_article->article->id]),
                        'time' => $time_arr,
                        'counter' => 0,
                        'title' => $side_article->article->utitle,
                        'author' => $side_article->editor->name . ' ' . $side_article->editor->surname,
                        'img_url' => 'https://medpravda.ua/gallery/' . getCategoryName($side_article->image->category_id) . '/large/' . $side_article->image->path,

                    ])
                @endforeach
            </div>

        </div>
    </div>
</div>

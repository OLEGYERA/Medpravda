<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($data as $item)
        @if($item['pages'] != 0)
            @for($i = 1; $i <= $item['pages']; $i++)
                <sitemap>
                    <loc>{{env('APP_URL') . '/sitemap-' . $item['name'] . '-' . $i . '.xml'}}</loc>
                    <lastmod>{{\Carbon\Carbon::now()->format('Y-m-d')}}</lastmod>
                </sitemap>
            @endfor
        @else
            <sitemap>
                <loc>{{env('APP_URL') . '/sitemap-' . $item['name'] . '-1.xml'}}</loc>
                <lastmod>{{\Carbon\Carbon::now()->format('Y-m-d')}}</lastmod>
            </sitemap>
        @endif
    @endforeach
</sitemapindex>

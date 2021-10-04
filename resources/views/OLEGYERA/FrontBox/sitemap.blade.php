<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach($data as $item)
        <url>
            @switch($type)
                @case('ua')
                    <loc>{{env('APP_URL'). '/ua/' . $url . '/' . $item->alias}}</loc>
                    <xhtml:link
                        rel="alternate"
                        hreflang="ru"
                        href="{{env('APP_URL'). '/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="uk"
                        href="{{env('APP_URL'). '/ua/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="ru"
                        media="only screen and (max-width: 640px)"
                        href="{{env('APP_M_URL'). '/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="uk"
                        media="only screen and (max-width: 640px)"
                        href="{{env('APP_M_URL'). '/ua/' . $url . '/' . $item->alias}}"/>
                    @break
                @case('uam')
                    <loc>{{env('APP_M_URL'). '/ua/' . $url . '/' . $item->alias}}</loc>
                    <xhtml:link
                        rel="alternate"
                        hreflang="ru"
                        href="{{env('APP_URL'). '/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="uk"
                        href="{{env('APP_URL'). '/ua/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="ru"
                        media="only screen and (max-width: 640px)"
                        href="{{env('APP_M_URL'). '/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="uk"
                        media="only screen and (max-width: 640px)"
                        href="{{env('APP_M_URL'). '/ua/' . $url . '/' . $item->alias}}"/>
                    @break
                @case('ru')
                    <loc>{{env('APP_URL'). '/' . $url . '/' . $item->alias}}</loc>
                    <xhtml:link
                        rel="alternate"
                        hreflang="ru"
                        href="{{env('APP_URL'). '/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="uk"
                        href="{{env('APP_URL'). '/ua/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="ru"
                        media="only screen and (max-width: 640px)"
                        href="{{env('APP_M_URL'). '/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="uk"
                        media="only screen and (max-width: 640px)"
                        href="{{env('APP_M_URL'). '/ua/' . $url . '/' . $item->alias}}"/>
                    @break
                @case('rum')
                    <loc>{{env('APP_M_URL'). '/' . $url . '/' . $item->alias}}</loc>
                    <xhtml:link
                        rel="alternate"
                        hreflang="ru"
                        href="{{env('APP_URL'). '/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="uk"
                        href="{{env('APP_URL'). '/ua/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="ru"
                        media="only screen and (max-width: 640px)"
                        href="{{env('APP_M_URL'). '/' . $url . '/' . $item->alias}}"/>
                    <xhtml:link
                        rel="alternate"
                        hreflang="uk"
                        media="only screen and (max-width: 640px)"
                        href="{{env('APP_M_URL'). '/ua/' . $url . '/' . $item->alias}}"/>
                    @break
            @endswitch
            <lastmod>{{$item->updated_at->format('Y-m-d')}}</lastmod>
        </url>
    @endforeach
</urlset>

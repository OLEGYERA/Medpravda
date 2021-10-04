
@if($article->contentUa->occurrence && $article->contentUa->occurrence !== '<p><br></p>')
    <div class="mp-row-present" id="occurrence">
        <h3 class="title-row">
            <span class="icon occurrence"></span>
            Причини виникнення:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{!! $article->contentUa->occurrence !!}</p></div>
    </div>
@endif

@if($article->contentUa->symptoms && $article->contentUa->symptoms !== '<p><br></p>')
    <div class="mp-row-present" id="symptoms">
        <h3 class="title-row">
            <span class="icon symptoms"></span>
            Клінічні симптоми:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->symptoms !!}</div>
    </div>
@endif
@if($article->contentUa->diagnostics && $article->contentUa->diagnostics !== '<p><br></p>')
    <div class="mp-row-present" id="diagnostics">
        <h3 class="title-row">
            <span class="icon diagnostics"></span>
            Діагностика:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->diagnostics !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn2', ['key_word' => $article->alias])
@endif
@if($article->contentUa->development_stages && $article->contentUa->development_stages !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_contradiagnostics">
        <h3 class="title-row">
            <span class="icon contradiagnostics"></span>
            Стадії розвитку і перебіг захворювання
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->development_stages !!}</div>
    </div>
@endif
@if($article->contentUa->doctor && $article->contentUa->doctor !== '<p><br></p>')
    <div class="mp-row-present" id="doctor">
        <h3 class="title-row">
            <span class="icon doctor"></span>
            До якого лікаря звертатися:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->doctor !!}</div>
    </div>
@endif
@if($article->contentUa->treat && $article->contentUa->treat !== '<p><br></p>')
    <div class="mp-row-present" id="treat">
        <h3 class="title-row">
            <span class="icon treat"></span>
            Як лікувати
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->treat !!}</div>
    </div>
@endif
@if($article->contentUa->diet && $article->contentUa->diet !== '<p><br></p>')
    <div class="mp-row-present" id="diet">
        <h3 class="title-row">
            <span class="icon diet"></span>
            Дієта
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->diet !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn3', ['key_word' => $article->alias])
@endif
@if($article->contentUa->remedies && $article->contentUa->remedies !== '<p><br></p>')
    <div class="mp-row-present" id="remedies">
        <h3 class="title-row">
            <span class="icon remedies"></span>
            Домашні засоби:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->remedies !!}</div>
    </div>
@endif
@if($article->contentUa->complications && $article->contentUa->complications !== '<p><br></p>')
    <div class="mp-row-present" id="complications">
        <h3 class="title-row">
            <span class="icon complications"></span>
            Ускладнення:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->complications !!}</div>
    </div>
@endif
@if($article->contentUa->children && $article->contentUa->children !== '<p><br></p>')
    <div class="mp-row-present" id="children">
        <h3 class="title-row">
            <span class="icon children"></span>
            Діти:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->children !!}</div>
    </div>
@endif
@if($article->contentUa->pregnant_lactating && $article->contentUa->pregnant_lactating !== '<p><br></p>')
    <div class="mp-row-present" id="pregnant_lactating">
        <h3 class="title-row">
            <span class="icon pregnant_lactating"></span>
            Вагітні і годують:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->pregnant_lactating !!}</div>
    </div>
@endif
@if($article->contentUa->people && $article->contentUa->people !== '<p><br></p>')
    <div class="mp-row-present" id="people">
        <h3 class="title-row">
            <span class="icon people"></span>
            Люди похилого віку:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->people !!}</div>
    </div>
@endif
@if($article->contentUa->spread && $article->contentUa->spread !== '<p><br></p>')
    <div class="mp-row-present" id="spread">
        <h3 class="title-row">
            <span class="icon spread"></span>
            Поширення:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->spread !!}</div>
    </div>
@endif
@if($article->contentUa->prevention && $article->contentUa->prevention !== '<p><br></p>')
    <div class="mp-row-present" id="prevention">
        <h3 class="title-row">
            <span class="icon prevention"></span>
            Профілактика:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->prevention !!}</div>
    </div>
@endif
@if($article->contentUa->vaccination && $article->contentUa->vaccination !== '<p><br></p>')
    <div class="mp-row-present" id="vaccination">
        <h3 class="title-row">
            <span class="icon vaccination"></span>
            Вакцинація:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->vaccination !!}</div>
    </div>
@endif
@if($article->contentUa->provisions && $article->contentUa->provisions !== '<p><br></p>')
    <div class="mp-row-present" id="provisions">
        <h3 class="title-row">
            <span class="icon provisions"></span>
            Основні положення:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->provisions !!}</div>
    </div>
@endif
@if($article->contentUa->sources && $article->contentUa->sources !== '<p><br></p>')
    <div class="mp-row-present" id="sources">
        <h3 class="title-row">
            <span class="icon sources"></span>
            Джерела:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentUa->sources !!}</div>
    </div>
@endif

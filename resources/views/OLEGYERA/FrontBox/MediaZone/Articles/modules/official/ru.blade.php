
@if($article->contentRu->occurrence && $article->contentRu->occurrence !== '<p><br></p>')
    <div class="mp-row-present" id="occurrence">
        <h3 class="title-row">
            <span class="icon occurrence"></span>
            Причины возникновения:
        </h3>
        <div class="info-row" itemprop="articleSection"><p>{!! $article->contentRu->occurrence !!}</p></div>
    </div>
@endif

@if($article->contentRu->symptoms && $article->contentRu->symptoms !== '<p><br></p>')
    <div class="mp-row-present" id="symptoms">
        <h3 class="title-row">
            <span class="icon symptoms"></span>
            Клинические симптомы:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->symptoms !!}</div>
    </div>
@endif
@if($article->contentRu->diagnostics && $article->contentRu->diagnostics !== '<p><br></p>')
    <div class="mp-row-present" id="diagnostics">
        <h3 class="title-row">
            <span class="icon diagnostics"></span>
            Диагностика:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->diagnostics !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn2', ['key_word' => $article->alias])
@endif
@if($article->contentRu->development_stages && $article->contentRu->development_stages !== '<p><br></p>')
    <div class="mp-row-present" id="adaptive_contradiagnostics">
        <h3 class="title-row">
            <span class="icon contradiagnostics"></span>
            Стадии развития и течение заболевания
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->development_stages !!}</div>
    </div>
@endif
@if($article->contentRu->doctor && $article->contentRu->doctor !== '<p><br></p>')
    <div class="mp-row-present" id="doctor">
        <h3 class="title-row">
            <span class="icon doctor"></span>
            К какому врачу обращаться:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->doctor !!}</div>
    </div>
@endif
@if($article->contentRu->treat && $article->contentRu->treat !== '<p><br></p>')
    <div class="mp-row-present" id="treat">
        <h3 class="title-row">
            <span class="icon treat"></span>
            Как лечить
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->treat !!}</div>
    </div>
@endif
@if($article->contentRu->diet && $article->contentRu->diet !== '<p><br></p>')
    <div class="mp-row-present" id="diet">
        <h3 class="title-row">
            <span class="icon diet"></span>
            Диета
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->diet !!}</div>
    </div>
@endif
@if($is_mobile ?? false)
    @include('OLEGYERA.FrontBox.MODULES.banners.bn3', ['key_word' => $article->alias])
@endif
@if($article->contentRu->remedies && $article->contentRu->remedies !== '<p><br></p>')
    <div class="mp-row-present" id="remedies">
        <h3 class="title-row">
            <span class="icon remedies"></span>
            Домашние средства:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->remedies !!}</div>
    </div>
@endif
@if($article->contentRu->complications && $article->contentRu->complications !== '<p><br></p>')
    <div class="mp-row-present" id="complications">
        <h3 class="title-row">
            <span class="icon complications"></span>
            Осложнения:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->complications !!}</div>
    </div>
@endif
@if($article->contentRu->children && $article->contentRu->children !== '<p><br></p>')
    <div class="mp-row-present" id="children">
        <h3 class="title-row">
            <span class="icon children"></span>
            Дети:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->children !!}</div>
    </div>
@endif
@if($article->contentRu->pregnant_lactating && $article->contentRu->pregnant_lactating !== '<p><br></p>')
    <div class="mp-row-present" id="pregnant_lactating">
        <h3 class="title-row">
            <span class="icon pregnant_lactating"></span>
            Беременные и кормящие:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->pregnant_lactating !!}</div>
    </div>
@endif
@if($article->contentRu->people && $article->contentRu->people !== '<p><br></p>')
    <div class="mp-row-present" id="people">
        <h3 class="title-row">
            <span class="icon people"></span>
            Пожилые люди:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->people !!}</div>
    </div>
@endif
@if($article->contentRu->spread && $article->contentRu->spread !== '<p><br></p>')
    <div class="mp-row-present" id="spread">
        <h3 class="title-row">
            <span class="icon spread"></span>
            Распространение:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->spread !!}</div>
    </div>
@endif
@if($article->contentRu->prevention && $article->contentRu->prevention !== '<p><br></p>')
    <div class="mp-row-present" id="prevention">
        <h3 class="title-row">
            <span class="icon prevention"></span>
            Профилактика:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->prevention !!}</div>
    </div>
@endif
@if($article->contentRu->vaccination && $article->contentRu->vaccination !== '<p><br></p>')
    <div class="mp-row-present" id="vaccination">
        <h3 class="title-row">
            <span class="icon vaccination"></span>
            Вакцинация:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->vaccination !!}</div>
    </div>
@endif
@if($article->contentRu->provisions && $article->contentRu->provisions !== '<p><br></p>')
    <div class="mp-row-present" id="provisions">
        <h3 class="title-row">
            <span class="icon provisions"></span>
            Основные положения:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->provisions !!}</div>
    </div>
@endif
@if($article->contentRu->sources && $article->contentRu->sources !== '<p><br></p>')
    <div class="mp-row-present" id="sources">
        <h3 class="title-row">
            <span class="icon sources"></span>
            Источники:
        </h3>
        <div class="info-row" itemprop="articleSection">{!! $article->contentRu->sources !!}</div>
    </div>
@endif

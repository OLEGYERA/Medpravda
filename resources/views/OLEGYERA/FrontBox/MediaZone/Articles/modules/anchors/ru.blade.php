<nav class="row-nav-links" >
    <ul class="row-nav-links-container" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
        @if($article->contentRu->definition && $article->contentRu->definition !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#definition">Определение</a></li>
        @endif
        @if($article->contentRu->occurrence && $article->contentRu->occurrence !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#occurrence">Причины возникновения</a></li>
        @endif
        @if($article->contentRu->symptoms && $article->contentRu->symptoms !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#symptoms">Клинические симптомы</a></li>
        @endif
        @if($article->contentRu->diagnostics && $article->contentRu->diagnostics !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#diagnostics">Диагностика</a></li>
        @endif
        @if($article->contentRu->development_stages && $article->contentRu->development_stages !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#development_stages">Стадии развития и течение заболевания</a></li>
        @endif
        @if($article->contentRu->doctor && $article->contentRu->doctor !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#doctor">К какому врачу обращаться</a></li>
        @endif
        @if($article->contentRu->treat && $article->contentRu->treat !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#treat">Как лечить</a></li>
        @endif
        @if($article->contentRu->diet && $article->contentRu->diet !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#diet">Диета</a></li>
        @endif
        @if($article->contentRu->remedies && $article->contentRu->remedies !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#remedies">Домашние средства</a></li>
        @endif
        @if($article->contentRu->complications && $article->contentRu->complications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#complications">Осложнения</a></li>
        @endif
        @if($article->contentRu->children && $article->contentRu->children !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#children">Дети</a></li>
        @endif
        @if($article->contentRu->pregnant_lactating && $article->contentRu->pregnant_lactating !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#pregnant_lactating">Беременные и кормящие</a></li>
        @endif
        @if($article->contentRu->people && $article->contentRu->people !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#people">Пожилые люди</a></li>
        @endif
        @if($article->contentRu->spread && $article->contentRu->spread !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#spread">Распространение</a></li>
        @endif
        @if($article->contentRu->prevention && $article->contentRu->prevention !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#prevention">Профилактика</a></li>
        @endif
        @if($article->contentRu->vaccination && $article->contentRu->vaccination !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#vaccination">Вакцинация</a></li>
        @endif
        @if($article->contentRu->provisions && $article->contentRu->provisions !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#provisions">Основные положения</a></li>
        @endif
        @if($article->contentRu->sources && $article->contentRu->sources !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#sources">Источники</a></li>
        @endif
    </ul>
</nav>

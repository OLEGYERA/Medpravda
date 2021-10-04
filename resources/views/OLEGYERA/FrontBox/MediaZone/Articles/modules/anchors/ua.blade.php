<nav class="row-nav-links" >
    <ul class="row-nav-links-container" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
        @if($article->contentUa->definition && $article->contentUa->definition !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#definition">Визначення</a></li>
        @endif
        @if($article->contentUa->occurrence && $article->contentUa->occurrence !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#occurrence">Причини виникнення</a></li>
        @endif
        @if($article->contentUa->symptoms && $article->contentUa->symptoms !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#symptoms">Клінічні симптоми</a></li>
        @endif
        @if($article->contentUa->diagnostics && $article->contentUa->diagnostics !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#diagnostics">Діагностика</a></li>
        @endif
        @if($article->contentUa->development_stages && $article->contentUa->development_stages !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#development_stages">Стадії розвитку і перебіг захворювання</a></li>
        @endif
        @if($article->contentUa->doctor && $article->contentUa->doctor !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#doctor">До якого лікаря звертатися</a></li>
        @endif
        @if($article->contentUa->treat && $article->contentUa->treat !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#treat">Як лікувати</a></li>
        @endif
        @if($article->contentUa->diet && $article->contentUa->diet !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#diet">Дієта</a></li>
        @endif
        @if($article->contentUa->remedies && $article->contentUa->remedies !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#remedies">Домашні засоби</a></li>
        @endif
        @if($article->contentUa->complications && $article->contentUa->complications !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#complications">Ускладнення</a></li>
        @endif
        @if($article->contentUa->children && $article->contentUa->children !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#children">Діти</a></li>
        @endif
        @if($article->contentUa->pregnant_lactating && $article->contentUa->pregnant_lactating !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#pregnant_lactating">Вагітні і годують</a></li>
        @endif
        @if($article->contentUa->people && $article->contentUa->people !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#people">Люди похилого віку</a></li>
        @endif
        @if($article->contentUa->spread && $article->contentUa->spread !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#spread">Поширення</a></li>
        @endif
        @if($article->contentUa->prevention && $article->contentUa->prevention !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#prevention">Профілактика</a></li>
        @endif
        @if($article->contentUa->vaccination && $article->contentUa->vaccination !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#vaccination">Вакцинація</a></li>
        @endif
        @if($article->contentUa->provisions && $article->contentUa->provisions !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#provisions">Основні положення</a></li>
        @endif
        @if($article->contentUa->sources && $article->contentUa->sources !== '<p><br></p>')
            <li class="row-nav-link" itemprop="name"><a itemprop="url" href="#sources">Джерела</a></li>
        @endif
    </ul>
</nav>

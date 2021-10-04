<div class="float-menu">
    <div class="menu-icons">
        <div class="icon-item navigation-switcher">
            <span class="glyph burger"></span>
            <span class="icon-title">Навігація</span>
        </div>
        <div class="icon-item ambulance-switcher">
            <span class="glyph doctor"></span>
            <span class="icon-title">Записатися</span>
        </div>
        <div class="icon-item">
            <span class="glyph ambulance"></span>
            <span class="icon-title">Ціни в аптеках</span>
        </div>
        <a href="#startPage" class="icon-item">
            <span class="glyph scroll"></span>
            <span class="icon-title">Вгору</span>
        </a>
    </div>
    <div class="navigation-dropmenu">
        <div class="blur-field"></div>
        <h3 class="dropmenu-title">Навігація</h3>
        @include('OLEGYERA.FrontBox.MediaZone.Articles.modules.navigation.ua')
    </div>
    <div class="ambulance-dropmenu">
        <div class="blur-field"></div>
        <h3 class="dropmenu-title">Записатися</h3>
        <nav class="list-anchors">
            <a href="#ambulanceDoctors"><span class="un-clickable"></span><span class="glyph doctor"></span><span class="anchor-title">до лікаря</span></a>
            <a href="#ambulanceAnalyzes"><span class="un-clickable"></span><span class="glyph physical_chemical"></span><span class="anchor-title">на аналізи</span></a>
        </nav>
    </div>

</div>

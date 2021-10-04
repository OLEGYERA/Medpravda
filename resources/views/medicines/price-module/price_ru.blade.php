<section class="other-product m-top" id="module-price">
    {{--TODO for price page--}}
    <div class="only-module-price-wrap">
        <div class="top-price-search">
            <div class="flex-between wrap">
                <div class="flex-between two-search">
                    <div class="">
                        <input placeholder="препарат">
                    </div>
                    <div class="select_product">
                        <div class="aroww_select">
                            <select>
                                <option> Лоратадин табл. 10 мг блистер №10</option>
                                <option> Лоратадин табл. 10 мг блистер №10</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="select_radius">
                    <select class="select_radius_btn">
                        <option value="null" selected>Найти ближайшую аптеку</option>
                        <option value="radius_1">В радиусе 1 км</option>
                        <option value="radius_5">В радиусе 5 км</option>
                        <option value="radius_10">В радиусе 10 км</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="top-price-search">
            <div class="wrap">
                <div class="product-nav">
                    <a class="nav-button-grey">Инструкция</a>
                    <a class="nav-button-grey active">Цена</a>
                    <a class="nav-button-grey">Аналоги</a>
                    <a class="nav-button-grey">Вопросы</a>
                    <a class="nav-button-grey">Симптомы</a>
                    <a class="nav-button-grey">Экстренные случаи</a>
                </div>
                <div class="flex-between">
                  {{--  <div class="dip">
                        Найти препарат в вашем городе
                        <span class="color-blue">от 9.60 до 28.50 грн.</span>
                    </div>
                        <div class="filtre_price">
                            <div><select>
                                    <option selected="selected">возрастанию цены</option>
                                    <option>убыванию цены</option>
                                </select></div>
                        </div>--}}
                </div>

            </div>
        </div>


    </div>
    {{--end for price page--}}


    <initial-component
            :slug="slug"
            :map_style="map_style"
            :api_url="api_url"
            :lang="lang"
            :no_blocks="no_blocks"
            :name_city="name_city"
    ></initial-component>
</section>


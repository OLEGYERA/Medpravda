<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Зависимости <i class="fas fa-angle-right"></i> Классификации Косм. Средств</h1>
                <div class="reactive-sub-titles" v-if="class_cosmetics_infoline_hidden">
                    <infoline
                        :i_class="'fas fa-cubes'"
                        :visual=class_cosmetics_infoline_hidden[0].title
                        :hidden="class_cosmetics_infoline_hidden"
                    ></infoline>
                    <a href="#" class="r-link">Перейти на страницу препаратов</a>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Классификацию Косм. Средств</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'classes'"
                    :url="'dependency/class_cosmetic/null'"
                    :modal_title="'класификация бадов'"
                    :callBack=callback_create
                    @createdX="responseAfterCreation"
                    @createdDo="responseAfterCreationDo"
                ></modal-create>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active blue">Все Классификации Косм. Средств</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table blue">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search" :class="{alias: search_alias}"></i>
                                <input type="text" v-model="search" placeholder="Поиск Классификаций Косм. Средств RU | Класс">
                            </label>
                            <pagination :current_paginate="current_paginate" :last_paginate="last_paginate" :color="'blue'" @currentPaginate="getCurrentPaginate"></pagination>
                            <div class="sort flex-row-e-c">
                                <label @click="filter_status = !filter_status">Количество записей: </label>
                                <selector
                                    :placeholder="'Показать 25'"
                                    :filter_status=filter_status
                                    :items=selector_items
                                    @selected="updateFilter"
                                ></selector>
                            </div>
                        </div>
                    </div>
                    <div class="table-content">
                        <div class="thead">
                            <div class="col cl-s center">Защита</div>
                            <div class="col cl-m center">Управление</div>
                            <div class="col cl-m center">Подклассификаций</div>
                            <div class="col cl-l">Название RU</div>
                            <div class="col cl-l">Название UA</div>
                            <div class="col cl-m center">Класс</div>
                            <div class="col cl-l center">Обновлено / Создано</div>
                        </div>
                        <div class="tbody" v-if="class_cosmetics">
                            <modal-edit
                                :type_edition="'classes'"
                                :url="'dependency/class_cosmetic'"
                                :modal_title="'классификацию бадов'"
                                :callBack=callback_edit
                                :alias="edit_alias"
                                @updatedX="responseAfterEdition"
                                @updatedDo="responseAfterEditionDo"
                            ></modal-edit>
                            <div class="tr-tbody" v-for="class_cosmetic in class_cosmetics">
                                <div class="col cl-s center error" v-if="class_cosmetic.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-cube" @click="$router.push({ name: 'cosmetic_child', params: { alias: class_cosmetic.class }})"></i>
                                    <i class="fas fa-pen" @click="callback_edit = !callback_edit, edit_alias = class_cosmetic.class"></i>
                                    <delete :title="'Удалить Классификацию Косм. Средств?'"
                                            :mode="'list'"
                                            :desc="'При удалении Классификации Косм. Средств все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteClassCosmetic(class_cosmetic.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-m center">{{class_cosmetic.children}}</div>
                                <div class="col cl-l">{{class_cosmetic.title}}</div>
                                <div class="col cl-l">{{class_cosmetic.utitle}}</div>
                                <div class="col cl-m center">{{class_cosmetic.class}}</div>
                                <div class="col cl-l center double"><span>{{class_cosmetic.updated_at}}</span><span>{{class_cosmetic.created_at}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {HTTP} from '../../http.js'
    export default {
        mounted() {
            this.getClassCosmetics();
        },
        data: function(){
            return{
                //model
                search: null,
                search_alias: false,
                current_paginate: 1,
                last_paginate: null,
                filter: 25,

                //array
                class_cosmetics: null,
                //services
                callback_create: false,
                callback_edit: false,
                edit_alias: null,
                class_cosmetics_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
            }
        },
        methods: {
            getClassCosmetics(search_for_alias){
                HTTP.post(`class_cosmetic/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                }).then(response => {
                    this.class_cosmetics = response.data.class_cosmetics.data;
                    this.current_paginate = response.data.class_cosmetics.current_page;
                    this.last_paginate = response.data.class_cosmetics.last_page;
                    this.class_cosmetics_infoline_hidden = [{title: response.data.class_cosmetics.data.length, info: 'Классификаций Косм. Средств сейчас на странице'}, {title: response.data.count, info: 'всего Классификаций Косм. Средств в панели управления'}]
                })
            },
            deleteClassCosmetic(id){
                HTTP.delete(`class_cosmetic/delete/` + id)
                    .then(response => {
                        this.getClassCosmetics();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            responseAfterCreationDo(data){
                this.search = data.title;
                this.getClassCosmetics();
            },
            responseAfterCreation(data){
                this.getClassCosmetics();
            },
            responseAfterEditionDo(data){
                this.search = data.title;
                this.getClassCosmetics();
            },
            responseAfterEdition(data){
                this.getClassCosmetics();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getClassCosmetics();
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getClassCosmetics();
            }
        },
        watch: {
            search(){
                this.getClassCosmetics();
            }
        }
    }
</script>


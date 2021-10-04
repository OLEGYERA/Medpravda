<template>
    <div class="reactive-content flex-col" v-if="fabricator">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Зависимости <i class="fas fa-angle-right"></i> Локации производителя <i class="fas fa-angle-right"></i> {{fabricator.title}}</h1>
                <div class="reactive-sub-titles" v-if="locations_infoline_hidden">
                    <infoline
                        :i_class="'fab fa-phabricator'"
                        :visual=locations_infoline_hidden[0].title
                        :hidden="locations_infoline_hidden"
                    ></infoline>
                    <a href="#" class="r-link">Перейти на страницу препаратов</a>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Локацию</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'titles_four'"
                    :url="'dependency/fabricator/' + fabricator.alias + '/location'"
                    :modal_title="'локация'"
                    :callBack=callback_create
                    @createdX="responseAfterCreation"
                    @createdDo="responseAfterCreationDo"
                ></modal-create>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="blue">Все производители</router-link>
            <a class="active blue">Локации производителя</a>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table blue">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search" :class="{alias: search_alias}"></i>
                                <input type="text" v-model="search" placeholder="Поиск локаций RU | Alias">
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
                            <div class="col cl-l">Название RU / UA</div>
                            <div class="col cl-l">Полное Название RU / UA</div>
                            <div class="col cl-l">Псевдоним</div>
                            <div class="col cl-l center">Обновлено / Создано</div>
                        </div>
                        <div class="tbody" v-if="locations">
                            <modal-edit
                                :type_edition="'titles_four'"
                                :url="'dependency/fabricator/' + this.fabricator_alias + '/location'"
                                :modal_title="'локация'"
                                :callBack=callback_edit
                                :alias="edit_alias"
                                @updatedX="responseAfterEdition"
                                @updatedDo="responseAfterEditionDo"
                            ></modal-edit>
                            <div class="tr-tbody" v-for="location in locations">
                                <div class="col cl-s center error" v-if="location.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="callback_edit = !callback_edit, edit_alias = location.alias"></i>
                                    <delete :title="'Удалить локацию?'"
                                            :mode="'list'"
                                            :desc="'При удалении локации все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteLocation(location.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-l double"><span>{{location.title}}</span><span>{{location.utitle}}</span></div>
                                <div class="col cl-l double"><span>{{location.full_title}}</span><span>{{location.full_utitle}}</span></div>
                                <div class="col cl-l">{{location.alias}}</div>
                                <div class="col cl-l center double"><span>{{location.updated_at}}</span><span>{{location.created_at}}</span></div>
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
            this.fabricator_alias = this.$route.params.alias;
            this.initPage();
            this.getLocations();
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
                locations: null,
                //services
                callback_create: false,
                callback_edit: false,
                edit_alias: null,
                locations_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
                fabricator_alias: null,
                fabricator: null,
            }
        },
        methods: {
            initPage(){
                HTTP.get(`fabricator/get/` + this.fabricator_alias).then(response => {
                    this.fabricator = response.data;
                })
            },
            getLocations(search_for_alias){
                HTTP.post(`fabricator/` + this.fabricator_alias + `/location/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                }).then(response => {
                    this.locations = response.data.locations.data;
                    this.current_paginate = response.data.locations.current_page;
                    this.last_paginate = response.data.locations.last_page;
                    this.locations_infoline_hidden = [{title: response.data.locations.data.length, info: 'локаций сейчас на странице'}, {title: response.data.count, info: 'всего локаций у производителя'}]
                })
            },
            deleteLocation(id){
                HTTP.delete(`fabricator/` + this.fabricator_alias + `/location/delete/` + id)
                    .then(response => {
                        this.getLocations();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            responseAfterCreationDo(data){
                this.search = data.title;
                this.getLocations();
            },
            responseAfterCreation(data){
                this.getLocations();
            },
            responseAfterEditionDo(data){
                this.search = data.title;
                this.getLocations();
            },
            responseAfterEdition(data){
                this.getLocations();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getLocations();
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getLocations();
            }
        },
        watch: {
            search(){
                this.getLocations();
            }
        }
    }
</script>


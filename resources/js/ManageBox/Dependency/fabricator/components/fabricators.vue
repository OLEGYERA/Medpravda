<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Зависимости <i class="fas fa-angle-right"></i> Производители</h1>
                <div class="reactive-sub-titles" v-if="fabricators_infoline_hidden">
                    <infoline
                        :i_class="'fab fa-phabricator'"
                        :visual=fabricators_infoline_hidden[0].title
                        :hidden="fabricators_infoline_hidden"
                    ></infoline>
                    <a href="#" class="r-link">Перейти на страницу препаратов</a>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Производителя</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'titles'"
                    :url="'dependency/fabricator'"
                    :modal_title="'производитель'"
                    :callBack=callback_create
                    @createdX="responseAfterCreation"
                    @createdDo="responseAfterCreationDo"
                ></modal-create>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active blue">Все производители</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table blue">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search" :class="{alias: search_alias}"></i>
                                <input type="text" v-model="search" placeholder="Поиск производителей RU | Alias">
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
                            <div class="col cl-s center">Локаций</div>
                            <div class="col cl-l">Название RU</div>
                            <div class="col cl-l">Название UA</div>
                            <div class="col cl-l">Псевдоним</div>
                            <div class="col cl-l center">Обновлено / Создано</div>
                        </div>
                        <div class="tbody" v-if="fabricators">
                            <modal-edit
                                :type_edition="'titles'"
                                :url="'dependency/fabricator'"
                                :modal_title="'производителя'"
                                :callBack=callback_edit
                                :alias="edit_alias"
                                @updatedX="responseAfterEdition"
                                @updatedDo="responseAfterEditionDo"
                            ></modal-edit>
                            <div class="tr-tbody" v-for="fabricator in fabricators">
                                <div class="col cl-s center error" v-if="fabricator.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-location-arrow" @click="$router.push({ name: 'locations', params: { alias: fabricator.alias }})"></i>
                                    <i class="fas fa-pen" @click="callback_edit = !callback_edit, edit_alias = fabricator.alias"></i>
                                    <delete :title="'Удалить производителя?'"
                                            :mode="'list'"
                                            :desc="'При удалении производителя все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteFabricator(fabricator.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-s center">{{fabricator.location_count}}</div>
                                <div class="col cl-l">{{fabricator.title}}</div>
                                <div class="col cl-l">{{fabricator.utitle}}</div>
                                <div class="col cl-l">{{fabricator.alias}}</div>
                                <div class="col cl-l center double"><span>{{fabricator.updated_at}}</span><span>{{fabricator.created_at}}</span></div>
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
            this.getFabricators();
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
                fabricators: null,
                //services
                callback_create: false,
                callback_edit: false,
                edit_alias: null,
                fabricators_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
            }
        },
        methods: {
            getFabricators(search_for_alias){
                HTTP.post(`fabricator/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                }).then(response => {
                    this.fabricators = response.data.fabricators.data;
                    this.current_paginate = response.data.fabricators.current_page;
                    this.last_paginate = response.data.fabricators.last_page;
                    this.fabricators_infoline_hidden = [{title: response.data.fabricators.data.length, info: 'производителей сейчас на странице'}, {title: response.data.count, info: 'всего производителей в панели управления'}]
                })
            },
            deleteFabricator(id){
                HTTP.delete(`fabricator/delete/` + id)
                    .then(response => {
                        this.getFabricators();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            responseAfterCreationDo(data){
                this.search = data.title;
                this.getFabricators();
            },
            responseAfterCreation(data){
                this.getFabricators();
            },
            responseAfterEditionDo(data){
                this.search = data.title;
                this.getFabricators();
            },
            responseAfterEdition(data){
                this.getFabricators();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getFabricators();
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getFabricators();
            }
        },
        watch: {
            search(){
                this.getFabricators();
            }
        }
    }
</script>


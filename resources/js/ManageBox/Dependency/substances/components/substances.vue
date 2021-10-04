<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Зависимости <i class="fas fa-angle-right"></i> Действующие Вещества</h1>
                <div class="reactive-sub-titles" v-if="substances_infoline_hidden">
                    <infoline
                        :i_class="'fas fa-capsules'"
                        :visual=substances_infoline_hidden[0].title
                        :hidden="substances_infoline_hidden"
                    ></infoline>
                    <a href="#" class="r-link">Перейти на страницу препаратов</a>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Действующее Вещество</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'titles'"
                    :url="'dependency/substance'"
                    :modal_title="'действующее вещество'"
                    :callBack=callback_create
                    @createdX="responseAfterCreation"
                    @createdDo="responseAfterCreationDo"
                ></modal-create>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active blue">Все действующие вещества</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table blue">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search" :class="{alias: search_alias}"></i>
                                <input type="text" v-model="search" placeholder="Поиск действующих веществ RU | Alias">
                            </label>
                            <pagination :current_paginate="current_paginate" :last_paginate="last_paginate" :color="'blue'" @currentPaginate="getCurrentPaginate"></pagination>
                            <div class="sort flex-row-e-c">
                                <label @click="filter_status = !filter_status">Количество записей: </label>
                                <selector
                                    :placeholder="'Показать 20'"
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
                            <div class="col cl-l">Название RU</div>
                            <div class="col cl-l">Название UA</div>
                            <div class="col cl-l">Псевдоним</div>
                            <div class="col cl-l center">Обновлено / Создано</div>
                        </div>
                        <div class="tbody" v-if="substances">
                            <modal-edit
                                :type_edition="'titles'"
                                :url="'dependency/substance'"
                                :modal_title="'действующее вещество'"
                                :callBack=callback_edit
                                :alias="edit_alias"
                                @updatedX="responseAfterEdition"
                                @updatedDo="responseAfterEditionDo"
                            ></modal-edit>
                            <div class="tr-tbody" v-for="substance in substances">
                                <div class="col cl-s center error" v-if="substance.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="callback_edit = !callback_edit, edit_alias = substance.alias"></i>
                                    <delete :title="'Удалить действующее вещество?'"
                                            :mode="'list'"
                                            :desc="'При удалении действующего вещества все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteSubstance(substance.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-l">{{substance.title}}</div>
                                <div class="col cl-l">{{substance.utitle}}</div>
                                <div class="col cl-l">{{substance.alias}}</div>
                                <div class="col cl-l center double"><span>{{substance.updated_at}}</span><span>{{substance.created_at}}</span></div>
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
            this.getSubstances();
        },
        data: function(){
            return{
                //model
                search: null,
                search_alias: false,
                current_paginate: 1,
                last_paginate: null,
                filter: 20,

                //array
                substances: null,
                //services
                callback_create: false,
                callback_edit: false,
                edit_alias: null,
                substances_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
            }
        },
        methods: {
            getSubstances(search_for_alias){
                HTTP.post(`substance/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                }).then(response => {
                        this.substances = response.data.substances.data;
                        this.current_paginate = response.data.substances.current_page;
                        this.last_paginate = response.data.substances.last_page;
                        this.substances_infoline_hidden = [{title: response.data.substances.data.length, info: 'действующих веществ сейчас на странице'}, {title: response.data.count, info: 'всего действующих веществ в панели управления'}]
                })
            },
            deleteSubstance(id){
                HTTP.delete(`substance/delete/` + id)
                    .then(response => {
                        this.getSubstances();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            responseAfterCreationDo(data){
                this.search = data.title;
                this.getSubstances();
            },
            responseAfterCreation(data){
                this.getSubstances();
            },
            responseAfterEditionDo(data){
                this.search = data.title;
                this.getSubstances();
            },
            responseAfterEdition(data){
                this.getSubstances();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getSubstances();
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getSubstances();
            }
        },
        watch: {
            search(){
                this.getSubstances();
            }
        }
    }
</script>


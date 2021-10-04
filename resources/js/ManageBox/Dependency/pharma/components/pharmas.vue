<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Зависимости <i class="fas fa-angle-right"></i>  Фармакотерапевтические группы</h1>
                <div class="reactive-sub-titles" v-if="pharmas_infoline_hidden">
                    <infoline
                        :i_class="'fas fa-prescription-bottle-alt'"
                        :visual=pharmas_infoline_hidden[0].title
                        :hidden="pharmas_infoline_hidden"
                    ></infoline>
                    <a href="#" class="r-link">Перейти на страницу препаратов</a>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить фармгруппу</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'titles'"
                    :url="'dependency/pharma'"
                    :modal_title="'фармгруппа'"
                    :callBack=callback_create
                    @createdX="responseAfterCreation"
                    @createdDo="responseAfterCreationDo"
                ></modal-create>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active blue">Все фармакотерапевтические группы</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table blue">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search" :class="{alias: search_alias}"></i>
                                <input type="text" v-model="search" placeholder="Поиск фармгруппы RU | Alias">
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
                        <div class="tbody" v-if="pharmas">
                            <modal-edit
                                :type_edition="'titles'"
                                :url="'dependency/pharma'"
                                :modal_title="'фармгруппа'"
                                :callBack=callback_edit
                                :alias="edit_alias"
                                @updatedX="responseAfterEdition"
                                @updatedDo="responseAfterEditionDo"
                            ></modal-edit>
                            <div class="tr-tbody" v-for="pharma in pharmas">
                                <div class="col cl-s center error" v-if="pharma.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="callback_edit = !callback_edit, edit_alias = pharma.alias"></i>
                                    <delete :title="'Удалить фармгруппу?'"
                                            :mode="'list'"
                                            :desc="'При удалении фармгруппы все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deletePharma(pharma.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-l">{{pharma.title}}</div>
                                <div class="col cl-l">{{pharma.utitle}}</div>
                                <div class="col cl-l">{{pharma.alias}}</div>
                                <div class="col cl-l center double"><span>{{pharma.updated_at}}</span><span>{{pharma.created_at}}</span></div>
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
            if(this.$route.params.alias != undefined){
                this.search = this.$route.params.alias
            }
            this.getPharmas();
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
                pharmas: null,
                //services
                callback_create: false,
                callback_edit: false,
                edit_alias: null,
                pharmas_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
            }
        },
        methods: {
            getPharmas(search_for_alias){
                HTTP.post(`pharma/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                }).then(response => {
                    this.pharmas = response.data.pharmas.data;
                    this.current_paginate = response.data.pharmas.current_page;
                    this.last_paginate = response.data.pharmas.last_page;
                    this.pharmas_infoline_hidden = [{title: response.data.pharmas.data.length, info: 'фармгрупп сейчас на странице'}, {title: response.data.count, info: 'всего фармгрупп в панели управления'}]
                })
            },
            deletePharma(id){
                HTTP.delete(`pharma/delete/` + id)
                    .then(response => {
                        this.getPharmas();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            responseAfterCreationDo(data){
                this.search = data.title;
                this.getPharmas();
            },
            responseAfterCreation(data){
                this.getPharmas();
            },
            responseAfterEditionDo(data){
                this.search = data.title;
                this.getPharmas();
            },
            responseAfterEdition(data){
                this.getPharmas();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getPharmas();
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getPharmas();
            }
        },
        watch: {
            search(){
                this.getPharmas();
            }
        }
    }
</script>


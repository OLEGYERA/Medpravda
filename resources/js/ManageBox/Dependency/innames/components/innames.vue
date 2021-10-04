<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Зависимости <i class="fas fa-angle-right"></i> Международные Названия</h1>
                <div class="reactive-sub-titles" v-if="innames_infoline_hidden">
                    <infoline
                        :i_class="'fas fa-file-signature'"
                        :visual=innames_infoline_hidden[0].title
                        :hidden="innames_infoline_hidden"
                    ></infoline>
                    <a href="#" class="r-link">Перейти на страницу препаратов</a>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить МНН</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'title'"
                    :url="'dependency/inname'"
                    :modal_title="'международное название'"
                    :callBack=callback_create
                    @createdX="responseAfterCreation"
                    @createdDo="responseAfterCreationDo"
                ></modal-create>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active blue">Все международные названия</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table blue">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search" :class="{alias: search_alias}"></i>
                                <input type="text" v-model="search" placeholder="Поиск международных названий EN">
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
                            <div class="col cl-xxl">Название EN</div>
                            <div class="col cl-l center">Обновлено / Создано</div>
                        </div>
                        <div class="tbody" v-if="innames">
                            <modal-edit
                                :type_edition="'title'"
                                :url="'dependency/inname'"
                                :modal_title="'международное название'"
                                :callBack=callback_edit
                                :alias="edit_alias"
                                @updatedX="responseAfterEdition"
                                @updatedDo="responseAfterEditionDo"
                            ></modal-edit>
                            <div class="tr-tbody" v-for="inname in innames">
                                <div class="col cl-s center error" v-if="inname.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="callback_edit = !callback_edit, edit_alias = inname.title"></i>
                                    <delete :title="'Удалить МНН?'"
                                            :mode="'list'"
                                            :desc="'При удалении МНН все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteInname(inname.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-xxl">{{inname.title}}</div>
                                <div class="col cl-l center double"><span>{{inname.updated_at}}</span><span>{{inname.created_at}}</span></div>
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
            this.getInnames();
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
                innames: null,
                //services
                callback_create: false,
                callback_edit: false,
                edit_alias: null,
                innames_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
            }
        },
        methods: {
            getInnames(search_for_alias){
                HTTP.post(`inname/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                }).then(response => {
                    this.innames = response.data.innames.data;
                    this.current_paginate = response.data.innames.current_page;
                    this.last_paginate = response.data.innames.last_page;
                    this.innames_infoline_hidden = [{title: response.data.innames.data.length, info: 'МНН сейчас на странице'}, {title: response.data.count, info: 'всего МНН в панели управления'}]
                })
            },
            deleteInname(id){
                HTTP.delete(`inname/delete/` + id)
                    .then(response => {
                        this.getInnames();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            responseAfterCreationDo(data){
                this.search = data.title;
                this.getInnames();
            },
            responseAfterCreation(data){
                this.getInnames();
            },
            responseAfterEditionDo(data){
                this.search = data.title;
                this.getInnames();
            },
            responseAfterEdition(data){
                this.getInnames();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getInnames();
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getInnames();
            }
        },
        watch: {
            search(){
                this.getInnames();
            },
        }
    }
</script>


<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title">Справочник Бадов</h1>
                <div class="reactive-sub-titles" v-if="bads_infoline_hidden">
                    <infoline
                        :i_class="'fas fa-capsules'"
                        :visual=bads_infoline_hidden[0].title
                        :hidden="bads_infoline_hidden"
                    ></infoline>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Бад</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'titles'"
                    :url="'manual/bad'"
                    :modal_title="'бад'"
                    :callBack=callback_create
                    @createdX="createAndExit"
                    @createdDo="createAndEdit"
                ></modal-create>
            </div>

        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active orange">Все Бады</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table orange">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search"></i>
                                <input type="text" v-model="search" placeholder="Поиск бада RU | Alias">
                            </label>
                            <pagination :current_paginate="current_paginate" :last_paginate="last_paginate" :color="'orange'" @currentPaginate="getCurrentPaginate"></pagination>
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
                            <div class="col cl-l">Название RU</div>
                            <div class="col cl-l">Название UA</div>
                            <div class="col cl-l">Псевдоним</div>
                            <div class="col cl-l center">Обновлено / Создано</div>
                        </div>
                        <div class="tbody" v-if="bads">
                            <div class="tr-tbody" v-for="bad in bads">
                                <div class="col cl-s center error" v-if="bad.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="$router.push({ name: 'edit_bad_main', params: { alias: bad.alias }})"></i>
                                    <delete :title="'Удалить бад?'"
                                            :mode="'list'"
                                            :desc="'При удалении бада все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteBad(bad.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-l">{{bad.title}}</div>
                                <div class="col cl-l">{{bad.utitle}}</div>
                                <div class="col cl-l">{{bad.alias}}</div>
                                <div class="col cl-l center double"><span>{{bad.updated_at}}</span><span>{{bad.created_at}}</span></div>
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
            this.getBads()
        },
        data: function(){
            return{
                //model
                search: null,
                current_paginate: 1,
                last_paginate: null,
                filter: 25,

                //array
                bads: null,
                //services
                callback_create: false,
                bads_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
            }
        },
        methods: {
            getBads(search_for_email){
                HTTP.post(`bad/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: this.search,
                })
                    .then(response => {
                        this.bads = response.data.bads.data;
                        this.current_paginate = response.data.bads.current_page;
                        this.last_paginate = response.data.bads.last_page;
                        this.bads_infoline_hidden = [{title: response.data.bads.data.length, info: 'бадов сейчас на странице'}, {title: response.data.count, info: 'всего бадов в панели управления'}]

                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            deleteBad(id){
                HTTP.delete(`bad/delete/` + id)
                    .then(response => {
                        this.getBads()
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            createAndEdit(data){
                this.$router.push({ name: 'edit_bad_main', params: { alias: data.alias }})
            },
            createAndExit(data){
                this.getBads();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getBads()
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getBads();
            }
        },
        watch: {
            search(){
                this.getBads();
            }
        }
    }
</script>

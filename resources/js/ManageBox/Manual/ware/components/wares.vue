<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title">Справочник Мед. Изделий</h1>
                <div class="reactive-sub-titles" v-if="wares_infoline_hidden">
                    <infoline
                        :i_class="'fas fa-heartbeat'"
                        :visual=wares_infoline_hidden[0].title
                        :hidden="wares_infoline_hidden"
                    ></infoline>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Мед. Изделие</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'titles'"
                    :url="'manual/ware'"
                    :modal_title="'мед. изделие'"
                    :callBack=callback_create
                    @createdX="createAndExit"
                    @createdDo="createAndEdit"
                ></modal-create>
            </div>

        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active orange">Все Мед. Изделия</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table orange">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search"></i>
                                <input type="text" v-model="search" placeholder="Поиск мед. изделия RU | Alias">
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
                        <div class="tbody" v-if="wares">
                            <div class="tr-tbody" v-for="ware in wares">
                                <div class="col cl-s center error" v-if="ware.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="$router.push({ name: 'edit_ware_main', params: { alias: ware.alias }})"></i>
                                    <delete :title="'Удалить мед. изделие?'"
                                            :mode="'list'"
                                            :desc="'При удалении мед. изделия все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteWare(ware.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-l">{{ware.title}}</div>
                                <div class="col cl-l">{{ware.utitle}}</div>
                                <div class="col cl-l">{{ware.alias}}</div>
                                <div class="col cl-l center double"><span>{{ware.updated_at}}</span><span>{{ware.created_at}}</span></div>
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
            this.getWares()
        },
        data: function(){
            return{
                //model
                search: null,
                current_paginate: 1,
                last_paginate: null,
                filter: 25,

                //array
                wares: null,
                //services
                callback_create: false,
                wares_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
            }
        },
        methods: {
            getWares(search_for_email){
                HTTP.post(`ware/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: this.search,
                })
                    .then(response => {
                        this.wares = response.data.wares.data;
                        this.current_paginate = response.data.wares.current_page;
                        this.last_paginate = response.data.wares.last_page;
                        this.wares_infoline_hidden = [{title: response.data.wares.data.length, info: 'мед. изделий сейчас на странице'}, {title: response.data.count, info: 'всего мед. изделий в панели управления'}]

                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            deleteWare(id){
                HTTP.delete(`ware/delete/` + id)
                    .then(response => {
                        this.getWares()
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            createAndEdit(data){
                this.$router.push({ name: 'edit_ware_main', params: { alias: data.alias }})
            },
            createAndExit(data){
                this.getWares();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getWares()
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getWares();
            }
        },
        watch: {
            search(){
                this.getWares();
            }
        }
    }
</script>

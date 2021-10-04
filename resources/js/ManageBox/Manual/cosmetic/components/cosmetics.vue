<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title">Справочник Косм. средств</h1>
                <div class="reactive-sub-titles" v-if="cosmetics_infoline_hidden">
                    <infoline
                        :i_class="'fas fa-mortar-pestle'"
                        :visual=cosmetics_infoline_hidden[0].title
                        :hidden="cosmetics_infoline_hidden"
                    ></infoline>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Косм. средство</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'titles'"
                    :url="'manual/cosmetic'"
                    :modal_title="'косм. средство'"
                    :callBack=callback_create
                    @createdX="createAndExit"
                    @createdDo="createAndEdit"
                ></modal-create>
            </div>

        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active orange">Все Косм. средства</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table orange">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search"></i>
                                <input type="text" v-model="search" placeholder="Поиск косм. средства RU | Alias">
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
                        <div class="tbody" v-if="cosmetics">
                            <div class="tr-tbody" v-for="cosmetic in cosmetics">
                                <div class="col cl-s center error" v-if="cosmetic.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="$router.push({ name: 'edit_cosmetic_main', params: { alias: cosmetic.alias }})"></i>
                                    <delete :title="'Удалить косм. средство?'"
                                            :mode="'list'"
                                            :desc="'При удалении косм. средства все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteCosmetic(cosmetic.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-l">{{cosmetic.title}}</div>
                                <div class="col cl-l">{{cosmetic.utitle}}</div>
                                <div class="col cl-l">{{cosmetic.alias}}</div>
                                <div class="col cl-l center double"><span>{{cosmetic.updated_at}}</span><span>{{cosmetic.created_at}}</span></div>
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
            this.getCosmetics()
        },
        data: function(){
            return{
                //model
                search: null,
                current_paginate: 1,
                last_paginate: null,
                filter: 25,

                //array
                cosmetics: null,
                //services
                callback_create: false,
                cosmetics_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
            }
        },
        methods: {
            getCosmetics(search_for_email){
                HTTP.post(`cosmetic/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: this.search,
                })
                    .then(response => {
                        this.cosmetics = response.data.cosmetics.data;
                        this.current_paginate = response.data.cosmetics.current_page;
                        this.last_paginate = response.data.cosmetics.last_page;
                        this.cosmetics_infoline_hidden = [{title: response.data.cosmetics.data.length, info: 'косм. средств сейчас на странице'}, {title: response.data.count, info: 'всего косм. средств в панели управления'}]

                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            deleteCosmetic(id){
                HTTP.delete(`cosmetic/delete/` + id)
                    .then(response => {
                        this.getCosmetics()
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            createAndEdit(data){
                this.$router.push({ name: 'edit_cosmetic_main', params: { alias: data.alias }})
            },
            createAndExit(data){
                this.getCosmetics();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getCosmetics()
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getCosmetics();
            }
        },
        watch: {
            search(){
                this.getCosmetics();
            }
        }
    }
</script>

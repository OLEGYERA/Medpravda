<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Медиатека <i class="fas fa-angle-right"></i> Cтруктура</h1>
                <div class="reactive-sub-titles" v-if="structures_infoline_hidden">
                    <infoline
                        :i_class="'fas fa-mortar-pestle'"
                        :visual=structures_infoline_hidden[0].title
                        :hidden="structures_infoline_hidden"
                    ></infoline>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Структуру</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'title'"
                    :url="'media/structure'"
                    :modal_title="'структура'"
                    :callBack=callback_create
                    @createdX="createAndExit"
                    @createdDo="createAndEdit"
                ></modal-create>
            </div>

        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active orange">Все Структуры</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table orange">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search"></i>
                                <input type="text" v-model="search" placeholder="Поиск Структуры RU | Alias">
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
                            <div class="col cl-l">Название</div>
                            <div class="col cl-l">Псевдоним</div>
                            <div class="col cl-l center">Обновлено / Создано</div>
                        </div>
                        <div class="tbody" v-if="structures">
                            <div class="tr-tbody" v-for="structure in structures">
                                <div class="col cl-s center error" v-if="structure.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="$router.push({ name: 'edit_structure_main', params: { alias: structure.alias }})"></i>
                                    <delete :title="'Удалить структуру?'"
                                            :mode="'list'"
                                            :desc="'При удалении структуры все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteCosmetic(structure.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-l">{{structure.title}}</div>
                                <div class="col cl-l">{{structure.alias}}</div>
                                <div class="col cl-l center double"><span>{{structure.updated_at}}</span><span>{{structure.created_at}}</span></div>
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
                structures: null,
                //services
                callback_create: false,
                structures_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
            }
        },
        methods: {
            getCosmetics(search_for_email){
                HTTP.post(`structure/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: this.search,
                })
                    .then(response => {
                        this.structures = response.data.structures.data;
                        this.current_paginate = response.data.structures.current_page;
                        this.last_paginate = response.data.structures.last_page;
                        this.structures_infoline_hidden = [{title: response.data.structures.data.length, info: 'структур сейчас на странице'}, {title: response.data.count, info: 'всего структур в панели управления'}]

                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            deleteCosmetic(id){
                HTTP.delete(`structure/delete/` + id)
                    .then(response => {
                        this.getCosmetics()
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            createAndEdit(data){
                this.$router.push({ name: 'edit_structure_main', params: { alias: data.alias }})
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

<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Зависимости <i class="fas fa-angle-right"></i> Теги</h1>
                <div class="reactive-sub-titles" v-if="tags_infoline_hidden">
                    <infoline
                        :i_class="'fas fa-spell-check'"
                        :visual=tags_infoline_hidden[0].title
                        :hidden="tags_infoline_hidden"
                    ></infoline>
<!--                    <router-link :to="{name:'drugs'}" class="r-link">Перейти на страницу препаратов</router-link>-->
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Термин</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'titles'"
                    :url="'dependency/tag'"
                    :modal_title="'термин'"
                    :callBack=callback_create
                    @createdX="responseAfterCreation"
                    @createdDo="responseAfterCreationDo"
                ></modal-create>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active blue">Все теги</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table blue">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search" :class="{alias: search_alias}"></i>
                                <input type="text" v-model="search" placeholder="Поиск термина RU | Alias">
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
                            <div class="col cl-l">Название RU</div>
                            <div class="col cl-l">Название UA</div>
                            <div class="col cl-l">Псевдоним</div>
                            <div class="col cl-l center">Обновлено / Создано</div>
                        </div>
                        <div class="tbody" v-if="tags">
                            <div class="tr-tbody" v-for="tag in tags">
                                <div class="col cl-s center error" v-if="tag.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="$router.push({ name: 'edit_tag', params: { alias: tag.id }})"></i>
                                    <delete :title="'Удалить термин?'"
                                            :mode="'list'"
                                            :desc="'При удалении термина все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteTag(tag.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-l">{{tag.title}}</div>
                                <div class="col cl-l">{{tag.utitle}}</div>
                                <div class="col cl-l">{{tag.alias}}</div>
                                <div class="col cl-l center double"><span>{{tag.updated_at}}</span><span>{{tag.created_at}}</span></div>
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
            this.getTags();
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
                tags: null,
                //services
                callback_create: false,
                callback_edit: false,
                edit_alias: null,
                tags_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
            }
        },
        methods: {
            getTags(search_for_alias){
                HTTP.post(`tag/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                }).then(response => {
                    this.tags = response.data.tags.data;
                    this.current_paginate = response.data.tags.current_page;
                    this.last_paginate = response.data.tags.last_page;
                    this.tags_infoline_hidden = [{title: response.data.tags.data.length, info: 'терминов сейчас на странице'}, {title: response.data.count, info: 'всего терминов в панели управления'}]
                })
            },
            deleteTag(id){
                HTTP.delete(`tag/delete/` + id)
                    .then(response => {
                        this.getTags();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            responseAfterCreationDo(data){
                this.search = data.title;
                this.getTags();
            },
            responseAfterCreation(data){
                this.getTags();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getTags();
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getTags();
            }
        },
        watch: {
            search(){
                this.getTags();
            }
        }
    }
</script>


<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Зависимости <i class="fas fa-angle-right"></i> Термины</h1>
                <div class="reactive-sub-titles" v-if="terms_infoline_hidden">
                    <infoline
                        :i_class="'fas fa-spell-check'"
                        :visual=terms_infoline_hidden[0].title
                        :hidden="terms_infoline_hidden"
                    ></infoline>
<!--                    <router-link :to="{name:'drugs'}" class="r-link">Перейти на страницу препаратов</router-link>-->
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Термин</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'titles'"
                    :url="'dependency/term'"
                    :modal_title="'термин'"
                    :callBack=callback_create
                    @createdX="responseAfterCreation"
                    @createdDo="responseAfterCreationDo"
                ></modal-create>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active blue">Все термины</router-link>
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
                        <div class="tbody" v-if="terms">
                            <div class="tr-tbody" v-for="term in terms">
                                <div class="col cl-s center error" v-if="term.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="$router.push({ name: 'edit_term', params: { alias: term.id }})"></i>
                                    <delete :title="'Удалить термин?'"
                                            :mode="'list'"
                                            :desc="'При удалении термина все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteTerm(term.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-l">{{term.title}}</div>
                                <div class="col cl-l">{{term.utitle}}</div>
                                <div class="col cl-l">{{term.alias}}</div>
                                <div class="col cl-l center double"><span>{{term.updated_at}}</span><span>{{term.created_at}}</span></div>
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
            this.getTerms();
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
                terms: null,
                //services
                callback_create: false,
                callback_edit: false,
                edit_alias: null,
                terms_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
            }
        },
        methods: {
            getTerms(search_for_alias){
                HTTP.post(`term/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                }).then(response => {
                    this.terms = response.data.terms.data;
                    this.current_paginate = response.data.terms.current_page;
                    this.last_paginate = response.data.terms.last_page;
                    this.terms_infoline_hidden = [{title: response.data.terms.data.length, info: 'терминов сейчас на странице'}, {title: response.data.count, info: 'всего терминов в панели управления'}]
                })
            },
            deleteTerm(id){
                HTTP.delete(`term/delete/` + id)
                    .then(response => {
                        this.getTerms();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            responseAfterCreationDo(data){
                this.search = data.title;
                this.getTerms();
            },
            responseAfterCreation(data){
                this.getTerms();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getTerms();
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getTerms();
            }
        },
        watch: {
            search(){
                this.getTerms();
            }
        }
    }
</script>


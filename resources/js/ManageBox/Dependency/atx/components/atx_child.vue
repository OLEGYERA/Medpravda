<template>
    <div class="reactive-content flex-col" v-if="parent_atx">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Зависимости <i class="fas fa-angle-right"></i> Подклассификации ATX<i class="fas fa-angle-right"></i> {{parent_atx.class}}</h1>
                <div class="reactive-sub-titles" v-if="atxs_infoline_hidden && pre_parent_atx">
                    <infoline
                        :i_class="'fas fa-cubes'"
                        :visual=atxs_infoline_hidden[0].title
                        :hidden="atxs_infoline_hidden"
                    ></infoline>
                    <router-link :to="parent_atx.parent_id != null ? {name: 'atx_child', params: { alias: pre_parent_atx.class}} : {name: 'atx'}" class="r-link" style="margin-right: 15px;">Подняться на уровень выше</router-link>
                    <a href="#" class="r-link">Перейти на страницу препаратов</a>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить ATX</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'classes'"
                    :url="'dependency/atx/' + parent_atx.id"
                    :modal_title="'ATX'"
                    :callBack=callback_create
                    @createdX="responseAfterCreation"
                    @createdDo="responseAfterCreationDo"
                ></modal-create>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="blue">Все ATX</router-link>
            <a class="active blue">Подклассификации ATX</a>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table blue">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search" :class="{alias: search_alias}"></i>
                                <input type="text" v-model="search" placeholder="Поиск ATX RU | Класс">
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
                            <div class="col cl-m center">Подклассификаций</div>
                            <div class="col cl-l">Название RU</div>
                            <div class="col cl-l">Название UA</div>
                            <div class="col cl-m center">Класс</div>
                            <div class="col cl-l center">Обновлено / Создано</div>
                        </div>
                        <div class="tbody" v-if="atxs">
                            <modal-edit
                                :type_edition="'classes'"
                                :url="'dependency/atx'"
                                :modal_title="'atx'"
                                :callBack=callback_edit
                                :alias="edit_alias"
                                @updatedX="responseAfterEdition"
                                @updatedDo="responseAfterEditionDo"
                            ></modal-edit>
                            <div class="tr-tbody" v-for="atx in atxs">
                                <div class="col cl-s center error" v-if="atx.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-cube" @click="$router.push({ name: 'atx_child', params: { alias: atx.class }})"></i>
                                    <i class="fas fa-pen" @click="callback_edit = !callback_edit, edit_alias = atx.class"></i>
                                    <delete :title="'Удалить ATX?'"
                                            :mode="'list'"
                                            :desc="'При удалении ATX все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteAtx(atx.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-m center">{{atx.children}}</div>
                                <div class="col cl-l">{{atx.title}}</div>
                                <div class="col cl-l">{{atx.utitle}}</div>
                                <div class="col cl-m center">{{atx.class}}</div>
                                <div class="col cl-l center double"><span>{{atx.updated_at}}</span><span>{{atx.created_at}}</span></div>
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
            this.initPage();
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
                atxs: null,
                //services
                callback_create: false,
                callback_edit: false,
                edit_alias: null,
                atxs_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
                parent_atx_class: null,
                parent_atx: null,
                pre_parent_atx: null,
            }
        },
        methods: {
            initPage(){
                this.parent_atx_class = this.$route.params.alias;

                HTTP.get(`atx/get/` + this.parent_atx_class).then(response => {
                    this.parent_atx = response.data;
                });
                HTTP.get(`atx/get/pre-parent/` + this.parent_atx_class).then(response => {
                    this.pre_parent_atx = response.data;
                    console.log(this.pre_parent_atx, 123)
                });

                this.getAtxs();
            },
            getAtxs(search_for_alias){
                HTTP.post(`atx/` + this.parent_atx_class + `/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                }).then(response => {
                    this.atxs = response.data.atxs.data;
                    this.current_paginate = response.data.atxs.current_page;
                    this.last_paginate = response.data.atxs.last_page;
                    this.atxs_infoline_hidden = [{title: response.data.atxs.data.length, info: 'ATX сейчас на странице'}, {title: response.data.count, info: 'всего ATX в панеле управления'}]
                })
            },
            deleteAtx(id){
                HTTP.delete(`atx/delete/` + id)
                    .then(response => {
                        this.getAtxs();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            responseAfterCreationDo(data){
                this.search = data.title;
                this.getAtxs();
            },
            responseAfterCreation(data){
                this.getAtxs();
            },
            responseAfterEditionDo(data){
                this.search = data.title;
                this.getAtxs();
            },
            responseAfterEdition(data){
                this.getAtxs();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getAtxs();
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getAtxs();
            }
        },
        watch: {
            search(){
                this.getAtxs();
            },
            $route(to){
                this.initPage();
            }
        }
    }
</script>


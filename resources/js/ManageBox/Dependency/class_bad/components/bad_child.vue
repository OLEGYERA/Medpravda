<template>
    <div class="reactive-content flex-col" v-if="parent_class_bad">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Зависимости <i class="fas fa-angle-right"></i> Подклассификации Бадов<i class="fas fa-angle-right"></i> {{parent_class_bad.class}}</h1>
                <div class="reactive-sub-titles" v-if="class_bads_infoline_hidden && pre_parent_class_bad">
                    <infoline
                        :i_class="'fas fa-cubes'"
                        :visual=class_bads_infoline_hidden[0].title
                        :hidden="class_bads_infoline_hidden"
                    ></infoline>
                    <router-link :to="parent_class_bad.parent_id != null ? {name: 'bad_child', params: { alias: pre_parent_class_bad.class}} : {name: 'bad'}" class="r-link" style="margin-right: 15px;">Подняться на уровень выше</router-link>
                    <a href="#" class="r-link">Перейти на страницу препаратов</a>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Подклассификацию Бада</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'classes'"
                    :url="'dependency/class_bad/' + parent_class_bad.id"
                    :modal_title="'ATX'"
                    :callBack=callback_create
                    @createdX="responseAfterCreation"
                    @createdDo="responseAfterCreationDo"
                ></modal-create>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="blue">Все Классификации Бадов</router-link>
            <a class="active blue">Подклассификация Бадов</a>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table blue">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search" :class="{alias: search_alias}"></i>
                                <input type="text" v-model="search" placeholder="Поиск Классификаций Бадов RU | Класс">
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
                        <div class="tbody" v-if="class_bads">
                            <modal-edit
                                :type_edition="'classes'"
                                :url="'dependency/class_bad'"
                                :modal_title="'class_bad'"
                                :callBack=callback_edit
                                :alias="edit_alias"
                                @updatedX="responseAfterEdition"
                                @updatedDo="responseAfterEditionDo"
                            ></modal-edit>
                            <div class="tr-tbody" v-for="class_bad in class_bads">
                                <div class="col cl-s center error" v-if="class_bad.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-cube" @click="$router.push({ name: 'bad_child', params: { alias: class_bad.class }})"></i>
                                    <i class="fas fa-pen" @click="callback_edit = !callback_edit, edit_alias = class_bad.class"></i>
                                    <delete :title="'Удалить Классификацию Бадов?'"
                                            :mode="'list'"
                                            :desc="'При удалении Классификации Бадов все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteClassBad(class_bad.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-m center">{{class_bad.children}}</div>
                                <div class="col cl-l">{{class_bad.title}}</div>
                                <div class="col cl-l">{{class_bad.utitle}}</div>
                                <div class="col cl-m center">{{class_bad.class}}</div>
                                <div class="col cl-l center double"><span>{{class_bad.updated_at}}</span><span>{{class_bad.created_at}}</span></div>
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
                class_bads: null,
                //services
                callback_create: false,
                callback_edit: false,
                edit_alias: null,
                class_bads_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
                parent_class_bad_class: null,
                parent_class_bad: null,
                pre_parent_class_bad: null,
            }
        },
        methods: {
            initPage(){
                this.parent_class_bad_class = this.$route.params.alias;

                HTTP.get(`class_bad/get/` + this.parent_class_bad_class).then(response => {
                    this.parent_class_bad = response.data;
                });
                HTTP.get(`class_bad/get/pre-parent/` + this.parent_class_bad_class).then(response => {
                    this.pre_parent_class_bad = response.data;
                    console.log(this.pre_parent_class_bad, 123)
                });

                this.getClassBads();
            },
            getClassBads(search_for_alias){
                HTTP.post(`class_bad/` + this.parent_class_bad_class + `/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                }).then(response => {
                    this.class_bads = response.data.class_bads.data;
                    this.current_paginate = response.data.class_bads.current_page;
                    this.last_paginate = response.data.class_bads.last_page;
                    this.class_bads_infoline_hidden = [{title: response.data.class_bads.data.length, info: 'Подклассификаций Бадов сейчас на странице'}, {title: response.data.count, info: 'всего Классификаций Бадов в панеле управления'}]
                })
            },
            deleteClassBad(id){
                HTTP.delete(`class_bad/delete/` + id)
                    .then(response => {
                        this.getClassBads();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            responseAfterCreationDo(data){
                this.search = data.title;
                this.getClassBads();
            },
            responseAfterCreation(data){
                this.getClassBads();
            },
            responseAfterEditionDo(data){
                this.search = data.title;
                this.getClassBads();
            },
            responseAfterEdition(data){
                this.getClassBads();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getClassBads();
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getClassBads();
            }
        },
        watch: {
            search(){
                this.getClassBads();
            },
            $route(to){
                this.initPage();
            }
        }
    }
</script>


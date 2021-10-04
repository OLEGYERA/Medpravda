<template>
    <div class="reactive-content flex-col" v-if="parent_category">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title blue">Медиатека <i class="fas fa-angle-right"></i> Подкатегории<i class="fas fa-angle-right"></i> {{parent_category.title}}</h1>
                <div class="reactive-sub-titles" v-if="categories_infoline_hidden && pre_parent_category">
                    <infoline
                        :i_class="'fas fa-cubes'"
                        :visual=categories_infoline_hidden[0].title
                        :hidden="categories_infoline_hidden"
                    ></infoline>
                    <router-link :to="parent_category.parent_id != null ? {name: 'category_child', params: { alias: pre_parent_category.class}} : {name: 'category'}" class="r-link" style="margin-right: 15px;">Подняться на уровень выше</router-link>
                    <a href="#" class="r-link">Перейти на страницу статей</a>
                </div>
            </div>
            <div class="header-right">
                <div class="r-btn r-lnk" @click="callback_create = !callback_create">Добавить Категорию</div>
                <modal-create
                    :method_processed="'insert'"
                    :type_creation="'titles'"
                    :url="'media/category/' + parent_category.id"
                    :modal_title="'Категория'"
                    :callBack=callback_create
                    @createdX="responseAfterCreation"
                    @createdDo="responseAfterCreationDo"
                ></modal-create>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="blue">Все Категории</router-link>
            <a class="active blue">Подкатегории</a>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table blue">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search" :class="{alias: search_alias}"></i>
                                <input type="text" v-model="search" placeholder="Поиск Категории RU | Класс">
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
                        <div class="tbody" v-if="categories">
                            <modal-edit
                                :type_edition="'titles'"
                                :url="'media/category'"
                                :modal_title="'category'"
                                :callBack=callback_edit
                                :alias="edit_alias"
                                @updatedX="responseAfterEdition"
                                @updatedDo="responseAfterEditionDo"
                            ></modal-edit>
                            <div class="tr-tbody" v-for="category in categories">
                                <div class="col cl-s center error" v-if="category.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-cube" @click="$router.push({ name: 'category_child', params: { alias: category.alias }})"></i>
                                    <i class="fas fa-pen" @click="callback_edit = !callback_edit, edit_alias = category.alias"></i>
                                    <delete :title="'Удалить Категорию?'"
                                            :mode="'list'"
                                            :desc="'При удалении Категории все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteCategory(category.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-m center">{{category.children}}</div>
                                <div class="col cl-l">{{category.title}}</div>
                                <div class="col cl-l">{{category.utitle}}</div>
                                <div class="col cl-m center">{{category.class}}</div>
                                <div class="col cl-l center double"><span>{{category.updated_at}}</span><span>{{category.created_at}}</span></div>
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
                categories: null,
                //services
                callback_create: false,
                callback_edit: false,
                edit_alias: null,
                categories_infoline_hidden: null,

                selector_items: [{title: 'Показать 5', value: 5},{title: 'Показать 10', value: 10}, {title: 'Показать 25', value: 25}, {title: 'Показать 50', value: 50}],
                filter_status: false,
                parent_category_alias: null,
                parent_category: null,
                pre_parent_category: null,
            }
        },
        methods: {
            initPage(){
                this.parent_category_alias = this.$route.params.alias;

                HTTP.get(`category/get/` + this.parent_category_alias).then(response => {
                    this.parent_category = response.data;
                });
                HTTP.get(`category/get/pre-parent/` + this.parent_category_alias).then(response => {
                    this.pre_parent_category = response.data;
                    console.log(this.pre_parent_category, 123)
                });

                this.getCategories();
            },
            getCategories(search_for_alias){
                HTTP.post(`category/` + this.parent_category_alias + `/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                }).then(response => {
                    this.categories = response.data.categories.data;
                    this.current_paginate = response.data.categories.current_page;
                    this.last_paginate = response.data.categories.last_page;
                    this.categories_infoline_hidden = [{title: response.data.categories.data.length, info: 'Категорий сейчас на странице'}, {title: response.data.count, info: 'всего Категорий в панеле управления'}]
                })
            },
            deleteCategory(id){
                HTTP.delete(`category/delete/` + id)
                    .then(response => {
                        this.getCategories();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            responseAfterCreationDo(data){
                this.search = data.title;
                this.getCategories();
            },
            responseAfterCreation(data){
                this.getCategories();
            },
            responseAfterEditionDo(data){
                this.search = data.title;
                this.getCategories();
            },
            responseAfterEdition(data){
                this.getCategories();
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getCategories();
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getCategories();
            }
        },
        watch: {
            search(){
                this.getCategories();
            },
            $route(to){
                this.initPage();
            }
        }
    }
</script>


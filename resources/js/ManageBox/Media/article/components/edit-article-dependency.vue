<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Статьи<i class="fas fa-angle-right"></i> Зависимости <i class="fas fa-angle-right"></i>{{article_alias}}</h1>
                <div class="reactive-sub-titles">
                    <router-link :to="{name:'articles'}" class="r-link">Вернуться на страницу Статей</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation" v-if="Init_load">
            <router-link :to="{name:'edit_article_main', props: {'alias': this.article_alias}}" class="orange">Основное</router-link>
            <router-link :to="{name:'edit_article_dependency', props: {'alias': this.article_alias}}" class="active orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_article_instruction', props: {'alias': this.article_alias}}" class="orange" v-if="article_structure !== null && !article_structure.setting.float"> Текстовое поле RU</router-link>
            <router-link :to="{name:'edit_article_instruction_ua', props: {'alias': this.article_alias}}" class="orange" v-if="article_structure !== null && !article_structure.setting.float">Текстовое поле UA</router-link>
            <router-link :to="{name:'edit_article_instruction_blocks', props: {'alias': this.article_alias}}" class="orange" v-if="article_structure !== null && article_structure.setting.float">Блочные поля RU</router-link>
            <router-link :to="{name:'edit_article_instruction_blocks_ua', props: {'alias': this.article_alias}}" class="orange" v-if="article_structure !== null && article_structure.setting.float">Блочные поля UA</router-link>
        </nav>

        <div class="reactive-ws" v-if="Init_load">
            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Категория
                        <i class="fas fa-tasks" @click="callBack_article_category = !callBack_article_category"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!article_dep_have.categories">
                            Категории отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="article_category == null">
                            Выберите категорию
                        </li>
                        <li class="list-item-col" v-else>
                            {{article_category.title}}
<!--                            <a v-bind:href="'/manage/media/category#/all/redirected/' + article_category.title" target="_blank">{{article_category.title}}</a>-->
                        </li>
                    </ul>
                </div>
                <!--farma selector-->
                <modal-selector
                    :inname=true
                    :method_choosed="'item'"
                    :url="'media/category'"
                    :choosed_items="(article_category != null) ? [article_category.id] : []"
                    :modal_title="'категория'"
                    :callBack=callBack_article_category
                    @choosed="updateCategory"
                    @creation_event="article_dep_have.categories = true"
                ></modal-selector>
            </div>

            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Структура
                        <i class="fas fa-tasks" @click="callBack_article_structure = !callBack_article_structure"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!article_dep_have.structures">
                            Структура отсутсвует
                        </li>
                        <li class="list-item-col" v-else-if="article_structure == null">
                            Выберите структуру
                        </li>
                        <li class="list-item-col" v-else>
                            {{article_structure.title}}
                        </li>
                    </ul>
                </div>

                <modal-selector
                    :inname=true
                    :method_choosed="'item'"
                    :url="'media/structure'"
                    :choosed_items="(article_structure != null) ? [article_structure.id] : []"
                    :modal_title="'структура'"
                    :callBack=callBack_article_structure
                    @choosed="updateStructure"
                    @creation_event="article_dep_have.structures = true"
                ></modal-selector>
            </div>

        </div>
    </div>
</template>




<script>
    import {HTTP} from "../../http";

    export default {
        mounted() {
            this.article_alias = this.$route.params.alias;
            this.Init_getArticleDependencies();

        },
        data: function(){
            return{
                //model data
                article_category: null,
                article_structure: null,

                //service data
                model_status: null,
                article_alias: null,
                Init_load: false,
                article_dep_have: [],


                //callbacks
                callBack_article_structure: false,
                callBack_article_category: false,


                //static data
                article_infoline_hidden: null,
                modal_cancel: {title: 'Отменить создание '},
            }
        },
        methods: {


            //services

            updateCategory(data){
                this.updateArticleDependency('category', data);
            },
            updateStructure(data){
                this.updateArticleDependency('structure', data);
            },

            //https
            Init_getArticleDependencies(){
                this.model_status = 3;
                HTTP.get(`article/dependency/get/` + this.article_alias).then(response => {
                    console.log(response.data)
                    this.article_category = response.data.article_category;
                    this.article_structure = response.data.article_structure;

                    this.article_dep_have = response.data.article_dep_have;
                    this.model_status = 4;
                    this.Init_load = true;
                }).catch(error => {

                })
            },

            updateArticleDependency(type, data){
                this.model_status = 3;
                HTTP.post(`article/dependency/update/` + this.article_alias + '/' + type, {data: data}).then(response => {
                    switch(type){
                        case 'category':
                            this.article_category = response.data;
                            break;
                        case 'structure':
                            this.article_structure = response.data;
                            break;
                    }
                    this.model_status = 4;
                })
            }
        },
    }
</script>

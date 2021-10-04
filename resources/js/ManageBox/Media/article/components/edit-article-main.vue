<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Статьи<i class="fas fa-angle-right"></i> Основное <i class="fas fa-angle-right"></i>{{article_alias}}</h1>
                <div class="reactive-sub-titles">
                    <infoline
                        :i_class="'fas fa-pills'"
                        :visual="article_data.updated_at"
                        :hidden="article_infoline_hidden"
                    ></infoline>
                    <router-link :to="{name:'articles'}" class="r-link">Вернуться на страницу Статей</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation" v-if="article_creator.id">
            <router-link :to="{name:'edit_article_main', props: {'alias': this.article_alias}}" class="active orange">Основное</router-link>
            <router-link :to="{name:'edit_article_dependency', props: {'alias': this.article_alias}}" class="orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_article_instruction', props: {'alias': this.article_alias}}" class="orange" v-if="structure_setting !== null && !structure_setting.float"> Текстовое поле RU</router-link>
            <router-link :to="{name:'edit_article_instruction_ua', props: {'alias': this.article_alias}}" class="orange" v-if="structure_setting !== null && !structure_setting.float">Текстовое поле UA</router-link>
            <router-link :to="{name:'edit_article_instruction_blocks', props: {'alias': this.article_alias}}" class="orange" v-if="structure_setting !== null && structure_setting.float">Блочные поля RU</router-link>
            <router-link :to="{name:'edit_article_instruction_blocks_ua', props: {'alias': this.article_alias}}" class="orange" v-if="structure_setting !== null && structure_setting.float">Блочные поля UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="article_creator.id">
            <div class="wsr ws-100" style="flex-direction: row; justify-content: space-between; margin-bottom: 30px;">
                <div class="wsr ws-50">
                    <div class="reactive-nude-box">
                        <figure class="avatar">
                            <img v-bind:src="'/gallery/' + file_categories[article_image.category_id - 1] + '/medium/' + article_image.path" alt="">
                        </figure>
                        <gallery
                            :img_category="article_image.category_id"
                            :upload_category="4"
                            :max_files="1"
                            :selectedFilesID="[article_image.id]"
                            @fetch_imagies_id="changeArticleImage"
                        ></gallery>
                    </div>
                    <div class="reactive-box">
                        <header class="box-header">
                            Менеджеры препарата
                        </header>
                        <ul class="box-content">
                            <li class="list-item-col">
                                <h2 class="item-title">Создатель:</h2>
                                <div class="item-information">
                                    <div class="manager-info">
                                        <figure class="manager-avatar">
                                            <img v-bind:src="'/gallery/' + file_categories[article_creator_avatar.category_id - 1] + '/small/' + article_creator_avatar.path" alt="">
                                        </figure>
                                        <div class="manager-name" v-if="article_creator.surname !== null">
                                            {{article_creator.surname}} {{article_creator.name}}
                                        </div>
                                        <div class="manager-name" v-else>
                                            {{article_creator.email}}
                                        </div>
                                    </div>
                                    <div class="manager-start-date">
                                        {{article_data.created_at}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wsr ws-50">
                    <div class="reactive-box">
                        <header class="box-header">
                            Названия препарата
                        </header>
                        <ul class="box-content">
                            <li class="list-item-col">
                                <h2 class="item-title">По-русски:</h2>
                                <div class="r-input-error">{{article_data_error.title}}</div>
                                <input type="text" class="r-input" v-model="article_data.title" @blur="updateArticle('title', article_data.title)" @keyup.enter="updateArticle('title', article_data.title)" :class="{error: article_data_error.title}" placeholder="Введите название препарата для RU страницы">
                            </li>
                            <li class="list-item-col">
                                <h2 class="item-title">По-украински:</h2>
                                <div class="r-input-error">{{article_data_error.utitle}}</div>
                                <input type="text" class="r-input" v-model="article_data.utitle" @blur="updateArticle('utitle', article_data.utitle)" @keyup.enter="updateArticle('utitle', article_data.utitle)" :class="{error: article_data_error.utitle}" placeholder="Введите название препарата для UA страницы">
                            </li>
                            <li class="list-item-col">
                                <h2 class="item-title">URL:</h2>
                                <input type="text" class="r-input" v-model="article_data.alias"  disabled>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>




<script>
    import {HTTP} from "../../http";

    export default {
        mounted() {
            this.article_alias = this.$route.params.alias;
            this.getArticle();
        },
        data: function(){
            return{
                //model data
                article_alias: null,
                article_data: [],
                article_data_error: [],
                article_setting: [],
                structure_setting: [],
                article_image: [],
                article_creator: [],
                article_creator_avatar: [],
                file_categories: [
                    'Vne-Kategorii',
                    'Avatari',
                    'Diplomy',
                    'Preparaty'
                ],

                //service data
                model_status: null,

                //static data
                article_infoline_hidden: null,
                modal_cancel: {title: 'Отменить создание '},
            }
        },
        methods: {
            getArticle(){
                this.model_status = 3;
                HTTP.get(`article/get/` + this.article_alias)
                    .then(response => {
                        console.log(response)
                        this.article_data = response.data.model;
                        this.article_image = response.data.image;
                        this.article_creator = response.data.creator;
                        this.article_creator_avatar = response.data.creator_avatar;
                        this.article_setting = response.data.setting;
                        this.structure_setting = response.data.structure_setting
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'articles'})
                    })
            },
            changeArticleImage(id){
                this.model_status = 3;
                HTTP.post(`article/update/` + this.article_alias + '/image', {id: id})
                    .then(response => {
                        this.article_data = response.data.model;
                        this.article_image = response.data.image;
                        this.model_status = 4;
                    })
            },
            updateArticle(type, model, data_render = true){
                this.model_status = 3;
                var data = {};
                if(data_render){
                    data[type] = model;
                }else{
                    data = model;
                }
                HTTP.post(`article/update/` + this.article_alias + '/' + type, data)
                    .then(response => {
                        this.article_data = response.data;
                        delete this.article_data_error[type];
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.log(error);
                        var error_console_message = 'Неизвестная Ошибка!';
                        switch (error.response.status) {
                            case 404:
                                error_console_message = error.response.data.message;
                                break;
                            case 422:
                                console.log( error.response.data);
                                switch (type) {
                                    case 'title':
                                        error_console_message = error.response.data;
                                        this.article_data_error.title = error_console_message;
                                        break;
                                    case 'utitle':
                                        error_console_message = error.response.data;
                                        this.article_data_error.utitle = error_console_message;
                                        break;
                                }
                                break;
                        }
                        this.model_status = 4;
                        console.error('[Medpravda] => ' + error_console_message);
                    })
            },
        },
        watch: {
            article_data(to){
                this.article_alias = to.alias;
                this.article_infoline_hidden = [{title: to.updated_at, info: 'Обновление Препарата'}, {title: to.created_at, info: 'Создание Препарата'}]
            },
        }
    }
</script>

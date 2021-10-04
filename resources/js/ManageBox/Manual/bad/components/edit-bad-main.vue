<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Бада><i class="fas fa-angle-right"></i> Основное <i class="fas fa-angle-right"></i>{{bad_alias}}</h1>
                <div class="reactive-sub-titles">
                    <infoline
                        :i_class="'fas fa-pills'"
                        :visual="bad_data.updated_at"
                        :hidden="bad_infoline_hidden"
                    ></infoline>
                    <router-link :to="{name:'bads'}" class="r-link">Вернуться на страницу Бадов</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_bad_main', props: {'alias': this.bad_alias}}" class="active orange">Основное</router-link>
            <router-link :to="{name:'edit_bad_dependency', props: {'alias': this.bad_alias}}" class="orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_bad_instruction', props: {'alias': this.bad_alias}}" class="orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_bad_instruction_ua', props: {'alias': this.bad_alias}}" class="orange">Инструкция UA</router-link>
            <router-link :to="{name:'edit_bad_instruction_adaptive', props: {'alias': this.bad_alias}}" class="orange">Адаптированная Инструкция RU</router-link>
            <router-link :to="{name:'edit_bad_instruction_adaptive_ua', props: {'alias': this.bad_alias}}" class="orange">Адаптированная Инструкция UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="bad_data.created_at && bad_image.created_at && bad_creator.id">
            <div class="wsr ws-50">
                <div class="reactive-nude-box">
                    <figure class="avatar">
                        <img v-bind:src="'/gallery/' + file_categories[bad_image.category_id - 1] + '/medium/' + bad_image.path" alt="">
                    </figure>
                    <gallery
                        :img_category="bad_image.category_id"
                        :upload_category="4"
                        :max_files="1"
                        :selectedFilesID="[bad_image.id]"
                        @fetch_imagies_id="changeBadImage"
                    ></gallery>
                </div>
                <div class="reactive-box">
                    <header class="box-header">
                        Менеджеры бада
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Создатель:</h2>
                            <div class="item-information">
                                <div class="manager-info">
                                    <figure class="manager-avatar">
                                        <img v-bind:src="'/gallery/' + file_categories[bad_creator_avatar.category_id - 1] + '/small/' + bad_creator_avatar.path" alt="">
                                    </figure>
                                    <div class="manager-name" v-if="bad_creator.surname !== null">
                                        {{bad_creator.surname}} {{bad_creator.name}}
                                    </div>
                                    <div class="manager-name" v-else>
                                        {{bad_creator.email}}
                                    </div>
                                </div>
                                <div class="manager-start-date">
                                    {{bad_data.created_at}}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="reactive-box">
                    <header class="box-header">
                        Навигационный доступ роли
                    </header>
                    <ul class="box-content">
                        <li class="list-item-row">
                            <switcher :id=1 :status=bad_setting.fix :color="'orange'" :namespace="'fix'" @toggle="switchBadSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Закрепить</h2>
                                <div class="data-description">Позволяет баду быть в топ-списке рекомендуемых бадов от редакторской группы.</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=2 :status=bad_setting.registration_life :color="'orange'" :namespace="'registration_life'" @toggle="switchBadSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Сертифицирован</h2>
                                <div class="data-description">Бад имеет более высокий уровень ранжирования на сайте и имеет клеймо сертификации.</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=4 :status=bad_setting.review :color="'orange'" :namespace="'review'" @toggle="switchBadSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Отзывы</h2>
                                <div class="data-description">Отображает страницу отзывов бада.</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=5 :status=bad_setting.adverising :color="'orange'" :namespace="'adverising'" @toggle="switchBadSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Реклама</h2>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wsr ws-50">
                <div class="reactive-box">
                    <header class="box-header">
                        Названия бада
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">По-русски:</h2>
                            <div class="r-input-error">{{bad_data_error.title}}</div>
                            <input type="text" class="r-input" v-model="bad_data.title" @blur="updateBad('title', bad_data.title)" @keyup.enter="updateBad('title', bad_data.title)" :class="{error: bad_data_error.title}" placeholder="Введите название бада для RU страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">По-украински:</h2>
                            <div class="r-input-error">{{bad_data_error.utitle}}</div>
                            <input type="text" class="r-input" v-model="bad_data.utitle" @blur="updateBad('utitle', bad_data.utitle)" @keyup.enter="updateBad('utitle', bad_data.utitle)" :class="{error: bad_data_error.utitle}" placeholder="Введите название бада для UA страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">URL:</h2>
                            <input type="text" class="r-input" v-model="bad_data.alias"  disabled>
                        </li>
                    </ul>
                </div>
                <div class="reactive-box">
                    <header class="box-header">
                        Дозировка
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">По-русски:</h2>
                            <div class="r-input-error">{{bad_data_error.dosage}}</div>
                            <input type="text" class="r-input" v-model="bad_data.dosage" @blur="updateBad('dosage', bad_data.dosage)" @keyup.enter="updateBad('dosage', bad_data.dosage)" :class="{error: bad_data_error.dosage}" placeholder="Введите дозировку для RU страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">По-украински:</h2>
                            <div class="r-input-error">{{bad_data_error.udosage}}</div>
                            <input type="text" class="r-input" v-model="bad_data.udosage" @blur="updateBad('udosage', bad_data.udosage)" @keyup.enter="updateBad('udosage', bad_data.udosage)" :class="{error: bad_data_error.udosage}" placeholder="Введите дозировку для UA страницы">
                        </li>
                    </ul>
                </div>
                <div class="reactive-box">
                    <header class="box-header">
                        Регистрация
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">По-русски:</h2>
                            <div class="r-input-error">{{bad_data_error.registration}}</div>
                            <input type="text" class="r-input" v-model="bad_data.registration" @blur="updateBad('registration', bad_data.registration)" @keyup.enter="updateBad('registration', bad_data.registration)" :class="{error: bad_data_error.registration}" placeholder="Введите регистрацию для RU страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">По-украински:</h2>
                            <div class="r-input-error">{{bad_data_error.uregistration}}</div>
                            <input type="text" class="r-input" v-model="bad_data.uregistration" @blur="updateBad('uregistration', bad_data.uregistration)" @keyup.enter="updateBad('uregistration', bad_data.uregistration)" :class="{error: bad_data_error.uregistration}" placeholder="Введите регистрацию для UA страницы">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>




<script>
    import {HTTP} from "../../http";

    export default {
        mounted() {
            this.bad_alias = this.$route.params.alias;
            this.getBad();
        },
        data: function(){
            return{
                //model data
                bad_alias: null,
                bad_data: [],
                bad_data_error: [],
                bad_setting: [],
                bad_image: [],
                bad_creator: [],
                bad_creator_avatar: [],
                file_categories: [
                    'Vne-Kategorii',
                    'Avatari',
                    'Diplomy',
                    'Preparaty'
                ],

                //service data
                model_status: null,

                //static data
                bad_infoline_hidden: null,
                modal_cancel: {title: 'Отменить создание '},
            }
        },
        methods: {
            getBad(){
                this.model_status = 3;
                HTTP.get(`bad/get/` + this.bad_alias)
                    .then(response => {
                        this.bad_data = response.data.model;
                        this.bad_image = response.data.image;
                        this.bad_creator = response.data.creator;
                        this.bad_creator_avatar = response.data.creator_avatar;
                        this.bad_setting = response.data.setting;
                        this.model_status = 4;
                        console.log(response);
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'bads'})
                    })
            },
            changeBadImage(id){
                this.model_status = 3;
                HTTP.post(`bad/update/` + this.bad_alias + '/image', {id: id})
                    .then(response => {
                        this.bad_data = response.data.bad;
                        this.bad_image = response.data.image;
                        this.model_status = 4;
                    })
            },
            updateBad(type, model, data_render = true){
                this.model_status = 3;
                var data = {};
                if(data_render){
                    data[type] = model;
                }else{
                    data = model;
                }
                HTTP.post(`bad/update/` + this.bad_alias + '/' + type, data)
                    .then(response => {
                        switch (type) {
                            case 'switch':
                                this.bad_setting = response.data.setting;
                                break;
                            case 'title':
                                window.history.pushState('', '', document.location.origin + '/manage/manual/bad#/edit/' + response.data.bad.alias + '/main');
                            default:
                                this.bad_data = response.data.bad;
                                delete this.bad_data_error[type];
                                break;
                        }
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
                                        this.bad_data_error.title = error_console_message;
                                        break;
                                    case 'utitle':
                                        error_console_message = error.response.data;
                                        this.bad_data_error.utitle = error_console_message;
                                        break;
                                    case 'dosage':
                                        error_console_message = error.response.data.errors.dosage[0];
                                        this.bad_data_error.dosage = error_console_message;
                                        break
                                    case 'udosage':
                                        error_console_message = error.response.data.errors.udosage[0];
                                        this.bad_data_error.udosage = error_console_message;
                                        break
                                    case 'registration':
                                        error_console_message = error.response.data.errors.registration[0];
                                        this.bad_data_error.registration = error_console_message;
                                        break
                                    case 'uregistration':
                                        error_console_message = error.response.data.errors.uregistration[0];
                                        this.bad_data_error.uregistration = error_console_message;
                                        break
                                }
                                break;
                        }
                        this.model_status = 4;
                        console.error('[Medpravda] => ' + error_console_message);
                    })
            },
            switchBadSetting(data){
                this.updateBad('switch', data, false)
            }
        },
        watch: {
            bad_data(to){
                this.bad_alias = to.alias;
                this.bad_infoline_hidden = [{title: to.updated_at, info: 'Обновление Бада'}, {title: to.created_at, info: 'Создание Бада'}]
            },
        }
    }
</script>

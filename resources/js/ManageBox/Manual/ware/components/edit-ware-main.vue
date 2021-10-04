<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Мед. изделия><i class="fas fa-angle-right"></i> Основное <i class="fas fa-angle-right"></i>{{ware_alias}}</h1>
                <div class="reactive-sub-titles">
                    <infoline
                        :i_class="'fas fa-heartbeat'"
                        :visual="ware_data.updated_at"
                        :hidden="ware_infoline_hidden"
                    ></infoline>
                    <router-link :to="{name:'wares'}" class="r-link">Вернуться на страницу Мед. изделия</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_ware_main', props: {'alias': this.ware_alias}}" class="active orange">Основное</router-link>
            <router-link :to="{name:'edit_ware_dependency', props: {'alias': this.ware_alias}}" class="orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_ware_instruction', props: {'alias': this.ware_alias}}" class="orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_ware_instruction_ua', props: {'alias': this.ware_alias}}" class="orange">Инструкция UA</router-link>
            <router-link :to="{name:'edit_ware_instruction_adaptive', props: {'alias': this.ware_alias}}" class="orange">Адаптированная Инструкция RU</router-link>
            <router-link :to="{name:'edit_ware_instruction_adaptive_ua', props: {'alias': this.ware_alias}}" class="orange">Адаптированная Инструкция UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="ware_data.created_at && ware_image.created_at && ware_creator.id">
            <div class="wsr ws-50">
                <div class="reactive-nude-box">
                    <figure class="avatar">
                        <img v-bind:src="'/gallery/' + file_categories[ware_image.category_id - 1] + '/medium/' + ware_image.path" alt="">
                    </figure>
                    <gallery
                        :img_category="ware_image.category_id"
                        :upload_category="4"
                        :max_files="1"
                        :selectedFilesID="[ware_image.id]"
                        @fetch_imagies_id="changeWareImage"
                    ></gallery>
                </div>
                <div class="reactive-box">
                    <header class="box-header">
                        Менеджеры мед. изделия
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Создатель:</h2>
                            <div class="item-information">
                                <div class="manager-info">
                                    <figure class="manager-avatar">
                                        <img v-bind:src="'/gallery/' + file_categories[ware_creator_avatar.category_id - 1] + '/small/' + ware_creator_avatar.path" alt="">
                                    </figure>
                                    <div class="manager-name" v-if="ware_creator.surname !== null">
                                        {{ware_creator.surname}} {{ware_creator.name}}
                                    </div>
                                    <div class="manager-name" v-else>
                                        {{ware_creator.email}}
                                    </div>
                                </div>
                                <div class="manager-start-date">
                                    {{ware_data.created_at}}
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
                            <switcher :id=1 :status=ware_setting.fix :color="'orange'" :namespace="'fix'" @toggle="switchWareSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Закрепить</h2>
                                <div class="data-description">Позволяет мед. изделию быть в топ-списке рекомендуемых мед. изделий от редакторской группы.</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=2 :status=ware_setting.registration_life :color="'orange'" :namespace="'registration_life'" @toggle="switchWareSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Сертифицирован</h2>
                                <div class="data-description">Мед. изделие имеет более высокий уровень ранжирования на сайте и имеет клеймо сертификации.</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=4 :status=ware_setting.review :color="'orange'" :namespace="'review'" @toggle="switchWareSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Отзывы</h2>
                                <div class="data-description">Отображает страницу отзывов мед. изделия.</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=5 :status=ware_setting.adverising :color="'orange'" :namespace="'adverising'" @toggle="switchWareSetting"></switcher>
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
                        Названия мед. изделия
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">По-русски:</h2>
                            <div class="r-input-error">{{ware_data_error.title}}</div>
                            <input type="text" class="r-input" v-model="ware_data.title" @blur="updateWare('title', ware_data.title)" @keyup.enter="updateWare('title', ware_data.title)" :class="{error: ware_data_error.title}" placeholder="Введите название мед. изделия для RU страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">По-украински:</h2>
                            <div class="r-input-error">{{ware_data_error.utitle}}</div>
                            <input type="text" class="r-input" v-model="ware_data.utitle" @blur="updateWare('utitle', ware_data.utitle)" @keyup.enter="updateWare('utitle', ware_data.utitle)" :class="{error: ware_data_error.utitle}" placeholder="Введите название мед. изделия для UA страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">URL:</h2>
                            <input type="text" class="r-input" v-model="ware_data.alias"  disabled>
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
                            <div class="r-input-error">{{ware_data_error.dosage}}</div>
                            <input type="text" class="r-input" v-model="ware_data.dosage" @blur="updateWare('dosage', ware_data.dosage)" @keyup.enter="updateWare('dosage', ware_data.dosage)" :class="{error: ware_data_error.dosage}" placeholder="Введите дозировку для RU страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">По-украински:</h2>
                            <div class="r-input-error">{{ware_data_error.udosage}}</div>
                            <input type="text" class="r-input" v-model="ware_data.udosage" @blur="updateWare('udosage', ware_data.udosage)" @keyup.enter="updateWare('udosage', ware_data.udosage)" :class="{error: ware_data_error.udosage}" placeholder="Введите дозировку для UA страницы">
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
                            <div class="r-input-error">{{ware_data_error.registration}}</div>
                            <input type="text" class="r-input" v-model="ware_data.registration" @blur="updateWare('registration', ware_data.registration)" @keyup.enter="updateWare('registration', ware_data.registration)" :class="{error: ware_data_error.registration}" placeholder="Введите регистрацию для RU страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">По-украински:</h2>
                            <div class="r-input-error">{{ware_data_error.uregistration}}</div>
                            <input type="text" class="r-input" v-model="ware_data.uregistration" @blur="updateWare('uregistration', ware_data.uregistration)" @keyup.enter="updateWare('uregistration', ware_data.uregistration)" :class="{error: ware_data_error.uregistration}" placeholder="Введите регистрацию для UA страницы">
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
            this.ware_alias = this.$route.params.alias;
            this.getWare();
        },
        data: function(){
            return{
                //model data
                ware_alias: null,
                ware_data: [],
                ware_data_error: [],
                ware_setting: [],
                ware_image: [],
                ware_creator: [],
                ware_creator_avatar: [],
                file_categories: [
                    'Vne-Kategorii',
                    'Avatari',
                    'Diplomy',
                    'Preparaty'
                ],

                //service data
                model_status: null,

                //static data
                ware_infoline_hidden: null,
                modal_cancel: {title: 'Отменить создание '},
            }
        },
        methods: {
            getWare(){
                this.model_status = 3;
                HTTP.get(`ware/get/` + this.ware_alias)
                    .then(response => {
                        this.ware_data = response.data.model;
                        this.ware_image = response.data.image;
                        this.ware_creator = response.data.creator;
                        this.ware_creator_avatar = response.data.creator_avatar;
                        this.ware_setting = response.data.setting;
                        this.model_status = 4;
                        console.log(response);
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'wares'})
                    })
            },
            changeWareImage(id){
                this.model_status = 3;
                HTTP.post(`ware/update/` + this.ware_alias + '/image', {id: id})
                    .then(response => {
                        this.ware_data = response.data.ware;
                        this.ware_image = response.data.image;
                        this.model_status = 4;
                    })
            },
            updateWare(type, model, data_render = true){
                this.model_status = 3;
                var data = {};
                if(data_render){
                    data[type] = model;
                }else{
                    data = model;
                }
                HTTP.post(`ware/update/` + this.ware_alias + '/' + type, data)
                    .then(response => {
                        switch (type) {
                            case 'switch':
                                this.ware_setting = response.data.setting;
                                break;
                            case 'title':
                                window.history.pushState('', '', document.location.origin + '/manage/manual/ware#/edit/' + response.data.ware.alias + '/main');
                            default:
                                this.ware_data = response.data.ware;
                                delete this.ware_data_error[type];
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
                                        this.ware_data_error.title = error_console_message;
                                        break;
                                    case 'utitle':
                                        error_console_message = error.response.data;
                                        this.ware_data_error.utitle = error_console_message;
                                        break;
                                    case 'dosage':
                                        error_console_message = error.response.data.errors.dosage[0];
                                        this.ware_data_error.dosage = error_console_message;
                                        break
                                    case 'udosage':
                                        error_console_message = error.response.data.errors.udosage[0];
                                        this.ware_data_error.udosage = error_console_message;
                                        break
                                    case 'registration':
                                        error_console_message = error.response.data.errors.registration[0];
                                        this.ware_data_error.registration = error_console_message;
                                        break
                                    case 'uregistration':
                                        error_console_message = error.response.data.errors.uregistration[0];
                                        this.ware_data_error.uregistration = error_console_message;
                                        break
                                }
                                break;
                        }
                        this.model_status = 4;
                        console.error('[Medpravda] => ' + error_console_message);
                    })
            },
            switchWareSetting(data){
                this.updateWare('switch', data, false)
            }
        },
        watch: {
            ware_data(to){
                this.ware_alias = to.alias;
                this.ware_infoline_hidden = [{title: to.updated_at, info: 'Обновление Мед. изделия'}, {title: to.created_at, info: 'Создание Мед. изделия'}]
            },
        }
    }
</script>

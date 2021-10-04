<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Косм. средства><i class="fas fa-angle-right"></i> Основное <i class="fas fa-angle-right"></i>{{cosmetic_alias}}</h1>
                <div class="reactive-sub-titles">
                    <infoline
                        :i_class="'fas fa-mortar-pestle'"
                        :visual="cosmetic_data.updated_at"
                        :hidden="cosmetic_infoline_hidden"
                    ></infoline>
                    <router-link :to="{name:'cosmetics'}" class="r-link">Вернуться на страницу Косм. средств</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_cosmetic_main', props: {'alias': this.cosmetic_alias}}" class="active orange">Основное</router-link>
            <router-link :to="{name:'edit_cosmetic_dependency', props: {'alias': this.cosmetic_alias}}" class="orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction', props: {'alias': this.cosmetic_alias}}" class="orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction_ua', props: {'alias': this.cosmetic_alias}}" class="orange">Инструкция UA</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction_adaptive', props: {'alias': this.cosmetic_alias}}" class="orange">Адаптированная Инструкция RU</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction_adaptive_ua', props: {'alias': this.cosmetic_alias}}" class="orange">Адаптированная Инструкция UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="cosmetic_data.created_at && cosmetic_image.created_at && cosmetic_creator.id">
            <div class="wsr ws-50">
                <div class="reactive-nude-box">
                    <figure class="avatar">
                        <img v-bind:src="'/gallery/' + file_categories[cosmetic_image.category_id - 1] + '/medium/' + cosmetic_image.path" alt="">
                    </figure>
                    <gallery
                        :img_category="cosmetic_image.category_id"
                        :upload_category="4"
                        :max_files="1"
                        :selectedFilesID="[cosmetic_image.id]"
                        @fetch_imagies_id="changeCosmeticImage"
                    ></gallery>
                </div>
                <div class="reactive-box">
                    <header class="box-header">
                        Менеджеры косм. средства
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Создатель:</h2>
                            <div class="item-information">
                                <div class="manager-info">
                                    <figure class="manager-avatar">
                                        <img v-bind:src="'/gallery/' + file_categories[cosmetic_creator_avatar.category_id - 1] + '/small/' + cosmetic_creator_avatar.path" alt="">
                                    </figure>
                                    <div class="manager-name" v-if="cosmetic_creator.surname !== null">
                                        {{cosmetic_creator.surname}} {{cosmetic_creator.name}}
                                    </div>
                                    <div class="manager-name" v-else>
                                        {{cosmetic_creator.email}}
                                    </div>
                                </div>
                                <div class="manager-start-date">
                                    {{cosmetic_data.created_at}}
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
                            <switcher :id=1 :status=cosmetic_setting.fix :color="'orange'" :namespace="'fix'" @toggle="switchCosmeticSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Закрепить</h2>
                                <div class="data-description">Позволяет косм. средству быть в топ-списке рекомендуемых косм. средств от редакторской группы.</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=2 :status=cosmetic_setting.registration_life :color="'orange'" :namespace="'registration_life'" @toggle="switchCosmeticSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Сертифицирован</h2>
                                <div class="data-description">Косм. средства имеет более высокий уровень ранжирования на сайте и имеет клеймо сертификации.</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=4 :status=cosmetic_setting.review :color="'orange'" :namespace="'review'" @toggle="switchCosmeticSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Отзывы</h2>
                                <div class="data-description">Отображает страницу отзывов косм. средства.</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=5 :status=cosmetic_setting.adverising :color="'orange'" :namespace="'adverising'" @toggle="switchCosmeticSetting"></switcher>
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
                        Названия косм. средства
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">По-русски:</h2>
                            <div class="r-input-error">{{cosmetic_data_error.title}}</div>
                            <input type="text" class="r-input" v-model="cosmetic_data.title" @blur="updateCosmetic('title', cosmetic_data.title)" @keyup.enter="updateCosmetic('title', cosmetic_data.title)" :class="{error: cosmetic_data_error.title}" placeholder="Введите название косм. средства для RU страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">По-украински:</h2>
                            <div class="r-input-error">{{cosmetic_data_error.utitle}}</div>
                            <input type="text" class="r-input" v-model="cosmetic_data.utitle" @blur="updateCosmetic('utitle', cosmetic_data.utitle)" @keyup.enter="updateCosmetic('utitle', cosmetic_data.utitle)" :class="{error: cosmetic_data_error.utitle}" placeholder="Введите название косм. средства для UA страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">URL:</h2>
                            <input type="text" class="r-input" v-model="cosmetic_data.alias"  disabled>
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
                            <div class="r-input-error">{{cosmetic_data_error.dosage}}</div>
                            <input type="text" class="r-input" v-model="cosmetic_data.dosage" @blur="updateCosmetic('dosage', cosmetic_data.dosage)" @keyup.enter="updateCosmetic('dosage', cosmetic_data.dosage)" :class="{error: cosmetic_data_error.dosage}" placeholder="Введите дозировку для RU страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">По-украински:</h2>
                            <div class="r-input-error">{{cosmetic_data_error.udosage}}</div>
                            <input type="text" class="r-input" v-model="cosmetic_data.udosage" @blur="updateCosmetic('udosage', cosmetic_data.udosage)" @keyup.enter="updateCosmetic('udosage', cosmetic_data.udosage)" :class="{error: cosmetic_data_error.udosage}" placeholder="Введите дозировку для UA страницы">
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
                            <div class="r-input-error">{{cosmetic_data_error.registration}}</div>
                            <input type="text" class="r-input" v-model="cosmetic_data.registration" @blur="updateCosmetic('registration', cosmetic_data.registration)" @keyup.enter="updateCosmetic('registration', cosmetic_data.registration)" :class="{error: cosmetic_data_error.registration}" placeholder="Введите регистрацию для RU страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">По-украински:</h2>
                            <div class="r-input-error">{{cosmetic_data_error.uregistration}}</div>
                            <input type="text" class="r-input" v-model="cosmetic_data.uregistration" @blur="updateCosmetic('uregistration', cosmetic_data.uregistration)" @keyup.enter="updateCosmetic('uregistration', cosmetic_data.uregistration)" :class="{error: cosmetic_data_error.uregistration}" placeholder="Введите регистрацию для UA страницы">
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
            this.cosmetic_alias = this.$route.params.alias;
            this.getCosmetic();
        },
        data: function(){
            return{
                //model data
                cosmetic_alias: null,
                cosmetic_data: [],
                cosmetic_data_error: [],
                cosmetic_setting: [],
                cosmetic_image: [],
                cosmetic_creator: [],
                cosmetic_creator_avatar: [],
                file_categories: [
                    'Vne-Kategorii',
                    'Avatari',
                    'Diplomy',
                    'Preparaty'
                ],

                //service data
                model_status: null,

                //static data
                cosmetic_infoline_hidden: null,
                modal_cancel: {title: 'Отменить создание '},
            }
        },
        methods: {
            getCosmetic(){
                this.model_status = 3;
                HTTP.get(`cosmetic/get/` + this.cosmetic_alias)
                    .then(response => {
                        this.cosmetic_data = response.data.model;
                        this.cosmetic_image = response.data.image;
                        this.cosmetic_creator = response.data.creator;
                        this.cosmetic_creator_avatar = response.data.creator_avatar;
                        this.cosmetic_setting = response.data.setting;
                        this.model_status = 4;
                        console.log(response);
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'cosmetics'})
                    })
            },
            changeCosmeticImage(id){
                this.model_status = 3;
                HTTP.post(`cosmetic/update/` + this.cosmetic_alias + '/image', {id: id})
                    .then(response => {
                        this.cosmetic_data = response.data.cosmetic;
                        this.cosmetic_image = response.data.image;
                        this.model_status = 4;
                    })
            },
            updateCosmetic(type, model, data_render = true){
                this.model_status = 3;
                var data = {};
                if(data_render){
                    data[type] = model;
                }else{
                    data = model;
                }
                HTTP.post(`cosmetic/update/` + this.cosmetic_alias + '/' + type, data)
                    .then(response => {
                        switch (type) {
                            case 'switch':
                                this.cosmetic_setting = response.data.setting;
                                break;
                            case 'title':
                                window.history.pushState('', '', document.location.origin + '/manage/manual/cosmetic#/edit/' + response.data.cosmetic.alias + '/main');
                            default:
                                this.cosmetic_data = response.data.cosmetic;
                                delete this.cosmetic_data_error[type];
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
                                        this.cosmetic_data_error.title = error_console_message;
                                        break;
                                    case 'utitle':
                                        error_console_message = error.response.data;
                                        this.cosmetic_data_error.utitle = error_console_message;
                                        break;
                                    case 'dosage':
                                        error_console_message = error.response.data.errors.dosage[0];
                                        this.cosmetic_data_error.dosage = error_console_message;
                                        break
                                    case 'udosage':
                                        error_console_message = error.response.data.errors.udosage[0];
                                        this.cosmetic_data_error.udosage = error_console_message;
                                        break
                                    case 'registration':
                                        error_console_message = error.response.data.errors.registration[0];
                                        this.cosmetic_data_error.registration = error_console_message;
                                        break
                                    case 'uregistration':
                                        error_console_message = error.response.data.errors.uregistration[0];
                                        this.cosmetic_data_error.uregistration = error_console_message;
                                        break
                                }
                                break;
                        }
                        this.model_status = 4;
                        console.error('[Medpravda] => ' + error_console_message);
                    })
            },
            switchCosmeticSetting(data){
                this.updateCosmetic('switch', data, false)
            }
        },
        watch: {
            cosmetic_data(to){
                this.cosmetic_alias = to.alias;
                this.cosmetic_infoline_hidden = [{title: to.updated_at, info: 'Обновление Косм. средства'}, {title: to.created_at, info: 'Создание Косм. средства'}]
            },
        }
    }
</script>

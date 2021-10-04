<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Препарата<i class="fas fa-angle-right"></i> Основное <i class="fas fa-angle-right"></i>{{drug_alias}}</h1>
                <div class="reactive-sub-titles">
                    <infoline
                        :i_class="'fas fa-pills'"
                        :visual="drug_data.updated_at"
                        :hidden="drug_infoline_hidden"
                    ></infoline>
                    <router-link :to="{name:'drugs'}" class="r-link">Вернуться на страницу Препаратов</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_drug_main', props: {'alias': this.drug_alias}}" class="active orange">Основное</router-link>
            <router-link :to="{name:'edit_drug_dependency', props: {'alias': this.drug_alias}}" class="orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_drug_instruction', props: {'alias': this.drug_alias}}" class="orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_drug_instruction_ua', props: {'alias': this.drug_alias}}" class="orange">Инструкция UA</router-link>
            <router-link :to="{name:'edit_drug_instruction_adaptive', props: {'alias': this.drug_alias}}" class="orange">Адаптированная Инструкция RU</router-link>
            <router-link :to="{name:'edit_drug_instruction_adaptive_ua', props: {'alias': this.drug_alias}}" class="orange">Адаптированная Инструкция UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="drug_data.created_at && drug_image.created_at && drug_creator.id">
            <div class="wsr ws-100" style="flex-direction: row; justify-content: space-between; margin-bottom: 30px;">
                <div class="wsr ws-50">
                    <div class="reactive-nude-box">
                        <figure class="avatar">
                            <img v-bind:src="'/gallery/' + file_categories[drug_image.category_id - 1] + '/medium/' + drug_image.path" alt="">
                        </figure>
                        <gallery
                            :img_category="drug_image.category_id"
                            :upload_category="4"
                            :max_files="1"
                            :selectedFilesID="[drug_image.id]"
                            @fetch_imagies_id="changeDrugImage"
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
                                            <img v-bind:src="'/gallery/' + file_categories[drug_creator_avatar.category_id - 1] + '/small/' + drug_creator_avatar.path" alt="">
                                        </figure>
                                        <div class="manager-name" v-if="drug_creator.surname !== null">
                                            {{drug_creator.surname}} {{drug_creator.name}}
                                        </div>
                                        <div class="manager-name" v-else>
                                            {{drug_creator.email}}
                                        </div>
                                    </div>
                                    <div class="manager-start-date">
                                        {{drug_data.created_at}}
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
                                <switcher :id=0 :status=drug_data.show :color="'orange'" :namespace="'show'" @toggle="switchDrugSetting"></switcher>
                                <div class="item-col-data">
                                    <h2 class="data-title">Показывать</h2>
                                    <div class="data-description">Позволяет препарату отображаться на сайте.</div>
                                </div>
                            </li>
                            <li class="list-item-row">
                                <switcher :id=1 :status=drug_setting.fix :color="'orange'" :namespace="'fix'" @toggle="switchDrugSetting"></switcher>
                                <div class="item-col-data">
                                    <h2 class="data-title">Закрепить</h2>
                                    <div class="data-description">Позволяет препарату быть в топ-списке рекомендуемых препаратов от редакторской группы.</div>
                                </div>
                            </li>
                            <li class="list-item-row">
                                <switcher :id=2 :status=drug_setting.registration_life :color="'orange'" :namespace="'registration_life'" @toggle="switchDrugSetting"></switcher>
                                <div class="item-col-data">
                                    <h2 class="data-title">Сертифицирован</h2>
                                    <div class="data-description">Препарат имеет более высокий уровень ранжирования на сайте и имеет клеймо сертификации.</div>
                                </div>
                            </li>
                            <li class="list-item-row">
                                <switcher :id=3 :status=drug_setting.recipe :color="'orange'" :namespace="'recipe'" @toggle="switchDrugSetting"></switcher>
                                <div class="item-col-data">
                                    <h2 class="data-title">Рецептуарный препарат</h2>
                                </div>
                            </li>
                            <li class="list-item-row">
                                <switcher :id=4 :status=drug_setting.review :color="'orange'" :namespace="'review'" @toggle="switchDrugSetting"></switcher>
                                <div class="item-col-data">
                                    <h2 class="data-title">Отзывы</h2>
                                    <div class="data-description">Отображает страницу отзывов препарата.</div>
                                </div>
                            </li>
                            <li class="list-item-row">
                                <switcher :id=5 :status=drug_setting.adverising :color="'orange'" :namespace="'adverising'" @toggle="switchDrugSetting"></switcher>
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
                            Названия препарата
                        </header>
                        <ul class="box-content">
                            <li class="list-item-col">
                                <h2 class="item-title">По-русски:</h2>
                                <div class="r-input-error">{{drug_data_error.title}}</div>
                                <input type="text" class="r-input" v-model="drug_data.title" @blur="updateDrug('title', drug_data.title)" @keyup.enter="updateDrug('title', drug_data.title)" :class="{error: drug_data_error.title}" placeholder="Введите название препарата для RU страницы">
                            </li>
                            <li class="list-item-col">
                                <h2 class="item-title">По-украински:</h2>
                                <div class="r-input-error">{{drug_data_error.utitle}}</div>
                                <input type="text" class="r-input" v-model="drug_data.utitle" @blur="updateDrug('utitle', drug_data.utitle)" @keyup.enter="updateDrug('utitle', drug_data.utitle)" :class="{error: drug_data_error.utitle}" placeholder="Введите название препарата для UA страницы">
                            </li>
                            <li class="list-item-col">
                                <h2 class="item-title">URL:</h2>
                                <input type="text" class="r-input" v-model="drug_data.alias"  disabled>
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
                                <div class="r-input-error">{{drug_data_error.dosage}}</div>
                                <input type="text" class="r-input" v-model="drug_data.dosage" @blur="updateDrug('dosage', drug_data.dosage)" @keyup.enter="updateDrug('dosage', drug_data.dosage)" :class="{error: drug_data_error.dosage}" placeholder="Введите дозировку для RU страницы">
                            </li>
                            <li class="list-item-col">
                                <h2 class="item-title">По-украински:</h2>
                                <div class="r-input-error">{{drug_data_error.udosage}}</div>
                                <input type="text" class="r-input" v-model="drug_data.udosage" @blur="updateDrug('udosage', drug_data.udosage)" @keyup.enter="updateDrug('udosage', drug_data.udosage)" :class="{error: drug_data_error.udosage}" placeholder="Введите дозировку для UA страницы">
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
                                <div class="r-input-error">{{drug_data_error.registration}}</div>
                                <input type="text" class="r-input" v-model="drug_data.registration" @blur="updateDrug('registration', drug_data.registration)" @keyup.enter="updateDrug('registration', drug_data.registration)" :class="{error: drug_data_error.registration}" placeholder="Введите регистрацию для RU страницы">
                            </li>
                            <li class="list-item-col">
                                <h2 class="item-title">По-украински:</h2>
                                <div class="r-input-error">{{drug_data_error.uregistration}}</div>
                                <input type="text" class="r-input" v-model="drug_data.uregistration" @blur="updateDrug('uregistration', drug_data.uregistration)" @keyup.enter="updateDrug('uregistration', drug_data.uregistration)" :class="{error: drug_data_error.uregistration}" placeholder="Введите регистрацию для UA страницы">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="wsr ws-100" style="flex-direction: row; justify-content: space-between;">
                <div class="reactive-box" style="width: 100%;">
                    <header class="box-header">
                        SEO метки неправильных названий
                    </header>
                    <ul class="box-content col">
                        <li class="list-item-col">
                            <h2 class="item-title">Ru неправильное название</h2>
                            <input type="text" class="r-input" v-model="timely_label.ru" placeholder="Введите ошибочное название на RU">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Ua неправильное название:</h2>
                            <input type="text" class="r-input" v-model="timely_label.ua" placeholder="Введите ошибочное название на UA">
                        </li>
                        <div @click="createLabel" class="r-btn r-success" style="margin: 15px 15px 0px 0px;" v-if="getStatusCreatingLabel">Добавить</div>
                        <div class="r-btn r-warning" style="margin: 15px 15px 0px 0px;" v-else>Ожидаю</div>

                    </ul>
                    <hr style="height: 2px; margin: 0;">
                    <ul class="box-content col" v-for="(label, key) in drug_labels">
                        <li class="list-item-col">
                            <h2 class="item-title">{{key + 1}} - Ru неправильное название</h2>
                            <input type="text" class="r-input" disabled v-model="label.title" placeholder="Введите ошибочное название на RU">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">{{key + 1}} - Ua неправильное название:</h2>
                            <input type="text" class="r-input" disabled v-model="label.utitle" placeholder="Введите ошибочное название на UA">
                        </li>
                        <div @click="deleteLabel(label.id)" class="r-btn r-error" style="margin: 15px 15px 0px 0px;">Удалить</div>
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
            this.drug_alias = this.$route.params.alias;
            this.getDrug();
        },
        data: function(){
            return{
                //model data
                drug_alias: null,
                drug_data: [],
                drug_data_error: [],
                drug_labels: [],
                timely_label: {ru: null, ua: null},
                drug_labels_error: [],
                drug_setting: [],
                drug_image: [],
                drug_creator: [],
                drug_creator_avatar: [],
                file_categories: [
                    'Vne-Kategorii',
                    'Avatari',
                    'Diplomy',
                    'Preparaty'
                ],

                //service data
                model_status: null,

                //static data
                drug_infoline_hidden: null,
                modal_cancel: {title: 'Отменить создание '},
            }
        },
        methods: {
            getDrug(){
                this.model_status = 3;
                HTTP.get(`drug/get/` + this.drug_alias)
                    .then(response => {
                        this.drug_data = response.data.model;
                        this.drug_image = response.data.image;
                        this.drug_creator = response.data.creator;
                        this.drug_creator_avatar = response.data.creator_avatar;
                        this.drug_setting = response.data.setting;
                        this.getLabels();
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'drugs'})
                    })
            },
            changeDrugImage(id){
                this.model_status = 3;
                HTTP.post(`drug/update/` + this.drug_alias + '/image', {id: id})
                    .then(response => {
                        this.drug_data = response.data.drug;
                        this.drug_image = response.data.image;
                        this.model_status = 4;
                    })
            },
            updateDrug(type, model, data_render = true){
                this.model_status = 3;
                var data = {};
                if(data_render){
                    data[type] = model;
                }else{
                    data = model;
                }
                HTTP.post(`drug/update/` + this.drug_alias + '/' + type, data)
                    .then(response => {
                        switch (type) {
                            case 'switch':
                                if(response.data.setting !== undefined){
                                    this.drug_setting = response.data.setting;
                                }else{
                                    this.drug_data = response.data.drug;
                                }
                                console.log()
                                break;
                            case 'title':
                                window.history.pushState('', '', document.location.origin + '/manage/manual/drug#/edit/' + response.data.drug.alias + '/main');
                            default:
                                this.drug_data = response.data.drug;
                                delete this.drug_data_error[type];
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
                                        this.drug_data_error.title = error_console_message;
                                        break;
                                    case 'utitle':
                                        error_console_message = error.response.data;
                                        this.drug_data_error.utitle = error_console_message;
                                        break;
                                    case 'dosage':
                                        error_console_message = error.response.data.errors.dosage[0];
                                        this.drug_data_error.dosage = error_console_message;
                                        break
                                    case 'udosage':
                                        error_console_message = error.response.data.errors.udosage[0];
                                        this.drug_data_error.udosage = error_console_message;
                                        break
                                    case 'registration':
                                        error_console_message = error.response.data.errors.registration[0];
                                        this.drug_data_error.registration = error_console_message;
                                        break
                                    case 'uregistration':
                                        error_console_message = error.response.data.errors.uregistration[0];
                                        this.drug_data_error.uregistration = error_console_message;
                                        break
                                }
                                break;
                        }
                        this.model_status = 4;
                        console.error('[Medpravda] => ' + error_console_message);
                    })
            },
            switchDrugSetting(data){
                this.updateDrug('switch', data, false)
            },
            createLabel(){
                HTTP.post(`drug/create/` + this.drug_data.id + '/label', this.timely_label)
                    .then(response => {
                        this.timely_label.ru = null;
                        this.timely_label.ua = null;
                        this.getLabels();
                        this.model_status = 4;
                    })
            },
            deleteLabel(id){
                HTTP.delete(`drug/delete/` + id + '/label')
                    .then(response => {
                        this.getLabels();
                    })
            },
            getLabels(){
                HTTP.get(`drug/get/` + this.drug_data.id + '/labels')
                    .then(response => {
                        this.drug_labels = response.data;
                    })
            }
        },
        computed: {
          getStatusCreatingLabel(){
              console.log(123);
              if(this.timely_label.ru === null || this.timely_label.ua === null){
                  return false;
              }
              else if(this.timely_label.ru.length == 0 || this.timely_label.ua.length == 0){
                  return false;
              }
              else{
                  return true;
              }
          }
        },
        watch: {
            drug_data(to){
                this.drug_alias = to.alias;
                this.drug_infoline_hidden = [{title: to.updated_at, info: 'Обновление Препарата'}, {title: to.created_at, info: 'Создание Препарата'}]
            },
        }
    }
</script>

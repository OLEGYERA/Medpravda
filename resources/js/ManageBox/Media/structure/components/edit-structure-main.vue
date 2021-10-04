<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Cтруктуры <i class="fas fa-angle-right"></i> Основное <i class="fas fa-angle-right"></i>{{structure_alias}}</h1>
                <div class="reactive-sub-titles">
                    <infoline
                        :i_class="'fas fa-mortar-pestle'"
                        :visual="structure_data.updated_at"
                        :hidden="structure_infoline_hidden"
                    ></infoline>
                    <router-link :to="{name:'structures'}" class="r-link">Вернуться на страницу Структуры</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_structure_main', props: {'alias': this.structure_alias}}" class="active orange">Основное</router-link>
            <router-link v-if="structure_setting.float == true" :to="{name:'edit_structure_blocks', props: {'alias': this.structure_alias}}" class="orange">Фиксированные блоки</router-link>
<!--            <router-link :to="{name:'edit_structure_instruction', props: {'alias': this.structure_alias}}" class="orange">Инструкция RU</router-link>-->
<!--            <router-link :to="{name:'edit_structure_instruction_ua', props: {'alias': this.structure_alias}}" class="orange">Инструкция UA</router-link>-->
<!--            <router-link :to="{name:'edit_structure_instruction_adaptive', props: {'alias': this.structure_alias}}" class="orange">Адаптированная Инструкция RU</router-link>-->
<!--            <router-link :to="{name:'edit_structure_instruction_adaptive_ua', props: {'alias': this.structure_alias}}" class="orange">Адаптированная Инструкция UA</router-link>-->
        </nav>
        <div class="reactive-ws" v-if="structure_data.created_at">
            <div class="wsr ws-50">
                <div class="reactive-box">
                    <header class="box-header">
                        Настройки Структуры
                    </header>
                    <ul class="box-content">
                        <li class="list-item-row">
                            <switcher :id=1 :status=structure_setting.fullWidth :color="'orange'" :namespace="'fullWidth'" @toggle="switchStructureSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Полноэкранный режим</h2>
                                <div class="data-description">Позволяет структуре контента занимать всю ширину рабочего экрана (Тип лонгрида).</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=2 :status=structure_setting.bgTop :color="'orange'" :namespace="'bgTop'" @toggle="switchStructureSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Превью контента</h2>
                                <div class="data-description">Размещает изображение с тайтлом в самом начале.</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=4 :status=structure_setting.float :color="'orange'" :namespace="'float'" @toggle="switchStructureSetting"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Фиксированная структура</h2>
                                <div class="data-description">Позволяет задавать статические поля для контента.</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wsr ws-50">
                <div class="reactive-box">
                    <header class="box-header">
                        Название структуры
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Название:</h2>
                            <div class="r-input-error">{{structure_data_error.title}}</div>
                            <input type="text" class="r-input" v-model="structure_data.title" @blur="updateStructure('title', structure_data.title)" @keyup.enter="updateStructure('title', structure_data.title)" :class="{error: structure_data_error.title}" placeholder="Введите название косм. средства для RU страницы">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">URL:</h2>
                            <input type="text" class="r-input" v-model="structure_data.alias"  disabled>
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
            this.structure_alias = this.$route.params.alias;
            this.getStructure();
        },
        data: function(){
            return{
                //model data
                structure_alias: null,
                structure_data: [],
                structure_data_error: [],
                structure_setting: [],
                //service data
                model_status: null,

                //static data
                structure_infoline_hidden: null,
                modal_cancel: {title: 'Отменить создание '},
            }
        },
        methods: {
            getStructure(){
                this.model_status = 3;
                HTTP.get(`structure/get/` + this.structure_alias)
                    .then(response => {
                        this.structure_data = response.data.model;
                        this.structure_setting = response.data.model.setting;
                        this.model_status = 4;
                        console.log(response);
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'structures'})
                    })
            },
            updateStructure(type, model, data_render = true){
                this.model_status = 3;
                var data = {};
                if(data_render){
                    data[type] = model;
                }else{
                    data = model;
                }
                HTTP.post(`structure/update/` + this.structure_alias + '/' + type, data)
                    .then(response => {
                        switch (type) {
                            case 'switch':
                                this.structure_setting = response.data;
                                break;
                            case 'title':
                                window.history.pushState('', '', document.location.origin + '/manage/media/structure#/edit/' + response.data.structure.alias + '/main');
                            default:
                                this.structure_data = response.data.structure;
                                delete this.structure_data_error[type];
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
                                        this.structure_data_error.title = error_console_message;
                                        break;
                                    case 'utitle':
                                        error_console_message = error.response.data;
                                        this.structure_data_error.utitle = error_console_message;
                                        break;
                                    case 'dosage':
                                        error_console_message = error.response.data.errors.dosage[0];
                                        this.structure_data_error.dosage = error_console_message;
                                        break
                                    case 'udosage':
                                        error_console_message = error.response.data.errors.udosage[0];
                                        this.structure_data_error.udosage = error_console_message;
                                        break
                                    case 'registration':
                                        error_console_message = error.response.data.errors.registration[0];
                                        this.structure_data_error.registration = error_console_message;
                                        break
                                    case 'uregistration':
                                        error_console_message = error.response.data.errors.uregistration[0];
                                        this.structure_data_error.uregistration = error_console_message;
                                        break
                                }
                                break;
                        }
                        this.model_status = 4;
                        console.error('[Medpravda] => ' + error_console_message);
                    })
            },
            switchStructureSetting(data){
                this.updateStructure('switch', data, false)
            }
        },
        watch: {
            structure_data(to){
                this.structure_alias = to.alias;
                this.structure_infoline_hidden = [{title: to.updated_at, info: 'Обновление Косм. средства'}, {title: to.created_at, info: 'Создание Косм. средства'}]
            },
        }
    }
</script>

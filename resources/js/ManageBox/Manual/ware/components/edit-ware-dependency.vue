<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Мед. изделия<i class="fas fa-angle-right"></i> Зависимости <i class="fas fa-angle-right"></i>{{ware_alias}}</h1>
                <div class="reactive-sub-titles">
                    <router-link :to="{name:'wares'}" class="r-link">Вернуться на страницу Мед. изделий</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_ware_main', props: {'alias': this.ware_alias}}" class="orange">Основное</router-link>
            <router-link :to="{name:'edit_ware_dependency', props: {'alias': this.ware_alias}}" class="active orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_ware_instruction', props: {'alias': this.ware_alias}}" class="orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_ware_instruction_ua', props: {'alias': this.ware_alias}}" class="orange">Инструкция UA</router-link>
            <router-link :to="{name:'edit_ware_instruction_adaptive', props: {'alias': this.ware_alias}}" class="orange">Адаптированная Инструкция RU</router-link>
            <router-link :to="{name:'edit_ware_instruction_adaptive_ua', props: {'alias': this.ware_alias}}" class="orange">Адаптированная Инструкция UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="Init_load">
            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Классификация Мед. изделия
                        <i class="fas fa-tasks" @click="callBack_ware_classification = !callBack_ware_classification"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!ware_dep_have.ware_classification">
                            Классификации Мед. изделий отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="ware_classification == null">
                            Выберите Классификацию Мед. изделия
                        </li>
                        <li class="list-item-col" v-else>
                            <b>{{ware_classification.class}}</b>{{ware_classification.title}}
                        </li>
                    </ul>
                </div>
                <!--farma selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/class_ware'"
                    :atx=true
                    :choosed_items="(ware_classification != null) ? [ware_classification.id] : []"
                    :modal_title="'Класс. Мед. изделий'"
                    :callBack=callBack_ware_classification
                    @choosed="updateClassificationWare"
                    @creation_event="ware_dep_have.atxs = true"
                ></modal-selector>
            </div>

            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Производитель
                        <i class="fas fa-tasks" @click="callBack_ware_fabricator = !callBack_ware_fabricator"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!ware_dep_have.fabricators">
                            Производители отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="ware_fabricator == null">
                            Выберите производителя
                        </li>
                        <li class="list-item-col" v-else>
                            {{ware_fabricator.title}}
                        </li>
                    </ul>
                </div>
                <!--fabricator selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/fabricator'"
                    :choosed_items="(ware_fabricator != null) ? [ware_fabricator.id] : []"
                    :modal_title="'производитель'"
                    :callBack=callBack_ware_fabricator
                    @choosed="updateFabricator"
                    @creation_event="ware_dep_have.fabricators = true"
                ></modal-selector>

                <div class="reactive-box" v-if="ware_fabricator != null">
                    <header class="box-header">
                        Локация Производителя
                        <i class="fas fa-tasks" @click="callBack_ware_fabricator_location = !callBack_ware_fabricator_location"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!ware_dep_have.fabricator_locations">
                            У производителя нет локаций
                        </li>
                        <li class="list-item-col" v-else-if="ware_fabricator_location == null">
                            Выберите локацию производителя
                        </li>
                        <li class="list-item-col" v-else>
                            {{ware_fabricator_location.title}}
                        </li>
                    </ul>
                </div>
                <!--fabricator location selector-->
                <modal-selector
                    v-if="ware_fabricator !=  null"
                    :fabricator_location=true
                    :method_choosed="'item'"
                    :url="'dependency/fabricator/' + ware_fabricator.alias + '/location'"
                    :choosed_items="(ware_fabricator_location != null) ? [ware_fabricator_location.id] : []"
                    :modal_title="'локация производителя'"
                    :callBack=callBack_ware_fabricator_location
                    @choosed="updateFabricatorLocation"
                    @creation_event="ware_dep_have.fabricator_locations = true"
                ></modal-selector>
            </div>
            <div class="wsr ws-30"></div>
        </div>
    </div>
</template>




<script>
    import {HTTP} from "../../http";

    export default {
        mounted() {
            this.ware_alias = this.$route.params.alias;
            this.Init_getWareDependencies();

        },
        data: function(){
            return{
                //model data
                ware_fabricator: null,
                ware_fabricator_location: null,
                ware_classification: null,

                //service data
                model_status: null,
                ware_alias: null,
                Init_load: false,
                ware_dep_have: [],


                //callbacks
                callBack_ware_fabricator: false,
                callBack_ware_fabricator_location: false,
                callBack_ware_classification: false,

                //static data
                ware_infoline_hidden: null,
            }
        },
        methods: {
            //services
            updateClassificationWare(data){
                this.updateWareDependency('ware_classification', data);
            },

            updateFabricator(data){
                this.updateWareDependency('fabricator', data);
            },
            updateFabricatorLocation(data){
                this.updateWareDependency('fabricator/location', data);
            },



            //https
            Init_getWareDependencies(){
                this.model_status = 3;
                HTTP.get(`ware/dependency/get/` + this.ware_alias).then(response => {
                    this.ware_classification = response.data.ware_classification;

                    this.ware_fabricator = response.data.ware_fabricator;
                    this.ware_fabricator_location = response.data.ware_fabricator_location;

                    this.ware_dep_have = response.data.ware_dep_have;
                    this.model_status = 4;
                    this.Init_load = true;
                }).catch(error => {

                })
            },

            updateWareDependency(type, data){
                this.model_status = 3;
                HTTP.post(`ware/dependency/update/` + this.ware_alias + '/' + type, {data: data}).then(response => {
                    switch(type){
                        case 'ware_classification':
                            this.ware_classification = data;
                            break;
                        case 'fabricator':
                            this.ware_fabricator = data;
                            this.ware_fabricator_location = null;
                            this.ware_dep_have.fabricator_locations = response.data.ware_dep_have_fabricator_locations;
                            break;
                        case 'fabricator/location':
                            this.ware_fabricator_location = data;
                            break;
                    }
                    this.model_status = 4;
                })
            }
        },
    }
</script>

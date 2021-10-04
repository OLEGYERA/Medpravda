<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Косм. средства<i class="fas fa-angle-right"></i> Зависимости <i class="fas fa-angle-right"></i>{{cosmetic_alias}}</h1>
                <div class="reactive-sub-titles">
                    <router-link :to="{name:'cosmetics'}" class="r-link">Вернуться на страницу Косм. средств</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_cosmetic_main', props: {'alias': this.cosmetic_alias}}" class="orange">Основное</router-link>
            <router-link :to="{name:'edit_cosmetic_dependency', props: {'alias': this.cosmetic_alias}}" class="active orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction', props: {'alias': this.cosmetic_alias}}" class="orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction_ua', props: {'alias': this.cosmetic_alias}}" class="orange">Инструкция UA</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction_adaptive', props: {'alias': this.cosmetic_alias}}" class="orange">Адаптированная Инструкция RU</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction_adaptive_ua', props: {'alias': this.cosmetic_alias}}" class="orange">Адаптированная Инструкция UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="Init_load">
            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Классификация Косм. средства
                        <i class="fas fa-tasks" @click="callBack_cosmetic_classification = !callBack_cosmetic_classification"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!cosmetic_dep_have.cosmetic_classification">
                            Классификации Косм. средств отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="cosmetic_classification == null">
                            Выберите Классификацию Косм. средства
                        </li>
                        <li class="list-item-col" v-else>
                            <b>{{cosmetic_classification.class}}</b>{{cosmetic_classification.title}}
                        </li>
                    </ul>
                </div>
                <!--farma selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/class_cosmetic'"
                    :atx=true
                    :choosed_items="(cosmetic_classification != null) ? [cosmetic_classification.id] : []"
                    :modal_title="'Класс. Косм. средств'"
                    :callBack=callBack_cosmetic_classification
                    @choosed="updateClassificationCosmetic"
                    @creation_event="cosmetic_dep_have.atxs = true"
                ></modal-selector>
            </div>

            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Производитель
                        <i class="fas fa-tasks" @click="callBack_cosmetic_fabricator = !callBack_cosmetic_fabricator"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!cosmetic_dep_have.fabricators">
                            Производители отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="cosmetic_fabricator == null">
                            Выберите производителя
                        </li>
                        <li class="list-item-col" v-else>
                            {{cosmetic_fabricator.title}}
                        </li>
                    </ul>
                </div>
                <!--fabricator selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/fabricator'"
                    :choosed_items="(cosmetic_fabricator != null) ? [cosmetic_fabricator.id] : []"
                    :modal_title="'производитель'"
                    :callBack=callBack_cosmetic_fabricator
                    @choosed="updateFabricator"
                    @creation_event="cosmetic_dep_have.fabricators = true"
                ></modal-selector>

                <div class="reactive-box" v-if="cosmetic_fabricator != null">
                    <header class="box-header">
                        Локация Производителя
                        <i class="fas fa-tasks" @click="callBack_cosmetic_fabricator_location = !callBack_cosmetic_fabricator_location"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!cosmetic_dep_have.fabricator_locations">
                            У производителя нет локаций
                        </li>
                        <li class="list-item-col" v-else-if="cosmetic_fabricator_location == null">
                            Выберите локацию производителя
                        </li>
                        <li class="list-item-col" v-else>
                            {{cosmetic_fabricator_location.title}}
                        </li>
                    </ul>
                </div>
                <!--fabricator location selector-->
                <modal-selector
                    v-if="cosmetic_fabricator !=  null"
                    :fabricator_location=true
                    :method_choosed="'item'"
                    :url="'dependency/fabricator/' + cosmetic_fabricator.alias + '/location'"
                    :choosed_items="(cosmetic_fabricator_location != null) ? [cosmetic_fabricator_location.id] : []"
                    :modal_title="'локация производителя'"
                    :callBack=callBack_cosmetic_fabricator_location
                    @choosed="updateFabricatorLocation"
                    @creation_event="cosmetic_dep_have.fabricator_locations = true"
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
            this.cosmetic_alias = this.$route.params.alias;
            this.Init_getCosmeticDependencies();

        },
        data: function(){
            return{
                //model data
                cosmetic_fabricator: null,
                cosmetic_fabricator_location: null,
                cosmetic_classification: null,

                //service data
                model_status: null,
                cosmetic_alias: null,
                Init_load: false,
                cosmetic_dep_have: [],


                //callbacks
                callBack_cosmetic_fabricator: false,
                callBack_cosmetic_fabricator_location: false,
                callBack_cosmetic_classification: false,

                //static data
                cosmetic_infoline_hidden: null,
            }
        },
        methods: {
            //services
            updateClassificationCosmetic(data){
                this.updateCosmeticDependency('cosmetic_classification', data);
            },

            updateFabricator(data){
                this.updateCosmeticDependency('fabricator', data);
            },
            updateFabricatorLocation(data){
                this.updateCosmeticDependency('fabricator/location', data);
            },



            //https
            Init_getCosmeticDependencies(){
                this.model_status = 3;
                HTTP.get(`cosmetic/dependency/get/` + this.cosmetic_alias).then(response => {
                    this.cosmetic_classification = response.data.cosmetic_classification;

                    this.cosmetic_fabricator = response.data.cosmetic_fabricator;
                    this.cosmetic_fabricator_location = response.data.cosmetic_fabricator_location;

                    this.cosmetic_dep_have = response.data.cosmetic_dep_have;
                    this.model_status = 4;
                    this.Init_load = true;
                }).catch(error => {

                })
            },

            updateCosmeticDependency(type, data){
                this.model_status = 3;
                HTTP.post(`cosmetic/dependency/update/` + this.cosmetic_alias + '/' + type, {data: data}).then(response => {
                    switch(type){
                        case 'cosmetic_classification':
                            this.cosmetic_classification = data;
                            break;
                        case 'fabricator':
                            this.cosmetic_fabricator = data;
                            this.cosmetic_fabricator_location = null;
                            this.cosmetic_dep_have.fabricator_locations = response.data.cosmetic_dep_have_fabricator_locations;
                            break;
                        case 'fabricator/location':
                            this.cosmetic_fabricator_location = data;
                            break;
                    }
                    this.model_status = 4;
                })
            }
        },
    }
</script>

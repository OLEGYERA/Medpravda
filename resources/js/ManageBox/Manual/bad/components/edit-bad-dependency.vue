<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Бада<i class="fas fa-angle-right"></i> Зависимости <i class="fas fa-angle-right"></i>{{bad_alias}}</h1>
                <div class="reactive-sub-titles">
                    <router-link :to="{name:'bads'}" class="r-link">Вернуться на страницу Бадов</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_bad_main', props: {'alias': this.bad_alias}}" class="orange">Основное</router-link>
            <router-link :to="{name:'edit_bad_dependency', props: {'alias': this.bad_alias}}" class="active orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_bad_instruction', props: {'alias': this.bad_alias}}" class="orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_bad_instruction_ua', props: {'alias': this.bad_alias}}" class="orange">Инструкция UA</router-link>
            <router-link :to="{name:'edit_bad_instruction_adaptive', props: {'alias': this.bad_alias}}" class="orange">Адаптированная Инструкция RU</router-link>
            <router-link :to="{name:'edit_bad_instruction_adaptive_ua', props: {'alias': this.bad_alias}}" class="orange">Адаптированная Инструкция UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="Init_load">
            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Группа
                        <i class="fas fa-tasks" @click="callBack_bad_pharma = !callBack_bad_pharma"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!bad_dep_have.pharms">
                            Группы отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="bad_pharma == null">
                            Выберите Группу
                        </li>
                        <li class="list-item-col" v-else>
                            <a v-bind:href="'/manage/dependency/pharma#/all/redirected/' + bad_pharma.alias" target="_blank">{{bad_pharma.title}}</a>
                        </li>
                    </ul>
                </div>
                <!--farma selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/pharma_bad'"
                    :choosed_items="(bad_pharma != null) ? [bad_pharma.id] : []"
                    :modal_title="'фармгруппа'"
                    :callBack=callBack_bad_pharma
                    @choosed="updatePharmaBad"
                    @creation_event="bad_dep_have.pharms = true"
                ></modal-selector>

                <div class="reactive-box">
                    <header class="box-header">
                        Теги
                        <i class="fas fa-tasks" @click="callBack_bad_tag = !callBack_bad_tag"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!bad_dep_have.tags">
                            Теги отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="bad_tags.length == 0">
                            Выберите теги
                        </li>
                        <li class="list-item-col" v-else v-for="bad_tag_item in bad_tags">
                            {{bad_tag_item.title}}
                        </li>
                    </ul>
                </div>
                <!--tag selector-->
                <modal-selector
                    :method_choosed="'items'"
                    :url="'dependency/tag'"
                    :choosed_items=bad_tag_ids
                    :modal_title="'тег'"
                    :callBack=callBack_bad_tag
                    @choosed="updateTags"
                    @creation_event="bad_dep_have.tags = true"
                ></modal-selector>
            </div>

            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Классификация Бадов
                        <i class="fas fa-tasks" @click="callBack_bad_classification = !callBack_bad_classification"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!bad_dep_have.bad_classification">
                            Классификации Бадов отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="bad_classification == null">
                            Выберите Классификацию Бадов
                        </li>
                        <li class="list-item-col" v-else>
                            <b>{{bad_classification.class}}</b>{{bad_classification.title}}
                        </li>
                    </ul>
                </div>
                <!--farma selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/class_bad'"
                    :atx=true
                    :choosed_items="(bad_classification != null) ? [bad_classification.id] : []"
                    :modal_title="'Класс. Бадов'"
                    :callBack=callBack_bad_classification
                    @choosed="updateClassificationBad"
                    @creation_event="bad_dep_have.atxs = true"
                ></modal-selector>
            </div>

            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Производитель
                        <i class="fas fa-tasks" @click="callBack_bad_fabricator = !callBack_bad_fabricator"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!bad_dep_have.fabricators">
                            Производители отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="bad_fabricator == null">
                            Выберите производителя
                        </li>
                        <li class="list-item-col" v-else>
                            {{bad_fabricator.title}}
                        </li>
                    </ul>
                </div>
                <!--fabricator selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/fabricator'"
                    :choosed_items="(bad_fabricator != null) ? [bad_fabricator.id] : []"
                    :modal_title="'производитель'"
                    :callBack=callBack_bad_fabricator
                    @choosed="updateFabricator"
                    @creation_event="bad_dep_have.fabricators = true"
                ></modal-selector>

                <div class="reactive-box" v-if="bad_fabricator != null">
                    <header class="box-header">
                        Локация Производителя
                        <i class="fas fa-tasks" @click="callBack_bad_fabricator_location = !callBack_bad_fabricator_location"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!bad_dep_have.fabricator_locations">
                            У производителя нет локаций
                        </li>
                        <li class="list-item-col" v-else-if="bad_fabricator_location == null">
                            Выберите локацию производителя
                        </li>
                        <li class="list-item-col" v-else>
                            {{bad_fabricator_location.title}}
                        </li>
                    </ul>
                </div>
                <!--fabricator location selector-->
                <modal-selector
                    v-if="bad_fabricator !=  null"
                    :fabricator_location=true
                    :method_choosed="'item'"
                    :url="'dependency/fabricator/' + bad_fabricator.alias + '/location'"
                    :choosed_items="(bad_fabricator_location != null) ? [bad_fabricator_location.id] : []"
                    :modal_title="'локация производителя'"
                    :callBack=callBack_bad_fabricator_location
                    @choosed="updateFabricatorLocation"
                    @creation_event="bad_dep_have.fabricator_locations = true"
                ></modal-selector>
            </div>
        </div>
    </div>
</template>




<script>
    import {HTTP} from "../../http";

    export default {
        mounted() {
            this.bad_alias = this.$route.params.alias;
            this.Init_getBadDependencies();

        },
        data: function(){
            return{
                //model data
                bad_pharma: null,
                bad_fabricator: null,
                bad_fabricator_location: null,
                bad_classification: null,

                bad_tags: null,
                bad_tag_ids: null,

                //service data
                model_status: null,
                bad_alias: null,
                Init_load: false,
                bad_dep_have: [],


                //callbacks
                callBack_bad_tag: false,
                callBack_bad_pharma: false,
                callBack_bad_fabricator: false,
                callBack_bad_fabricator_location: false,
                callBack_bad_classification: false,

                //static data
                bad_infoline_hidden: null,
            }
        },
        methods: {


            //services

            updatePharmaBad(data){
                this.updateBadDependency('pharma_bad', data);
            },
            updateClassificationBad(data){
                this.updateBadDependency('bad_classification', data);
            },

            updateFabricator(data){
                this.updateBadDependency('fabricator', data);
            },
            updateFabricatorLocation(data){
                this.updateBadDependency('fabricator/location', data);
            },

            updateTags(data){
                this.updateBadDependency('tags', data);
            },



            //https
            Init_getBadDependencies(){
                this.model_status = 3;
                HTTP.get(`bad/dependency/get/` + this.bad_alias).then(response => {
                    this.bad_pharma = response.data.bad_pharma;
                    this.bad_classification = response.data.bad_classification;

                    this.bad_fabricator = response.data.bad_fabricator;
                    this.bad_fabricator_location = response.data.bad_fabricator_location;


                    this.bad_tags = response.data.bad_tags;
                    this.bad_tag_ids = response.data.bad_tag_ids;

                    this.bad_dep_have = response.data.bad_dep_have;
                    this.model_status = 4;
                    this.Init_load = true;
                }).catch(error => {

                })
            },

            updateBadDependency(type, data){
                this.model_status = 3;
                HTTP.post(`bad/dependency/update/` + this.bad_alias + '/' + type, {data: data}).then(response => {
                    switch(type){
                        case 'pharma_bad':
                            this.bad_pharma = data;
                            break;
                        case 'bad_classification':
                            this.bad_classification = data;
                            break;
                        case 'fabricator':
                            this.bad_fabricator = data;
                            this.bad_fabricator_location = null;
                            this.bad_dep_have.fabricator_locations = response.data.bad_dep_have_fabricator_locations;
                            break;
                        case 'fabricator/location':
                            this.bad_fabricator_location = data;
                            break;
                        case 'tags':
                            this.bad_tags = response.data.bad_tags;
                            this.bad_tag_ids = response.data.bad_tag_ids;
                            break;
                    }
                    this.model_status = 4;
                })
            }
        },
    }
</script>

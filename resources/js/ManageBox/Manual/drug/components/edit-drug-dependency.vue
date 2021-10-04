<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Препарата<i class="fas fa-angle-right"></i> Зависимости <i class="fas fa-angle-right"></i>{{drug_alias}}</h1>
                <div class="reactive-sub-titles">
                    <router-link :to="{name:'drugs'}" class="r-link">Вернуться на страницу Препаратов</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_drug_main', props: {'alias': this.drug_alias}}" class="orange">Основное</router-link>
            <router-link :to="{name:'edit_drug_dependency', props: {'alias': this.drug_alias}}" class="active orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_drug_instruction', props: {'alias': this.drug_alias}}" class="orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_drug_instruction_ua', props: {'alias': this.drug_alias}}" class="orange">Инструкция UA</router-link>
            <router-link :to="{name:'edit_drug_instruction_adaptive', props: {'alias': this.drug_alias}}" class="orange">Адаптированная Инструкция RU</router-link>
            <router-link :to="{name:'edit_drug_instruction_adaptive_ua', props: {'alias': this.drug_alias}}" class="orange">Адаптированная Инструкция UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="Init_load">
            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Международное Название
                        <i class="fas fa-tasks" @click="callBack_drug_inname = !callBack_drug_inname"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!drug_dep_have.innames">
                            Международные названия отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="drug_inname == null">
                            Выберите международное название
                        </li>
                        <li class="list-item-col" v-else>
                            <a v-bind:href="'/manage/dependency/inname#/all/redirected/' + drug_inname.title" target="_blank">{{drug_inname.title}}</a>
                        </li>
                    </ul>
                </div>
                <!--farma selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/inname'"
                    :inname=true
                    :choosed_items="(drug_inname != null) ? [drug_inname.id] : []"
                    :modal_title="'международное название'"
                    :callBack=callBack_drug_inname
                    @choosed="updateINN"
                    @creation_event="drug_dep_have.innames = true"
                ></modal-selector>

                <div class="reactive-box">
                    <header class="box-header">
                        Лекарственная Форма
                        <i class="fas fa-tasks" @click="callBack_drug_form = !callBack_drug_form"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!drug_dep_have.forms">
                            Лекарственные формы отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="drug_form == null">
                            Выберите лекарственную Форму
                        </li>
                        <li class="list-item-col" v-else>
                            <a v-bind:href="'/manage/dependency/form#/all/redirected/' + drug_form.alias" target="_blank">{{drug_form.title}}</a>
                        </li>
                    </ul>
                </div>
                <!--form selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/form'"
                    :choosed_items="(drug_form != null) ? [drug_form.id] : []"
                    :modal_title="'лекарственная форма'"
                    :callBack=callBack_drug_form
                    @choosed="updateForm"
                    @creation_event="drug_dep_have.forms = true"
                ></modal-selector>

                <div class="reactive-box">
                    <header class="box-header">
                        Фармакотерапевтическая группа
                        <i class="fas fa-tasks" @click="callBack_drug_pharma = !callBack_drug_pharma"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!drug_dep_have.pharms">
                            Фармакотерапевтические группы отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="drug_pharma == null">
                            Выберите фармакотерапевтическую группу
                        </li>
                        <li class="list-item-col" v-else>
                            <a v-bind:href="'/manage/dependency/pharma#/all/redirected/' + drug_pharma.alias" target="_blank">{{drug_pharma.title}}</a>
                        </li>
                    </ul>
                </div>
                <!--farma selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/pharma'"
                    :choosed_items="(drug_pharma != null) ? [drug_pharma.id] : []"
                    :modal_title="'фармгруппа'"
                    :callBack=callBack_drug_pharma
                    @choosed="updatePharma"
                    @creation_event="drug_dep_have.pharms = true"
                ></modal-selector>


                <div class="reactive-box">
                    <header class="box-header">
                        ATX - классификация
                        <i class="fas fa-tasks" @click="callBack_drug_atx = !callBack_drug_atx"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!drug_dep_have.atxs">
                            ATX - классификации отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="drug_atx == null">
                            Выберите ATX - классификацию
                        </li>
                        <li class="list-item-col" v-else>
                            <b>{{drug_atx.class}}</b>{{drug_atx.title}}
                        </li>
                    </ul>
                </div>
                <!--farma selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/atx'"
                    :atx=true
                    :choosed_items="(drug_atx != null) ? [drug_atx.id] : []"
                    :modal_title="'ATX'"
                    :callBack=callBack_drug_atx
                    @choosed="updateATX"
                    @creation_event="drug_dep_have.atxs = true"
                ></modal-selector>



            </div>

            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Производитель
                        <i class="fas fa-tasks" @click="callBack_drug_fabricator = !callBack_drug_fabricator"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!drug_dep_have.fabricators">
                            Производители отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="drug_fabricator == null">
                            Выберите производителя
                        </li>
                        <li class="list-item-col" v-else>
                            {{drug_fabricator.title}}
                        </li>
                    </ul>
                </div>
                <!--fabricator selector-->
                <modal-selector
                    :method_choosed="'item'"
                    :url="'dependency/fabricator'"
                    :choosed_items="(drug_fabricator != null) ? [drug_fabricator.id] : []"
                    :modal_title="'производитель'"
                    :callBack=callBack_drug_fabricator
                    @choosed="updateFabricator"
                    @creation_event="drug_dep_have.fabricators = true"
                ></modal-selector>

                <div class="reactive-box" v-if="drug_fabricator != null">
                    <header class="box-header">
                        Локация Производителя
                        <i class="fas fa-tasks" @click="callBack_drug_fabricator_location = !callBack_drug_fabricator_location"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!drug_dep_have.fabricator_locations">
                            У производителя нет локаций
                        </li>
                        <li class="list-item-col" v-else-if="drug_fabricator_location == null">
                            Выберите локацию производителя
                        </li>
                        <li class="list-item-col" v-else>
                            {{drug_fabricator_location.title}}
                        </li>
                    </ul>
                </div>
                <!--fabricator location selector-->
                <modal-selector
                    v-if="drug_fabricator !=  null"
                    :fabricator_location=true
                    :method_choosed="'item'"
                    :url="'dependency/fabricator/' + drug_fabricator.alias + '/location'"
                    :choosed_items="(drug_fabricator_location != null) ? [drug_fabricator_location.id] : []"
                    :modal_title="'локация производителя'"
                    :callBack=callBack_drug_fabricator_location
                    @choosed="updateFabricatorLocation"
                    @creation_event="drug_dep_have.fabricator_locations = true"
                ></modal-selector>
            </div>

            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Действующие Вещества
                        <i class="fas fa-tasks" @click="callBack_drug_substance = !callBack_drug_substance"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!drug_dep_have.substances">
                            Действующие вещества отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="drug_substances.length == 0">
                            Выберите действующие вещества
                        </li>
                        <li class="list-item-col" v-else v-for="drug_substance_item in drug_substances">
                            {{drug_substance_item.title}}
                        </li>
                    </ul>
                </div>
                <!--substance selector-->
                <modal-selector
                    :method_choosed="'items'"
                    :url="'dependency/substance'"
                    :choosed_items=drug_substance_ids
                    :modal_title="'действующее вещество'"
                    :callBack=callBack_drug_substance
                    @choosed="updateSubstances"
                    @creation_event="drug_dep_have.substances = true"
                ></modal-selector>


                <div class="reactive-box">
                    <header class="box-header">
                        Теги
                        <i class="fas fa-tasks" @click="callBack_drug_tag = !callBack_drug_tag"></i>
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col" v-if="!drug_dep_have.tags">
                            Теги отсутсвуют
                        </li>
                        <li class="list-item-col" v-else-if="drug_tags.length == 0">
                            Выберите теги
                        </li>
                        <li class="list-item-col" v-else v-for="drug_tag_item in drug_tags">
                            {{drug_tag_item.title}}
                        </li>
                    </ul>
                </div>
                <!--tag selector-->
                <modal-selector
                    :method_choosed="'items'"
                    :url="'dependency/tag'"
                    :choosed_items=drug_tag_ids
                    :modal_title="'тег'"
                    :callBack=callBack_drug_tag
                    @choosed="updateTags"
                    @creation_event="drug_dep_have.tags = true"
                ></modal-selector>
            </div>
        </div>
    </div>
</template>




<script>
    import {HTTP} from "../../http";

    export default {
        mounted() {
            this.drug_alias = this.$route.params.alias;
            this.Init_getDrugDependencies();

        },
        data: function(){
            return{
                //model data
                drug_form: null,

                drug_substances: null,
                drug_substance_ids: null,

                drug_tags: null,
                drug_tag_ids: null,

                drug_pharma: null,

                drug_fabricator: null,
                drug_fabricator_location: null,

                drug_atx: null,
                drug_inname: null,


                //service data
                model_status: null,
                drug_alias: null,
                Init_load: false,
                drug_dep_have: [],


                //callbacks
                callBack_drug_form: false,
                callBack_drug_substance: false,
                callBack_drug_tag: false,

                callBack_drug_pharma: false,

                callBack_drug_fabricator: false,
                callBack_drug_fabricator_location: false,

                callBack_drug_atx: false,
                callBack_drug_inname: false,



                //static data
                drug_infoline_hidden: null,
                modal_cancel: {title: 'Отменить создание '},
            }
        },
        methods: {


            //services

            updateINN(data){
                this.updateDrugDependency('inname', data);
            },
            updateForm(data){
                this.updateDrugDependency('form', data);
            },
            updatePharma(data){
                this.updateDrugDependency('pharma', data);
            },
            updateATX(data){
                this.updateDrugDependency('atx', data);
            },

            updateFabricator(data){
                this.updateDrugDependency('fabricator', data);
            },
            updateFabricatorLocation(data){
                this.updateDrugDependency('fabricator/location', data);
            },

            updateSubstances(data){
                this.updateDrugDependency('substances', data);
            },

            updateTags(data){
                this.updateDrugDependency('tags', data);
            },




            //https
            Init_getDrugDependencies(){
                this.model_status = 3;
                HTTP.get(`drug/dependency/get/` + this.drug_alias).then(response => {
                    this.drug_inname = response.data.drug_inname;
                    this.drug_form = response.data.drug_form;
                    this.drug_pharma = response.data.drug_pharma;
                    this.drug_atx = response.data.drug_atx;

                    this.drug_fabricator = response.data.drug_fabricator;
                    this.drug_fabricator_location = response.data.drug_fabricator_location;

                    this.drug_substances = response.data.drug_substances;
                    this.drug_substance_ids = response.data.drug_substance_ids;

                    this.drug_tags = response.data.drug_tags;
                    this.drug_tag_ids = response.data.drug_tag_ids;


                    this.drug_dep_have = response.data.drug_dep_have;
                    this.model_status = 4;
                    this.Init_load = true;
                }).catch(error => {

                })
            },

            updateDrugDependency(type, data){
                this.model_status = 3;
                HTTP.post(`drug/dependency/update/` + this.drug_alias + '/' + type, {data: data}).then(response => {
                    switch(type){
                        case 'inname':
                            this.drug_inname = data;
                            break;
                        case 'form':
                            this.drug_form = data;
                            break;
                        case 'pharma':
                            this.drug_pharma = data;
                            break;
                        case 'atx':
                            this.drug_atx = data;
                            break;

                        case 'fabricator':
                            this.drug_fabricator = data;
                            this.drug_fabricator_location = null;
                            this.drug_dep_have.fabricator_locations = response.data.drug_dep_have_fabricator_locations;
                            break;
                        case 'fabricator/location':
                            this.drug_fabricator_location = data;
                            break;

                        case 'substances':
                            this.drug_substances = response.data.drug_substances;
                            this.drug_substance_ids = response.data.drug_substance_ids;
                            break;

                        case 'tags':
                            this.drug_tags = response.data.drug_tags;
                            this.drug_tag_ids = response.data.drug_tag_ids;
                            break;

                    }
                    this.model_status = 4;
                })
            }
        },
    }
</script>

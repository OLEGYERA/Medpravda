<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Препарата<i class="fas fa-angle-right"></i> Инструкция RU <i class="fas fa-angle-right"></i>{{drug_alias}}</h1>
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
            <router-link :to="{name:'edit_drug_dependency', props: {'alias': this.drug_alias}}" class="orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_drug_instruction', props: {'alias': this.drug_alias}}" class="active orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_drug_instruction_ua', props: {'alias': this.drug_alias}}" class="orange">Инструкция UA</router-link>
            <router-link :to="{name:'edit_drug_instruction_adaptive', props: {'alias': this.drug_alias}}" class="orange">Адаптированная Инструкция RU</router-link>
            <router-link :to="{name:'edit_drug_instruction_adaptive_ua', props: {'alias': this.drug_alias}}" class="orange">Адаптированная Инструкция UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="current_instruction_value != null">
            <div class="wsr ws-5">
                <nav class="instruction-nav">
                    <div class="instruction-item"
                         v-for="item_list in drug_list_instructions"
                         :class="{active: current_instruction_value == item_list.value}"
                         @click="chooseInstruction(item_list.name, item_list.value)"
                         data-toggle="tooltip"
                         data-placement="right"
                         v-bind:title="item_list.name"
                    >
                        <span :class="['glyph', item_list.value]"></span>
                    </div>
                </nav>
            </div>
            <div class="wsr ws-95">
                <h2 class="trext-title">{{current_instruction_name}}:</h2>
                <trext
                    :trextID=current_instruction_value
                    :trextData=current_instruction_data
                    :lang="'ru'"
                    @response="updateInstructionData"
                ></trext>
            </div>
        </div>
    </div>
</template>




<script>
    import {HTTP} from "../../http";

    export default {
        mounted() {
            this.drug_alias = this.$route.params.alias;
            this.current_instruction_name = 'Состав';
            this.current_instruction_value = 'composition';
            $(document).ready(e => {
                $('[data-toggle="tooltip"]').tooltip()
            })
        },
        data: function(){
            return{
                //model data
                drug_alias: null,
                current_instruction_name: null,
                current_instruction_value: null,
                current_instruction_data: 'system_empty',
                drug_list_instructions: [
                    {name: 'Состав', value: 'composition'},
                    {name: 'Основные физико-химические свойства', value: 'physical_chemical'},
                    {name: 'Фармакологические свойства', value: 'pharma_props'},
                    {name: 'Показания к применению', value: 'indications'},
                    {name: 'Надлежащие меры безопасности при применении', value: 'security'},
                    {name: 'Противопоказания', value: 'contraindications'},
                    {name: 'Особенности применения', value: 'features'},
                    {name: 'Применение в период беременности или кормления грудью', value: 'pregnancy'},
                    {name: 'Способность влиять на скорость реакции при управлении автотранспортом', value: 'driver'},
                    {name: 'Дети', value: 'children'},
                    {name: 'Способ применения и дозы', value: 'usage_and_dose'},
                    {name: 'Передозировка', value: 'overdose'},
                    {name: 'Побочные действия', value: 'side_effects'},
                    {name: 'Лекарственное взаимодействие', value: 'interaction'},
                    {name: 'Срок годности', value: 'time_life'},
                    {name: 'Условия хранения', value: 'storage_conditions'},
                    {name: 'Форма выпуска / упаковка', value: 'release_form'},
                    {name: 'Дополнительно', value: 'other'},
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
                HTTP.get(`drug/dependency/get/` + this.drug_alias)
                    .then(response => {
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'drugs'})
                    })
            },
            chooseInstruction(name, value){
                this.current_instruction_name = name;
                this.current_instruction_value = value;
            },

            //http

            getInstruction(){
                this.current_instruction_data = 'system_reload';
                this.model_status = 3;
                HTTP.get(`drug/instruction/get/` + this.drug_alias + `/` + 'ru' + `/` + this.current_instruction_value).then(response => {
                    this.current_instruction_data = response.data.trext;
                    this.model_status = 4;
                })
            },

            updateInstructionData(data){
                this.model_status = 3;
                HTTP.post(`drug/instruction/update/` + this.drug_alias + `/` + 'ru' + `/` + this.current_instruction_value, {new_data: data}).then(response => {
                    this.model_status = 4;
                })
            }

        },
        watch: {
            current_instruction_value(to){
                this.getInstruction();
            },
        }
    }
</script>

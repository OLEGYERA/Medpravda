<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Препарата<i class="fas fa-angle-right"></i> Инструкция UA <i class="fas fa-angle-right"></i>{{drug_alias}}</h1>
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
            <router-link :to="{name:'edit_drug_instruction', props: {'alias': this.drug_alias}}" class="orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_drug_instruction_ua', props: {'alias': this.drug_alias}}" class="active orange">Инструкция UA</router-link>
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
                    :lang="'ua'"
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
            this.current_instruction_name = 'Склад';
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
                    {name: 'Склад', value: 'composition'},
                    {name: 'Основні фізико-хімічні властивості', value: 'physical_chemical'},
                    {name: 'Фармакологічні властивості', value: 'pharma_props'},
                    {name: 'Показання до застосування', value: 'indications'},
                    {name: 'Належні заходи безпеки при застосуванні:', value: 'security'},
                    {name: 'Протипоказання', value: 'contraindications'},
                    {name: 'Особливості застосування', value: 'features'},
                    {name: 'Застосування в період вагітності або годування груддю', value: 'pregnancy'},
                    {name: 'Здатність впливати на швидкість реакції при керуванні автотранспортом', value: 'driver'},
                    {name: 'Діти', value: 'children'},
                    {name: 'Спосіб застосування та дози', value: 'usage_and_dose'},
                    {name: 'Передозування', value: 'overdose'},
                    {name: 'Побічні дії', value: 'side_effects'},
                    {name: 'Лікарська взаємодія', value: 'interaction'},
                    {name: 'Термін придатності', value: 'time_life'},
                    {name: 'Умови зберігання', value: 'storage_conditions'},
                    {name: 'Форма випуску / упаковка', value: 'release_form'},
                    {name: 'Додатково', value: 'other'},
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
                        console.log(response.data);
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
                HTTP.get(`drug/instruction/get/` + this.drug_alias + `/` + 'ua' + `/` + this.current_instruction_value).then(response => {
                    this.current_instruction_data = response.data.trext;
                    this.model_status = 4;
                })
            },

            updateInstructionData(data){
                this.model_status = 3;
                HTTP.post(`drug/instruction/update/` + this.drug_alias + `/` + 'ua' + `/` + this.current_instruction_value, {new_data: data}).then(response => {
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

<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Бада<i class="fas fa-angle-right"></i> Инструкция Адаптированная RU <i class="fas fa-angle-right"></i>{{bad_alias}}</h1>
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
            <router-link :to="{name:'edit_bad_dependency', props: {'alias': this.bad_alias}}" class="orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_bad_instruction', props: {'alias': this.bad_alias}}" class="orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_bad_instruction_ua', props: {'alias': this.bad_alias}}" class="orange">Инструкция UA</router-link>
            <router-link :to="{name:'edit_bad_instruction_adaptive', props: {'alias': this.bad_alias}}" class="active orange">Адаптированная Инструкция RU</router-link>
            <router-link :to="{name:'edit_bad_instruction_adaptive_ua', props: {'alias': this.bad_alias}}" class="orange">Адаптированная Инструкция UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="current_instruction_value != null">
            <div class="wsr ws-5">
                <nav class="instruction-nav">
                    <div class="instruction-item"
                         v-for="item_list in bad_list_instructions"
                         :class="{active: current_instruction_value == item_list.value}"
                         @click="chooseInstruction(item_list.name, item_list.value)"
                         data-toggle="tooltip"
                         data-placement="right"
                         v-bind:title="item_list.name"
                    >
                        <span :class="['glyph', item_list.value]" v-if="item_list.value != 'special_indications'"></span>
                        <span :class="['glyph', 'recipe']" v-else></span>
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
            this.bad_alias = this.$route.params.alias;
            this.current_instruction_name = 'Состав';
            this.current_instruction_value = 'composition';
            $(document).ready(e => {
                $('[data-toggle="tooltip"]').tooltip()
            })
        },
        data: function(){
            return{
                //model data
                bad_alias: null,
                current_instruction_name: null,
                current_instruction_value: null,
                current_instruction_data: 'system_empty',
                bad_list_instructions: [
                    {name: 'Состав', value: 'composition'},
                    {name: 'Свойства', value: 'pharma_props'},
                    {name: 'Рекомендации по применению:', value: 'indications'},
                    {name: 'Особые указания:', value: 'special_indications'},
                    {name: 'Противопоказания', value: 'contraindications'},
                    {name: 'Cпособ применения и дозы', value: 'usage_and_dose'},
                    {name: 'Условия хранения', value: 'storage_conditions'},
                    {name: 'Форма выпуска / упаковка', value: 'release_form'},
                    {name: 'Дополнительно', value: 'other'},
                ],

                //service data
                model_status: null,

                //static data
                bad_infoline_hidden: null,
            }
        },
        methods: {
            getBad(){
                this.model_status = 3;
                HTTP.get(`bad/dependency/get/` + this.bad_alias)
                    .then(response => {
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'bads'})
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
                HTTP.get(`bad/instruction/get/` + this.bad_alias + `/` + 'adaptive_ru' + `/` + this.current_instruction_value).then(response => {
                    this.current_instruction_data = response.data.trext;
                    this.model_status = 4;
                })
            },

            updateInstructionData(data){
                this.model_status = 3;
                HTTP.post(`bad/instruction/update/` + this.bad_alias + `/` + 'adaptive_ru' + `/` + this.current_instruction_value, {new_data: data}).then(response => {
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

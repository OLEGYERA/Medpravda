<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Косм. средства<i class="fas fa-angle-right"></i> Инструкция Адаптированная UA <i class="fas fa-angle-right"></i>{{cosmetic_alias}}</h1>
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
            <router-link :to="{name:'edit_cosmetic_dependency', props: {'alias': this.cosmetic_alias}}" class="orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction', props: {'alias': this.cosmetic_alias}}" class="orange">Инструкция RU</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction_ua', props: {'alias': this.cosmetic_alias}}" class="orange">Инструкция UA</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction_adaptive', props: {'alias': this.cosmetic_alias}}" class="orange">Адаптированная Инструкция RU</router-link>
            <router-link :to="{name:'edit_cosmetic_instruction_adaptive_ua', props: {'alias': this.cosmetic_alias}}" class="active orange">Адаптированная Инструкция UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="current_instruction_value != null">
            <div class="wsr ws-5">
                <nav class="instruction-nav">
                    <div class="instruction-item"
                         v-for="item_list in cosmetic_list_instructions"
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
            this.cosmetic_alias = this.$route.params.alias;
            this.current_instruction_name = 'Состав';
            this.current_instruction_value = 'composition';
            $(document).ready(e => {
                $('[data-toggle="tooltip"]').tooltip()
            })
        },
        data: function(){
            return{
                //model data
                cosmetic_alias: null,
                current_instruction_name: null,
                current_instruction_value: null,
                current_instruction_data: 'system_empty',
                cosmetic_list_instructions: [
                    {name: 'Склад', value: 'composition'},
                    {name: 'Властивості', value: 'pharma_props'},
                    {name: 'Рекомендації щодо застосування', value: 'indications'},
                    {name: 'Особливі вказівки', value: 'special_indications'},
                    {name: 'Протипоказання', value: 'contraindications'},
                    {name: 'Спосіб застосування та дози', value: 'usage_and_dose'},
                    {name: 'Умови зберігання', value: 'storage_conditions'},
                    {name: 'Форма випуску / упаковка', value: 'release_form'},
                    {name: 'Додатково', value: 'other'},
                ],

                //service data
                model_status: null,

                //static data
                cosmetic_infoline_hidden: null,
            }
        },
        methods: {
            getCosmetic(){
                this.model_status = 3;
                HTTP.get(`cosmetic/dependency/get/` + this.cosmetic_alias)
                    .then(response => {
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'cosmetics'})
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
                HTTP.get(`cosmetic/instruction/get/` + this.cosmetic_alias + `/` + 'adaptive_ua' + `/` + this.current_instruction_value).then(response => {
                    this.current_instruction_data = response.data.trext;
                    this.model_status = 4;
                })
            },

            updateInstructionData(data){
                this.model_status = 3;
                HTTP.post(`cosmetic/instruction/update/` + this.cosmetic_alias + `/` + 'adaptive_ua' + `/` + this.current_instruction_value, {new_data: data}).then(response => {
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

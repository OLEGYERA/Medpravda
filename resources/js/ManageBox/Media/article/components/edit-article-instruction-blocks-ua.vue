<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Статьи<i class="fas fa-angle-right"></i> Текстовое поле UA <i class="fas fa-angle-right"></i>{{article_alias}}</h1>
                <div class="reactive-sub-titles">
                    <router-link :to="{name:'articles'}" class="r-link">Вернуться на страницу статей</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_article_main', props: {'alias': this.article_alias}}" class="orange">Основное</router-link>
            <router-link :to="{name:'edit_article_dependency', props: {'alias': this.article_alias}}" class="orange">Зависисмости</router-link>
            <router-link :to="{name:'edit_article_instruction_blocks', props: {'alias': this.article_alias}}" class="orange">Блочные поля RU</router-link>
            <router-link :to="{name:'edit_article_instruction_blocks_ua', props: {'alias': this.article_alias}}" class="active orange">Блочные поля UA</router-link>
        </nav>
        <div class="reactive-ws" >
            <div class="wsr ws-5">
                <nav class="instruction-nav">
                    <div class="instruction-item"
                         v-for="item_list in article_list_instructions"
                         :class="{active: current_instruction_value == item_list.value}"
                         @click="chooseInstruction(item_list.name, item_list.value)"
                         data-toggle="tooltip"
                         data-placement="right"
                         v-bind:title="item_list.name"
                    >
                        <span>{{item_list.name.charAt(0)}}</span>
                    </div>
                </nav>
            </div>
            <div class="wsr ws-95" v-if="current_instruction_value != null">
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
        this.article_alias = this.$route.params.alias;
        this.getArticle();
        this.getArticleBlockList()
        $(document).ready(e => {
            $('[data-toggle="tooltip"]').tooltip()
        })
    },
    data: function(){
        return{
            //model data
            article_alias: null,
            current_instruction_name: null,
            current_instruction_value: null,
            current_instruction_data: 'system_empty',
            article_list_instructions: [],

            //service data
            model_status: null,

            //static data
            article_infoline_hidden: null,
            modal_cancel: {title: 'Отменить создание '},
        }
    },
    methods: {
        getArticle(){
            this.model_status = 3;
            HTTP.get(`article/dependency/get/` + this.article_alias)
                .then(response => {
                    if(response.data.article_structure.setting !== null && response.data.article_structure.setting.float == false){
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'articles'})
                    }
                    this.model_status = 4;
                })
                .catch(error => {
                    console.error('[MP.error] => redirect', error)
                    this.$router.push({ name: 'articles'})
                })
        },
        getArticleBlockList(){
            this.model_status = 3;
            HTTP.get(`article/instruction/get/blocklist/` + this.article_alias + `/` + 'ua')
                .then(response => {
                    this.article_list_instructions = response.data.blocks
                    if(this.article_list_instructions.length !== 0){
                        this.current_instruction_name =  this.article_list_instructions[0].name;
                        this.current_instruction_value = this.article_list_instructions[0].value;
                    }

                    this.model_status = 4;
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
            HTTP.get(`article/instruction/get/` + this.article_alias + `/` + this.current_instruction_value + `/` + 'ua').then(response => {
                this.current_instruction_data = response.data.trext;
                this.model_status = 4;
            })
        },

        updateInstructionData(data){
            this.model_status = 3;
            HTTP.post(`article/instruction/update/` + this.article_alias + `/` + this.current_instruction_value + `/` + 'ua', {new_data: data}).then(response => {
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

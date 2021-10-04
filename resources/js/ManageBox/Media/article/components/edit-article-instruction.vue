<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Статьи<i class="fas fa-angle-right"></i> Текстовое поле RU <i class="fas fa-angle-right"></i>{{article_alias}}</h1>
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
            <router-link :to="{name:'edit_article_instruction', props: {'alias': this.article_alias}}" class="active orange"> Текстовое поле RU</router-link>
            <router-link :to="{name:'edit_article_instruction_ua', props: {'alias': this.article_alias}}" class="orange">Текстовое поле UA</router-link>
        </nav>
        <div class="reactive-ws" v-if="current_instruction_value != null">
            <div class="wsr ws-100">
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
            this.article_alias = this.$route.params.alias;
            this.getArticle();
            this.current_instruction_name = 'Текстовое поле Ru';
            this.current_instruction_value = 'trext-editor-1';
            $(document).ready(e => {
                $('[data-toggle="tooltip"]').tooltip()
            })
            this.getInstruction()
        },
        data: function(){
            return{
                //model data
                article_alias: null,
                current_instruction_name: null,
                current_instruction_value: null,
                current_instruction_data: '',

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
                        if(response.data.article_structure.setting !== null && response.data.article_structure.setting.float != false){
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

            //http

            getInstruction(){
                this.current_instruction_data = 'system_reload';
                this.model_status = 3;
                HTTP.get(`article/instruction/get/` + this.article_alias + `/` + 'ru').then(response => {
                    this.current_instruction_data = response.data.trext;
                    this.model_status = 4;
                })
            },

            updateInstructionData(data){
                this.model_status = 3;
                HTTP.post(`article/instruction/update/` + this.article_alias + `/` + 'ru', {new_data: data}).then(response => {
                    this.model_status = 4;
                })
            }

        },
    }
</script>

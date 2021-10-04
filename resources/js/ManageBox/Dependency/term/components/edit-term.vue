<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Термина <i class="fas fa-angle-right"></i> {{term_alias}}</h1>
                <div class="reactive-sub-titles" v-if="term_infoline_hidden">
<!--                    <infoline-->
<!--                        :i_class="'fas fa-spell-check'"-->
<!--                        :visual=term_infoline_hidden[0].title-->
<!--                        :hidden="term_infoline_hidden"-->
<!--                    ></infoline>-->
                    <router-link :to="{name:'terms'}" class="r-link">Вернуться на страницу Терминов</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <a class="active orange">Основное</a>
        </nav>
        <div class="reactive-ws" v-if="term_data">
            <div class="wsr ws-100">
                <div class="reactive-box">
                    <header class="box-header">
                        Локализация Названий
                    </header>
                    <ul class="box-content col">
                        <li class="list-item-col">
                            <h2 class="item-title">Название по-русски:</h2>
                            <div class="r-input-error">{{title_error}}</div>
                            <input type="text" class="r-input" v-model="term_data.title" @blur="updateTerm('title', term_data.title)" @keyup.enter="updateTerm('title', term_data.title)" :class="{error: title_error}" placeholder="Введите название термина для RU страниц">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Название по-украински:</h2>
                            <div class="r-input-error">{{utitle_error}}</div>
                            <input type="text" class="r-input" v-model="term_data.utitle" @blur="updateTerm('utitle', term_data.utitle)" @keyup.enter="updateTerm('utitle', term_data.utitle)" :class="{error: utitle_error}" placeholder="Введите термина препарата для UA страниц">
                        </li>
                    </ul>
                </div>
                <div class="flex-row-sb-s">
                    <div class="wsr ws-100">
                        <h2 class="trext-title">Значение термина RU:</h2>
                        <trext
                            :trextID=1
                            :trextData=term_data.term
                            @response="updateTermTrextRu"
                        ></trext>
                    </div>
                </div>

                <div class="flex-row-sb-s">
                    <div class="wsr ws-100">
                        <h2 class="trext-title">Значение термина UA:</h2>
                        <trext
                            :trextID=2
                            :trextData=term_data.uterm
                            @response="updateTermTrextUa"
                        ></trext>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>




<script>
    import {HTTP} from "../../http";

    export default {
        mounted() {
            this.term_id = this.$route.params.alias;
            if(this.term_id.toString().indexOf('-term') != -1){
                this.term_id = (this.$route.params.alias).replace(/-term/g, '');
                window.history.pushState('', '', document.location.origin + '/manage/dependency/term#/edit/' + this.term_id);
            }
            this.getTerm();
        },
        data: function(){
            return{
                //model data
                term_alias: null,
                term_id: null,
                term_data: [],
                title_error: null,
                utitle_error: null,
                //service data
                model_status: null,
                term_infoline_hidden: [],
            }
        },
        methods: {
            getTerm(){
                this.model_status = 3;
                HTTP.get(`term/get/id/` + this.term_id)
                    .then(response => {
                        this.term_data = response.data;
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                    })
            },
            updateTerm(type, model){
                this.model_status = 3;
                HTTP.post(`term/verify/` + this.term_alias, {
                    item_name: type,
                    item: model,
                }).then(response => {
                    this.updateTermScript(type, model)
                }).catch(error => {
                    var error_console_message = 'Неизвестная Ошибка!';
                    switch (error.response.status) {
                        case 422:
                            switch (type) {
                                case 'title':
                                    error_console_message = error.response.data;
                                    this.title_error = error_console_message;
                                    break;
                                case 'utitle':
                                    error_console_message = error.response.data;
                                    this.utitle_error = error_console_message;
                                    break;
                            }
                            break;
                    }
                    this.model_status = 4;
                    console.error('[Medpravda] => ' + error_console_message);
                })
            },
            updateTermScript(type, model){
                HTTP.post(`term/update/` + this.term_alias, {
                    item_name: type,
                    item: model,
                }).then(response => {
                    switch (type) {
                        case 'title':
                            window.history.pushState('', '', document.location.origin + '/manage/dependency/term#/edit/' + response.data.alias);
                            break;
                    }
                    this.term_data = response.data;
                    this.model_status = 4;
                })
            },
            updateTermTrextRu(data){
                this.updateTermScript('term', data);
            },
            updateTermTrextUa(data){
                this.updateTermScript('uterm', data);
            }
        },
        watch: {
            term_data(to){
                this.term_alias = to.alias;
                this.term_infoline_hidden = [{title: to.updated_at, info: 'Обновление Термина'}, {title: to.created_at, info: 'Создание Термина'}]
            },
        }
    }
</script>

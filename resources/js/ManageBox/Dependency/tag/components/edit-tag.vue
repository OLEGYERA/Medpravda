<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Тега <i class="fas fa-angle-right"></i> {{tag_alias}}</h1>
                <div class="reactive-sub-titles" v-if="tag_infoline_hidden">
<!--                    <infoline-->
<!--                        :i_class="'fas fa-spell-check'"-->
<!--                        :visual=tag_infoline_hidden[0].title-->
<!--                        :hidden="tag_infoline_hidden"-->
<!--                    ></infoline>-->
                    <router-link :to="{name:'tags'}" class="r-link">Вернуться на страницу Тегов</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <a class="active orange">Основное</a>
        </nav>
        <div class="reactive-ws" v-if="tag_data">
            <div class="wsr ws-100">
                <div class="reactive-box">
                    <header class="box-header">
                        Локализация Названий
                    </header>
                    <ul class="box-content col">
                        <li class="list-item-col">
                            <h2 class="item-title">Название по-русски:</h2>
                            <div class="r-input-error">{{title_error}}</div>
                            <input type="text" class="r-input" v-model="tag_data.title" @blur="updateTag('title', tag_data.title)" @keyup.enter="updateTag('title', tag_data.title)" :class="{error: title_error}" placeholder="Введите название термина для RU страниц">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Название по-украински:</h2>
                            <div class="r-input-error">{{utitle_error}}</div>
                            <input type="text" class="r-input" v-model="tag_data.utitle" @blur="updateTag('utitle', tag_data.utitle)" @keyup.enter="updateTag('utitle', tag_data.utitle)" :class="{error: utitle_error}" placeholder="Введите термина препарата для UA страниц">
                        </li>
                    </ul>
                </div>
                <div class="flex-row-sb-s">
                    <div class="wsr ws-100">
                        <h2 class="trext-title">Значение тега RU:</h2>
                        <trext
                            :trextID=1
                            :trextData=tag_data.term
                            @response="updateTagTrextRu"
                        ></trext>
                    </div>
                </div>

                <div class="flex-row-sb-s">
                    <div class="wsr ws-100">
                        <h2 class="trext-title">Значение тега UA:</h2>
                        <trext
                            :trextID=2
                            :trextData=tag_data.uterm
                            @response="updateTagTrextUa"
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
            this.tag_id = this.$route.params.alias;
            if(this.tag_id.toString().indexOf('-tag') != -1){
                this.tag_id = (this.$route.params.alias).replace(/-tag/g, '');
                window.history.pushState('', '', document.location.origin + '/manage/dependency/tag#/edit/' + this.tag_id);
            }
            this.getTag();
        },
        data: function(){
            return{
                //model data
                tag_alias: null,
                tag_id: null,
                tag_data: [],
                title_error: null,
                utitle_error: null,
                //service data
                model_status: null,
                tag_infoline_hidden: [],
            }
        },
        methods: {
            getTag(){
                this.model_status = 3;
                HTTP.get(`tag/get/id/` + this.tag_id)
                    .then(response => {
                        this.tag_data = response.data;
                        console.log(this.tag_data)
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                    })
            },
            updateTag(type, model){
                this.model_status = 3;
                HTTP.post(`tag/verify/` + this.tag_alias, {
                    item_name: type,
                    item: model,
                }).then(response => {
                    this.updateTagScript(type, model)
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
            updateTagScript(type, model){
                HTTP.post(`tag/update/` + this.tag_alias, {
                    item_name: type,
                    item: model,
                }).then(response => {
                    switch (type) {
                        case 'title':
                            window.history.pushState('', '', document.location.origin + '/manage/dependency/tag#/edit/' + response.data.alias);
                            break;
                    }
                    this.tag_data = response.data;
                    this.model_status = 4;
                })
            },
            updateTagTrextRu(data){
                this.updateTagScript('tag', data);
            },
            updateTagTrextUa(data){
                this.updateTagScript('utag', data);
            }
        },
        watch: {
            tag_data(to){
                this.tag_alias = to.alias;
                this.tag_infoline_hidden = [{title: to.updated_at, info: 'Обновление Тега'}, {title: to.created_at, info: 'Создание Тега'}]
            },
        }
    }
</script>

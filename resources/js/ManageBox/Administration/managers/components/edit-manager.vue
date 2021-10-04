<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title red">Редактировать Менеджера<i class="fas fa-angle-right"></i> Профиль <i class="fas fa-angle-right"></i><b v-if="manager_data.surname">{{manager_data.surname}} {{manager_data.name}} {{manager_data.middle_name}}</b><b v-else>{{manager_email}}</b></h1>
                <div class="reactive-sub-titles">
                    <infoline
                        :i_class="'far fa-clock'"
                        :visual="manager_data.updated_at"
                        :hidden="role_infoline_hidden"
                    ></infoline>
                    <router-link :to="{name:'managers'}" class="r-link">Вернуться на страницу менеджеров</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_manager', props: {'email': this.manager_email}}" class="active red">Профиль</router-link>
            <router-link v-if="manager_editor.active" :to="{name:'edit_manager_editor', props: {'email': this.manager_email}}" class="red" >Редактор</router-link>
        </nav>
        <div class="reactive-ws" v-if="manager_data.created_at && manager_avatar.created_at">
            <div class="wsr ws-30">
                <div class="reactive-nude-box">
                    <figure class="avatar">
                        <img v-bind:src="'/gallery/' + file_categories[manager_avatar.category_id - 1] + '/medium/' + manager_avatar.path" alt="">
                    </figure>
                    <gallery
                        :img_category="manager_avatar.category_id"
                        :upload_category="2"
                        :max_files="1"
                        :selectedFilesID="[manager_avatar.id]"
                        @fetch_imagies_id="changeManagerAvatar"
                    ></gallery>
                </div>
                <div class="reactive-box">
                    <header class="box-header">
                        Роль менеджера
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <selector
                                :placeholder="'Выбрать роль'"
                                :items="manager_rules"
                                :active_items="[manager_data.rule_id]"
                                @selected="updateManagerRule"
                            ></selector>
                        </li>
                    </ul>
                </div>
                <div class="reactive-box">
                    <ul class="box-content">
                        <li class="list-item-row" style="padding-bottom: 10px">
                            <switcher :id=1 :status="manager_editor.active" :color="'red'"  @toggle="switchEditor"></switcher>
                            <h2 class="data-title">Редактор</h2>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wsr ws-40">
                <div class="reactive-box">
                    <header class="box-header">
                        Авторизационные данные
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">E-mail:</h2>
                            <div class="r-input-error">{{manager_data_error.email}}</div>
                            <input type="text" class="r-input" v-model="manager_data.email" @blur="updateManager('email', manager_data.email)" @keyup.enter="updateManager('email', manager_data.email)" :class="{error: manager_data_error.email}" placeholder="Введите E-mail Менеджера">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Логин:</h2>
                            <div class="r-input-error">{{manager_data_error.login}}</div>
                            <input type="text" class="r-input" v-model="manager_data.login" @blur="updateManager('login', manager_data.login)" @keyup.enter="updateManager('login', manager_data.login)" :class="{error: manager_data_error.login}" placeholder="Введите Логин Менеджера">
                        </li>
                    </ul>
                </div>
                <div class="reactive-box">
                    <header class="box-header">
                        ФИО
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Фамилия:</h2>
                            <input type="text" class="r-input" v-model="manager_data.surname" @blur="updateManager('surname', manager_data.surname)" @keyup.enter="updateManager('surname', manager_data.surname)" :maxlength="30" placeholder="Введите Фамилию Менеджера">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Имя:</h2>
                            <input type="text" class="r-input" v-model="manager_data.name" @blur="updateManager('name', manager_data.name)" @keyup.enter="updateManager('name', manager_data.name)" :maxlength="30" placeholder="Введите Имя Менеджера">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Отчество:</h2>
                            <input type="text" class="r-input" v-model="manager_data.middle_name" @blur="updateManager('middle_name', manager_data.middle_name)" @keyup.enter="updateManager('name', manager_data.middle_name)" :maxlength="30" placeholder="Введите Отчество Менеджера">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                       Локация
                    </header>
                    <ul class="box-content">
                       <li class="list-item-col">
                            <h2 class="item-title">Страна:</h2>
                            <input type="text" class="r-input" v-model="manager_data.country" @blur="updateManager('country', manager_data.country)" @keyup.enter="updateManager('country', manager_data.country)" :maxlength="30" placeholder="Введите Страну Менеджера">
                       </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Город:</h2>
                            <input type="text" class="r-input" v-model="manager_data.city" @blur="updateManager('city', manager_data.city)" @keyup.enter="updateManager('city', manager_data.city)" :maxlength="30" placeholder="Введите Город Менеджера">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>




<script>
    import {HTTP} from "../../http";

    export default {
        mounted() {
            this.manager_email = this.$route.params.email;
            this.getManager();
        },
        data: function(){
            return{
                //model data
                manager_email: null,
                manager_data: [],
                manager_avatar: [],
                manager_rules: [],
                manager_editor: [],
                manager_data_error: [],
                file_categories: [
                    'Vne-Kategorii',
                    'Avatari',
                    'Diplomy',
                    'Preparaty'
                ],

                //service data
                model_status: null,

                //static data
                role_infoline_hidden: null,
                modal_cancel: {title: 'Отменить создание '},
            }
        },
        methods: {
            getManager(){
                this.model_status = 3;
                HTTP.get(`manager/get/` + this.manager_email)
                    .then(response => {
                        this.manager_data = response.data.manager;
                        this.manager_avatar = response.data.avatar;
                        this.manager_rules = response.data.rules;
                        this.manager_editor = response.data.editor;
                        this.model_status = 4;
                        console.log(5, this.manager_avatar);
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'managers'})
                    })
            },
            changeManagerAvatar(id){
                this.model_status = 3;
                HTTP.post(`manager/update/` + this.manager_email + '/avatar', {id: id})
                    .then(response => {
                        console.log(response);
                        this.manager_data = response.data.manager;
                        this.manager_avatar = response.data.avatar;
                        this.model_status = 4;
                    })
            },
            updateManager(type, model){
                this.model_status = 3;
                var data = {};
                    data[type] = model;
                HTTP.post(`manager/update/` + this.manager_email + '/' + type, data)
                    .then(response => {
                        if(type == 'email'){
                            window.history.pushState('', '', 'https://medpravda.ua/manage/administration/manager#/edit/' + response.data.manager.email);
                        }
                        if(type == 'editor'){
                            console.log(15, this.manager_editor);
                            this.manager_editor = response.data.editor;
                        }
                        this.manager_data = response.data.manager;
                        delete this.manager_data_error[type];
                        this.model_status = 4;

                    })
                    .catch(error => {
                        var error_console_message = 'Неизвестная Ошибка!';
                        switch (error.response.status) {
                            case 404:
                                error_console_message = error.response.data.message;
                                break;
                            case 422:
                                if(type == 'email'){
                                    error_console_message = error.response.data.errors.email[0];
                                    this.manager_data_error.email = error_console_message;
                                }else{
                                    error_console_message = error.response.data.errors.login[0];
                                    this.manager_data_error.login = error_console_message;
                                }
                                break;
                        }
                        this.model_status = 4;
                        console.error('[Medpravda] => ' + error_console_message);
                    })
            },
            updateManagerRule(data){
                this.updateManager('rule', data)
            },
            switchEditor(data){
                this.updateManager('editor', data.switch)
            }
        },
        watch: {
            manager_data(to){
                this.manager_email = to.email;
                this.role_infoline_hidden = [{title: to.updated_at, info: 'Обновление Менеджера'}, {title: to.created_at, info: 'Создание Менеджера'}]
            },
        }
    }
</script>

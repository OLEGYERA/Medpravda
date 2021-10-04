<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title red">Редактировать Роль <i class="fas fa-angle-right"></i> <b>{{role_data.title}}</b></h1>
                <div class="reactive-sub-titles">
                    <infoline
                            :i_class="'far fa-clock'"
                            :visual="role_data.updated_at"
                            :hidden="role_infoline_hidden"
                    ></infoline>
                    <router-link :to="{name:'rules'}" class="r-link">Вернуться на страницу Роллирования</router-link>
                </div>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation"></nav>
        <div class="reactive-ws" v-if="role_data.title">
            <div class="wsr ws-60">
                <div class="reactive-box">
                    <header class="box-header">
                        Навигационный доступ роли
                    </header>
                    <ul class="box-content">
                        <li class="list-item-row">
                            <switcher :id=1 :status=role_data.administration :color="'red'" :namespace="'administration'" @toggle="switchRuleCategory"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Администрирование</h2>
                                <div class="data-description">Роль дает менеджеру доступ к категории Администрирования с элементами панели управления. <i>Менеджер сможет просматривать, создавать, удалять и редактировать других менеджеров, пользователей, видоизменять <b>Роли</b></i>. При открытии доступа у вас появится бокс с правилами взадимодействия. Выберите правила уровня доступа! <b>Будьте внимательны! Это может привести к плохим последствиям!</b></div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=2 :status=role_data.moderation :color="'red'" :namespace="'moderation'" @toggle="switchRuleCategory"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Модерация</h2>
                                <div class="data-description">Роль дает менеджеру доступ к категории Модерация с элементами панели управления. <i>Менеджер сможет просматривать, удалять и модерировать отзывы</i>. При открытии доступа у вас появится бокс с правилами взадимодействия. Выберите правила уровня доступа!</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=3 :status=role_data.catalog :color="'red'" :namespace="'catalog'" @toggle="switchRuleCategory"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Справочник</h2>
                                <div class="data-description">Роль дает менеджеру доступ к категории Справочник с элементами панели управления. <i>Менеджер сможет просматривать, создавать, удалять и редактировать препараты, бады, мед. изделия, косм. средства и тд</i>. При открытии доступа у вас появится бокс с правилами взадимодействия. Выберите правила уровня доступа!</div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=4 :status=role_data.dependency :color="'red'" :namespace="'dependency'" @toggle="switchRuleCategory"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Зависимости</h2>
                                <div class="data-description">Роль дает менеджеру доступ к категории Зависимости с элементами панели управления. <i>Менеджер сможет просматривать, удалять и редактировать ATX, Производителя, Фарм.группу. МНН, Регистрация и тд</i>. При открытии доступа у вас появится бокс с правилами взадимодействия. Выберите правила уровня доступа! <b>Будьте внимательны! Это может привести к плохим последствиям!</b></div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=5 :status=role_data.history :color="'red'" :namespace="'history'" @toggle="switchRuleCategory"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">История</h2>
                                <div class="data-description">Роль дает менеджеру доступ к Истории управления данными. <i>Менеджер сможет выгружать и чистить <b>ВСЮ</b> историю, просматривать черновики других менеджеров</i>. При открытии доступа у вас появится бокс с правилами взадимодействия. Выберите правила уровня доступа! <b>Будьте внимательны! Это может привести к плохим последствиям!</b></div>
                            </div>
                        </li>
                        <li class="list-item-row">
                            <switcher :id=6 :status=role_data.gallery :color="'red'" :namespace="'gallery'" @toggle="switchRuleCategory"></switcher>
                            <div class="item-col-data">
                                <h2 class="data-title">Галерея</h2>
                                <div class="data-description">Роль дает менеджеру доступ к Галереи. <i>Менеджер сможет просматривать, добавлять, удалять и редактировать Фотографии.</i>. При открытии доступа у вас появится бокс с правилами взадимодействия. Выберите правила уровня доступа!</div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="wsr ws-40">
                <div class="reactive-box">
                    <header class="box-header">
                      Сервисные параметры
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Название:</h2>
                            <div class="r-input-error">{{role_title_error}}</div>
                            <input type="text" class="r-input" v-model="role_title" @blur="updateRuleTitle" @keyup.enter="updateRuleTitle" :class="{error: role_title_error!==null}">
                        </li>
                    </ul>
                </div>
                <div class="reactive-box" v-if="role_data.administration">
                    <header class="box-header">
                       Правила взаимодействия с Администрированием
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Страница <b>@</b>Менеджеры:</h2>
                            <status-coder
                                :namespace="'administration'"
                                :dataspace="'managers'"
                                :codestatus=role_data.managers
                                :color="'red'"
                                @updated_status="updateRuleStatus"
                            ></status-coder>
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Страница <b>@</b>Пользователи:</h2>
                            <status-coder
                                :namespace="'administration'"
                                :dataspace="'users'"
                                :codestatus=role_data.users
                                :color="'red'"
                                @updated_status="updateRuleStatus"
                            ></status-coder>
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Страница <b>@</b>Роллирование:</h2>
                            <status-coder
                                :namespace="'administration'"
                                :dataspace="'rules'"
                                :codestatus=role_data.rules
                                :color="'red'"
                                @updated_status="updateRuleStatus"
                            ></status-coder>
                        </li>
                    </ul>
                </div>
                <div class="reactive-box" v-if="role_data.moderation">
                    <header class="box-header">
                        Правила взаимодействия с Модерацией
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Страница <b>@</b>Комментарии:</h2>
                            <status-coder
                                :namespace="'moderation'"
                                :dataspace="'reviews'"
                                :codestatus=role_data.reviews
                                :color="'red'"
                                @updated_status="updateRuleStatus"
                            ></status-coder>
                        </li>
                    </ul>
                </div>
                <div class="reactive-box" v-if="role_data.catalog">
                    <header class="box-header">
                        Правила взаимодействия со Справочником
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Страница <b>@</b>Препараты:</h2>
                            <status-coder
                                :namespace="'catalog'"
                                :dataspace="'drug'"
                                :codestatus=role_data.drug
                                :color="'red'"
                                @updated_status="updateRuleStatus"
                            ></status-coder>
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
            this.role_alias = this.$route.params.alias;
            this.getRule();
        },
        data: function(){
            return{
                //model data
                role_alias: null,
                role_title: null,
                role_title_error: null,
                role_data: [],

                //service data
                model_status: null,

                //static data
                role_infoline_hidden: null,
                modal_cancel: {title: 'Отменить создание '},
            }
        },
        methods: {
            getRule(){
                this.model_status = 3;
                HTTP.get(`rule/get/` + this.role_alias)
                    .then(response => {
                        this.role_data = response.data;
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect')
                        this.$router.push({ name: 'rules'})
                    })
            },
            updateRuleTitle(){
                if(this.role_data.title !== this.role_title){
                    this.model_status = 3;
                    HTTP.post(`rule/update/` + this.role_alias + '/title', {title: this.role_title})
                        .then(response => {
                            this.role_data = response.data;
                            this.role_title_error = null;
                            this.model_status = 4;
                            window.history.pushState('', '', 'http://localhost:3000/manage/administration/rolling#/edit/' + response.data.alias);
                        })
                        .catch(error => {
                            switch (error.response.status) {
                                case 404:
                                    console.error('[Medpravda] => Данные не найдены при изменении названия правила!');
                                    break;
                                case 409:
                                    console.error('[Medpravda] => Ошибка связана с дублированием названия');
                                    this.role_title_error = error.response.data;
                                case 411:
                                    console.error('[Medpravda] => Ошибка связана с количеством символов');
                                    this.role_title_error = error.response.data;
                            }
                            this.model_status = 4;
                        })
                }
            },
            updateRuleStatus(data){
                this.model_status = 3;
                HTTP.post(`rule/update/` + this.role_alias + '/status', data)
                    .then(response => {
                        this.role_data = response.data;
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не найдены при изменении статуса правила!');
                        this.model_status = 4;
                    })
            },
            switchRuleCategory(data){
                this.model_status = 3;
                HTTP.post(`rule/switch/` + this.role_alias + '/category', data)
                    .then(response => {
                        this.role_data = response.data;
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не найдены при изменении категории правила!');
                        this.model_status = 4;
                    })
            },
            deleteRule(){
                this.model_status = 3;
                HTTP.delete(`rule/delete/` + this.role_data.id)
                    .then(response => {
                        this.model_status = 4;
                        this.exitFromPage();
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось изменить!');
                        this.model_status = 4;
                    })
            },
            exitFromPage(){
                this.$router.push({ name: 'rules'})
            },
        },
        watch: {
            role_data(to){
                this.role_title = to.title;
                this.role_alias = to.alias;
                this.role_infoline_hidden = [{title: to.updated_at, info: 'Обновление роли'}, {title: to.created_at, info: 'Создание Роли'}]
            },
        }
    }
</script>

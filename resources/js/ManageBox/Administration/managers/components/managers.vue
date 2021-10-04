<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title">Администрирование Менеджерами</h1>
                <div class="reactive-sub-titles" v-if="1">
<!--                    this.managers.length-->
                    <infoline
                        :i_class="'fas fa-users-cog'"
                        :visual=0
                        :hidden="managers_infoline_hidden"
                    ></infoline>
                    <a :href="link_to_managers" class="r-link">Перейти на страницу роллирования</a>
                </div>
            </div>
            <div class="header-right">
                <add
                    :item="0"
                    :title="'Добавить Менеджера'"
                    :type="'email'"
                    :placeholder="'Введите email нового менеджера'"
                    :desc="'После добавления менеджера вас перенесет в панель редактирования. <br> Логин и пароль будут <b>автоматически</b> сформированны!'"
                    :verification_url="'administration/manager/verify'"
                    @create_item_and_edit="createAndEdit"
                    @create_item_and_exit="createAndExit"
                >
                </add>
            </div>

        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active red">Все менеджеры</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table red">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search"></i>
                                <input type="text" v-model="search" placeholder="Поиск менеджеров RU | Alias">
                            </label>
                            <pagination :current_paginate="current_paginate" :last_paginate="last_paginate" :color="'red'" @currentPaginate="getCurrentPaginate"></pagination>
                            <div class="sort flex-row-e-c">
                                <label @click="filter_status = !filter_status">Количество записей: </label>
                                <selector
                                    :placeholder="'Показать 20'"
                                    :filter_status=filter_status
                                    :items=selector_items
                                    @selected="updateFilter"
                                ></selector>
                            </div>
                        </div>
                    </div>
                    <div class="table-content">
                        <div class="thead">
                            <div class="col cl-s center">Защита</div>
                            <div class="col cl-m center">Управление</div>
                            <div class="col cl-l">ФИО</div>
                            <div class="col cl-l">E-mail</div>
                            <div class="col cl-l center">Обновлено / Создано</div>
                        </div>
                        <div class="tbody" v-if="managers">
                            <div class="tr-tbody" v-for="manager in managers">
                                <div class="col cl-s center error" v-if="manager.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="$router.push({ name: 'edit_manager', params: { email: manager.email }})"></i>
                                </div>
                                <div class="col cl-l" v-html="(manager.surname || manager.name || manager.middle_name) ? manager.surname + ' ' + manager.name + ' ' + manager.middle_name : '<b>Отсутсвует</b>'"></div>
                                <div class="col cl-l">{{manager.email}}</div>
                                <div class="col cl-l center double"><span>{{manager.updated_at}}</span><span>{{manager.created_at}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {HTTP} from '../../http.js'
    export default {
        mounted() {
            this.getManagers()
            this.link_to_managers = document.location.origin + '/manage/administration/rolling#/all'
        },
        data: function(){
            return{
                //model
                search: null,
                search_email: false,
                current_paginate: 1,
                last_paginate: null,
                filter: null,

                //array
                managers: null,
                //services
                managers_infoline_hidden: null,
                link_to_managers: null,

                selector_items: [{title: 'Показать 1', value: 1},{title: 'Показать 5', value: 5}],
                filter_status: false,
            }
        },
        methods: {
            getManagers(search_for_email){
                HTTP.post(`manager/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_email ? search_for_email :this.search,
                    search_email: this.search_email
                })
                    .then(response => {
                        this.managers = response.data.managers.data;
                        this.current_paginate = response.data.managers.current_page;
                        this.last_paginate = response.data.managers.last_page;
                        this.managers_infoline_hidden = [{title: response.data.managers.data.length, info: 'ролей сейчас на странице'}, {title: response.data.count, info: 'всего ролей в панели управления'}]

                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            createAndEdit(manager_email){
                HTTP.post(`manager/create`, {email: manager_email})
                    .then(response => {
                        this.$router.push({ name: 'edit_manager', params: { email: response.data.email }})
                    }).catch(error => {})
            },
            createAndExit(manager_email){
                HTTP.post(`manager/create`, {email: manager_email}).then(response => {this.getManagers()})
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getManagers()
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getManagers();
            }
        },
        watch: {
            search(){
                this.getManagers();
            }
        }
    }
</script>

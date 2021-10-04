<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title">Администрирование Роллированием</h1>
                <div class="reactive-sub-titles" v-if="this.rules">
                    <infoline
                        :i_class="'fas fa-user-shield'"
                        :visual=this.rules.length
                        :hidden="rules_infoline_hidden"
                    ></infoline>
                    <a :href="link_to_managers" class="r-link">Перейти на страницу менеджеров</a>
                </div>
            </div>
            <div class="header-right">
                <add
                    :title="'Добавить Роль'"
                    :type="'name'"
                    :placeholder="'Введите название новой роли'"
                    :desc="'После добавления роли вас перенесет в панель редактирования. <br> Данные будут <b>автоматически</b> сформированны!'"
                    :verification_url="'administration/rule/verify'"
                    @create_item_and_edit="createAndEdit"
                    @create_item_and_exit="createAndExit"
                >
                </add>
            </div>

        </div>
        <nav class="reactive-navigation">
            <router-link to="/" class="active red">Все роли</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100">
                <div class="r-table red">
                    <div class="table-header">
                        <div class="table-toolbar">
                            <label class="r-search">
                                <i class="fas fa-search" :class="{alias: search_alias}"></i>
                                <input type="text" v-model="search" placeholder="Поиск ролей RU | Alias">
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
                            <div class="col cl-xxl">Название</div>
                            <div class="col cl-l center">Обновлено / Создано</div>
                        </div>
                        <div class="tbody" v-if="rules">
                            <div class="tr-tbody" v-for="rule in rules">
                                <div class="col cl-s center error" v-if="rule.protection">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="col cl-s center success" v-else>
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <div class="col cl-m center manage">
                                    <i class="fas fa-pen" @click="$router.push({ name: 'edit_rule', params: { alias: rule.alias }})"></i>
                                    <delete :title="'Удалить роль <strong>' + rule.title + '</strong>?'"
                                            :mode="'list'"
                                            :desc="'При удалении роли все инициализированные данные будут безвозвратно <b>удалены</b>!<br>Примите правильное решение!'"
                                            @delete="deleteRule(rule.id)"
                                    ></delete>
                                </div>
                                <div class="col cl-xxl">{{rule.title}}</div>
                                <div class="col cl-l center double"><span>{{rule.updated_at}}</span><span>{{rule.created_at}}</span></div>
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
            this.getRules()
            this.link_to_managers = document.location.origin + '/manage/administration/manager#/all'
        },
        data: function(){
            return{
                //model
                search: null,
                search_alias: false,
                current_paginate: 1,
                last_paginate: null,
                filter: null,

                //array
                rules: null,
                //services
                rules_infoline_hidden: null,
                link_to_managers: null,

                selector_items: [{title: 'Показать 1', value: 1},{title: 'Показать 5', value: 5}],
                filter_status: false,
            }
        },
        methods: {
            getRules(search_for_alias){
                HTTP.post(`rule/get/all?page=` + this.current_paginate, {
                    filter: this.filter,
                    search: search_for_alias ? search_for_alias : this.search,
                    search_alias: this.search_alias
                })
                    .then(response => {
                        this.rules = response.data.rules.data;
                        this.current_paginate = response.data.rules.current_page;
                        this.last_paginate = response.data.rules.last_page;
                        this.rules_infoline_hidden = [{title: response.data.rules.data.length, info: 'ролей сейчас на странице'}, {title: response.data.count, info: 'всего ролей в панели управления'}]

                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            deleteRule(id){
                HTTP.delete(`rule/delete/` + id)
                    .then(response => {
                        this.getRules()
                    })
                    .catch(error => {
                        console.error('[Medpravda] => Данные не удалось удалить!');
                    })
            },
            createAndEdit(rule_title){
                HTTP.post(`rule/create`, {title: rule_title})
                    .then(response => {
                        this.$router.push({ name: 'edit_rule', params: { alias: response.data.alias }})
                    }).catch(error => {})

            },
            createAndExit(rule_title){
                HTTP.post(`rule/create`, {title: rule_title}).then(response => {this.getRules()})
            },
            updateFilter(val){
                this.filter = val;
                this.current_paginate = 1;
                this.getRules()
            },
            getCurrentPaginate(data){
                this.current_paginate = data;
                this.getRules();
            }
        },
        watch: {
            search(){
                this.getRules();
            }
        }
    }
</script>

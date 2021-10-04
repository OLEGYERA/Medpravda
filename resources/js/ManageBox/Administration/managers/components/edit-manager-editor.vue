<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title red">Редактировать Менеджера<i class="fas fa-angle-right"></i>Редактор<i class="fas fa-angle-right"></i><b v-if="manager_data.surname">{{manager_data.surname}} {{manager_data.name}} {{manager_data.middle_name}}</b><b v-else>{{manager_email}}</b></h1>
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
            <router-link :to="{name:'edit_manager', props: {'email': this.manager_email}}" class="red">Профиль</router-link>
            <router-link :to="{name:'edit_manager', props: {'email': this.manager_email}}" class="active red">Редактор</router-link>
        </nav>
        <div class="reactive-ws" v-if="manager_editor_data.created_at">
            <div class="wsr ws-30">
                <div class="reactive-nude-box">
                    <gallery
                        :img_category="3"
                        :upload_category="3"
                        :max_files="10"
                        :selectedFilesID="manager_editor_id_diploms"
                        @fetch_imagies_id="changeEditorDiploms"
                    ></gallery>
                    <figure class="avatar" v-for="diplom in manager_editor_diploms">
                        <img v-bind:src="'/gallery/' + file_categories[diplom.category_id - 1] + '/medium/' + diplom.path" alt="">
                    </figure>
                </div>
            </div>
            <div class="wsr ws-40">
                <div class="reactive-box">
                    <header class="box-header">
                        Научный Вид Деятельности
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Специальность:</h2>
                            <input type="text" class="r-input" v-model="manager_editor_data.specialty" @blur="updateEditor('specialty', manager_editor_data.specialty)" @keyup.enter="updateEditor('specialty', manager_editor_data.specialty)"  placeholder="Введите Специальность Редактора">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Специализация:</h2>
                            <input type="text" class="r-input" v-model="manager_editor_data.specialization" @blur="updateEditor('specialization', manager_editor_data.specialization)" @keyup.enter="updateEditor('specialization', manager_editor_data.specialization)"  placeholder="Введите Специализацию Редактора">
                        </li>
                        <li class="list-item-col" style="padding-bottom: 10px">
                            <h2 class="data-title">Ученное звание:</h2>
                            <selector
                                :placeholder="'Выбрать роль'"
                                :items="manager_editor_ranks"
                                :active_items="[manager_editor_data.rank_id]"
                                @selected="updateEditorRank"
                            ></selector>
                        </li>
                    </ul>
                </div>
                <div class="reactive-box">
                    <header class="box-header">
                       Cоцсети
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Facebook:</h2>
                            <input type="text" class="r-input" v-model="manager_editor_data.facebook" @blur="updateEditor('facebook', manager_editor_data.facebook)" @keyup.enter="updateEditor('facebook', manager_editor_data.facebook)" :maxlength="200" placeholder="Введите ссылку на Facebook Редактора">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Instagram:</h2>
                            <input type="text" class="r-input" v-model="manager_editor_data.instagram" @blur="updateEditor('instagram', manager_editor_data.instagram)" @keyup.enter="updateEditor('instagram', manager_editor_data.instagram)" :maxlength="200" placeholder="Введите ссылку на Instagram Редактора">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wsr ws-30">
                <div class="reactive-box">
                    <header class="box-header">
                        Образование
                    </header>
                    <ul class="box-content">
                        <li class="list-item-col">
                            <h2 class="item-title">Образование:</h2>
                            <textarea class="r-input" v-model="manager_editor_data.education" @blur="updateEditor('education', manager_editor_data.education)" @keyup.enter="updateEditor('education', manager_editor_data.education)" placeholder="Образование редактора"></textarea>
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
            this.getEditor();
        },
        data: function(){
            return{
                //model data
                manager_email: null,
                manager_data: [],
                manager_editor_data: [],
                manager_editor_ranks: [],
                manager_editor_id_diploms: [],
                manager_editor_diploms: [],
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
            getEditor(){
                this.model_status = 3;
                HTTP.get(`manager/get/` + this.manager_email + '/editor')
                    .then(response => {
                        console.log(5);
                        this.manager_data = response.data.manager;
                        this.manager_editor_data = response.data.editor;
                        this.manager_editor_ranks = response.data.ranks;
                        this.manager_editor_diploms = response.data.diploms;
                        this.manager_editor_id_diploms = response.data.id_diploms;
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        // this.$router.push({ name: 'managers'})
                    })
            },
            updateEditor(type, model){
                this.model_status = 3;
                var data = {};
                data[type] = model;
                HTTP.post(`manager/update/` + this.manager_email + '/editor/' + type, data)
                    .then(response => {
                        console.log(response);
                        this.manager_editor_data = response.data.editor;
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

            changeEditorDiploms(ids){
                console.log(this.manager_email)
                this.model_status = 3;
                HTTP.post(`manager/update/` + this.manager_email + '/editor/diploms', {ids: ids})
                    .then(response => {
                        this.manager_editor_diploms = response.data.diploms;
                        this.manager_editor_id_diploms = response.data.id_diploms;
                        this.model_status = 4;
                    })
            },
            updateEditorRank(data){
                this.updateEditor('rank', data)
            },
        },
        watch: {
            manager_data(to){
                this.manager_email = to.email;
                this.role_infoline_hidden = [{title: to.updated_at, info: 'Обновление Менеджера'}, {title: to.created_at, info: 'Создание Менеджера'}]
            },
        }
    }
</script>

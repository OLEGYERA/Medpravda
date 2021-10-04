<template>
    <div class="r-modal r-modal-create" :class="method_processed" v-if="active">
        <transition name="slide-fade">
            <div class="modal-box" :class="type_creation" v-if="active">
                <header class="box-header">
                    <h2 class="header-title">
                        Создать {{modal_title}}
                    </h2>
                    <i class="fas fa-plus modal-cancel" @click="cancelModal"></i>
                </header>
                <main class="box-body">
                    <div class="box-preview">
                        <i class="fas fa-check-circle" :class="status"></i>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="box-form" v-if="type_creation == 'classes'">
                        <label for="modal-create-title" :class="{active: label_title}">Название на русском</label>
                        <div class="r-input-error">{{error_title}}</div>
                        <input type="text" id="modal-create-title" class="r-input" v-model="title" @focus="label_title = true" @blur="(label_title = false, verifyData('title'))" v-bind:placeholder="'Введите название [' + modal_title + '] по-русски'">

                        <label for="modal-create-utitle" :class="{active: label_utitle}">Название на украинском</label>
                        <div class="r-input-error">{{error_utitle}}</div>
                        <input type="text" id="modal-create-utitle" class="r-input" v-model="utitle" @focus="label_utitle = true" @blur="label_utitle = false, verifyData('utitle')" v-bind:placeholder="'Введите название [' + modal_title + '] по-украински'">

                        <label for="modal-create-classes" :class="{active: label_classes}">Название Класса</label>
                        <div class="r-input-error">{{error_classes}}</div>
                        <input type="text" id="modal-create-classes" class="r-input" v-model="classes" @focus="label_classes = true" @blur="label_classes = false, verifyData('classes')" v-bind:placeholder="'Введите название Класса [' + modal_title + '] латиница + цифри'">
                    </div>
                    <div class="box-form" v-else-if="type_creation == 'titles'">
                        <label for="modal-create-title" :class="{active: label_title}">Название на русском</label>
                        <div class="r-input-error">{{error_title}}</div>
                        <input type="text" id="modal-create-title" class="r-input" v-model="title" @focus="label_title = true" @blur="(label_title = false, verifyData('title'))" v-bind:placeholder="'Введите название [' + modal_title + '] по-русски'">

                        <label for="modal-create-utitle" :class="{active: label_utitle}">Название на украинском</label>
                        <div class="r-input-error">{{error_utitle}}</div>
                        <input type="text" id="modal-create-utitle" class="r-input" v-model="utitle" @focus="label_utitle = true" @blur="label_utitle = false, verifyData('utitle')" v-bind:placeholder="'Введите название [' + modal_title + '] по-украински'">
                    </div>
                    <div class="box-form" v-else-if="type_creation == 'titles_four'">
                        <label for="modal-create-title" :class="{active: label_title}">Название на русском</label>
                        <div class="r-input-error">{{error_title}}</div>
                        <input type="text" id="modal-create-title" class="r-input" v-model="title" @focus="label_title = true" @blur="(label_title = false, verifyData('title'))" v-bind:placeholder="'Введите название [' + modal_title + '] по-русски'">

                        <label for="modal-create-utitle" :class="{active: label_utitle}">Название на украинском</label>
                        <div class="r-input-error">{{error_utitle}}</div>
                        <input type="text" id="modal-create-utitle" class="r-input" v-model="utitle" @focus="label_utitle = true" @blur="label_utitle = false, verifyData('utitle')" v-bind:placeholder="'Введите название [' + modal_title + '] по-украински'">


                        <label for="modal-create-full-title" :class="{active: label_full_title}">Полное название на русском</label>
                        <div class="r-input-error">{{error_full_title}}</div>
                        <input type="text" id="modal-create-full-title" class="r-input" v-model="full_title" @focus="label_full_title = true" @blur="label_full_title = false, verifyData('full_title')" v-bind:placeholder="'Введите полное название [' + modal_title + '] по-русски'">

                        <label for="modal-create-full-utitle" :class="{active: label_full_utitle}">Полное название на украинском</label>
                        <div class="r-input-error">{{error_full_utitle}}</div>
                        <input type="text" id="modal-create-full-utitle" class="r-input" v-model="full_utitle" @focus="label_full_utitle = true" @blur="label_full_utitle = false, verifyData('full_utitle')" v-bind:placeholder="'Введите полное название [' + modal_title + '] по-украински'">
                    </div>
                    <div class="box-form" v-else>
                        <label for="modal-create-title" :class="{active: label_title}">Название</label>
                        <div class="r-input-error">{{error_title}}</div>
                        <input type="text" id="modal-create-title" class="r-input" v-model="title" @focus="label_title = true" @blur="(label_title = false, verifyData('title'))" v-bind:placeholder="'Введите название [' + modal_title + ']'">
                   </div>
                    <div class="box-manager" v-if="status == 'success'">
                        <button class="btn-modal warning" @click="createData('Do')">Создать и выбрать</button>
                        <button class="btn-modal success" @click="createData('X')">Создать</button>
                    </div>
                </main>
            </div>
        </transition>
    </div>
</template>

<script>
    import {HTTP} from "../../../http.js";
    export default {
        props: ['method_processed', 'type_creation', 'url', 'modal_title', 'callBack'],
        mounted() {
        },
        data: function(){
            return{
                classes: null,
                label_classes: null,
                error_classes: null,

                title: null,
                label_title: false,
                error_title: null,
                utitle: null,
                label_utitle: false,
                error_utitle: null,

                full_title: null,
                label_full_title: false,
                error_full_title: null,
                full_utitle: null,
                label_full_utitle: false,
                error_full_utitle: null,
                //services
                active: false,
            }
        },
        methods: {
            //http
            createData(type = ''){
                let data = {};
                switch (this.type_creation) {
                    case 'classes':
                        data = {
                            class: this.classes,
                            title: this.title,
                            utitle: this.utitle,
                        }
                        break;
                    case 'titles_four':
                        data = {
                            title: this.title,
                            utitle: this.utitle,
                            full_title: this.full_title,
                            full_utitle: this.full_utitle
                        }
                        break;
                    case 'titles':
                        data = {
                            title: this.title,
                            utitle: this.utitle,
                        }
                        break;
                    case 'title':
                        data = {
                            title: this.title,
                        }
                        break;
                }
                HTTP.post(this.url + '/create', data).then(response => {
                    this.$emit('created' + type, response.data);
                    if(this.status == 'success') {
                        this.cancelModal();
                    }
                })
            },
            verifyData(type){
                let data = {};
                switch (type) {
                    case 'classes':
                        data = {item_name: 'class', item: this.classes};
                        break;
                    case 'title':
                        data = {item_name: type, item: this.title};
                        break;
                    case 'utitle':
                        data = {item_name: type, item: this.utitle};
                        break;
                    case 'full_title':
                        data = {item_name: type, item: this.full_title};
                        break;
                    case 'full_utitle':
                        data = {item_name: type, item: this.full_utitle};
                        break;
                }

                HTTP.post(this.url + '/verify', data).then(response => {
                    switch (type) {
                        case 'classes':
                            this.error_classes = null;
                            break;
                        case 'title':
                            this.error_title = null;
                            break;
                        case 'utitle':
                            this.error_utitle = null;
                            break;
                        case 'full_title':
                            this.error_full_title = null;
                            break;
                        case 'full_utitle':
                            this.error_full_utitle = null;
                            break;

                    }
                }).catch(error => {
                    switch (type) {
                        case 'classes':
                            this.error_classes = error.response.data;
                            break;
                        case 'title':
                            this.error_title = error.response.data;
                            break;
                        case 'utitle':
                            this.error_utitle = error.response.data;
                            break
                        case 'full_title':
                            this.error_full_title = error.response.data;
                            break;
                        case 'full_utitle':
                            this.error_full_utitle = error.response.data;
                            break;
                    }
                })
            },

            //services

            cancelModal(){
                this.active = false;
            },
            clearData(){
                this.classes = null;
                this.error_classes = null;
                this.title = null;
                this.error_title = null;
                this.utitle = null;
                this.error_utitle = null;
                this.full_title = null;
                this.error_full_title = null;
                this.full_utitle = null;
                this.error_full_utitle = null;
            }
        },
        computed: {
            status(){
                switch (this.type_creation) {
                    case 'classes':
                        if(this.error_title == null && this.error_utitle == null && this.error_classes == null){
                            if(this.title == null || this.utitle == null || this.classes == null){
                                return 'warning';
                            }
                            else{
                                return 'success';
                            }
                        }else{
                            return 'error';
                        }
                        break;
                    case 'titles_four':
                        if(this.error_title == null && this.error_utitle == null && this.error_full_title == null && this.error_full_utitle == null){
                            if(this.title == null || this.utitle == null || this.full_title == null || this.full_utitle == null){
                                return 'warning';
                            }
                            else{
                                return 'success';
                            }
                        }else{
                            return 'error';
                        }
                        break;
                    case 'titles':
                        if(this.error_title == null && this.error_utitle == null){
                            if(this.title == null || this.utitle == null){
                                return 'warning';
                            }
                            else{
                                return 'success';
                            }
                        }else{
                            return 'error';
                        }
                        break;
                    case 'title':
                        if(this.error_title == null){
                            if(this.title == null){
                                return 'warning';
                            }
                            else{
                                return 'success';
                            }
                        }else{
                            return 'error';
                        }
                        break;
                }

            }
        },
        watch: {
            callBack(){
                this.clearData();
                this.active = !this.active;
            }
        }

    }
</script>

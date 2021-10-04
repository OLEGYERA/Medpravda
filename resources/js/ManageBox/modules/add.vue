<template>
    <div class="r-add">
        <div class="r-btn r-lnk" @click="openModal()">{{title}}</div>
        <transition name="slide-fade">
            <div class="modal-window" v-if="active">
                <div class="modal-content">
                    <div class="icon-field">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="content-field flex-col-sb-s">
                        <h1 class="modal-title">
                            {{title}}
                            <span class="input-error">
                                {{item_title_error}}
                                {{item_utitle_error}}
                            </span>
                        </h1>
                        <input type="text" v-bind:placeholder="placeholder" class="r-input" :class="{error: item_title_error !== null}" v-model="item_title" @keyup.enter="createItem(true)">
                        <input type="text" v-if="uplaceholder" v-bind:placeholder="uplaceholder" class="r-input" :class="{error: item_utitle_error !== null}" v-model="item_utitle" @keyup.enter="createItem(true)">
                        <div class="modal-desc" v-html="desc"></div>
                        <div class="modal-manage">
                            <button class="btn-modal m-error" @click="back">Отменить создание</button>
                            <button class="btn-modal m-warning" @click="createItem(false)">Сохранить</button>
                            <button class="btn-modal m-success" @click="createItem(true)">Сохранить и редактировать</button>
                        </div>
                    </div>
                </div>
            </div >
        </transition>
    </div>
</template>

<script>
    import {HTTP} from "../../http.js";
    export default {
        props: ['title', 'desc', 'verification_url', 'uverification_url', 'type', 'placeholder', 'uplaceholder'],
        data: function(){
            return{
                active: false,
                item_title: null,
                item_title_error: null,
                item_utitle: null,
                item_utitle_error: null,
            }
        },
        methods: {
            createItem(edit){
                if(this.uplaceholder){
                    if(this.item_title_error === null && this.item_title !== null && this.item_utitle_error === null && this.item_utitle !== null){
                        this.active = false;
                        if(edit){
                            this.$emit('create_item_and_edit', {title: this.item_title, utitle: this.item_utitle});
                        }else{
                            this.$emit('create_item_and_exit', {title: this.item_title, utitle: this.item_utitle});
                        }
                        this.item_title = null;
                        this.item_utitle = null;
                    }else if(this.item_title === null){
                        this.item_title_error = 'Название отсутсвует!'
                    }
                    else if(this.item_utitle === null){
                        this.item_utitle_error = 'Название отсутсвует!'
                    }

                }else{
                    if(this.item_title_error === null && this.item_title !== null){
                        this.active = false;
                        if(edit){
                            this.$emit('create_item_and_edit', this.item_title);
                        }else{
                            this.$emit('create_item_and_exit', this.item_title);
                        }
                        this.item_title = null;
                    }else if(this.item_title === null && this.type == 'name'){
                        this.item_title_error = 'Название отсутсвует!'
                    }
                    else if(this.item_title === null && this.type == 'email'){
                        this.item_title_error = 'Email отсутсвует!'
                    }
                }

            },

            openModal(){
                this.active = true;
            },
            back(){
                this.active = false;
                this.item_title = null;
                this.item_title_error = null;
            }
        },
        watch: {
            item_title(to, from){
                if(this.active){
                    switch (this.type) {
                        case 'name':
                            var data = {item_title: to}
                            break;
                        case 'email':
                            var data = {email: to}
                            break;
                    }
                    HTTP.post(this.verification_url, data)
                        .then(response => {
                            this.item_title_error = null;
                        })
                        .catch(error => {
                            if(error.response.data.errors){
                                if(this.type === 'email'){
                                    this.item_title_error = error.response.data.errors.email[0];
                                }
                            }else{
                                this.item_title_error = error.response.data;
                            }
                            switch(error.response.status){
                                case 411:
                                    console.error('[Medpravda] => Ошибка связана с количеством символов');
                                    break;
                                case 409:
                                    console.error('[Medpravda] => Ошибка связана с дублированием названия');
                                    break;
                                case 422:
                                    console.error('[Medpravda] => Ошибка связана с некоректным e-mail адресом');
                            }
                        })
                }
            },
            item_utitle(to, from){
                if(this.active){
                    HTTP.post(this.uverification_url, {item_utitle: to})
                        .then(response => {
                            this.item_utitle_error = null;
                        })
                        .catch(error => {
                            this.item_utitle_error = error.response.data;
                            switch(error.response.status){
                                case 411:
                                    console.error('[Medpravda] => Ошибка связана с количеством символов');
                                    break;
                                case 409:
                                    console.error('[Medpravda] => Ошибка связана с дублированием названия');
                                    break;
                                case 422:
                                    console.error('[Medpravda] => Ошибка связана с некоректным e-mail адресом');
                            }
                        })
                }
            }
        }
    }
</script>

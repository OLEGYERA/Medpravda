<template>
    <div class="r-drop-gallery-menu">
        <div class="visual-box" @click="dropMenuToggle" :class="{active: active}">
            <h3 class="visual-box-title">Настройки</h3>
            <i class="fas fa-chevron-down"></i>
        </div>
        <ul class="hidden-box" v-if="active">
            <li>Просмотреть</li>
            <li class="warning" @click="dropEditToggle">
                Изменить
            </li>
            <li class="error" @click="dropDeleteToggle">Удалить</li>
        </ul>
        <div class="hidden-sub-box" v-if="active_edit || active_delete">
            <div class="edit-hidden-sub-box" v-if="active_edit">
                <div class="sub-header">
                    Редактировать Изображение <i class="fas fa-times" @click="dropEditToggle"></i>
                </div>
                <div class="sub-content">
                    <label v-bind:for="'img-title-' + data.id">
                        Название фото <span>*необязательно, но желательно</span>
                    </label>
                    <input type="text" class="r-input" v-model="title" v-bind:id="'img-title-' + data.id" placeholder="Придумайте название для фото" :maxlength="70" @blur="modelBlur('title')">
                    <label v-bind:for="'img-alt-' + data.id">
                        Описание фото <span>*необязательно, но желательно</span>
                    </label>
                    <input type="text" class="r-input" v-model="alt" v-bind:id="'img-alt-' + data.id" placeholder="Придумайте описание для фото" :maxlength="125" @blur="modelBlur('alt')">
                </div>
            </div>
            <div class="delete-hidden-sub-box" v-if="active_delete">
                <div class="sub-header">
                    Удаление <i class="fas fa-times" @click="dropDeleteToggle"></i>
                </div>
                <div class="sub-content">
                    <h3>Удалить изображение?</h3>
                    <div class="gallery-btn-error" @click="deleteItem">Удалить</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {HTTP} from "../../http";

    export default {
        props: ['data'],
        mounted() {
            this.title = this.data.title;
            this.alt = this.data.alt;
        },
        data: function(){
            return{
                active: false,
                active_edit: false,
                active_delete: false,
                title: null,
                alt: null,
            }
        },
        methods: {
            dropMenuToggle(){
                if(this.active){
                    this.active = false;
                }else{
                    this.active = true;
                }
            },
            dropEditToggle(){
                if(this.active_edit){
                    this.active_edit = false;
                    this.active = false;
                }else{
                    this.active_edit = true;
                }
            },
            dropDeleteToggle(){
                if(this.active_delete){
                    this.active_delete = false;
                    this.active = false;
                }else{
                    this.active_delete = true;
                }
            },

            modelBlur(type){
                if(type == 'title'){
                    var data = {title:this.title}
                }else{
                    var data = {alt:this.alt}
                }
                HTTP.post(`gallery/edit/` + this.data.id, data)
                    .then(response => {
                        this.title = response.data.title;
                        this.alt = response.data.alt;
                        this.$emit('update', response.data);
                    })
                    .catch(error => {
                        console.log('Произошла Ошибка во время обновления данных.');
                    })
            },
            deleteItem(){
                HTTP.delete(`gallery/delete/` + this.data.id)
                    .then(response => {
                        this.$emit('delete');
                    })
                    .catch(error => {
                        console.log('Произошла Ошибка во время удаления данных.');
                    })
            }
        },
    }
</script>

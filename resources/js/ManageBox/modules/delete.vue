<template>
    <div class="r-delete">
        <div class="visual-circle-icon" @click="openModal()" v-if="mode == 'page'"><i class="fas fa-trash-alt"></i></div>
        <div class="visual-icon" @click="openModal()" v-else-if="mode == 'list'"><i class="fas fa-trash-alt"></i></div>
        <transition name="slide-fade">
            <div class="modal-window" v-if="active">
            <div class="modal-content">
                <div class="icon-field" :class="{list_size: mode == 'list'}">
                    <div class="left-icon"><i class="fas fa-trash-alt"></i></div>
                    <div class="right-icon"><i class="fas fa-trash-alt"></i></div>
                </div>
                <div class="content-field flex-col-sb-s">
                    <h1 class="modal-title" v-html="title"></h1>
                    <div class="modal-desc" v-html="desc"></div>
                    <div class="modal-manage">
                        <button class="btn-modal m-error" @click="deleteIt">Удалить безвозвратно</button>
                        <button class="btn-modal m-warning" @click="exit" v-if="mode == 'edit'">Выйти из редактирования</button>
                        <button class="btn-modal m-success" @click="backToPage">Назад</button>
                    </div>
                </div>
            </div>
        </div >
        </transition>
    </div>
</template>

<script>
    export default {
        props: ['title', 'desc', 'mode'],
        data: function(){
            return{
                active: false,
            }
        },
        methods: {
            openModal(){
                this.active = true;
            },
            deleteIt(){
                this.active = false;
                this.$emit('delete');
            },
            exit(){
                this.active = false;
                this.$emit('exit');
            },
            backToPage(){
                this.active = false;
            }
        }
    }
</script>

<template>
    <div class="r-btn" :class="getClass" @click="ToggleActive">
        <div class="visual-status">
            <span v-if="id == 1">Черновик</span>
            <span v-else-if="id == 2">Неоконченно</span>
            <span v-else-if="id == 3">В процессе</span>
            <span v-else-if="id == 4">Опубликованно</span>
            <span v-else></span>
            <i class="fas fa-chevron-down" v-if="!active"></i>
            <i class="fas fa-chevron-up" v-else></i>
        </div>
        <transition name="slide-fade">
            <ul class="hidden-box" v-if="active">
                <li class="hidden-box-title">Виды статусов</li>
                <li class="status-line">
                    <div class="status-title warning">Черновик</div> <div class="status-def">Данные внесенны в черновую таблицу и не будут отображены до тех пор, пока вы их не опубликуете. Черновые данные могут видеть вы и менджеры у которых есть доступ.</div>
                </li>
                <li class="status-line">
                    <div class="status-title error">Неоконченно</div> <div class="status-def">Данные принудительно не отображаются, пока вы не заполните требуемые поля.</div>
                </li>
                <li class="status-line">
                    <div class="status-title process">В процессе</div> <div class="status-def">Данные обрабатываются на сервере.</div>
                </li>
                <li class="status-line">
                    <div class="status-title success">Опубликовано</div> <div class="status-def">Данные опубликованы.</div>
                </li>
            </ul>
        </transition>
    </div>
</template>

<script>
    export default {
        props: ['id'],
        data: function(){
            return{
                active: false,
            }
        },
        methods: {
            ToggleActive: function(){
                this.active = !this.active;
            },
        },
        computed: {
            getClass(){
                switch (this.id) {
                    case 0:
                        return '';
                        break;
                    case 1:
                        return 'r-warning';
                        break;
                    case 2:
                        return 'r-error';
                        break;
                    case 3:
                        return 'r-process';
                        break;
                    case 4:
                        return 'r-success';
                        break;
                }
            }
        }

    }
</script>

<template>
    <div class="info-line" @click="ToggleActive">
        <div class="visual-inline">
            <i :class="i_class"></i>
            {{visual}}
            <i class="fas fa-chevron-down" v-if="!active"></i>
            <i class="fas fa-chevron-up" v-else></i>
        </div>
        <transition name="slide-fade">
            <ul class="hidden-box" v-if="active">
                <li class="hidden-box-title">Дополнительная информация</li>
                <li v-for="item in hidden">
                    <span class="data"><i v-bind:class="i_class"></i>{{item.title}}</span> - {{item.info}}
                </li>
            </ul>
        </transition>
    </div>
</template>

<script>
    export default {
        props: ['visual', 'i_class', 'hidden'],
        data: function(){
            return{
                active: false,
            }
        },
        methods: {
            ToggleActive: function(){
                this.active = !this.active;
            },
        }
    }
</script>

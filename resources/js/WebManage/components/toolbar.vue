<template>
    <transition name="slideX-tool" v-if="pType === 'tool'">
        <div class="wm-tool" v-show="pShow">
            <div class="tool-items">
                <div class="tool-item"
                     v-for="navItem in pNavItems"
                     :class="{active: navItem.isActive}"
                     :wm-preview-title="navItem.detail"
                     @click="$emit('eCurrentNav', navItem)"
                >
                    <img :src="'Web/img/web-manager/' + navItem.alias + '.svg'">
                </div>
            </div>
        </div>
    </transition>


    <transition name="slideX-window" v-else-if="pType === 'window'">
        <div class="wm-window" v-show="pShow">

            <header class="window-header">
                <div class="wm-crl-btn window-go-back"
                     @click="$emit('eClose')"
                >
                    <img src="Web/img/web-manager/arrow_left.svg" alt="">
                </div>
                <h2 class="window-header-title">
                    <slot name="header-title">Навигация</slot>
                </h2>
            </header>

            <slot></slot>



            <div class="window-items">
                <div v-for="navItem in pNavItems"
                     class="nav-item"
                >
                    {{navItem.title}}
                </div>
            </div>
        </div>
    </transition>

</template>

<!--            <template v-slot:window>-->
<!--                <template ><h2>Настройки</h2></template>-->
<!--            </template>-->

<!--            <header class="window-header">-->
<!--                <template v-slot:default>-->
<!--                    <h2>Настройки</h2>-->
<!--                </template>-->
<!--            </header>-->


<!--            <slot name="navigation">-->

<!--            </slot>-->

<script>
    export default {
        props: [
            'pType',  //for toolbar tool
            'pShow',
            'pNavItems' //for toolbar nav
        ],
        data(){
            return{
            }
        },
        methods: {



        }
    }
</script>

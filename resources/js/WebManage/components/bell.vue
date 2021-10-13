<template>
    <div class="bell" :class="{disabled: bellStatus}">
        <div @click="tgBellStatus" class="bell-circle">
            <img src="Web/img/web-manager/settings.svg" alt="">
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                bellStatus: false
            }
        },
        methods:{
            tgBellStatus(){
                this.bellStatus = !this.bellStatus;
                let wrapper = document.getElementsByClassName("main-wrapper")[0];
                this.bellStatus ? wrapper.classList.add("wr-comply") : wrapper.classList.remove("wr-comply");
                this.$emit('eBellStatus', this.bellStatus);
            }
        }
    }
</script>

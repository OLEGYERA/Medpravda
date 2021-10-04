<template>
    <div class="r-cheker" :class="[color,{disabled: disabled_mode}]">
        <input v-if="cheker_active" type="checkbox" v-bind:id="'s' + id" checked @click="check" v-bind:disabled="disabled_mode"/>
        <input v-else type="checkbox" v-bind:id="'s' + id" @click="check" v-bind:disabled="disabled_mode"/>
        <label class="cheker-box" v-bind:for="'s' + id"></label>
        <label class="cheker-title" v-html="title" v-bind:for="'s' + id"></label>
    </div>
</template>

<script>
    export default {
        props: ['title', 'id', 'status', 'color', 'disabled_mode'],
        mounted() {
            this.cheker_active = this.status;
        },
        data: function(){
            return{
                cheker_active: false,
            }
        },
        methods: {
            check(){
                if(this.cheker_active){
                    this.cheker_active = false;
                }
                else{
                    this.cheker_active = true;
                }
            }
        },
        watch: {
            cheker_active(to, from){
                this.$emit('toggle', to);
            }
        }
    }
</script>

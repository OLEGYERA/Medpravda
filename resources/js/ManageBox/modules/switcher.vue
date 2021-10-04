<template>
    <div class="r-switch" :class="[color,{disabled: disabled_mode}]">
        <input v-if="switch_active" type="checkbox" v-bind:id="'s' + id" checked @click="toogleSwitch" v-bind:disabled="disabled_mode"/>
        <input v-else type="checkbox" v-bind:id="'s' + id" @click="toogleSwitch" v-bind:disabled="disabled_mode"/>
        <label class="slider" v-bind:for="'s' + id"></label>
    </div>
</template>

<script>
    import {HTTP} from "../Administration/http";

    export default {
        props: ['id', 'status', 'color', 'namespace', 'disabled_mode'],
        mounted() {
            this.switch_active = this.status;
        },
        data: function(){
            return{
                switch_active: false,
                before_mounted: false,
            }
        },
        methods: {
            toogleSwitch(){
                if(this.switch_active){
                    this.switch_active = false;
                }
                else{
                    this.switch_active = true;
                }
                this.$emit('toggle', {switch: this.switch_active, category: this.namespace});
            }
        },
    }
</script>

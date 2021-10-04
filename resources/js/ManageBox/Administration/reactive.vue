<template>
    <div class="mp-reactive">
        <toolbar></toolbar>
        <router-view></router-view>
    </div>
</template>

<script>
    // import {HTTP} from '../http.js'
    // const headers = { "Authorization" : `Bearer ${token}` };
    export default {
        mounted() {
            console.log('start')
        }
    }
</script>

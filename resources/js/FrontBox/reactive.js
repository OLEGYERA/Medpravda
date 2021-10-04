/**
 * by Olegyera
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap.js');

import Vue from 'vue';
import GAuth from 'vue-google-oauth2'
Vue.component('stars', require('./components/stars.vue').default);


const gauthOption = {
    clientId: '10195611610-bqc62pa48d6b4i5im43j7nud6cvapeio.apps.googleusercontent.com',
    scope: 'profile email',
    prompt: 'select_account'
}

Vue.use(GAuth, gauthOption)

// Vue.config.productionTip = false;
// Vue.config.devtools = false;
// Vue.config.errorHandler = function(err, vm, info) {
//     console.log('=(')
// }








new Vue({
    components: {
        'compA': Vue.component('search', require('./components/search.vue').default)
    },
    el: '.reactive',
});

new Vue({
    components: {
        'compB': Vue.component('review', require('./components/review.vue').default)
    },
    el: '.review',
});

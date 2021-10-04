/**
 * by Olegyera
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap.js');
import Vue from 'vue';
Vue.component('mp-search', require('./components/search.vue').default);
Vue.component('mp-review', require('./components/review.vue').default);
new Vue().$mount('#mp-app');

/**
 * by Olegyera
 *
 *
 */

require('../bootstrap.js');
import Vue from 'vue';

Vue.component('manage-launcher', require('./app.vue').default);
new Vue().$mount('#mp-web-managament');


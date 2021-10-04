/**
 * by Olegyera
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../../bootstrap.js');

import Vue from 'vue';
import ManagerRoutes from './managers/router.js'
import RollingRoutes from './rolling/router.js'

let router;
console.log(location.href.split(url + '/manage/administration/').pop().split('#')[0]);

switch (location.href.split(url + '/manage/administration/').pop().split('#')[0]) {
    case 'manager':
        router = ManagerRoutes;
        break;
    case 'rolling':
        router = RollingRoutes;
        break;
}


Vue.component('reactive', require('./reactive.vue').default);
Vue.component('toolbar', require('../toolbar.vue').default);
Vue.component('infoline', require('../modules/info_line.vue').default);
Vue.component('status', require('../modules/status.vue').default);
Vue.component('delete', require('../modules/delete.vue').default);
Vue.component('add', require('../modules/add.vue').default);
Vue.component('switcher', require('../modules/switcher.vue').default);
Vue.component('cheker', require('../modules/cheker.vue').default);
Vue.component('status-coder', require('../modules/status_coder.vue').default);
Vue.component('selector', require('../modules/selector.vue').default);
Vue.component('gallery', require('../modules/gallery.vue').default);
Vue.component('gallery-card', require('../modules/gallery_card.vue').default);
Vue.component('drop-gallery-menu', require('../modules/drop_gallery_menu.vue').default);
Vue.component('modal-create', require('../modules/controls/modal-create.vue').default);
Vue.component('pagination', require('../modules/helpers/pagination.vue').default);


import Vuebar from 'vuebar';
Vue.use(Vuebar);







new Vue({
    router
}).$mount('#app');

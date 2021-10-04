/**
 * by Olegyera
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../../bootstrap.js');

import Vue from 'vue';
import CategoryRoutes from './category/router.js'
import StructureRoutes from './structure/router.js'
import ArticleRoutes from './article/router.js'


let router;
switch (location.href.split(url + '/manage/media/').pop().split('#')[0]) {
    case 'category':
        router = CategoryRoutes;
        break;
    case 'structure':
        router = StructureRoutes;
        break;
    case 'article':
        router = ArticleRoutes;
        break;
}


Vue.component('reactive', require('./reactive.vue').default);
Vue.component('toolbar', require('../toolbar.vue').default);
Vue.component('infoline', require('../modules/info_line.vue').default);
Vue.component('status', require('../modules/status.vue').default);
Vue.component('delete', require('../modules/delete.vue').default);
// Vue.component('add', require('../modules/add.vue').default);
Vue.component('switcher', require('../modules/switcher.vue').default);
// Vue.component('cheker', require('../modules/cheker.vue').default);
// Vue.component('status-coder', require('../modules/status_coder.vue').default);
Vue.component('selector', require('../modules/selector.vue').default);
Vue.component('gallery', require('../modules/gallery.vue').default);
Vue.component('gallery-card', require('../modules/gallery_card.vue').default);
Vue.component('drop-gallery-menu', require('../modules/drop_gallery_menu.vue').default);
Vue.component('trext', require('../modules/trext.vue').default);
Vue.component('modal-selector', require('../modules/selectors/modal-selector.vue').default);
Vue.component('modal-create', require('../modules/controls/modal-create.vue').default);
Vue.component('modal-edit', require('../modules/controls/modal-edit.vue').default);
Vue.component('pagination', require('../modules/helpers/pagination.vue').default);



require('bootstrap/dist/css/bootstrap.min.css')
require('summernote/dist/summernote.css')


import Vuebar from 'vuebar';
Vue.use(Vuebar);








new Vue({
    router
}).$mount('#app');

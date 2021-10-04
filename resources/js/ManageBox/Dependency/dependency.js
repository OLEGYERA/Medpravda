/**
 * by Olegyera
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../../bootstrap.js');

import Vue from 'vue';
import TermRoutes from './term/router.js'
import TagRoutes from './tag/router.js'
import SubstanceRoutes from './substances/router.js'
import InnameRoutes from './innames/router.js'
import PharmaRoutes from './pharma/router.js'
import PharmaBadRoutes from './pharma_bad/router.js'
import FormRoutes from './form/router.js'
import FabricatorRoutes from './fabricator/router.js'
import ATXRoutes from './atx/router.js'
import ClassBadRoutes from './class_bad/router.js'
import ClassWareRoutes from './class_ware/router.js'
import ClassCosmeticRoutes from './class_cosmetic/router.js'



let router;
console.log(location.href.split(url + '/manage/dependency/').pop().split('#')[0]);
switch (location.href.split(url + '/manage/dependency/').pop().split('#')[0]) {
    case 'term':
        router = TermRoutes;
        break;
    case 'tag':
        router = TagRoutes;
        break;
    case 'substance':
        router = SubstanceRoutes;
        break;
    case 'inname':
        router = InnameRoutes;
        break;
    case 'pharma':
        router = PharmaRoutes;
        break;
    case 'pharma_bad':
        router = PharmaBadRoutes;
        break;
    case 'form':
        router = FormRoutes;
        break;
    case 'fabricator':
        router = FabricatorRoutes;
        break;
    case 'atx':
        router = ATXRoutes;
        break;
    case 'class_bad':
        router = ClassBadRoutes;
        break;
    case 'class_ware':
        router = ClassWareRoutes;
        break;
    case 'class_cosmetic':
        router = ClassCosmeticRoutes;
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
Vue.component('trext', require('../modules/trext.vue').default);
Vue.component('modal-selector', require('../modules/selectors/modal-selector.vue').default);
Vue.component('drop-gallery-menu', require('../modules/drop_gallery_menu.vue').default);
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

import Vue from 'vue';

const Components = {
    articles: Vue.component('articles', require('./components/articles.vue').default),
    edit_article_main: Vue.component('edit-article-main', require('./components/edit-article-main.vue').default),
    edit_article_dependency: Vue.component('edit-article-dependency', require('./components/edit-article-dependency.vue').default),
    edit_article_instruction: Vue.component('edit-article-instruction', require('./components/edit-article-instruction.vue').default),
    edit_article_instruction_ua: Vue.component('edit-article-instruction-ua', require('./components/edit-article-instruction-ua.vue').default),
    edit_article_instruction_blocks: Vue.component('edit-article-instruction-blocks', require('./components/edit-article-instruction-blocks.vue').default),
    edit_article_instruction_blocks_ua: Vue.component('edit-article-instruction-blocks-ua', require('./components/edit-article-instruction-blocks-ua.vue').default),

// edit_manager_editor: Vue.component('edit-manager-editor', require('./components/edit-manager-editor.vue').default),
}


export default Components;

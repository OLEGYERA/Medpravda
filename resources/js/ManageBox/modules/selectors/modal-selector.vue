<template>
    <div class="r-modal r-modal-selector"v-if="active">
        <transition name="slide-fade">
            <div class="modal-box"v-if="active">
                <header class="box-header">
                    <h2 class="header-title">
                        Выберите {{modal_title}} из списка
                    </h2>
                    <i class="fas fa-plus modal-cancel" @click="cancelModal"></i>
                </header>
                <main class="box-body">
                    <label class="search-row">
                        <input type="text" v-model="selector_search" class="r-input" v-bind:placeholder="'Введите название или псевдоним искомого ' + modal_title + 'а...'">
                        <i class="fas fa-search"></i>
                    </label>
                    <div class="filter-row">
                        <div class="create-item" @click="openCreationModal" v-if="!atx">
                            <i class="fas fa-plus"></i>
                            Создать
                        </div>
                        <div class="create-item" v-else>
                            Для создание классификации перейдите в раздел Классификаций
                        </div>

                        <modal-create
                            :method_processed="'insert'"
                            :type_creation="!inname ? fabricator_location ? 'titles_four' : 'titles' : 'title'"
                            :url=url
                            :modal_title=modal_title
                            :callBack=creationCallBack
                            @createdX="responseAfterCreation"
                            @createdDo="responseAfterCreationDo"
                        ></modal-create>
                    </div>
                    <div v-bar="{scrollThrottle: 30, unselectableBody: false}" class="selector-items-bar" v-if="selector_items != null || selector_items">
                        <div class="selector-items">
                            <div v-for="search_item in selector_items" class="selector-item" @click="chooseItem(search_item)" :class="{active: choosed_items.indexOf(search_item.id) != -1}">
                                <div v-if="atx" class="lang-row"><span>Классификация</span> <b>{{search_item.class}}</b></div>
                                <div class="lang-row" v-if="!inname"><span>Ru {{modal_title}}</span> <b>{{search_item.title}}</b></div>
                                <div class="lang-row" v-if="!inname"><span>Ua {{modal_title}}</span> <b>{{search_item.utitle}}</b></div>
                                <div class="lang-row" v-else><span>МНН</span> <b>{{search_item.title}}</b></div>
                            </div>
                        </div>
                    </div>
                    <h2 class="body-title" v-else>По запросу ничего не найдено</h2>
                </main>
            </div>
        </transition>
    </div>
</template>

<script>
    import {HTTP} from "../../../http.js";
    export default {
        props: ['url', 'modal_title', 'callBack', 'method_choosed', 'choosed_items', 'atx', 'inname', 'fabricator_location'],
        mounted() {
            this.searchSelectorItems();
            console.log(this.choosed_items, this.url);
        },
        data: function(){
            return{
                selector_search: null,
                selector_items: null,
                //services
                active: false,
                creationCallBack: false,
            }
        },
        methods: {
            //http
            searchSelectorItems(){
                HTTP.post(this.url + '/search', {
                    search: this.selector_search
                }).then(response => {
                    if(response.data.length == 0){
                        this.selector_items = null;
                    }else{
                        this.selector_items = response.data;
                    }
                }).catch(error => {

                })
            },
            chooseItem(data){
                switch (this.method_choosed) {
                    case 'once':
                        this.$emit('choosed', data)
                        this.cancelModal();
                        break;
                    case 'item':
                        this.$emit('choosed', data)
                        this.cancelModal();
                        break;
                    case 'items':
                        if(this.choosed_items.indexOf(data.id) != -1){
                            this.choosed_items.splice(this.choosed_items.indexOf(data.id), 1)
                        }else{
                            this.choosed_items.push(data.id)
                        }
                        this.$emit('choosed', this.choosed_items)
                        break;
                }
            },

            //services

            responseAfterCreation(){
                this.selector_search = null;
                this.searchSelectorItems();
                this.$emit('creation_event', true)
            },
            responseAfterCreationDo(data){
                this.selector_search = null;
                this.searchSelectorItems();
                this.$emit('creation_event', true)
                this.chooseItem(data);

            },
            openCreationModal(){
                this.creationCallBack = !this.creationCallBack;
            },
            cancelModal(){
                this.active = false;
            },
        },
        watch: {
            selector_search(){
                this.searchSelectorItems();
            },
            callBack(){
                this.selector_search = null;
                this.active = !this.active;
            },
            url(to){
                this.searchSelectorItems()
            }
        }

    }
</script>

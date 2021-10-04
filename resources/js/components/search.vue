<template>
    <div class="mp-search" :class="{open: active}">
        <div class="search-field">
            <input type="text"  v-model="mutableValue" class="search-input" placeholder="Поиск">
            <i @click="active = true" class="icon-search"></i>
        </div>
        <div class="search-result">
            <ul class="medicines-result">
                <li class="medicine-item" v-for="result in results">
                    <img v-bind:src="'/gallery/' + file_categories[result.image.category_id - 1] + '/small/' + result.image.path" alt="">
                    <span class="medicine-title">{{result.title}}</span>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    import {HTTP} from "../http.js";

    export default {
        props: ['lang'],
        mounted() {
            document.addEventListener('click', this.handleClickOutside);
            this.requestApi();
        },
        data: function () {
            return {
                active: false,
                mutableValue: null,
                results: [],
                file_categories: [
                    'Vne-Kategorii',
                    'Avatari',
                    'Diplomy',
                    'Preparaty'
                ],
            }
        },
        methods: {
            handleClickOutside (evt) {
                if(!this.$el.contains(evt.target) && this.active)  this.active = false;
            },
            requestApi () {
                HTTP.post(`/search/` + this.lang, {search: this.mutableValue})
                    .then(response => {
                        this.results = response.data;
                    })
            }
        },
        watch: {
            active (to) {
                if (to) {
                    document.getElementById('mp-app').classList.add("shadow");
                } else {
                    document.getElementById('mp-app').classList.remove("shadow");
                }
            },
            mutableValue (to) {
                this.requestApi();
            }
        }
    }
</script>

<template>
    <div class="search search-intro">
        <div class="search-input-box">
            <input v-model="request" @focus="isActive=true" @blur="isActive=true" class="search-input" type="text" placeholder="Введите название препарата или симптома,болезни...">
            <svg class="search-start" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
        </div>
        <ul class="mp-search-results" v-show="isActive && options.length !== 0">
            <li v-for="(option,index) in options">
                <a :href="'https://medpravda.ua/' + option.alias" class="mp-search-result">
                    {{ option.title }}
                </a>
            </li>

        </ul>
    </div>
</template>

<script>
    import {HTTP} from "../FrontBox/http";

    export default {
        props: ['lang'],
        data(){
            return{
                isActive: false,
                request: '',
                options: []
            }
        },
        methods: {
            searchEngine(){
                HTTP.post(`/search`, {search: this.request})
                    .then(response => {
                        this.options = response.data;
                    }).catch(error =>{
                })
            }
        },
        watch: {
            request(to){
                this.searchEngine()
            }
        }
    }
</script>

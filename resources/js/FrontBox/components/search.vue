<template>
    <div class="mp-search" @mousemove="checkMouseOver" :class="{active: toggled}">
        <svg xmlns="http://www.w3.org/2000/svg" @click="onBlur" class="exit" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
        <input ref="selected" @keyup="filterSelect($event)" @focus="onFocus" v-model="mutableValue" type="text" class="search-input" placeholder="Поиск"
               @keydown.up.prevent="onKeyUp"
               @keydown.down.prevent="onKeyDown" @keydown.enter.prevent="onKeyEnter">

        <svg @click="$refs.selected.focus()" class="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
<!--        v-show="toggled"-->
        <svg @click="[mutableValue = '', $refs.selected.focus()]" v-if="mutableValue !== null && mutableValue.length !== 0" class="clear" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
        <ul class="mp-search-results" :class="type" v-show="toggled && options.length != 0">
            <div ref="dropdown">
                <div class="search_tabs">
                    <span class="list-title" :class="{active: current_data.title == type.title}" @click="current_data = type" v-for="(type) in filterList" v-if="type.data && type.data.length !== 0">
                         <span :class="type.icon"></span>{{type.title}}
                     </span>
                </div>
                <span class="search-list react-scroller" v-if="current_data != null">
                    <li class="mp-search-result" v-for="(item,index) in current_data.data" :class="{active: item.id === pointer}" @mousedown="handleItemClick(item.title, item.url)"
                        @mousemove="!mouseOverBlock ? pointer = item.id : null">
                        <figure class="result-img">
                            <img :src="item.img_path" alt="">
                        </figure>
                        <span class="result-info">
                            <span class="result-title">
                                {{item.title}} <span class="inn" v-if="item.inname">({{item.inname}})</span>
                            </span>
                            <span class="result-fabricator" v-if="item.fabricator && screen != 'mobile'">
                                {{lang == 'ru' ? 'Производитель' : 'Виробник'}}: <i v-html="item.fabricator"></i>
                            </span>
                        </span>
                    </li>
                </span>
            </div>
        </ul>
    </div>
</template>
<script>
    // import {HTTP} from '../http.js'
    // const headers = { "Authorization" : `Bearer ${token}` };
    import {HTTP} from "../http.js";

    export default {
        props: ['type', 'priority', 'screen', 'lang'],
        mounted() {
            this.searchEngine();
        },
        data: function () {
            return {
                current_data: null,
                search: null,
                search_result_status: false,
                search_results: [],
                unbindBlur: false,
                mouseOverYPos: null,
                mouseOverXPos: null,
                mouseOverBlock: false,
                indexLi: 0,
                selected: null,
                toggled: false,
                filterList: [],
                mutableValue: null,
                options: [],
                pointer: 0,
                mountedVar: true,
            }
        },
        methods:{
            filterSelect: function (key) {
                if (!this.toggled) this.toggled = !this.toggled;
                if (key.key.length == 1 || key.key == 'Backspace') {
                    this.pointer = 0;
                }

            },
            handleItemClick: function (item, url) {
                this.mutableValue = item;
                this.toggled = !this.toggled;
                window.location.href = url;
            },
            onFocus: function () {
                this.$refs.dropdown.scrollTop = 0;
                this.toggled = true;
            },
            onBlur: function () {
                this.toggled = false;
            },
            checkMouseOver: function(e){
                if(this.mouseOverYPos != e.clientY || this.mouseOverXPos != e.clientX)
                    this.mouseOverBlock = false;
                this.mouseOverYPos = e.clientY;
                this.mouseOverXPos = e.clientX;
            },
            onKeyUp: function () {
                this.mouseOverBlock = true;
                if (this.pointer > 0) this.pointer--;
                if (this.maybeAdjustScroll) {
                    this.maybeAdjustScroll()
                }
            },
            onKeyDown: function () {
                this.mouseOverBlock = true;
                if (this.pointer < this.options.length) this.pointer++;
                if (this.pointer == this.options.length) this.pointer = this.pointer - 1;
                if (this.maybeAdjustScroll) {
                    this.maybeAdjustScroll()
                }
            },
            onKeyEnter: function () {
                if(this.options.length > 0)
                    this.handleItemClick(this.options[this.pointer].title, this.options[this.pointer].url)
                this.$refs.selected.blur();
                this.toggled = false;
            },
            maybeAdjustScroll() {
                let pixelsToPointerTop = this.pixelsToPointerTop()
                let pixelsToPointerBottom = this.pixelsToPointerBottom()
                if (pixelsToPointerTop <= this.viewport().top) {
                    return this.scrollTo(pixelsToPointerTop)
                } else if (pixelsToPointerBottom >= this.viewport().bottom) {
                    return this.scrollTo(this.$refs.dropdown.scrollTop + this.pointerHeight() + 20)
                }
            },

            pixelsToPointerTop() {
                let pixelsToPointerTop = 0
                let dropdownChildren = $('.mp-search-result');
                if (this.$refs.dropdown && dropdownChildren.length > 0) {
                    for (let i = 0; i < dropdownChildren.length; i++) {
                        if(i == this.pointer) break;
                        pixelsToPointerTop += dropdownChildren[i].offsetHeight

                    }
                }
                return pixelsToPointerTop;
            },

            pixelsToPointerBottom() {
                return this.pixelsToPointerTop() + this.pointerHeight()
            },

            pointerHeight() {
                let dropdownChildren = $('.mp-search-result');
                let element = this.$refs.dropdown ? dropdownChildren[this.pointer] : false
                return element ? element.offsetHeight : 0
            },

            viewport() {
                return {
                    top: this.$refs.dropdown ? this.$refs.dropdown.scrollTop : 0,
                    bottom: this.$refs.dropdown ? this.$refs.dropdown.offsetHeight + this.$refs.dropdown.scrollTop - 40 : 0
                }
            },
            scrollTo(position) {
                if(this.mouseOverBlock){
                    return this.$refs.dropdown ? this.$refs.dropdown.scrollTop = position : null
                }else{
                    return null;
                }
            },
            searchEngine(){
                HTTP.post(`/search/` + this.lang, {search: this.mutableValue})
                    .then(response => {
                        this.filterList = response.data;
                        if(this.filterList[0].data.length !== 0){
                            this.current_data = this.filterList[0];
                        }
                        else if(this.filterList[1].data.length !== 0){
                            this.current_data = this.filterList[1];
                        }
                        else if(this.filterList[2].data.length !== 0){
                            this.current_data = this.filterList[2];
                        }
                        else if(this.filterList[3].data.length !== 0){
                            this.current_data = this.filterList[3];
                        }

                        this.options = [];
                        response.data.forEach((item) => {
                            item.data.forEach((item) => {
                                this.options.push(item)
                            });
                        });
                        if(this.options.length <= 5){
                            $('.mp-search-results').css('height', 'auto');
                        }else{
                            $('.mp-search-results').css('height', '80vh');
                        }
                    }).catch(error =>{
                })
            }
        },
        watch: {
            pointer(to) {
                this.maybeAdjustScroll()
            },
            toggled(to){
                to ? $('#floatHeader').addClass('react-true') : $('#floatHeader').removeClass('react-true')

                if(to){
                    document.getElementsByTagName('html')[0].style.overflow = 'hidden';
                }
                else{
                    document.getElementsByTagName('html')[0].style.overflow = 'unset';
                }
            },
            mutableValue(to){
                console.log(this.current_data)
                this.searchEngine();
            }
        }
    }
</script>

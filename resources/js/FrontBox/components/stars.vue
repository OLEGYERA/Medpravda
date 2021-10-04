<template>
    <span class="rating-block" @mouseover="hoverBlock = 1" @mouseleave="hoverBlock = 0" :class="{error: error}">
        <span title="Ужасно" class="glyph" :class="verStar(1)" @click="chooseStars(1)" @mouseover="hover_id = 1" @mouseleave="hover_id = null"></span>
        <span title="Плохо" class="glyph" :class="verStar(2)" @click="chooseStars(2)" @mouseover="hover_id = 2" @mouseleave="hover_id = null"></span>
        <span title="Средне" class="glyph" :class="verStar(3)" @click="chooseStars(3)" @mouseover="hover_id = 3" @mouseleave="hover_id = null"></span>
        <span title="Хорошо" class="glyph" :class="verStar(4)" @click="chooseStars(4)" @mouseover="hover_id = 4" @mouseleave="hover_id = null"></span>
        <span title="Отлично" class="glyph" :class="verStar(5)" @click="chooseStars(5)" @mouseover="hover_id = 5" @mouseleave="hover_id = null"></span>
    </span>
</template>


<script>
    import {HTTP} from "../http.js";

    export default {
        props: ['error'],
        data: function () {
            return {
                hover_id: null,
                choosen_id: null,
                hoverBlock: false,
            }
        },
        methods: {
            chooseStars(id){
                this.choosen_id = id;
                this.$emit('getChoosenStar', id);
            },
            verStar(id){
                if(this.hoverBlock){
                    return this.hover_id == null ? 'empty-star' : (this.hover_id >= id ? 'star' : 'empty-star');
                }
                else{
                    return this.choosen_id == null ? 'empty-star' : (this.choosen_id >= id ? 'star' : 'empty-star');
                }
            }
        }
    }
</script>

<template>
    <div class="pagination" :class="color">
        <div class="r-pg previous"
             @click="(current_paginate > 1) ? current_paginate-- : (current_paginate == 1)"
             :class="{disabled: current_paginate <= 1}"
        ><i class="fas fa-angle-left"></i></div>

        <div class="r-pg"
             v-if="last_paginate > 1"
             :class="{current: current_paginate == 1}"
             @click="currentPaginate = 1">
            1
        </div>

        <div class="r-pg"
             v-if="last_paginate == 3"
             :class="{current: current_paginate == 2 }"
             @click="currentPaginate = 2">
            2
        </div>

        <div class="r-pg point" v-if="last_paginate > 4 && current_paginate > 2 ">...</div>
        <div class="r-pg"
             v-for="(index, key) in 3"
             v-if="last_paginate > 4 && current_paginate <= last_paginate - 3"
             :class="{current: current_paginate == (key == 0 && current_paginate > 1) ? (current_paginate === current_paginate) : ((current_paginate == 1) ? ((index + current_paginate) === current_paginate) : (current_paginate == 2) ? ((index + 1) === current_paginate) : ((current_paginate + index - 1) === current_paginate)) }"
             @click="currentPaginate = (key == 0 && current_paginate > 1) ? current_paginate : ((current_paginate == 1) ? (index + current_paginate) : (current_paginate == 2) ? (index + 1) : (current_paginate + index - 1))">
            {{(key == 0 && current_paginate > 1) ? current_paginate : ((current_paginate == 1) ? (index + current_paginate) : (current_paginate == 2) ? (index + 1) : (current_paginate + index - 1))}}
        </div>
        <div class="r-pg"
             v-for="(index, key) in 3"
             v-if="current_paginate > last_paginate - 3 && last_paginate > 3"
             :class="{current: current_paginate == (last_paginate - 4 + index) }"
             @click="currentPaginate = (last_paginate - 4 + index)">
            {{last_paginate - 4 + index}}
        </div>


        <div class="r-pg point" v-if="current_paginate < last_paginate - 3 && last_paginate > 5">...</div>


        <div class="r-pg"
             :class="{current: current_paginate == last_paginate}"
             @click="currentPaginate = last_paginate"
             v-if="1 != last_paginate">
            {{last_paginate}}
        </div>

        <div class="r-pg next"
             @click="(current_paginate < last_paginate) ? current_paginate++ : (current_paginate == last_paginate)"
             :class="{disabled: current_paginate >= last_paginate}"
        ><i class="fas fa-angle-right"></i></div>
    </div>
</template>

<script>
    import {HTTP} from "../../../http.js";
    export default {
        props: ['current_paginate', 'last_paginate', 'color'],
        data: function(){
            return{
                currentPaginate: 0,
            }
        },
        watch: {
            currentPaginate(to){
                this.$emit('currentPaginate', to);
            },
        }

    }
</script>

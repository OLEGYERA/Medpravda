<template>
    <div class="r-selector">
        <!--single-->
        <div class="selector_title" @click="selector_roll" v-if="!multy"><span v-if="item_title === null">{{placeholder}}</span> <span v-else>{{item_title}}</span><i class="fas fa-chevron-down" v-if="!roll"></i><i class="fas fa-chevron-up" v-else></i></div>
        <transition name="zoom-fade">
            <ul class="selector_items" v-if="roll && !multy">
                <li class="selector-item" v-for="item in items" @click="selectItems(item)" :class="{active: item_value == item.value}">{{item.title}}</li>
            </ul>
        </transition>
        <!--multy-->
        <div class="selector_title" @click="selector_roll" v-if="multy">{{placeholder}} <i class="fas fa-chevron-down" v-if="!roll"></i><i class="fas fa-chevron-up" v-else></i></div>
        <transition name="zoom-fade">
            <ul class="selector_items" v-if="roll && multy">
                <li class="selector-item" v-for="item in items" @click="selectItems(item)" :class="{active: item_values.indexOf(item.value) != -1}">{{item.title}} | {{item.value}}</li>
            </ul>
        </transition>
    </div>
</template>

<script>
    import {HTTP} from "../../http.js";
    export default {
        props: ['placeholder', 'filter_status', 'items', 'active_items', 'multy'],
        mounted() {
            this.roll = this.roll_status;
            if(this.multy && this.active_items){
                this.item_values = this.active_items;
            }else{
                if(this.active_items){
                    console.log(this.items, this.active_items);
                    this.items.forEach((e) => {
                        if(e.value == this.active_items[0]){
                            this.item_title = e.title;
                            this.item_value = this.active_items[0];
                        }

                    });
                }
            }
        },
        data: function(){
            return{
                roll: false,
                item_value: null,
                item_title: null,
                item_values: [],
            }
        },
        methods: {
            selector_roll(){
                if(this.roll){
                    this.roll = false;
                }else{
                    this.roll = true;
                }
            },
            selectItems(data){
                if(this.multy){
                    if(this.item_values.indexOf(data.value) != -1){
                        this.item_values.splice( this.item_values.indexOf(data.value), 1 );
                    }else{
                        this.item_values.push(data.value);
                    }
                    console.log(this.item_values, data);
                }else{
                   this.item_value = data.value;
                   this.item_title = data.title;
                   this.roll = !this.roll;
                }
            }
        },
        watch: {
            filter_status(to, from){
                this.roll = !this.roll;
            },
            item_value(to, from){
                this.$emit('selected', to);
            },
            item_values(to, from){
                this.$emit('selected', to);
            }
        }
    }
</script>

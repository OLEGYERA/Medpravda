<template>
    <div class="r-gallery-card" v-if="card_data.length != 0 && active">
        <figure @click="figureToggle" :class="{active: toggle}">
            <img v-bind:src="'/gallery/' + categories[card_data.category_id - 1] + '/medium/' + card_data.path" alt="">
            <i class="fas fa-check-circle"></i>
        </figure>
        <h3 class="gallery-card-title" @click="figureToggle">
            <span>{{card_data.title}}</span>
            <span>{{card_data.title}}</span>
        </h3>
        <drop-gallery-menu :data="card_data" @update="updateItem" @delete="deleteItem"></drop-gallery-menu>
    </div>
</template>

<script>
    export default {
        props: ['data', 'selected'],
        mounted() {
            this.card_data = this.data;
            this.toggle = this.selected;
        },
        data: function(){
            return{
                active: true,
                toggle: false,
                card_data: [],
                categories: [
                    'Vne-Kategorii',
                    'Avatari',
                    'Diplomy',
                    'Preparaty'
                ]
            }
        },
        methods: {
            figureToggle(){
                if(this.toggle){
                    this.toggle = false;
                }
                else{
                    this.toggle = true;
                }
                this.$emit('figure_toggle', {status: this.toggle, id: this.data.id});
            },
            updateItem(data){
                this.card_data = data;
            },
            deleteItem(){
                this.active = false;
                this.$emit('deleted');
            }
        },
        watch: {
            selected(to){
                this.toggle = to;
            }
        }
    }
</script>

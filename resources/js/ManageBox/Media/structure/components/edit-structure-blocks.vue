<template>
    <div class="reactive-content flex-col">
        <div class="reactive-page-header flex-row-sb-c">
            <div class="header-left flex-col">
                <h1 class="reactive-title orange">Редактирование Cтруктуры><i class="fas fa-angle-right"></i> Блоки <i class="fas fa-angle-right"></i>{{structure_alias}}</h1>
            </div>
            <div class="header-right flex-row">
                <status :id=model_status></status>
            </div>
        </div>
        <nav class="reactive-navigation">
            <router-link :to="{name:'edit_structure_main', props: {'alias': this.structure_alias}}" class="orange">Основное</router-link>
            <router-link :to="{name:'edit_structure_blocks', props: {'alias': this.structure_alias}}" class="active orange">Фиксированные блоки</router-link>
        </nav>
        <div class="reactive-ws">
            <div class="wsr ws-100" style="flex-direction: row; justify-content: space-between;">
                <div class="reactive-box" style="width: 100%;">
                    <header class="box-header">
                        Настройка Блоков
                    </header>
                    <ul class="box-content col">
                        <li class="list-item-col">
                            <h2 class="item-title">Ru название</h2>
                            <input type="text" class="r-input" v-model="timely_block.ru" placeholder="Введите название блока на RU">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">Ua название:</h2>
                            <input type="text" class="r-input" v-model="timely_block.ua" placeholder="Введите название блока на UA">
                        </li>
                        <div @click="createStructureBlock" class="r-btn r-success" style="margin: 15px 15px 0px 0px;" v-if="getStatusCreatingBlock">Добавить</div>
                        <div class="r-btn r-warning" style="margin: 15px 15px 0px 0px;" v-else>Ожидаю</div>

                    </ul>
                    <hr style="height: 2px; margin: 0;">
                    <ul class="box-content col" v-for="(block, key) in structure_blocks">
                        <li class="list-item-col">
                            <h2 class="item-title">{{key + 1}} - Ru название</h2>
                            <input type="text" class="r-input" disabled v-model="block.title" placeholder="Введите ошибочное название на RU">
                        </li>
                        <li class="list-item-col">
                            <h2 class="item-title">{{key + 1}} - Ua название:</h2>
                            <input type="text" class="r-input" disabled v-model="block.utitle" placeholder="Введите ошибочное название на UA">
                        </li>
                        <div @click="deleteStructureBlock(block.id)" class="r-btn r-error" style="margin: 15px 15px 0px 0px;">Удалить</div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import {HTTP} from "../../http";

    export default {
        mounted() {
            this.structure_alias = this.$route.params.alias;
            this.getBlocks();

        },
        data: function(){
            return{
                //service data
                model_status: null,
                structure_alias: null,
                timely_block: {ru: null, ua: null},

                structure_blocks: [],

                //static data
                structure_infoline_hidden: null,
            }
        },
        methods: {
            getBlocks(){
                this.model_status = 3;
                HTTP.get(`structure/get/` + this.structure_alias + `/blocks`)
                    .then(response => {
                        this.structure_blocks = response.data;
                        this.model_status = 4;
                    })
                    .catch(error => {
                        console.error('[MP.error] => redirect', error)
                        this.$router.push({ name: 'structures'})
                    })
            },

            createStructureBlock(){
                HTTP.post(`structure/create/` + this.structure_alias + '/block', this.timely_block)
                    .then(response => {
                        this.timely_block.ru = null;
                        this.timely_block.ua = null;
                        this.getBlocks();
                        this.model_status = 4;
                    })
            },
            deleteStructureBlock(id){
                HTTP.delete(`structure/delete/` + id + '/block')
                    .then(response => {
                        this.getBlocks();
                    })
            },
        },
        computed: {
            getStatusCreatingBlock(){
                if(this.timely_block.ru === null || this.timely_block.ua === null){
                    return false;
                }
                else if(this.timely_block.ru.length == 0 || this.timely_block.ua.length == 0){
                    return false;
                }
                else{
                    return true;
                }
            }
        },
    }
</script>

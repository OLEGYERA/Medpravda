<template>
    <div class="item-manager" v-if="model_status || model_status == 0">
        <cheker :title="'Просмотр'" :id="createIdForCheker(namespace, dataspace, 1)" :status=reading :color=color @toggle="changeReadStatus" :disabled_mode="disabled_mode"></cheker>
        <cheker :title="'Создание'" :id="createIdForCheker(namespace, dataspace, 2)" :status=creation :color=color @toggle="changeCreateStatus" :disabled_mode="disabled_mode"></cheker>
        <cheker :title="'Редактирование'" :id="createIdForCheker(namespace, dataspace, 3)" :status=edition :color=color @toggle="changeEditStatus" :disabled_mode="disabled_mode"></cheker>
        <cheker :title="'Удаление'" :id="createIdForCheker(namespace, dataspace, 4)" :status=deletion :color=color @toggle="changeDeleteStatus" :disabled_mode="disabled_mode"></cheker>
    </div>
</template>

<script>
    export default {
        props: ['namespace', 'dataspace', 'codestatus', 'color', 'disabled_mode'],
        mounted() {
            this.statusDecoder;

        },
        data: function(){
            return{
                reading: null,
                creation: null,
                edition: null,
                deletion: null,
                model_status: null,
            }
        },
        methods: {
            createIdForCheker(namespace, dataspace, num){
                return '' + namespace + dataspace + num;
            },
            changeReadStatus(val){
                this.reading = val;
                this.statusCoder;
            },
            changeCreateStatus(val){
                this.creation = val;
                this.statusCoder;
            },
            changeEditStatus(val){
                this.edition = val;
                this.statusCoder;
            },
            changeDeleteStatus(val){
                this.deletion = val;
                this.statusCoder;
            }
        },
        computed: {
            statusDecoder(){
                switch (this.codestatus) {
                    case 0:
                        this.reading = 0;
                        this.creation = 0;
                        this.edition = 0;
                        this.deletion = 0;
                        break;
                    case 1:
                        this.reading = 1;
                        this.creation = 1;
                        this.edition = 1;
                        this.deletion = 1;
                        break;
                    case 2:
                        this.reading = 1;
                        this.creation = 1;
                        this.edition = 1;
                        this.deletion = 0;
                        break;
                    case 3:
                        this.reading = 1;
                        this.creation = 0;
                        this.edition = 1;
                        this.deletion = 0;
                        break;
                    case 4:
                        this.reading = 1;
                        this.creation = 0;
                        this.edition = 0;
                        this.deletion = 0;
                        break;
                    case 5:
                        this.reading = 0;
                        this.creation = 1;
                        this.edition = 0;
                        this.deletion = 0;
                        break;
                    case 6:
                        this.reading = 0;
                        this.creation = 0;
                        this.edition = 1;
                        this.deletion = 0;
                        break;
                    case 7:
                        this.reading = 0;
                        this.creation = 0;
                        this.edition = 0;
                        this.deletion = 1;
                        break;
                    case 8:
                        this.reading = 0;
                        this.creation = 1;
                        this.edition = 1;
                        this.deletion = 1;
                        break;
                    case 9:
                        this.reading = 1;
                        this.creation = 0;
                        this.edition = 1;
                        this.deletion = 1;
                        break;
                    case 10:
                        this.reading = 1;
                        this.creation = 1;
                        this.edition = 0;
                        this.deletion = 1;
                        break;
                    case 11:
                        this.reading = 0;
                        this.creation = 0;
                        this.edition = 1;
                        this.deletion = 1;
                        break;
                    case 12:
                        this.reading = 0;
                        this.creation = 1;
                        this.edition = 0;
                        this.deletion = 1;
                        break;
                    case 13:
                        this.reading = 0;
                        this.creation = 1;
                        this.edition = 1;
                        this.deletion = 0;
                        break;
                    case 14:
                        this.reading = 1;
                        this.creation = 1;
                        this.edition = 0;
                        this.deletion = 0;
                        break;
                    case 15:
                        this.reading = 1;
                        this.creation = 0;
                        this.edition = 0;
                        this.deletion = 1;
                        break;
                }
                this.model_status = this.codestatus;
            },
            statusCoder(){
                //0
                if(this.reading == 0 && this.creation == 0 && this.edition == 0 && this.deletion == 0){
                    this.model_status = 0;
                }
                //1
                else if (this.reading == 1 && this.creation == 1 && this.edition == 1 && this.deletion == 1){
                    this.model_status = 1;
                }
                //2
                else if (this.reading == 1 && this.creation == 1 && this.edition == 1 && this.deletion == 0){
                    this.model_status = 2;
                }
                //3
                else if (this.reading == 1 && this.creation == 0 && this.edition == 1 && this.deletion == 0){
                    this.model_status = 3;
                }
                //4
                else if (this.reading == 1 && this.creation == 0 && this.edition == 0 && this.deletion == 0){
                    this.model_status = 4;
                }
                //5
                else if (this.reading == 0 && this.creation == 1 && this.edition == 0 && this.deletion == 0){
                    this.model_status = 5;
                }
                //6
                else if (this.reading == 0 && this.creation == 0 && this.edition == 1 && this.deletion == 0){
                    this.model_status = 6;
                }
                //7
                else if (this.reading == 0 && this.creation == 0 && this.edition == 0 && this.deletion == 1){
                    this.model_status = 7;
                }
                //8
                else if (this.reading == 0 && this.creation == 1 && this.edition == 1 && this.deletion == 1){
                    this.model_status = 8;
                }
                //9
                else if (this.reading == 1 && this.creation == 0 && this.edition == 1 && this.deletion == 1){
                    this.model_status = 9;
                }
                //10
                else if (this.reading == 1 && this.creation == 1 && this.edition == 0 && this.deletion == 1){
                    this.model_status = 10;
                }
                //11
                else if (this.reading == 0 && this.creation == 0 && this.edition == 1 && this.deletion == 1){
                    this.model_status = 11;
                }
                //12
                else if (this.reading == 0 && this.creation == 1 && this.edition == 0 && this.deletion == 1){
                    this.model_status = 10;
                }
                //13
                else if (this.reading == 0 && this.creation == 1 && this.edition == 1 && this.deletion == 0){
                    this.model_status = 13;
                }
                //14
                else if (this.reading == 1 && this.creation == 1 && this.edition == 0 && this.deletion == 0){
                    this.model_status = 14;
                }
                //15
                else if (this.reading == 1 && this.creation == 0 && this.edition == 0 && this.deletion == 1){
                    this.model_status = 15;
                }
                else{
                    this.model_status = 0;
                }
            }
            },
        watch: {
            model_status(to, from){
                if(from !== null){
                    this.$emit('updated_status', {status: to, alias: this.dataspace});
                }
            }
        }

    }
</script>

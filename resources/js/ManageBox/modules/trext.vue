<template>
    <section class="trext" :class="{preload: preload}">
        <textarea v-bind:id="trextID" v-bind:value="trextData"></textarea>
        <gallery
            :img_category="1"
            :upload_category="1"
            :max_files="1"
            :selectedFilesID="[]"
            :call_type="'trext'"
            :callBack=imgCallBack
            @fetch_imagies_id="addImg"
        ></gallery>
        <modal-selector
            :method_choosed="'once'"
            :url="'dependency/term'"
            :choosed_items=[]
            :modal_title="'термин'"
            :callBack=termsCallBack
            @choosed="addTerm"
        ></modal-selector>
        <button v-if="lang != null" @click="callToolbarFunction('term')" class="btn btn-default btn-sm btn-trext btn-term"  data-toggle="tooltip" data-placement="bottom" title="Выбрать термин"><i class="fas fa-spell-check"></i></button>
        <button @click="callToolbarFunction('img')" class="btn btn-default btn-sm btn-trext btn-img" data-toggle="tooltip" data-placement="bottom" title="Загрузить изображение"><i class="fas fa-folder"></i></button>
        <button @click="callBackTrext" class="btn btn-default btn-sm btn-trext btn-save" data-toggle="tooltip" data-placement="bottom" title="Сохранить"><i class="fas fa-check"></i></button>
    </section>
</template>




<script>
    import {HTTP} from "../../http";
    import $ from 'jquery' // summernote needs it
    import 'bootstrap'
    export default {
        props: ['trextID', 'lang', 'trextData'],
        mounted() {
            $(document).ready(e => {
                $('[data-toggle="tooltip"]').tooltip()
            })
            //ping
            this.save_interval = setInterval(function () {
                this.callBackTrext();
            }.bind(this), 60000);
        },
        data: function(){
            return{
                preload: true,
                temporary_img: null,
                //sevices
                temporary_is_trext: null,
                temporary_range: null,
                termsCallBack: false,
                imgCallBack: false,

                //ping
                save_interval: null,
            }
        },
        methods: {
            callBackTrext(){
                let response = $('#' + this.trextID).summernote('code');
                this.$emit('response', response);
            },

            updateTrex(){
                this.preload = true;
                let renderTrext = setInterval(function() {
                    $('#' + this.trextID).summernote({
                        height: 550
                    });
                    clearInterval(renderTrext)
                    this.preload = false;
                }.bind(this), 150);
            },

            addTerm(data){
                this.inserterToTrext('term', data,);
            },

            addImg(id){
                this.getImgAtID(id[0])
            },

            //https

            getImgAtID(id){
                HTTP.get(`gallery/get/` + id).then(response => {
                    this.temporary_img = response.data;
                })
            },

            //services by Olegyera

            inserterToTrext(type, data){
                let isTrextEditor = [];
                if(this.temporary_range != null){
                    isTrextEditor = this.temporary_is_trext;
                }else{
                    let selection = window.getSelection();
                    isTrextEditor = this.isTrextEditor(selection.anchorNode)
                }

                if(isTrextEditor){

                    let range = [];
                    if(this.temporary_range != null){
                        range = this.temporary_range;
                    }else{
                        range = selection.getRangeAt(0);
                    }
                    switch (type) {
                        case 'term':
                            var result = this.createTerm(range, data) //create term element
                            break;
                        case 'img':
                            var result = this.createImg(range, data) //create img element
                            break;
                    }
                }
                else{
                    let trext = document.getElementsByClassName('note-editable');
                    this.createNewRange(trext[0]);
                    //after ranging
                    let selection = window.getSelection();
                    let range = selection.getRangeAt(0);
                    switch (type) {
                        case 'term':
                            var result = this.createTerm(range, data) //create term element
                            break;
                        case 'img':
                            var result = this.createImg(range, data) //create img element
                            break;
                    }
                }

                this.createNewRange(result); //add cursor after new Term
            },

            createTerm(range, data){
                let newTerm = document.createElement("a");
                newTerm.setAttribute('href', '#' + data.id + '-term');
                if(this.lang == 'ru'){
                    newTerm.innerHTML = data.title;
                }else{
                    newTerm.innerHTML = data.utitle;
                }
                range.insertNode(newTerm);
                return newTerm;
            },

            createImg(range, data){
                var newImg = new Image();
                newImg.src = data.file_path;
                newImg.alt = data.file.alt;
                range.insertNode(newImg);
                return newImg;
            },

            isTrextEditor(parentNode){
                if(parentNode !== null) //if document hasn`t any clicks
                    if(parentNode.className == null || parentNode.className == ''){
                        return this.isTrextEditor(parentNode.parentNode)
                    }else{
                        if(parentNode.className == 'note-editable panel-body') return true;
                        return false;
                    }
            },

            createNewRange(newElement){
                let newRange = document.createRange(); //create new select position
                let lastChildNode = newElement.lastChild //get last NodeChild
                if(lastChildNode !== null) {
                    if (lastChildNode.lastChild !== null) { //check if Node have sub-child
                        if (lastChildNode.lastChild.localName == 'br') $(lastChildNode.lastChild).remove();
                        $(lastChildNode).append(' ');
                        lastChildNode = lastChildNode.lastChild
                    }
                }else{
                    lastChildNode = newElement.parentNode.lastChild;
                }

                let lastChildLength = !!lastChildNode.textContent ? lastChildNode.textContent.length : 0; //protection
                newRange.setStart(lastChildNode, lastChildLength)

                //reselecting
                let selection = window.getSelection();
                selection.removeAllRanges();
                selection.addRange(newRange);
            },

            callToolbarFunction(type){
                let selection = window.getSelection();
                this.temporary_is_trext = this.isTrextEditor(selection.anchorNode);
                if(this.temporary_is_trext)
                    if( this.temporary_is_trext == false){
                        this.temporary_is_trex = null;
                    }else{
                        this.temporary_range = selection.getRangeAt(0);
                    }

                switch (type) {
                    case 'term':
                        this.termsCallBack = !this.termsCallBack;
                        break;
                    case 'img':
                        this.imgCallBack = !this.imgCallBack;
                        break;
                }
            },
        },
        watch: {
            temporary_img(to){
                if(to){
                    this.inserterToTrext('img', to)
                    this.temporary_img = null;
                }
            },
            trextData(to, from){
                if(from == 'system_empty'){
                    this.updateTrex();
                }else{
                    $('#' + this.trextID).summernote('destroy');
                    this.updateTrex();
                }
            }
        },

    }
</script>

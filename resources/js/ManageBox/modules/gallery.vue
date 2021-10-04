<template>
    <div class="r-gallery">
        <div class="gallery-bring" v-if="call_type != 'trext'">
            <div class="choose_img" @click="bringGallery('choose')">Выбрать</div>
            <div class="upload_img" @click="bringGallery('upload')"><i class="fas fa-camera"></i></div>
        </div>

        <div class="gallery-window" v-if="gallery_active ">
            <div class="gallery-window-box">
                <div class="gallery-window-header">
                    <div class="breadcrums">Галерея</div>
                    <i class="fas fa-times" @click="(gallery_active = false, current_category = null)"></i>
                </div>
                <div class="gallery-window-body">
                    <aside class="gallery-aside">
                        <div class="gallery-aside-row">
                            <button class="gallery-btn-upload" :class="{active: upload_window}" @click="changeCategory('upload')">
                                <i class="fas fa-plus"></i> Загрузить
                            </button>
                            <ul class="category-list">
                                <li class="category-item" @click="changeCategory(file_categories[0])" :class="{active: current_category == 0 && upload_window == 0}">Вне Категории</li>
                                <li class="category-item" @click="changeCategory(file_categories[1])" :class="{active: current_category == 1 && upload_window == 0}">Аватары</li>
                                <li class="category-item" @click="changeCategory(file_categories[2])" :class="{active: current_category == 2 && upload_window == 0}">Дипломы</li>
                                <li class="category-item" @click="changeCategory(file_categories[3])" :class="{active: current_category == 3 && upload_window == 0}">Справочник</li>
                            </ul>
                        </div>
                        <div>
                            <ul class="category-list">
                                <li class="category-item" @click="changeCategory(file_categories[4])" :class="{active: current_category == 4 && upload_window == 0}">Все изображения</li>
                                <li class="category-item" @click="changeCategory(file_categories[5])" :class="{active: current_category == 5 && upload_window == 0}">Мои загрузки</li>
                            </ul>
                        </div>
                    </aside>
                    <div class="gallery-content">
                        <div class="g-download" v-if="upload_window" :class="{droping: upload_window_drop}" @drop.prevent="dropFile" @dragover.prevent="DrowBorderDrop(true)" @dragleave="DrowBorderDrop(false)">
                            <div class="upload-status" v-if="uploads_length != 0">
                                <h1 class="uploading_error_title" :class="{active: uploads_length == uploaded_length && errors_after_uploading.length != 0}">Ошибки связанные с загрузкой изображений</h1>
                                <div class="uploading-status-info" v-if="uploads_length != uploaded_length">
                                    <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="64px" height="64px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M78.75 16.18V1.56a64.1 64.1 0 0 1 47.7 47.7H111.8a49.98 49.98 0 0 0-33.07-33.08zM16.43 49.25H1.8a64.1 64.1 0 0 1 47.7-47.7V16.2a49.98 49.98 0 0 0-33.07 33.07zm33.07 62.32v14.62A64.1 64.1 0 0 1 1.8 78.5h14.63a49.98 49.98 0 0 0 33.07 33.07zm62.32-33.07h14.62a64.1 64.1 0 0 1-47.7 47.7v-14.63a49.98 49.98 0 0 0 33.08-33.07z" fill="#4977eb" fill-opacity="1"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-90 64 64" dur="400ms" repeatCount="indefinite"></animateTransform></g></svg>
                                    <div class="live-status"><b>{{uploaded_length + 1}}</b> / <b>{{uploads_length}}</b></div>
                                    <h1 class="uploading_title">{{uploads_name_lists[uploaded_length]}}</h1>
                                </div>
                                <div v-else>
                                    <div v-bar="{scrollThrottle: 30, unselectableBody: false}" class="upload_list_errors">
                                        <div>
                                            <div class="item_error" v-for="item in errors_after_uploading">
                                                <strong>{{item.id + 1}}. {{item.name}}</strong>
                                                <p>{{item.error}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="gallery-btn-upload disabled" :class="{active: uploads_length == uploaded_length && errors_after_uploading.length != 0 }" @click="fetchId">Ясно, закрыть!</button>
                            </div>
                            <label class="upload-visual" v-else-if="BigImgArr.length == 0">
                                <i class="fas fa-upload"></i>
                                <h1>Кликните или перетащите, чтобы загрузить файлы (до {{max_upload_items}}).</h1>
                                <input type="file"  @change="clickFile" multiple style="display: none">
                            </label>
                            <div class="bar-full" v-else>
                                <div v-bar="{scrollThrottle: 30, unselectableBody: false}" class="download-upload">
                                    <div>
                                        <div class="upload-item" v-for="(item, key) in BigImgArr">
                                            <div class="upload-item_preload">
                                                <figure @click="deleteUploadImg(key)">
                                                    <img v-bind:id="'blob-img-' + key" src="" alt="">
                                                </figure>
                                                <div class="upload-item-title">
                                                    <span><b>{{Math.floor(item.file.size/1024)}}kb</b> | {{item.file.name}}</span>
                                                    <span><b>{{Math.floor(item.file.size/1024)}}kb</b> | {{item.file.name}}</span>
                                                </div>
                                            </div>
                                            <div class="upload-item_info">
                                                <label v-bind:for="'blob-img-title-' + key">
                                                    Название фото <span>*необязательно, но желательно</span>
                                                </label>
                                                <input type="text" class="r-input" v-model="item.title" v-bind:id="'blob-img-title-' + key" placeholder="Придумайте название для фото" :maxlength="70">
                                                <label v-bind:for="'blob-img-alt-' + key">
                                                    Описание фото <span>*необязательно, но желательно</span>
                                                </label>
                                                <input type="text" class="r-input" v-model="item.alt" v-bind:id="'blob-img-alt-' + key" placeholder="Придумайте описание для фото" :maxlength="125">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="upload-manage">
                                    <button class="btn-modal m-error" @click="BigImgArr = []">Удалить все</button>
                                    <button class="btn-modal m-warning" @click="uploadToServer('server')">Загрузить на сервер</button>
                                    <button class="btn-modal m-success" @click="uploadToServer('choose')">Загрузить и выбрать</button>
                                </div>
                            </div>
                        </div>
                        <div class="g-files" v-if="all_images">
                            <gallery-card
                                v-for="(file, key) in files"
                                :data="file" v-bind:key="file.id"
                                @deleted="reloadIfEmptyAfterDeleting"
                                @figure_toggle="toggleSelected"
                                :selected="NEWselectedFilesID.indexOf(file.id) != -1"
                            ></gallery-card>
                            <div class="not-files" v-if="this.is_files == 2">
                                <i class="fas fa-file-image"></i>
                                <h1>Нет изображений</h1>
                            </div>
                            <div class="load-files" v-if="this.is_files == 1">
                                <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="64px" height="64px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M78.75 16.18V1.56a64.1 64.1 0 0 1 47.7 47.7H111.8a49.98 49.98 0 0 0-33.07-33.08zM16.43 49.25H1.8a64.1 64.1 0 0 1 47.7-47.7V16.2a49.98 49.98 0 0 0-33.07 33.07zm33.07 62.32v14.62A64.1 64.1 0 0 1 1.8 78.5h14.63a49.98 49.98 0 0 0 33.07 33.07zm62.32-33.07h14.62a64.1 64.1 0 0 1-47.7 47.7v-14.63a49.98 49.98 0 0 0 33.08-33.07z" fill="#4977eb" fill-opacity="1"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-90 64 64" dur="400ms" repeatCount="indefinite"></animateTransform></g></svg>
                                <h1>Загрузка</h1>
                            </div>
                            <div class="g-files-pagination pagination">
                                <div class="r-pg previous"
                                     @click="(current_paginate > 1) ? current_paginate-- : (current_paginate == 1)"
                                     :class="{disabled: current_paginate <= 1}"
                                ><i class="fas fa-angle-left"></i></div>

                                <div class="r-pg"
                                     v-if="last_paginate > 1"
                                     :class="{current: current_paginate == 1}"
                                     @click="current_paginate = 1">
                                    1
                                </div>

                                <div class="r-pg"
                                     v-if="last_paginate == 3"
                                     :class="{current: current_paginate == 2 }"
                                     @click="current_paginate = 2">
                                    2
                                </div>

                                <div class="r-pg point" v-if="last_paginate > 4 && current_paginate > 2 ">...</div>
                                <div class="r-pg"
                                     v-for="(index, key) in 3"
                                     v-if="last_paginate > 4 && current_paginate <= last_paginate - 3"
                                     :class="{current: current_paginate == (key == 0 && current_paginate > 1) ? (current_paginate === current_paginate) : ((current_paginate == 1) ? ((index + current_paginate) === current_paginate) : (current_paginate == 2) ? ((index + 1) === current_paginate) : ((current_paginate + index - 1) === current_paginate)) }"
                                     @click="current_paginate = (key == 0 && current_paginate > 1) ? current_paginate : ((current_paginate == 1) ? (index + current_paginate) : (current_paginate == 2) ? (index + 1) : (current_paginate + index - 1))">
                                    {{(key == 0 && current_paginate > 1) ? current_paginate : ((current_paginate == 1) ? (index + current_paginate) : (current_paginate == 2) ? (index + 1) : (current_paginate + index - 1))}}
                                </div>
                                <div class="r-pg"
                                     v-for="(index, key) in 3"
                                     v-if="current_paginate > last_paginate - 3 && last_paginate > 3"
                                     :class="{current: current_paginate == (last_paginate - 4 + index) }"
                                     @click="current_paginate = (last_paginate - 4 + index)">
                                    {{last_paginate - 4 + index}}
                                </div>


                                <div class="r-pg point" v-if="current_paginate < last_paginate - 3 && last_paginate > 5">...</div>


                                <div class="r-pg"
                                     :class="{current: current_paginate == last_paginate}"
                                     @click="current_paginate = last_paginate"
                                     v-if="1 != last_paginate">
                                    {{last_paginate}}
                                </div>

                                <div class="r-pg next"
                                     @click="(current_paginate < last_paginate) ? current_paginate++ : (current_paginate == last_paginate)"
                                     :class="{disabled: current_paginate >= last_paginate}"
                                ><i class="fas fa-angle-right"></i></div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import {HTTP} from '../../http.js'

    export default {
        props: ['img_category', 'upload_category', 'selectedFilesID', 'max_files', 'call_type', 'callBack'],
        mounted() {
            this.max_upload_items = this.max_files;
            if(this.selectedFilesID.length){
                this.NEWselectedFilesID = this.selectedFilesID;
            }else{
                this.NEWselectedFilesID = [];
            }
        },
        data: function(){
            return{
                BigImgArr: [],
                files: false,
                max_upload_items: 30,
                upload_id_lists: [],
                NEWselectedFilesID: [],

                //services
                gallery_active: false,
                upload_window_drop: false,
                file_categories: [
                    'Vne-Kategorii',
                    'Avatari',
                    'Diplomy',
                    'Preparaty',
                    'All',
                    'My'
                ],

                //tabs
                upload_window: false,
                all_images: false,
                current_category: null,

                //counter
                deleteCount: 0,
                is_files: 0,
                upload_type: null,
                uploads_name_lists: [],
                uploads_length: 0,
                uploaded_length: 0,
                errors_after_uploading: [],



                //pagination
                current_paginate: 1,
                last_paginate: null,

            }
        },
        methods: {
            bringGallery(type){
                this.gallery_active = true;
                this.current_category = this.img_category - 1;
                if(type == 'choose'){
                    this.changeCategory(this.file_categories[this.current_category])
                }else{
                    this.changeCategory('upload');
                }
            },
            fetchId(){
                this.uploads_name_lists = [];
                this.errors_after_uploading = [];
                this.uploads_length = 0;
                this.uploaded_length = 0;
                if(this.upload_id_lists.length == 0){
                    alert('Нет данных для передачи. Пернаправление на окно загрузки!')
                }else{
                    switch(this.upload_type){
                        case 1:
                            //server
                            this.changeCategory(this.file_categories[this.upload_category - 1])
                            break;
                        case 2:
                            this.gallery_active = false;
                            this.$emit('fetch_imagies_id', this.upload_id_lists);
                            if(this.max_upload_items == 1){
                                this.upload_id_lists = [];
                            }
                            break;
                    }
                }
            },
            toggleSelected(data){
                if(data.status){
                    if(this.NEWselectedFilesID.length >= this.max_files){
                        this.NEWselectedFilesID.splice(0, 1);
                    }
                    this.NEWselectedFilesID.push(data.id)
                }else{
                    if(this.NEWselectedFilesID.indexOf(data.id) != -1){
                        this.NEWselectedFilesID.splice(this.NEWselectedFilesID.indexOf(data.id), 1);
                    }
                }
                this.$emit('fetch_imagies_id', this.NEWselectedFilesID);
                if(this.call_type == 'trext'){
                    this.gallery_active = false;
                    this.NEWselectedFilesID = [];
                }

            },
            dropFile(e){
                if(this.BigImgArr.length == 0 && this.uploads_length == 0){
                    let droppedFiles = e.dataTransfer.files;
                    if(!droppedFiles) return;
                    let count_trash = 0;
                    ([...droppedFiles]).forEach((f,k) => {
                        if(f.type.split('/')[0] === 'image'){
                            if(f.type.split('/')[1] !== 'svg+xml'  && k - count_trash + 1 <= this.max_upload_items){
                                this.DrowImgDrop('create', f, k - count_trash);
                            }else{
                                count_trash++;
                            }
                        }else{
                            count_trash++;
                        }
                    });
                }
                if(this.BigImgArr !== null){
                    this.upload_window_drop = false;
                }
            },
            clickFile(e){
                let clickedFiles = e.target.files;
                if(!clickedFiles) return;
                let count_trash = 0;
                ([...clickedFiles]).forEach((f,k) => {
                    if(f.type.split('/')[0] === 'image'){
                        if(f.type.split('/')[1] !== 'svg+xml' && k - count_trash + 1 <= this.max_upload_items){
                            this.DrowImgDrop('create', f, k - count_trash);
                        }else{
                            count_trash++;
                        }
                    }else{
                        count_trash++;
                    }
                });
                if(this.BigImgArr !== null){
                    this.upload_window_drop = false;
                }
            },

            DrowBorderDrop(bool){
                if(this.BigImgArr.length == 0 && this.uploads_length == 0){
                    this.upload_window_drop = bool;
                }
            },
            DrowImgDrop(type, f, k){
                switch (type) {
                    case 'create':
                        var reader = new FileReader();
                        var tinyArr = {file: f, category: this.category, title: null, alt: null}
                        this.BigImgArr.push(tinyArr);

                        reader.readAsDataURL(f)
                        reader.onloadend = function () {
                            document.getElementById('blob-img-' + k).src = reader.result
                        }

                        break;
                    case 'edit':
                        var reader = new FileReader();
                        reader.readAsDataURL(f.file);
                        reader.onloadend = function () {
                            document.getElementById('blob-img-' + k).src = reader.result;
                        }
                        break;
                }

            },
            deleteUploadImg(key){
                this.BigImgArr.splice(key, 1);
                this.BigImgArr.forEach((f, k) => {
                    this.DrowImgDrop('edit', f, k);
                })
            },
            reloadIfEmptyAfterDeleting(){
                this.deleteCount++;
                if(this.files.length - this.deleteCount <= 0){
                    this.is_files = 2;
                }
            },

            changeCategory(val){
                this.current_category = null;
                switch (val) {
                    case 'Vne-Kategorii':
                        this.current_category = 0;
                        this.upload_window = false;
                        this.all_images = true;
                        break;
                    case 'Avatari':
                        this.current_category = 1;
                        this.upload_window = false;
                        this.all_images = true;
                        break;
                    case 'Diplomy':
                        this.current_category = 2;
                        this.upload_window = false;
                        this.all_images = true;
                        break;
                    case 'Preparaty':
                        this.current_category = 3;
                        this.upload_window = false;
                        this.all_images = true;
                        break;
                    case 'All':
                        this.current_category = 4;
                        this.upload_window = false;
                        this.all_images = true;
                        break
                    case 'My':
                        this.current_category = 5;
                        this.upload_window = false;
                        this.all_images = true;
                        break
                    case 'upload':
                        this.upload_window = true;
                        this.all_images = false;
                        break;
                }
                this.current_paginate = 1;
                this.last_paginate = null;
            },

            uploadToServer(type){
                switch (type) {
                    case 'server':
                        this.upload_type = 1;
                        break;
                    case 'choose':
                        this.upload_type = 2;
                        break;

                }
                this.uploads_length = this.BigImgArr.length;
                this.BigImgArr.forEach((f,k) => {
                    let Data = new FormData();
                    Data.append('file', f.file);
                    Data.append('category', f.category);
                    Data.append('title', f.title);
                    Data.append('alt', f.alt);
                    Data.append('category', this.upload_category);

                    this.uploads_name_lists.push(f.file.name);

                    HTTP.post(`gallery/upload`, Data, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then(response => {
                        this.uploaded_length++;
                        this.upload_id_lists.push(response.data)
                        if(this.uploaded_length == this.uploads_length && this.errors_after_uploading.length == 0){
                            this.fetchId();
                        }
                    }).catch(error => {
                        if(error.response.status === 403){
                            this.errors_after_uploading.push({id: this.uploaded_length, name: this.uploads_name_lists[this.uploaded_length], error: error.response.data})
                        }else{
                            this.errors_after_uploading.push({id: this.uploaded_length, name: this.uploads_name_lists[this.uploaded_length], error: error.response.data.message});
                        }
                        this.uploaded_length++;
                    })
                });
                this.BigImgArr = [];
            },
            getFiles(caregory){
                this.is_files = 1;
                HTTP.post(`gallery/get/all?page=` + this.current_paginate, {
                    category: this.current_category + 1,
                }).then(response =>{
                    this.files = response.data.gallery_files.data;
                    if(this.files.length == 0){
                        this.is_files = 2;
                    }else{
                        this.is_files = 0;
                        this.current_paginate = response.data.gallery_files.current_page;
                        this.last_paginate = response.data.gallery_files.last_page;
                    }
                }).catch(error => {
                    if(error.response.status === 403){
                        alert(error.response.data);
                    }
                })
            }
        },
        watch: {
            current_category(to){
                this.getFiles(this.current_category);
            },
            current_paginate(to){
                this.getFiles(this.current_category);
            },
            selectedFilesID(to){
                if(this.selectedFilesID){
                    this.NEWselectedFilesID = this.selectedFilesID;
                }else{
                    this.NEWselectedFilesID = [];
                }
            },
            callBack(){
                this.bringGallery('choose');
            }
        }
    }
</script>

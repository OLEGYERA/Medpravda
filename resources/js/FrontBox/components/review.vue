<template>
    <div class="add-review">
        <div class="review-visual" @click="showModal = true" v-if="lang == 'ru'">+ Оставить отзыв</div>
        <div class="review-visual" @click="showModal = true" v-else>+ Залишити відгук</div>
        <div class="review-modal" v-if="showModal">
            <div class="modal-box">
                <header class="modal-header">
                    <h2 v-if="lang == 'ru'">Написать отзыв {{getTitle}}</h2>
                    <h2 v-else>Написати відгук {{getTitle}}</h2>
                    <svg @click="showModal = false" class="exit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                </header>
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="rating">
                            <h3 v-if="lang == 'ru'">Поставьте оценки</h3>
                            <h3 v-else>Поставте оцінки</h3>
                            <ul class="rating-list">
                                <li class="rating-item">
                                    <span class="rating-item-title" v-if="lang == 'ru'">Качество:</span>
                                    <span class="rating-item-title" v-else>Якість:</span>
                                    <stars @getChoosenStar="qualityRating" :error="rating_error && quality == null"></stars>
                                </li>
                                <li class="rating-item">
                                    <span class="rating-item-title" v-if="lang == 'ru'">Упаковка:</span>
                                    <span class="rating-item-title" v-else>Упаковка:</span>
                                    <stars @getChoosenStar="packagingRating" :error="rating_error && packaging == null"></stars>
                                </li>
                                <li class="rating-item">
                                    <span class="rating-item-title" v-if="lang == 'ru'">Эффект:</span>
                                    <span class="rating-item-title" v-else>Ефект:</span>
                                    <stars @getChoosenStar="effectRating" :error="rating_error && effect == null"></stars>
                                </li>
                                <li class="rating-item">
                                    <span class="rating-item-title" v-if="lang == 'ru'">Безопасность:</span>
                                    <span class="rating-item-title" v-else>Безпека:</span>
                                    <stars @getChoosenStar="safetyRating" :error="rating_error && safety == null"></stars>
                                </li>
                                <li class="rating-item">
                                    <span class="rating-item-title" v-if="lang == 'ru'">Доступность:</span>
                                    <span class="rating-item-title" v-else>Доступність:</span>
                                    <stars @getChoosenStar="availabilityRating" :error="rating_error && availability == null"></stars>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <label for="worth" v-if="lang == 'ru'">Достоинства</label>
                        <label for="worth" v-else>Переваги</label>
                        <input type="text" id="worth" v-model="worth" class="review-input">

                        <label for="limitations" v-if="lang == 'ru'">Недостатки</label>
                        <label for="limitations" v-else>Недоліки</label>
                        <input type="text" id="limitations" v-model="limitations" class="review-input">

                        <label for="review" v-if="lang == 'ru'">Отзыв</label>
                        <label for="review" v-else>Відгук</label>
                        <textarea v-model="review" id="review" class="review-text"></textarea>

<!--                        <div class="review-chekbox">-->
<!--                            <input type="checkbox" id="email-accept" ch-status="false">-->
<!--                            <label for="email-accept">Уведомлять об ответах по электронной почте</label>-->
<!--                        </div>-->
                    </div>

                    <div class="auth-error" v-if="oauthError && lang == 'ru'">Вы уже оставили отзыв!</div>
                    <div class="auth-error" v-else-if="oauthError">Ви вже залишили відгук!</div>
                    <div class="google-auth" @click="sendReview" v-if="lang == 'ru'">
                        <img src="/img/FrontBox/Logo/goo.png"> Оставить отзыв
                    </div>
                    <div class="google-auth" @click="sendReview" v-else>
                        <img src="/img/FrontBox/Logo/goo.png"> Залишити відгук
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {HTTP} from "../http.js";

    export default {
        props: ['lang'],
        mounted() {
        },
        data: function () {
            return {
                //ratings
                quality: null,
                packaging: null,
                effect: null,
                safety: null,
                availability: null,

                //text
                worth: null,
                limitations: null,
                review: null,

                //services
                showModal: false,
                rating_error: false,
                oauthError: false,
            }
        },
        computed: {
            getTitle() {
                return window.reviewTitle;
            },
            getAlias() {
                return window.reviewAlias;
            }
        },
        methods:{
            qualityRating(id){
                this.quality = id;
            },
            packagingRating(id){
                this.packaging = id;
            },
            effectRating(id){
                this.effect = id;
            },
            safetyRating(id){
                this.safety = id;
            },
            availabilityRating(id){
                this.availability = id;
            },
            sendReview(){
                if(this.quality !== null && this.packaging !== null && this.effect !== null && this.safety !== null && this.availability !== null){
                    this.$gAuth.signIn().then(user => {
                    HTTP.post(`/new/review/` + this.getAlias,
                        {
                            user: user.Ot,
                            rating: {
                                quality: this.quality,
                                packaging: this.packaging,
                                effect: this.effect,
                                safety: this.safety,
                                availability: this.availability,
                            },
                            text: {
                                worth: this.worth,
                                limitations: this.limitations,
                                review: this.review,
                            }
                        }).then(response => {
                            this.showModal = false;
                            this.oauthError = false;
                            document.location.reload(true);
                        }).catch(error =>{
                            if(error.response.status == 429){
                                this.oauthError = true;
                            }
                        })
                    })
                }
                else{
                    this.rating_error = true;
                }
            },
        },
        watch: {
            showModal(to){
                if(to){
                    document.getElementsByTagName('html')[0].style.overflow = 'hidden';
                }
                else{
                    document.getElementsByTagName('html')[0].style.overflow = 'unset';
                }
            }
        }
    }
</script>

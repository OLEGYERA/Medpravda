<template>
    <div class="review-box">
        <div class="review-info">
            <div class="review-counter">
                <i class="icon-comments"></i>
                <span class="counter-title">
                    20 отзывов
                </span>
            </div>
            <div class="review-sorting">
                <label for="sorting-box">Сортировать: </label>
                <select v-model="sort" id="sorting-box">
                    <option value="1">Популярные</option>
                    <option value="2">Новые</option>
                    <option value="3">Старые</option>
                </select>
            </div>
        </div>
        <div class="review-add">
            <h2 class="review-title">Оставить отзыв</h2>
            <div class="stars-block" @mouseover="hoverBlock = 1" @mouseleave="hoverBlock = 0">
                <div class="star-box" @mouseover="hover_id = 1" @mouseleave="hover_id = null">
                    <i :class="showStars(1)"></i>
                    <div class="star-title">
                        Плохой
                    </div>
                </div>
                <div class="star-box" @mouseover="hover_id = 2" @mouseleave="hover_id = null">
                    <i :class="showStars(2)"></i>
                    <div class="star-title">
                        Так себе
                    </div>
                </div>
                <div class="star-box" @mouseover="hover_id = 3" @mouseleave="hover_id = null">
                    <i :class="showStars(3)"></i>
                    <div class="star-title">
                        Нормальный
                    </div>
                </div>
                <div class="star-box" @mouseover="hover_id = 4" @mouseleave="hover_id = null">
                    <i :class="showStars(4)"></i>
                    <div class="star-title">
                        Хороший
                    </div>
                </div>
                <div class="star-box" @mouseover="hover_id = 5" @mouseleave="hover_id = null">
                    <i :class="showStars(5)"></i>
                    <div class="star-title">
                        Отличный
                    </div>
                </div>
            </div>
            <div class="form-field">
                <input type="text" class="review-input" placeholder="Достоинства">
                <input type="text" class="review-input" placeholder="Недостатки">
                <textarea class="review-input" placeholder="Комментарий"></textarea>
            </div>
            <div class="form-submit">
                <div class="mp-btn">Оставить отзыв</div>
            </div>
        </div>
        <div class="reviews">

        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                sort: 2,

                hover_id: null,
                choosen_id: null,
                hoverBlock: false,
            }
        },
        methods: {
            showStars(id){
                if(this.hoverBlock){
                    return this.hover_id == null ? 'icon-empty-star' : (this.hover_id >= id ? 'icon-star' : 'icon-empty-star');
                }
                else{
                    return this.choosen_id == null ? 'icon-empty-star' : (this.choosen_id >= id ? 'icon-star' : 'icon-empty-star');
                }
            }
        }
    }
</script>

<template>
    <div class="reactive-toolbar flex-row-sb-s">
        <div class="toggle-menu flex-row-c-c" @click="toggleMenu">
            <i class="fas fa-compass"></i>
        </div>
        <div class="reactive-search flex-col-s-c">
            <div class="search-field flex-row-s-c">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Найти пользователя, препарат, статью и тд.">
            </div>
            <div class="search-result"></div>
        </div>
<!--        <div class="error-menu flex-row-c-c">-->

<!--        </div>-->
        <div class="notification-menu flex-row-c-c">

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('toolbar')
        },
        methods: {
            toggleMenu(){
                if($('.aside-panel').hasClass('small')){
                    $('.aside-panel').removeClass('small');
                }
                else{
                    $('.aside-panel').addClass('small');
                }
            },
        }
    }
</script>

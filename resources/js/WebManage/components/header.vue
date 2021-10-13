<template>
    <transition name="slideY-header">
        <div class="wm-header" v-show="pTgStatus">

        </div>
    </transition>
</template>

<script>
export default {
    props: ['pTgStatus'],
}
</script>

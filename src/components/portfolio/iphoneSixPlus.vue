<template>
<div class="phone" v-bind:style="{ 'background-image': 'url(' + bgImage + ')' }">
    <div class="screen" v-bind:style="{ 'background-image': 'url(' + screenshot + ')' }"></div>
</div>
</template>

<script>
const phoneImage = require('./iphone-6plus.png')
export default {
    name: 'iphone-six-plus',
    props: ['screenshot'],
    data () {
        return {
            bgImage: phoneImage
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .phone {
        width: 130px;
        height: 250px;
        background-size: contain;
    }

    .screen {
        position: relative;
        width: 110px;
        height: 177px;
        top: 33px;
        left: 10px;
        background-size: cover;
    }
</style>

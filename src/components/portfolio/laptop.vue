<template>
<div class="device" v-bind:style="{ 'background-image': 'url(' + bgImage + ')' }">
    <div class="screen" v-bind:style="{ 'background-image': 'url(' + screenshot + ')' }"></div>
</div>
</template>

<script>
const bgImage = require('./laptop.png')
export default {
    name: 'laptop',
    props: ['screenshot'],
    data () {
        return {
            bgImage
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
/*
 * Computer is 1792x1186 px
 * Screen is 1440x1022 px
 */

$device-width: 1792px;
$device-height: 1186px;

$screen-width: 1440px;
$screen-height: 1022px;

$screen-top: 66px;
$screen-left: 174px;

$mobile-divisor: 4;
$tablet-divisor: 3;

.device {
    display: inline-block;
    background-size: contain;
}
.screen {
    position: relative;
    background-size: cover;
}

@media (max-width: $mobile-max-width) {
    .device {
        width: $device-width/$mobile-divisor;
        height: $device-height/$mobile-divisor;
    }
    .screen {
        width:  $screen-width/$mobile-divisor;
        height:  $screen-height/$mobile-divisor;
        top: $screen-top/$mobile-divisor;
        left: $screen-left/$mobile-divisor;
    }
}

@media (min-width: $tablet-min-width) {
    .device {
        width: $device-width/$tablet-divisor;
        height: $device-height/$tablet-divisor;
    }
    .screen {
        width: $screen-width/$tablet-divisor;
        height: $screen-height/$tablet-divisor;
        top: $screen-top/$tablet-divisor;
        left: $screen-left/$tablet-divisor;
    }
}
</style>

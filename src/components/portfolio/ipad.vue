<template>
<div class="device" v-bind:style="{ 'background-image': 'url(' + bgImage + ')' }">
    <div class="screen" v-bind:style="{ 'background-image': 'url(' + screenshot + ')' }"></div>
</div>
</template>

<script>
const bgImage = require('./ipad.png')
export default {
    name: 'ipad',
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
 * Phone is 900x1200 px
 * Screen is 768x1024 px
 */

$device-width: 900px;
$device-height: 1200px;

$screen-width: 768px;
$screen-height: 1024px;

$screen-top: 94px;
$screen-left: 68px;

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

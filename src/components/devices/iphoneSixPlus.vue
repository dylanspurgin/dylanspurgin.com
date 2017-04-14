<template>
<div class="device" v-bind:style="{ 'background-image': 'url(' + bgImage + ')' }">
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
<style lang="scss" scoped>
/*
 * Frame is 468x945 px
 * Natural screen size is 414x736 px
 */

$device-width: 468px;
$device-height: 945px;

$screen-width: 414px;
$screen-height: 736px;

$screen-top: 102px;
$screen-left: 24px;

$iphone5-divisor: 8;
$iphone6-divisor: 6;
$tablet-divisor: 4;
$desktop-divisor: 3;

.device {
    display: inline-block;
    background-size: contain;
}
.screen {
    position: relative;
    background-size: cover;
    background-repeat: no-repeat;
}

// Smallest phones up to iphone 5
@media (max-width: $iphone-five-max-width) {
    .device {
        width: $device-width/$iphone5-divisor;
        height: $device-height/$iphone5-divisor;
    }
    .screen {
        width:  $screen-width/$iphone5-divisor;
        height:  $screen-height/$iphone5-divisor;
        top: $screen-top/$iphone5-divisor;
        left: $screen-left/$iphone5-divisor;
    }
}

// iphone 6 larger phones
@media (min-width: $iphone-six-min-width) {
    .device {
        width: $device-width/$iphone6-divisor;
        height: $device-height/$iphone6-divisor;
    }
    .screen {
        width:  $screen-width/$iphone6-divisor;
        height:  $screen-height/$iphone6-divisor;
        top: $screen-top/$iphone6-divisor;
        left: $screen-left/$iphone6-divisor;
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

@media (min-width: $desktop-min-width) {
    .device {
        width: $device-width/$desktop-divisor;
        height: $device-height/$desktop-divisor;
    }
    .screen {
        width: $screen-width/$desktop-divisor;
        height: $screen-height/$desktop-divisor;
        top: $screen-top/$desktop-divisor;
        left: $screen-left/$desktop-divisor;
    }
}
</style>

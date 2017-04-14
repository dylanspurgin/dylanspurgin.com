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

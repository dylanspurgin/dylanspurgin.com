<template>
    <div class="site-content products">
        <h2>Products</h2>

        <h3>Responsive Web Applications</h3>
        <p>I have been building large applications for the web for over 5 years.</p>
        <p>The screenshots below of a project I built with the help of my daughter hightlight some of the features typical in a usable and maintainable modern web app. Checkout the <a href="https://dylanspurgin.github.io/monster-browser" target="_blank">Monster Browser <i class="ds-icon ds-icon--new-tab"></i></a> app or <a href="https://github.com/dylanspurgin/monster-browser" target="_blank">browse the source <i class="ds-icon ds-icon--new-tab"></i></a>.</p>
        <div class="devices-container">
            <iphone-six-plus
                v-bind:screenshot="monsterBrowserScreenshotIPhoneSixPlus"
                class="portfolio-device"></iphone-six-plus>
            <ipad
                v-bind:screenshot="monsterBrowserScreenshotIPad"
                class="portfolio-device"></ipad>
            <laptop
                v-bind:screenshot="monsterBrowserScreenshotLaptop"
                class="portfolio-device"></laptop>
        </div>

        <h3>High-Impact Marketing Sites</h3>
        <p>SEO ready, custom web experiences that are easily editable by you and help you make the best impression to your client no matter what device they are on.</p> <p>Below is a recent example of a site I built for WorkShift; a company doing unique offsite meeting experiences. See in in action at <a href="https://www.offsiteatx.com" target="_blank">OffsiteATX.com <i class="ds-icon ds-icon--new-tab"></i></a>.</p>
        <div class="devices-container">
            <iphone-six-plus
                v-bind:screenshot="offsiteAtxScreenshotIPhoneSixPlus"
                class="portfolio-device"></iphone-six-plus>
            <ipad
                v-bind:screenshot="offsiteAtxScreenshotIPad"
                class="portfolio-device"></ipad>
            <laptop
                v-bind:screenshot="offsiteAtxScreenshotLaptop"
                class="portfolio-device"></laptop>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .devices-container {
        text-align: center;
    }
    @media (max-width: $mobile-max-width) {
        .portfolio-device {
            margin: 10px;
        }
    }
    @media (min-width: $tablet-min-width) {
        .portfolio-device {
            margin: 40px;
        }
    }
</style>

<script>
    import iphoneSixPlus from './devices/iphoneSixPlus'
    import ipad from './devices/ipad'
    import laptop from './devices/laptop'

    const monsterBrowserScreenshotIPhoneSixPlus = require('../assets/portfolio/monster-browser--iphone6plus.jpg')
    const monsterBrowserScreenshotIPad = require('../assets/portfolio/monster-browser--ipad.jpg')
    const monsterBrowserScreenshotLaptop = require('../assets/portfolio/monster-browser--laptop.jpg')

    const offsiteAtxScreenshotIPhoneSixPlus = require('../assets/portfolio/workshift-iphone6plus.jpg')
    const offsiteAtxScreenshotIPad = require('../assets/portfolio/workshift-ipad.jpg')
    const offsiteAtxScreenshotLaptop = require('../assets/portfolio/workshift-laptop.jpg')

    export default {
        name: 'products',
        data () {
            return {
                monsterBrowserScreenshotIPhoneSixPlus,
                monsterBrowserScreenshotIPad,
                monsterBrowserScreenshotLaptop,
                offsiteAtxScreenshotIPhoneSixPlus,
                offsiteAtxScreenshotIPad,
                offsiteAtxScreenshotLaptop
            }
        },
        components: { iphoneSixPlus, ipad, laptop }
    }
</script>

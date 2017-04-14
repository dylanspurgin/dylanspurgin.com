<template>
    <div class="site-content">
        <h2>Portfolio</h2>

        <h3>WaldenHyde.com</h3>
        <p>This site for the design agency Walden Hyde was a collaboration between myself and their design team. Basic site design and direction was provided by the agency. I developed the site as a WordPress theme and provided guidance for design decisions
            related to web best practices.</p>
        <p>The site is fully responsive, with mobile-specific navigation for iPad and smaller devices.</p>

        <div class="devices-container">
            <iphone-six-plus
                v-bind:screenshot="waldenHydeScreenshotIPhoneSixPlus"
                class="portfolio-device"></iphone-six-plus>
            <ipad
                v-bind:screenshot="waldenHydeScreenshotIPad"
                class="portfolio-device"></ipad>
            <laptop
                v-bind:screenshot="waldenHydeScreenshotLaptop"
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

    const waldenHydeScreenshotIPhoneSixPlus = require('../assets/portfolio/waldenhyde-home-iphone6plus.png')
    const waldenHydeScreenshotIPad = require('../assets/portfolio/waldenhyde-home-ipad.jpg')
    const waldenHydeScreenshotLaptop = require('../assets/portfolio/waldenhyde-home-laptop.png')

    export default {
        name: 'portfolio',
        data () {
            return {
                waldenHydeScreenshotIPhoneSixPlus,
                waldenHydeScreenshotIPad,
                waldenHydeScreenshotLaptop
            }
        },
        components: { iphoneSixPlus, ipad, laptop }
    }
</script>

<template>
    <div class="site-content">
        <h2>Portfolio</h2>

        <h3>WaldenHyde.com <a href="http://www.waldenhyde.com/" target="_blank"><i class="ds-icon ds-icon--new-tab"></i></a></h3>
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

        <h3>LawnStarter</h3>
        <p>I lead front-end development at LawnStarter for a little over a year. In that time I worked to bring the three Angular apps up to current standards. I implemented Angular best practices including conforming to John Papa's style guide, adding test cases, and a gulp (later webpack) development and deployment process.</p>
        <p>The customer web app allows users to order, monitor and manage lawn care service for multiple properties.</p>

        <div class="devices-container">
            <laptop
                v-bind:screenshot="myLawnstarterLaptop"
                class="portfolio-device"></laptop>
        </div>

        <p>The app for lawn care professionals has a variety of functionality including scheduling and managing service, messaging customers, and crew management.</p>
        <div class="devices-container">
            <laptop
                v-bind:screenshot="prosLawnstarterLaptop"
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

    const waldenHydeScreenshotIPhoneSixPlus = require('../assets/portfolio/waldenhyde-home-iphone6plus.jpg')
    const waldenHydeScreenshotIPad = require('../assets/portfolio/waldenhyde-home-ipad.jpg')
    const waldenHydeScreenshotLaptop = require('../assets/portfolio/waldenhyde-home-laptop.jpg')

    const prosLawnstarterLaptop = require('../assets/portfolio/pros.lawnstarter-laptop.jpg')
    const myLawnstarterLaptop = require('../assets/portfolio/my.lawnstarter-laptop.jpg')

    export default {
        name: 'portfolio',
        data () {
            return {
                waldenHydeScreenshotIPhoneSixPlus,
                waldenHydeScreenshotIPad,
                waldenHydeScreenshotLaptop,

                myLawnstarterLaptop,
                prosLawnstarterLaptop
            }
        },
        components: { iphoneSixPlus, ipad, laptop }
    }
</script>

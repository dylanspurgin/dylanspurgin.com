<template>
<div class="site-content">
    <h2>Portfolio</h2>

    <h3>WaldenHyde.com</h3>
    <p>This site for the design agency Walden Hyde was a collaboration between myself and their design team. Basic site design and direction was provided by the agency. I developed the site as a WordPress theme and provided guidance for design decisions
        related to web best practices.</p>
    <p>The site is fully responsive, with mobile-specific navigation for iPad and smaller devices.</p>

    <iphone-six-plus v-bind:screenshot="waldenHydeScreenshotIPhoneSixPlus"></iphone-six-plus>
</div>
</template>

<script>
import iphoneSixPlus from './iphoneSixPlus'
const waldenHydeScreenshotIPhoneSixPlus = require('../../assets/portfolio/waldenhyde-home-iphone6plus.png')
export default {
    name: 'portfolio',
    data () {
        return {
            foo: 'bar',
            waldenHydeScreenshotIPhoneSixPlus: waldenHydeScreenshotIPhoneSixPlus
        }
    },
    components: { iphoneSixPlus }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>

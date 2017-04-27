<template>
    <div class="site-content products">
        <h2>Products</h2>

        <h3>Web Applications and Components</h3>
        <h4>Features include</h4>
        <ul>
            <li>Well presented data</li>
            <li>Intuitive workflows</li>
            <li>Responsive designs</li>
            <li>Well tested, maintainable code base</li>
        </ul>
        <p>I have been building large applications for the web for over 5 years.
            Past projects include a video content management system and lawn
            care service provider and consumer management applications.</p>
        <p>As a lone-wolf or a senior-level team member, I deliver high-quality
            web applications or drop-in web components that your clients (and
            dev team) will fall in love with.</p>

        <h3>High-Impact Marketing Sites</h3>
        <h4>Features include</h4>
        <ul>
            <li>Custom designs</li>
            <li>Editable site content</li>
            <li>Site analytics</li>
            <li>Fully responsive - Works on all devices</li>
            <li>Search Engine Optimized</li>
        </ul>
        <p>SEO ready, custom web experiences that are easily editable by you and
            help you make the best impression to your client no matter what
            device they are on.</p>

        <h3>Proof of Concept Mobile Apps</h3>
        <h4>Features include</h4>
        <ul>
            <li>iOS and Android apps</li>
            <li>Private distribution to testers, internal users, or clients</li>
            <li>Short development times</li>
        </ul>
        <p>Quickly prove out your next big app idea and get it in front of your
            users fast. Delivery times as short as two weeks means
            you can get crucial feedback on your app while you iterate on your
            idea.</p>

        <h3>Production Ready Mobile Apps</h3>
        <h4>Features include</h4>
        <ul>
            <li>iOS and Android apps</li>
            <li>Published and live in the App and Play stores</li>
            <li>App install and usage analytics</li>
        </ul>
        <p>High quality, well tested mobile apps for both iOS and Android users.</p>

        <h3>Something Else?</h3>
        <p>Have another web or app project in mind? I'd love to discuss it with
            you. Please, <router-link :to="{name: 'Contact'}">get in touch</router-link>!</p>
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

    const offsiteAtxScreenshotIPhoneSixPlus = require('../assets/portfolio/workshift-iphone6plus.jpg')
    const offsiteAtxScreenshotIPad = require('../assets/portfolio/workshift-ipad.jpg')
    const offsiteAtxScreenshotLaptop = require('../assets/portfolio/workshift-laptop.jpg')

    export default {
        name: 'products',
        data () {
            return {
                offsiteAtxScreenshotIPhoneSixPlus,
                offsiteAtxScreenshotIPad,
                offsiteAtxScreenshotLaptop
            }
        },
        components: { iphoneSixPlus, ipad, laptop }
    }
</script>

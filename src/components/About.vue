<template>
    <div class="site-content">
        <h2>About</h2>
        <div class="about-content-wrapper">
            <div class="about-image-wrapper">
                <div class="about-portrait"
                    v-bind:style="{ 'background-image': 'url(' + familyImage + ')' }"></div>
            </div>
            <div>
                <h3>Hi, I'm Dylan.</h3>
                <p>I am a software engineer from Austin, Tx.</p>
                <p>I love creating unique user experiences for the web and mobile devices. Most recently I have been building AngularJS and VueJs applications, Ionic hybrid-mobile apps, and WordPress sites. I am also experimenting with Vue.js and the web components standards. But the technology always comes second to the end result.</p>
                <p>
                    <router-link :to="{name: 'Resume'}">Resume</router-link>
                    |
                    <a href="https://github.com/dylanspurgin" target="_blank">Github</a>
                    |
                    <a href="https://www.linkedin.com/in/dylan-spurgin" target="_blank">LinkedIn</a>
                    |
                    <a href="https://www.instagram.com/dylanwinsyo/" target="_blank">Instagram</a>
                    |
                    <a href="http://followthepurplepony.com" target="_blank">Travel Blog</a>
                    |
                    <a href="https://www.youtube.com/channel/UCG4a-zwe9-0ADbhD4z87fhQ" target="_blank">YouTube</a>
                    </p>

                <h3>Currently seeking</h3>
                <p>I am currently seeking opportunities to work with:</p>
                <ul>
                    <li>great designers to deliver high-quality web experiences</li>
                    <li>great ideas to deliver rapid-prototypes of web and mobile apps</li>
                    <li>small businesses to deliver effective, responsive sites that connect you to your target audience</li>
                </ul>

                <h3>More about me</h3>
                <p>I am a husband and father. I am currently traveling with my
                    wife and daughter - living in a travel trailer we have
                    dubbed
                    <a href="http://followthepurplepony.com" target="_blank">The Purple Pony</a>.
                </p>
                <p>In my free time I ride all the bicycles, rock climb, build lego,
                    bird watch, and play disc golf. I also love to spend time
                    with friends and family in Austin, playing board games or
                    hanging out by the water.</p>

            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    @media (max-width: $mobile-max-width) {
        .about-content-wrapper {
            display: flex;
            flex-direction: column;
        }
    }
    @media (min-width: $tablet-min-width) {
        .about-content-wrapper {
            display: flex;
            flex-direction: row;
        }
        .about-image-wrapper {
            min-width: 40%;
            padding: 40px 40px 0 0;
        }
    }

    .about-portrait {
        background-size: contain;
        position: relative;
        border-radius: 50%;
        width: 100%;
        height: auto;
        padding-top: 100%;
    }
</style>

<script>
const familyImage = require('../assets/family-fisheye.jpg')

export default {
    name: 'about',
    data: () => ({
        familyImage
    })
}
</script>

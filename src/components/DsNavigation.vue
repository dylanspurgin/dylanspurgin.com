<style lang="scss">

$menu-item-size--small: 60px;
$menu-item-size--medium: 140px;
$menu-item-size--large: 180px;

$menu-item-mobile-docked-size: 36px;
$menu-item-docked-size--small: 40px;

$menu-font-size--portrait: 4vw;
$menu-font-size--landscape: 3vh;

$menu-mobile-docked-font-size: 2vw;
$menu-docked-font-size--portrait: 1vw;
$menu-docked-font-size--landscape: 1vh;

$menu-highlight-color: #ccc;

a,
a:visited {
    color: $brand-color;
}
a.router-link-active {
    font-weight: bold;
}

.nav-button {
    -webkit-transition: all 1s ease;
    transition: all 1s ease;
    text-align: center;
}
.nav-button:hover {
    cursor: pointer;
}

.menu-image-container {
    background-size: contain;
    -webkit-transition: all 1s ease;
    transition: all 1s ease;
}

/*
 * Undocked main nav.
 * Portrait orientation.
 * All sizes
 */
@media (orientation:portrait) {
    nav {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
        position: absolute;
        top: 20vh;
        left: 50vw;
        margin-left: -30vw;
        width: 60vw;
        height: 60vw;
        -webkit-transition: all .5s ease;
        transition: all .5s ease;
        .menu-image-container {
            width: 18vw;
            height: 18vw;
            position: relative;
            margin: 0 auto 2vw auto;
        }
        .nav-button {
            text-decoration: none;
            width: 50%;
        }
        .menu-label {
            font-size: $menu-font-size--portrait;
        }
    }
}

/*
 * Undocked main nav.
 * Landscape orientation.
 * All sizes
 */
@media (orientation:landscape) {
    nav {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
        position: absolute;
        top: 20vh;
        left: 50vw;
        margin-left: -25vh;
        width: 50vh;
        height: 60vh;
        -webkit-transition: all .5s ease;
        transition: all .5s ease;
        .menu-image-container {
            width: 18vh;
            height: 18vh;
            margin: 0 auto 0 auto;
            position: relative;
        }
        .nav-button {
            text-decoration: none;
            width: 50%;
        }
        .menu-label {
            font-size: $menu-font-size--landscape;
        }
    }
}

nav.docked {
    .hidden-docked {
        display: none;
    }
}



/*
 * PHONE
 * Portrait & Landscape
 * DOCKED (bottom)
 */
@media (max-width: $mobile-max-width) {
    nav.docked {
        background-color: #fff;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: nowrap;
        align-items: center;
        position: fixed;
        top: 100%;
        left: 0;
        width: 100%;
        height: $mobile-nav-height;
        margin-left: 0;
        z-index: 100;
        margin-top: -$mobile-nav-height;
        line-height: $menu-font-size--portrait;
        box-shadow: 0px -1px 2px 0px #ccc;

        .nav-button {
            flex-grow: 1;
            position: relative;
            top: initial;
            left: initial;
            margin: 0;
            height: 100%;
            .menu-image-container {
                width: $menu-item-mobile-docked-size;
                height: $menu-item-mobile-docked-size;
                margin: 8px auto 0 auto;
                position: relative;
            }
            .circle {
                display: none;
            }
            .menu-label {
                font-size: $menu-mobile-docked-font-size;
            }
        }
    }
}


/*
 * TABLET & DESKTOP
 * Portrait & Landscape
 * Docked (right)
 */
@media (min-width: $tablet-min-width) {

    // DOCKED (RIGHT) NAV
    nav.docked {
        background-color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        flex-wrap: nowrap;
        align-items: center;
        position: fixed;
        top: $header-height;
        left: 100vw;
        margin-left: -$menu-item-size--small;
        z-index: 100;
        width: $menu-item-size--small;
        height: $menu-item-size--small*5;

        .nav-button {
            flex-grow: 1;
            width: 100%;
            position: relative;
            top: initial;
            margin: 0;
            left: initial;
            .menu-image-container {
                width: $menu-item-docked-size--small;
                height: $menu-item-docked-size--small;
                margin: 0 auto;
                position: relative;
            }
            .circle {
                width: $menu-item-size--small;
                height: $menu-item-size--small;
                top: 0;
                left: 0;
                margin: 0 auto;
                position: absolute;
                border-radius: $menu-item-docked-size--small;
            }
        }
    }
}


/*
 * TABLET & DESKTOP
 * Portrait
 * Docked (right)
 */
@media (min-width: $tablet-min-width) and (orientation:portrait) {
    nav.docked {
        .menu-label {
            font-size: $menu-docked-font-size--portrait;
        }
    }
}
/*
 * TABLET & DESKTOP
 * Portrait
 * Docked (right)
 */
@media (min-width: $tablet-min-width) and (orientation:landscape) {
    nav.docked {
        .menu-label {
            font-size: $menu-docked-font-size--landscape;
        }
    }
}



.circle {
    position: absolute;
    border-radius: 0vw;
    background: $menu-highlight-color;
    opacity: .3;
    width: 0px;
    height: 0px;
    -webkit-transition: all .5s ease;
    transition: all .5s ease;
}

.nav-button.docked .circle {
    top: 0vw;
    left: 0vw;
    opacity: 0;
}

.nav-button.docked.router-link-active .circle {
    opacity: .3;
    top: 0vw;
    left: 0vw;
}

</style>

<template>
<nav v-bind:class="{ docked: navOnSide }">
    <router-link class="nav-button" id="button-1" :to="{name: 'Portfolio'}" v-bind:class="{ docked: navOnSide }">
        <span class="circle"></span>
        <div class="menu-item-container">
            <div class="menu-image-container" v-bind:style="{ 'background-image': 'url(' + image1 + ')' }">
            </div>
            <span class="menu-label">Portfolio</span>
        </div>
    </router-link>
    <router-link class="nav-button" id="button-2" :to="{name: 'Products'}" v-bind:class="{ docked: navOnSide }">
        <span class="circle"></span>
        <div class="menu-item-container">
            <div class="menu-image-container" v-bind:style="{ 'background-image': 'url(' + image2 + ')' }">
            </div>
            <span class="menu-label">Products</span>
        </div>
    </router-link>
    <router-link class="nav-button" id="button-3" :to="{name: 'Contact'}" v-bind:class="{ docked: navOnSide }">
        <span class="circle"></span>
        <div class="menu-item-container">
            <div class="menu-image-container" v-bind:style="{ 'background-image': 'url(' + image3 + ')' }">
            </div>
            <span class="menu-label">Contact</span>
        </div>
    </router-link>
    <router-link class="nav-button" id="button-4" :to="{name: 'Resume'}" v-bind:class="{ docked: navOnSide }">
        <span class="circle"></span>
        <div class="menu-item-container">
            <div class="menu-image-container" v-bind:style="{ 'background-image': 'url(' + image4 + ')' }">
            </div>
            <span class="menu-label">Resume</span>
        </div>
    </router-link>
</nav>
</template>

<script>
const cameraImage = require('../assets/camera.png')
const letterImage = require('../assets/letter.png')
const resumeImage = require('../assets/resume.png')
const boxImage = require('../assets/box.png')

export default {
    name: 'ds-navigation',
    data () {
        return {
            image1: cameraImage,
            image2: boxImage,
            image3: letterImage,
            image4: resumeImage
        }
    },
    computed: {
        navOnSide () {
            return this.$route.name !== 'Home'
        }
    }
}

</script>

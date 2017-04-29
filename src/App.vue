<style lang="scss">
html,
body {
    margin: 0;
    padding: 0;
}

/* apply a natural box layout model to all elements, but allowing components to change
 * https://www.paulirish.com/2012/box-sizing-border-box-ftw/
 */
html {
  box-sizing: border-box;
}
*, *:before, *:after {
  box-sizing: inherit;
}

#app {
    font-family: $brand-font-family-serif;
    color: $brand-color;
}

header {
    display: flex;
    flex-direction: row;

    img.header-icon {
        margin: 12px 10px 0 0;
    }

    h1 {
        line-height: $header-height;
        margin: 0;
        padding: 0;
    }

    h1 a {
        text-decoration: none;
    }
}

.site-content {
    width: 100%;

    h3 {
        margin-top: 40px;
    }
}

// PHONE
@media (max-width: $mobile-max-width) {
    #app {
        font-size: $font-size-mobile;
    }
    header {
        height: $header-height-mobile;
        padding: $header-padding--mobile;

        img.header-icon {
            margin: 12px 10px 0 0;
            height: 40px;
        }

        h1 {
            font-size:24px;
            line-height: $header-height-mobile;
        }
    }
    .site-content {
        padding: $content-padding--mobile;
    }
}
// TABLET
@media (min-width: $tablet-min-width) and (max-width: $tablet-max-width) {
    #app {
        font-size: $font-size-tablet;
    }
    header {
        height: $header-height;
        padding: $header-padding--tablet;
    }
    .site-content {
        padding: $content-padding--tablet;
    }
}
// IPAD PRO & DESKTOP
@media (min-width: $desktop-min-width) {
    #app {
        font-size: $font-size-desktop;
    }
    header {
        height: $header-height;
        padding: $header-padding--desktop;
    }
    .site-content {
        padding: $content-padding--desktop;
    }
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 2s
}

.fade-enter,
.fade-leave-to
/* .fade-leave-active in <2.1.8 */

{
    opacity: 0
}

.slider {
    position: absolute;
    top: 80px;
}

.slide-enter-active {
    animation: slide-in 0.5s;
    /*-webkit-animation: slide-in 0.5s;*/
}

.slide-leave-active {
    animation: slide-out 0.5s;
    /*-webkit-animation: slide-out 0.5s;*/
}

@keyframes slide-in {
    0% {
        transform: translateY(100%);
    }
    100% {
        transform: translateY(0%);
    }
}


/*@-webkit-keyframes slide-in {
    100% { -webkit-transform: translateY(0%); }
}*/

@keyframes slide-out {
    0% {
        transform: translateY(0%);
    }
    100% {
        transform: translateY(-120%);
    }
}


/*@-webkit-keyframes slide-out {
    0% { -webkit-transform: translateY(0%); }
    100% { -webkit-transform: translateY(-100%); }
}*/
</style>

<template>
<div id="app">
    <header>
        <router-link :to="{name: 'Home'}"><img class="header-icon" src="./assets/computer.png" height="80" /></router-link>
        <h1><router-link :to="{name: 'Home'}">dylanspurgin.com</router-link></h1>
    </header>
    <ds-navigation></ds-navigation>
    <transition name="slide">
        <router-view class="slider"></router-view>
    </transition>
</div>
</template>

<script>
import DsNavigation from './components/DsNavigation'

export default {
    name: 'app',
    components: {
        DsNavigation
    }
}
</script>

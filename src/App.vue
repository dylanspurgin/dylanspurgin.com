<style>
html,
body {
    margin: 0;
    padding: 0;
}

#app {
    font-family: 'Roboto Mono', monospace;
    color: #2c3e50;
}

header {
    padding: 16px 40px;
}

header h1 {
    margin: 0;
    padding: 0;
}

header h1 a {
    text-decoration: none;
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

.site-content {
    padding: 0 200px 80px 120px;
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

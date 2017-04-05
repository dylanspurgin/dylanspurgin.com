<template>
  <div id="app">
    <header>
        <h1>dylanspurgin.com</h1>
    </header>
    <nav>
        <a class="button"
            id="button-1"
            v-on:click="navigate('/portfolio')"
            v-bind:class="{ clicked: state.navOnSide }"
            v-bind:style="{ 'background-image': 'url(' + image1 + ')' }"></a>
        <a class="button"
            id="button-2"
            v-on:click="clicked = true"
            v-bind:class="{ clicked: state.navOnSide }"
            v-bind:style="{ 'background-image': 'url(' + image2 + ')' }"></a>
        <a class="button"
            id="button-3"
            v-on:click="clicked = true"
            v-bind:class="{ clicked: state.navOnSide }"
            v-bind:style="{ 'background-image': 'url(' + image3 + ')' }"></a>
        <a class="button"
            id="button-4"
            v-on:click="clicked = true"
            v-bind:class="{ clicked: state.navOnSide }"
            v-bind:style="{ 'background-image': 'url(' + image4 + ')' }"></a>
    </nav>
    <transition name="fade">
        <router-view></router-view>
    </transition>
  </div>
</template>

<script>
const cameraImage = require('./assets/camera.png')
const computerImage = require('./assets/computer.png')
const resumeImage = require('./assets/resume.png')
const boxImage = require('./assets/box.png')

let state = {
  navOnSide: false
}

export default {
  name: 'app',
  data () {
    return {
      state: state,
      navigate: navigate,
      image1: cameraImage,
      image2: computerImage,
      image3: resumeImage,
      image4: boxImage
    }
  }
}

function navigate (to) {
  state.navOnSide = true
  this.$router.push('/portfolio')
}
</script>

<style>
html, body {
    margin: 0;
    padding: 0;
}
#app {
  font-family: 'Roboto Mono', monospace;
  color: #2c3e50;
}

header {
    padding: 0 40px;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 2s
}
.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
  opacity: 0
}

.site-content {
    padding: 0 80px;
}

router-link {
    display: block;
}
.button {
    position: absolute;
    display: block;
    width: 18vw;
    height: 18vw;
    -webkit-transition: all 2s ease;
    transition: all 2s ease;
    background-size: contain;
}
.button:hover {
    cursor: pointer;
}

.button.clicked {
    left: 100vw !important;
    margin-left: -10vw !important;
    height: 10vw;
    width: 10vw;
}

#button-1 {
    top: 20vh;
    left: 50vw;
    margin-left: -21vw;
}
#button-1.clicked {
    top: 10vh;
}

#button-2 {
    top: 20vh;
    left: 50vw;
    margin-left: 2vw;
}
#button-2.clicked {
    top: 30vh;
}

#button-3 {
    top: 56vh;
    left: 50vw;
    margin-left: -21vw;
}
#button-3.clicked {
    top: 50vh;
}

#button-4 {
    top: 56vh;
    left: 50vw;
    margin-left: 2vw;
}
#button-4.clicked {
    top: 70vh;
}

</style>

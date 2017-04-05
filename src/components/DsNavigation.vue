<style>
nav {
    position: fixed;
    z-index: 100;
    top: 0;
}

.button {
    position: absolute;
    display: block;
    -webkit-transition: all 1s ease;
    transition: all 1s ease;
    text-align: center;
}
.button:hover {
    cursor: pointer;
}

.menu-item-container {
    position: absolute;
    text-align: center;
}

.menu-image-container {
    width: 18vw;
    height: 18vw;
    background-size: contain;
    -webkit-transition: all 1s ease;
    transition: all 1s ease;
}
.button.clicked {
    left: 100vw !important;
    margin-left: -11vw !important;
    font-size: 12px;
}

.circle {
    position: absolute;
    top: 10vw;
    left: 10vw;
    border-radius: 0vw;
    background: red;
    opacity: .3;
    width: 0vw;
    height: 0vw;
    -webkit-transition: all .5s ease;
    transition: all .5s ease;
}

.button.clicked .circle {
    top: 0vw;
    left: 0vw;
    border-radius: 10vw;
    opacity: 0;
    width: 10vw;
    height: 10vw;
}

.button.clicked.router-link-active .circle {
    opacity: .3;
    top: 0vw;
    left: 0vw;
    height: 10vw;
    width: 10vw;
    border-radius: 10vw;
}

.button.clicked .menu-image-container {
    height: 10vw;
    width: 10vw;
}

.menu-label {

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

<template>
    <nav>
        <router-link class="button" id="button-1"
            :to="{name: 'Portfolio'}"
            v-bind:class="{ clicked: state.navOnSide }">
            <span class="circle"></span>
            <div class="menu-item-container">
                <div class="menu-image-container"
                    v-bind:style="{ 'background-image': 'url(' + image1 + ')' }">
                </div>
                <span class="menu-label">Portfolio</span>
            </div>
        </router-link>
        <router-link class="button" id="button-2"
            :to="{name: 'Products'}"
            v-bind:class="{ clicked: state.navOnSide }">
            <span class="circle"></span>
            <div class="menu-item-container">
                <div class="menu-image-container"
                    v-bind:style="{ 'background-image': 'url(' + image2 + ')' }">
                </div>
                <span class="menu-label">Products</span>
            </div>
        </router-link>
        <router-link class="button" id="button-3"
            :to="{name: 'Technologies'}"
            v-bind:class="{ clicked: state.navOnSide }">
            <span class="circle"></span>
            <div class="menu-item-container">
                <div class="menu-image-container"
                    v-bind:style="{ 'background-image': 'url(' + image3 + ')' }">
                </div>
                <span class="menu-label">Technologies</span>
            </div>
        </router-link>
        <router-link class="button" id="button-4"
            :to="{name: 'Resume'}"
            v-bind:class="{ clicked: state.navOnSide }">
            <span class="circle"></span>
            <div class="menu-item-container">
                <div class="menu-image-container"
                    v-bind:style="{ 'background-image': 'url(' + image4 + ')' }">
                </div>
                <span class="menu-label">Resume</span>
            </div>
        </router-link>
    </nav>
</template>

<script>
const cameraImage = require('../assets/camera.png')
const computerImage = require('../assets/computer.png')
const resumeImage = require('../assets/resume.png')
const boxImage = require('../assets/box.png')

let state = {
  navOnSide: false
}

export default {
  name: 'ds-navigation',
  data () {
    return {
      state: state,
      image1: cameraImage,
      image2: boxImage,
      image3: computerImage,
      image4: resumeImage
    }
  },
  watch: {
    '$route' (to, from) {
      state.navOnSide = to.name !== 'Home'
    }
  }
}

</script>

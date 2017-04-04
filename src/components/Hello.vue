<template>
<div>
  <a class="button"
    id="button-1"
    v-on:click="clicked = true"
    v-bind:class="{ clicked: clicked }">one</a>
  <a class="button"
    id="button-2"
    v-on:click="clicked = true"
    v-bind:class="{ clicked: clicked }">two</a>
</div>
</template>

<script>
export default {
  name: 'hello',
  data () {
    return {
      msg: 'Click an icon ...',
      clicked: false
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.button {
    position: absolute;
    display: block;
    width: 30vh;
    height: 30vh;
    background-color: blue;
    -webkit-transition: all 2s ease;
    transition: all 2s ease;
}

.button.clicked {
    left: 100vw !important;
    margin-left: -20vh !important;
    height: 20vh;
    width: 20vh;
}

#button-1 {
    left: 50vw;
    margin-left: -17vw;
    top: 100px;
}

#button-2 {
    left: 50vw;
    margin-left: 2vw;
    top: 100px;
}

#button-2.clicked {
    top: 50vh;
}
</style>

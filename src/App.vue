<template>
  <div id="app">
    <header>
        <h1>dylanspurgin.com</h1>
    </header>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'app'
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
</style>

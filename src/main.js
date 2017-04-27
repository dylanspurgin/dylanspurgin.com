import Vue from 'vue'
import VueResource from 'vue-resource'
import VeeValidate from 'vee-validate'
import App from './App'
import router from './router'

require('./styles/main.scss')

Vue.use(VueResource)
Vue.use(VeeValidate, {enableAutoClasses: true})
Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: {
        App
    }
})

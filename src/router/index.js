import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Portfolio from '@/components/Portfolio'
import Products from '@/components/Products'
import Technologies from '@/components/Technologies'
import Resume from '@/components/Resume'

Vue.use(Router)

export default new Router({
  routes: [{
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/portfolio',
    name: 'Portfolio',
    component: Portfolio
  },
  {
    path: '/products',
    name: 'Products',
    component: Products
  },
  {
    path: '/technologies',
    name: 'Technologies',
    component: Technologies
  },
  {
    path: '/resume',
    name: 'Resume',
    component: Resume
  }]
})

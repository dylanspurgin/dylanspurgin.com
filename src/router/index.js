import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/components/Home'
import Portfolio from '@/components/portfolio/Portfolio'
import Products from '@/components/Products'
import Technologies from '@/components/Technologies'
import Resume from '@/components/Resume'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
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
        }
    ]
})

router.beforeEach(function (to, from, next) {
    window.scrollTo(0, 0)
    next()
})

export default router

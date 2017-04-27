import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/components/Home'
import Portfolio from '@/components/Portfolio'
import Products from '@/components/Products'
import Contact from '@/components/Contact'
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
            path: '/contact',
            name: 'Contact',
            component: Contact
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

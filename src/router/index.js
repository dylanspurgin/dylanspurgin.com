import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/components/Home'
import Portfolio from '@/components/Portfolio'
import Services from '@/components/Services'
import Contact from '@/components/Contact'
import Resume from '@/components/Resume'
import About from '@/components/About'

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
            path: '/services',
            name: 'Services',
            component: Services
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
        },
        {
            path: '/about',
            name: 'About',
            component: About
        },
        {
            path: '/payment',
            name: 'Payment',
            component: function (resolve) {
                require(['../components/Payment.vue'], resolve)
            }
        }
    ]
})

router.beforeEach(function (to, from, next) {
    window.scrollTo(0, 0)
    next()
})

export default router

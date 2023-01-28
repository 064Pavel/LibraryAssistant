

import {createRouter, createWebHistory} from "vue-router";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [

        {
            path: '/homepage',
            name: 'homepage',
            component: () => import('../vue-components/content/homepage/HomepageComponent.vue')
        },
        {
            path: '/auth',
            name: 'auth',
            component: () => import('../vue-components/content/auth/ModalWindow.vue')
        },
        {
            path: '/library',
            name: 'library',
            component: () => import('../vue-components/content/library/IndexComponent.vue')
        },

    ]
})


router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')

    if (to.name === '/'){
        return next({
            name: 'homepage'
        })
    }

    if (!token) {
        if (to.name === 'auth' || to.name === 'homepage') {
            return next()
        } else {
            return next({
                name: 'auth'
            })
        }
    }


    if (to.name === 'auth' && token) {
        return next({
            name: 'library'
        })
    }

    next()

})

export default router





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
            component: () => import('../vue-components/content/library/BooksComponent.vue')
        },

    ]
})


router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')


    if (!token) {
        if (to.name === 'auth' || to.name === 'homepage') {
            return next()
        } else {
            return next({
                name: 'auth'
            })
        }
    }


    if (to.name === 'auth' || to.name === 'homepage' && token) {
        return next({
            name: 'library'
        })
    }

    next()

})

export default router



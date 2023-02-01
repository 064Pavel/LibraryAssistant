

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
            component: () => import('../vue-components/content/library/BooksComponent.vue'),
            children:[
                {
                    path: 'books',
                    name: 'books.index',
                    props: true,
                    component: () =>import('../vue-components/content/library/IndexComponent.vue'),
                },
                {
                    path: 'books/:id',
                    name: 'books.show',
                    props: true,
                    component: () =>import('../vue-components/content/library/ShowComponent.vue')
                },

                {
                    path: 'books/user/:id',
                    name: 'books.user',
                    props: true,
                    component: () =>import('../vue-components/content/library/components_for_filters/UserBooks.vue')
                },
            ]
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



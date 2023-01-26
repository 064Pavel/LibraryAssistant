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
    ]
})

export default router

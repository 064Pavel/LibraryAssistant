import {createRouter, createWebHistory} from "vue-router";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        // {
        //     path: '/chat',
        //     name: 'chat',
        //     component: () => import('../components/chat/Chat.vue')
        // },
    ]
})

export default router

import {createRouter, createWebHistory} from 'vue-router';

const routes = [
    {
        path: '/',
        component: ()=> import('../components/pages/home/index.vue'),
        name: 'pages.home.index'

    },
    {
        path: '/admin/home',
        component: ()=> import('../components/admin/home/index.vue'),
        name: 'admin.home.index'
    },
    {
        path: '/:page(.*)*',
        component: ()=> import('../components/notFound.vue'),
        name: 'notFound'
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})
export default router

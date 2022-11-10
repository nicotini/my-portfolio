import {createRouter, createWebHistory} from 'vue-router';

const routes = [
    {
        path: '/',
        component: ()=> import('../components/pages/home/index.vue'),
        name: 'pages.home.index',
        

    },
    {
        path: '/admin/home',
        component: ()=> import('../components/admin/home/index.vue'),
        name: 'admin.home.index',
        meta: { 
            layout: 'AppLayoutAdmin' 
        }
        
    },
    {
        path: '/admin/about',
        component: ()=> import('../components/admin/about/index.vue'),
        name: 'admin.about.index',
        meta: { 
            layout: 'AppLayoutAdmin' 
        }
        
    },
    {
        path: '/admin/about/create',
        component: ()=> import('../components/admin/about/create.vue'),
        name: 'admin.about.create',
        meta: { 
            layout: 'AppLayoutAdmin' 
        }
        
    },
    {
        path: '/admin/about/:id/edit',
        component: ()=> import('../components/admin/about/edit.vue'),
        name: 'admin.about.edit',
        meta: { 
            layout: 'AppLayoutAdmin' 
        }
        
    },
    {
        path: '/admin/services',
        component: ()=> import('../components/admin/services/index.vue'),
        name: 'admin.services.index',
        meta: { 
            layout: 'AppLayoutAdmin' 
        }
        
    },
    {
        path: '/admin/skills',
        component: ()=> import('../components/admin/skills/index.vue'),
        name: 'admin.skills.index',
        meta: { 
            layout: 'AppLayoutAdmin' 
        }
        
    },
    {
        path: '/personal',
        component: ()=> import('../components/admin/home/personal.vue'),
        name: 'admin.home.personal',
        meta: { 
            layout: 'AppLayoutAdmin' 
        }
        
    },
    
    {
        path: '/login',
        component: ()=> import('../components/auth/login.vue'),
        name: 'auth.login',
        
    },
    {
        path: '/register',
        component: ()=> import('../components/auth/register.vue'),
        name: 'auth.register',
    },
       
    {
        path: '/get',
        component: ()=> import('../components/get.vue'),
        name: 'get',
    },
        
    {
        path: '/:page(.*)*',
        component: ()=> import('../components/notFound.vue'),
        name: 'notFound',
        
    },
]

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
})
router.beforeEach( (to,from,next) => {
    const token = localStorage.getItem('x_xsrf_token')
    
    if(!token) {
        if(to.name === 'pages.home.index') {
            return next()
        }

        if(to.name === 'auth.login' || to.name === 'auth.register') {
            return next()
        } else {
            return next( {
                name: 'auth.login'
            })
        }
    }

    if(to.name === 'auth.login' || to.name === 'auth.register' && token) {
        return next({name: 'admin.home.index'})
    }
    next()
})
export default router

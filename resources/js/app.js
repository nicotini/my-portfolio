import './bootstrap';
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import { createApp } from 'vue';
import app from './App.vue';
import store from './store/index';
import AppLayout from './layouts/AppLayout.vue';
import AppLayoutLinks from './layouts/AppLayoutLinks.vue';
import AppLayoutAdmin from './layouts/AppLayoutAdmin.vue';


import router from './router/index';

createApp(app)
.component('AppLayout', AppLayout)

.component('AppLayoutAdmin', AppLayoutAdmin)
.use(router)
.use(store)
.mount('#app');
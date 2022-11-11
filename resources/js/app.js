import './bootstrap';

import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/dist/sweetalert2.css';

window.Swal = Swal
const toast = Swal.mixin({
    toast:true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    
});
window.toast = toast

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
import './bootstrap';

import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/dist/sweetalert2.css';
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import '../js/assets/js/swiper-bundle.min.js'
import '../js/assets/css/swiper-bundle.min.css'
import '../js/assets/js/main.js'

window.Swal = Swal
const toast = Swal.mixin({
    toast:true,
    position: 'top-end',
    timer: 3000,
    
});
window.toast = toast


import { createApp } from 'vue';
import app from './App.vue';
import store from './store/index';
import AppLayout from './layouts/AppLayout.vue';
import AppLayoutAdmin from './layouts/adminLayouts/AppLayoutAdmin.vue';
import AppLayoutMain from './layouts/mainLayouts/AppLayoutMain.vue';


import router from './router/index';

createApp(app)
.component('AppLayout', AppLayout)
.component('AppLayoutAdmin', AppLayoutAdmin)
.component('AppLayoutMain', AppLayoutMain)
.use(router)
.use(store)
.mount('#app');

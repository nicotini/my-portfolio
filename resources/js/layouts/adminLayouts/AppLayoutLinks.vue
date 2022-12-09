<template>
    <div>
        <!-- <ul v-if="token !== 0">

            <li><router-link :to="{name: 'admin.home.index'}">Admin Panel</router-link></li>
            <li><router-link :to="{name: 'admin.home.personal'}">Personal</router-link></li>

            <li>
                <a href="#" @click.prevent="logout">
                    Logout
                </a>
            </li>
            </ul>
            <ul v-if="token === 0">

            <li><router-link  :to="{name: 'get'}">Get</router-link></li>
            <li><router-link  :to="{name: 'auth.login'}">Login</router-link></li>
            <li><router-link  :to="{name: 'auth.register'}">Register</router-link></li>
            </ul>
            <ul>
            <li>
                <router-link  :to="{name: 'pages.home.index'}">Main page of the component</router-link>
            </li>
        </ul> -->
          <!--==================== HEADER ====================-->
        <!-- Header -->
        <header class="header" id="header">
            <div class="header_logo " >
                My portfolio project
            </div>
            <div>
                <router-link class="header_profile-name--nav--link" :to="{name: 'pages.home.index'}">Back to website</router-link>
            </div>
            <div class="header_profile">
                <a class="header_profile-name--nav--link" href="#" @click.prevent="logout">
                     Logout 
                </a>
                
            </div>
            
            <div class="nav__btns" >
                <!--====== THEME CHANGE BUTTON ======-->
                <i class="uil uil-moon change-theme" id="theme-button"></i>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="uil uil-apps "></i>
                </div>
            </div>
        </header>
        <!-- End Header -->

        <!-- Header Profile -->
        <div>
            <span class="header_profile-name--nav">
                <span class="header_profile-name--nav--pointer">
                    <i class="fas fa-sort-up"></i>
                </span>
                <ul class="header_profile-name--nav--list">
                    <li class="header_profile-name--nav--item">
                        <a class="header_profile-name--nav--link" href="#">
                            Profile 
                        </a>
                    </li>
                    <li class="header_profile-name--nav--item">
                        <a class="header_profile-name--nav--link" href="#">
                            Message 
                        </a>
                    </li>
                    <li class="header_profile-name--nav--item">
                        <a class="header_profile-name--nav--link" href="#">
                            Logout 
                        </a>
                    </li>
                </ul>
            </span>
        </div>
        <!-- End Profile Header -->
    </div>
  </template>
  

  <script>
  import axios from 'axios';
  import router from '../../router/index';
  import store from '../../store/index';
  import { ref } from 'vue';
  
  export default {
  name: "AppLayoutLinks",
  setup() {

   
  
  },
  data() {
    return {
       
    }
  },
  computed: {
            token() {
                return this.$store.getters.token
            },
            
        },
            
    
    methods: {
        logout() {
            axios.post('/logout')
            .then( res => {
                store.dispatch('removeToken')
                this.$router.push({name: 'auth.login'})
                
            })
        }
       
       
       
    }
    
  }
  </script>
  <style scoped>
  
  </style>
  
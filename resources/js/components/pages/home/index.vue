<template>
        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home section" id="home">
                <about
                :aboutInfo="aboutInfo"
                ></about>
            </section>
            <!--==================== SKILLS ====================-->
            <section class="skills section" id="skills">
              <h2 class="section__title">Skills</h2>
              <span class="section__subtitle">My technical lever</span>
              <skill
              :services="services"
              ></skill>
            </section>

            <!--==================== QUALIFICATION ====================-->
            <qualification
            :educationPlaces="educationPlaces"
            :placesToWork="placesToWork"
            ></qualification>

            <!--==================== SERVICES ====================-->
            <section class="services section" id="services" v-if="services">
              <service
              :services="services"
              >
              </service>
            </section>

            <!--==================== PORTFOLIO ====================-->
            <section class="portfolio section" id="portfolio" v-if="allProjects">
               <portfolio
               :allProjects="allProjects"
               >
                </portfolio>
            </section>

            <!--==================== PROJECT IN MIND ====================-->
            <project
            :aboutInfo="aboutInfo"
            ></project>

            <!--==================== TESTIMONIAL ====================-->
            <testimonial
            :allTestimonials="allTestimonials">

            </testimonial>

            <!--==================== CONTACT ME ====================-->
            <section class="contact section" id="contact">
                <contact></contact>
            </section>
            
        </main>


</template>

<script>
import axios from 'axios';
import AppLayoutMain from '../../../layouts/mainLayouts/AppLayoutMain.vue';
import ModalPopupVue from '../../UI/ModalPopup.vue';
import testimonialItemVue from '../../testimonials/testimonial-item.vue';
import contact from './contact.vue'
import project from './project.vue'
import service from './service.vue'
import qualification from './qualification.vue'
import skill from './skill.vue'
import about from './about.vue'
import portfolio from './portfolio.vue'
import testimonial from './testimonial.vue'





export default {
    name: 'pages.home.index',
    components: {
        AppLayoutMain,
        ModalPopupVue,
        testimonialItemVue,
        contact,
        project,
        service,
        qualification,
        skill,
        about,
        portfolio,
        testimonial
        
     },
     data() {
        return {
            aboutInfo: {},
            educationPlaces: {},
            placesToWork: {},
            services: {},
            
            isOpen: true,
            allProjects: {},
            allTestimonials: {},
            swiper: null

        }
     },
     
     mounted() {
            this.getServices(),
            this.getAboutInfo(),
            this.getEducationPlaces(),
            this.getPlacesToWork(),
            this.getAllProjects(),
            this.getAllTestimonials()
     },
     methods: {
        onSwiper(swiper) {
        this.swiper = swiper;
        },
        
        getAboutInfo() {
            axios.get('/api/main/about')
            .then( res => {
                this.aboutInfo = res.data.data
            })
        },
        getEducationPlaces() {
            axios.get('/api/main/education')
            .then( res => {
                this.educationPlaces = res.data.data
                
            })
        },
        getPlacesToWork() {
            axios.get('/api/main/experience')
            .then( res => {
                this.placesToWork = res.data.data
                
            })
        },
        
        getServices() {
            axios.get('api/main')
            .then( res => {
                this.services = res.data.data
                
                
            })
        },
        
        
        getAllProjects() {
            axios.get(`/api/main/project`)
            .then( res => {
                this.allProjects = res.data.data
               
            })
        },
        getAllTestimonials() {
            axios.get(`/api/main/testimonial`)
            .then( res => {
                this.allTestimonials = res.data.data
               
            })
        }
        

        }
        

    }


</script>
<style scoped>
  
</style>
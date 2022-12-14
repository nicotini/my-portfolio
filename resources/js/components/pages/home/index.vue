<template>
        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home section" id="home">
                <div class="home_container container grid">
                    <div class="home_img" v-if="aboutInfo">
                        <img :src="aboutInfo.url_image" alt="{{ aboutInfo.name }}">
                    </div>

                    <div class="home_data">
                        <h1 class="home_title">Hi, I'am {{ aboutInfo.name }}</h1>
                        <h3 class="home_subtitle">FullStack Web developer</h3>
                        <p class="home_description">
                           {{ aboutInfo.desc }}
                        </p>
                        <a href="#contact" class="button button--flex">
                            Contact Me <i class="uil uil-message button__icon"></i>
                        </a>
                        <div class="home_scroll">
                            <a href="#about" class="home_scroll-button button--flex"></a>
                            <i class="uil uil-mouse-alt home_scroll-mouse"></i>
                            <span class="home_scroll-name">Scroll down</span>
                            <i class="uil uil-arrow-down home_scroll-arrow"></i>
                        </div>
                        <div class="home_social">
                            <span class="home_social-follow">Follow Me</span>
                            <div class="home_social-links">
                                <a href="https://www.linkedin.com" target="_blank" class="home_social-icon">
                                    <i class="uil uil-linkedin-alt"></i>
                                </a>
                                <a href="https://www.dribbble.com" target="_blank" class="home_social-icon">
                                    <i class="uil uil-dribbble"></i>
                                </a>
                                <a href="https://www.github.com" target="_blank" class="home_social-icon">
                                    <i class="uil uil-github-alt"></i>
                                </a>
                            </div>
                        </div>

                        <div class="home_scroll_social">
                            <div class="home_scroll1">
                                <a href="#about" class="home_scroll-button button--flex"></a>
                                <i class="uil uil-mouse-alt home_scroll-mouse"></i>
                                <span class="home_scroll-name">Scroll down</span>
                                <i class="uil uil-arrow-down home_scroll-arrow"></i>
                            </div>
                            <div class="home_social1">
                                <div class="home_social-link">
                                    <a href="https://www.linkedin.com" target="_blank" class="home_social-icon">
                                        <i class="uil uil-linkedin-alt"></i>
                                    </a>
                                    <!-- <a href="https://www.dribbble.com" target="_blank" class="home_social-icon">
                                        <i class="uil uil-dribbble"></i>
                                    </a> -->
                                    <a href="https://www.github.com" target="_blank" class="home_social-icon">
                                        <i class="uil uil-github-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
               <h2 class="section__title">About Me</h2>
               <span class="section__subtitle">My introduction</span>

               <div class="about_container container grid">
                 <img src="assets/img/about-img.png" alt="" class="about_img">

                 <div class="about_data">
                    <p class="about_description">
                        FullStack Web developer, with extencive knowledge and years of experience,
                        working in web technologies and UI/UX design, delivering quality work
                    </p>
                    <div class="about_info">
                        <div>
                            <span class="about_info-title">08+</span>
                            <span class="about_info-name">Years <br>experience</span>
                        </div>
                        <div>
                            <span class="about_info-title">25+</span>
                            <span class="about_info-name">Completed <br>project</span>
                        </div>
                        <div>
                            <span class="about_info-title">04+</span>
                            <span class="about_info-name">Companies <br>worked</span>
                        </div>
                    </div>
                    <div class="about_buttons">
                        <a href="assets/pdf/johndoe-Cv.pdf" class="button button--flex">
                            Download CV <i class="uil uil-download-alt button_icon"></i>
                        </a>
                    </div>
                 </div>
               </div>
            </section>

            <!--==================== SKILLS ====================-->
            <section class="skills section" id="skills">
              <h2 class="section__title">Skills</h2>
              <span class="section__subtitle">My technical lever</span>

              <div class="skills_container container grid">
                <div v-if="services" v-for="service, i in services" :key="service.id" :index="i">
                    <!--=========== SKILL 1 ============-->
                    <div  class="skills_content skills_open"  @click="serviceAccordion(i)">
                        <div class="skills_header ">
                            <i class="uil uil-brackets-curly skills_icon"></i>

                            <div>
                                <h1 class="skills_title">{{ service.title }}</h1>
                                <span class="skills_subtitle">More than 4 years</span>
                            </div>

                            <i class="uil uil-angle-down skills_arrow"></i>
                        </div>
                        <div v-if="service.skills" v-for="skill in service.skills" :key="skill.id" class="skills_list grid">
                            <div class="skills_data">
                               
                                <div class="skills_titles">
                                    <h3 class="skills_name">{{ skill.title }}</h3>
                                    <span class="skills_number">{{skill.proficiency}}%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_html"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    
                </div>
              </div>
            </section>

            <!--==================== QUALIFICATION ====================-->
            <section class="qualification section" v-if="educationPlaces || placesToWork">
              <h2 class="section__title">Qualification</h2>
              <span class="section__subtitle">My personal journel</span>

              <div class="timeline">
                <div class="timeline__event  animated fadeInUp delay-3s timeline__event--type1"  v-for="place in educationPlaces" :key="place.id">
                    <div class="timeline__event__icon ">
                    <i class="lni-cake"></i>
                    <div class="timeline__event__date">
                        {{ place.period }}
                    </div>
                    </div>
                    <div class="timeline__event__content ">
                    <div class="timeline__event__title">
                        {{ place.degree}}
                    </div>
                    <div class="timeline__event__description">
                        <p>{{ place.institution }}</p>
                    </div>
                    </div>
                    </div>
                    <div class="timeline__event  animated fadeInUp delay-3s timeline__event--type3" v-for="work in placesToWork" :key="work.id">
                        <div class="timeline__event__icon ">
                            <i class="lni-cake"></i>
                            <div class="timeline__event__date">
                                {{ work.period }}
                            </div>
                        </div>
                        <div class="timeline__event__content ">
                            <div class="timeline__event__title">
                                {{ work.position}}
                            </div>
                            <div class="timeline__event__description">
                                <p>{{ work.company }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== SERVICES ====================-->
            <section class="services section" id="services" v-if="services">
              <h2 class="section__title">Services</h2> 
              <span class="section__subtitle">What is offer</span> 

              <div class="services_container container grid">
                <template v-for="service in services" :key="service.id">
                <!--============== SERVICES 1 =============-->
                <div class="services_content">
                    <div>
                        <i class="uil uil-web-grid services_icon"></i>
                        <h3 class="services_title">{{ service. title }}</h3>
                    </div>
                    <span class="button button--flex button--small button--link services_button">
                        View More
                        <i class="uil uil-arrow-right button_icon"></i>
                    </span>

                    <div class="services_modal">
                        <div class="services_modal-content">
                            <h4 class="services_modal-title">{{ service.title }}</h4>
                            <i class="uil uil-times services_modal-close"></i>

                            <ul class="services_modal-services grid">
                                <li class="services_modal-service">
                                    <i class="uil uil-check-circle services_modal-icon"></i>
                                    <p>I develop the user interface</p>
                                </li>
                                <li class="services_modal-service">
                                    <i class="uil uil-check-circle services_modal-icon"></i>
                                    <p>Web page development</p>
                                </li>
                                <li class="services_modal-service">
                                    <i class="uil uil-check-circle services_modal-icon"></i>
                                    <p>I create ux element interactions</p>
                                </li>
                                <li class="services_modal-service">
                                    <i class="uil uil-check-circle services_modal-icon"></i>
                                    <p>I position your company brand.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                </template>
              </div>
            </section>

            <!--==================== PORTFOLIO ====================-->
            <section class="portfolio section" id="portfolio">
              <h2 class="section__title">Portfolio</h2>  
              <span class="section__subtitle">Most recent work</span>

              <div class="portfolio_container container swiper-container">
                <div class="swiper-wrapper">
                    <!--============ PORTFOLIO 1 ==============-->
                    <div class="portfolio_content grid swiper-slide">
                        <img src="assets/img/portfolio1.jpeg" alt="" class="portfolio_img">

                        <div class="portfolio_data">
                            <h3 class="portfolio_title">Modern Website</h3>
                            <p class="portfolio_description">
                                Website adaptable to all devices,with ui description
                                and animated interactions.
                            </p>
                            <a href="#" class="button button--flex button--small portfolio_button">
                                Demo 
                                <i class="uil uil-arrow-right button__icon"></i>
                            </a>
                        </div>
                    </div>
                    <!--============ PORTFOLIO 2 ==============-->
                    <div class="portfolio_content grid swiper-slide">
                        <img src="assets/img/portfolio2.jpeg" alt="" class="portfolio_img">

                        <div class="portfolio_data">
                            <h3 class="portfolio_title">POS App</h3>
                            <p class="portfolio_description">
                                POS App description
                            </p>
                            <a href="#" class="button button--flex button--small portfolio_button">
                                Demo 
                                <i class="uil uil-arrow-right button__icon"></i>
                            </a>
                        </div>
                    </div>
                    <!--============ PORTFOLIO 3 ==============-->
                    <div class="portfolio_content grid swiper-slide">
                        <img src="assets/img/portfolio3.jpeg" alt="" class="portfolio_img">

                        <div class="portfolio_data">
                            <h3 class="portfolio_title">Online Store</h3>
                            <p class="portfolio_description">
                                Website adaptable to all devices,with ui description
                                and animated interactions.
                            </p>
                            <a href="#" class="button button--flex button--small portfolio_button">
                                Demo 
                                <i class="uil uil-arrow-right button__icon"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!--Add Arrow-->
                <div class="swiper-button-next">
                    <i class="uil uil-angle-right-b swiper-portfolio-icon"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="uil uil-angle-left-b swiper-portfolio-icon"></i>
                </div>
                <!--Add Pagination-->
                <div class="swiper-pagination"></div>
              </div>
            </section>

            <!--==================== PROJECT IN MIND ====================-->
            <section class="project section">
              <div class="project_bg">
                <div class="project_container container grid">
                    <div class="project_data">
                        <h2 class="project_title">You have new project</h2>
                        <p class="project_description">Contact me now and get a 50% discounted</p>
                        <a href="#contact" class="button button--flex button--white">
                            Contact Me 
                            <i class="uil uil-message project_icon button_icon"></i>
                        </a>
                    </div>

                    <img src="assets/img/home.png" alt="" class="project_img">
                </div>
              </div>
            </section>

            <!--==================== TESTIMONIAL ====================-->
            <section class="testimonial section">
              <h2 class="section__title">Testimonial</h2>  
              <span class="section__subtitle">My client saying</span>

              <div class="testimonial_container container swiper-container">
                <div class="swiper-wrapper">
                    <!--========= TESTIMONIAL 1 ==========-->
                    <div class="testimonial_content swiper-slide">
                        <div class="testimonial_data">
                            <div class="testimonial_header">
                                <img src="assets/img/testimonial1.jpeg" alt="" class="testimonial_img">

                                <div>
                                    <h3 class="testimonial_name">Jay Smith</h3>
                                    <span class="testimonial_client">Client</span>
                                </div>
                            </div>

                            <div>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                            </div>
                        </div>
                        <p class="testimonial_description">
                            I get a good impression,I carry out my project with all the possible
                            quality and attention and support 24 hours a day.
                        </p>
                    </div>
                    <!--========= TESTIMONIAL 2 ==========-->
                    <div class="testimonial_content swiper-slide">
                        <div class="testimonial_data">
                            <div class="testimonial_header">
                                <img src="assets/img/testimonial2.jpg" alt="" class="testimonial_img">

                                <div>
                                    <h3 class="testimonial_name">John Smith</h3>
                                    <span class="testimonial_client">Client</span>
                                </div>
                            </div>
                            
                            <div>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                            </div>
                        </div>
                        <p class="testimonial_description">
                            I get a good impression,I carry out my project with all the possible
                            quality and attention and support 24 hours a day.
                        </p>
                    </div>
                    <!--========= TESTIMONIAL 3 ==========-->
                    <div class="testimonial_content swiper-slide">
                        <div class="testimonial_data">
                            <div class="testimonial_header">
                                <img src="assets/img/testimonial3.jpeg" alt="" class="testimonial_img">

                                <div>
                                    <h3 class="testimonial_name">Mike Smith</h3>
                                    <span class="testimonial_client">Client</span>
                                </div>
                            </div>
                            
                            <div>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                                <i class="uil uil-star testimonial_icon-star"></i>
                            </div>
                        </div>
                        <p class="testimonial_description">
                            I get a good impression,I carry out my project with all the possible
                            quality and attention and support 24 hours a day.
                        </p>
                    </div>
                    
                </div>
                <!--Add Pagination-->
                <div class="swiper-pagination swiper-pagination-testimonial"></div>
              </div>
            </section>

            <!--==================== CONTACT ME ====================-->
            <section class="contact section" id="contact">
              <h2 class="section__title">Contact Me</h2>
              <span class="section__subtitle">Get in touch</span>

              <div class="contact_container container grid">
                <div>
                    <div class="contact_information">
                        <i class="uil uil-phone contact_icon"></i>

                        <div>
                            <h3 class="contact_title">Call Me</h3>
                            <span class="contact_subtitle">444-444-444</span>
                        </div>
                    </div>
                    <div class="contact_information">
                        <i class="uil uil-envelope contact_icon"></i>

                        <div>
                            <h3 class="contact_title">Email</h3>
                            <span class="contact_subtitle">johndoe@gmail.com</span>
                        </div>
                    </div>
                    <div class="contact_information">
                        <i class="uil uil-map-marker contact_icon"></i>

                        <div>
                            <h3 class="contact_title">Location</h3>
                            <span class="contact_subtitle">Germany-Munich Av.munich #1234</span>
                        </div>
                    </div>
                </div>

                <form action="" class="contact_form grid">
                    <div class="contact_inputs grid">
                        <div class="contact_content">
                            <label for="" class="contact_label">Name</label>
                            <input type="text" class="contact_input">
                        </div>
                        <div class="contact_content">
                            <label for="" class="contact_label">Email</label>
                            <input type="email" class="contact_input">
                        </div>
                    </div>
                    <div class="contact_content">
                        <label for="" class="contact_label">Project</label>
                        <input type="tetx" class="contact_input">
                    </div>
                    <div class="contact_content">
                        <label for="" class="contact_label">Project description</label>
                        <textarea name="" id="" cols="0" rows="7" class="contact_input"></textarea>
                    </div>
                    <div>
                        <a href="#" class="button button--flex">
                            Send Message 
                            <i class="uil uil-message button_icon"></i>
                        </a>
                    </div>
                </form>
              </div>
            </section>
        </main>


</template>

<script>
import axios from 'axios';
import AppLayoutMain from '../../../layouts/mainLayouts/AppLayoutMain.vue';

export default {
    name: 'pages.home.index',
    components: {
        AppLayoutMain
     },
     data() {
        return {
            swiperTestimonial: null,
            swiperPortfolio: null,
            aboutInfo: {},
            educationPlaces: {},
            placesToWork: {},
            services: {},
            isOpen: true

        }
     },
     mounted() {
        this.swiperTestimonial = new Swiper('.testimonial_container', {
        loop: true,
        grabCursor: true,
        spaceBetween: 48,
        pagination: {
            el: '.swiper-pagiantion',
            clickable: true,
            dynamicBullets: true
        },
        breakpoints:{
            568:{
            slidesPerView: 2,
            }
        }
        });

        this.swiperPortfolio = new Swiper('.portfolio_container', {
            cssMode: true,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
            }),
            this.changeTheme(),
            this.getServices(),
            this.getAboutInfo(),
            this.getEducationPlaces(),
            this.getPlacesToWork()
            
            
            

     },
     methods: {
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
                console.log(this.placesToWork)
            })
        },
        changeTheme() {
            const themeButton = document.querySelector('#theme_button')
            const darkTheme = 'dark-theme'
            const iconTheme = 'uil-sun'

            //Previously selected topic(if user selected)
            const selectedTheme = localStorage.getItem('selected-theme')
            const selectedIcon = localStorage.getItem('selected-icon')

            const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
            const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'bx-moon' : 'bx-sun'

            if (selectedTheme) {
                document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
                themeButton.classList[selectedIcon === 'uil-moon' ? 'add' : 'remove'](iconTheme)
                }
            
                themeButton.addEventListener('click', () => {
                document.body.classList.toggle(darkTheme)
                themeButton.classList.toggle(iconTheme)
                localStorage.setItem('selected-theme', getCurrentTheme())
                localStorage.setItem('selected-icon', getCurrentIcon())
                })
        },
        getServices() {
            axios.get('api/main')
            .then( res => {
                this.services = res.data.data
                
            })
        },
        serviceAccordion(i) {
            this.services.map((service, i) => {
                console.log(i)
            }) 
           
        } 

     }




}

</script>
<style scoped>
  
</style>
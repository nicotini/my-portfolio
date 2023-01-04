<template>
    <!--==================== FOOTER ====================-->
    <footer class="footer">
          <div class="footer_bg">
            <div class="footer_container container grid">
                <div v-if="aboutInfo">
                    <h1 class="footer_title">{{ aboutInfo.name }}</h1>
                    <span class="footer_subtitle">FullStack Web developer</span>
                    <p class="footer_subtitle">
                        High level experience in web design,
                        front-end and backend development,
                        producing quality work
                    </p>
                </div>
                <ul class="footer_links">
                    <menu-item
                     :menuItem="item"
                     class="footer_link"
                     v-for="item in items"
                    />
                </ul>
                <div class="footer_socails">
                    <a href="https://www.facebook.com" target="_blank" class="footer_social">
                        <i class="uil uil-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com" target="_blank" class="footer_social">
                        <i class="uil uil-instagram"></i>
                    </a>
                    <a href="https://www.twitter.com" class="footer_social">
                        <i class="uil uil-twitter-alt"></i>
                    </a>
                </div>
            </div>
            <p class="footer_copy">&#169; {{ year }}</p>
          </div>
        </footer>
        
        <!--==================== SCROLL TOP ====================-->
        
    
 
    <transition name="fade">
        <a href="#" class="scrollup" id="scroll-up" v-if="buttonShow" @click.prevent="scrollUp()">
          <i class="uil uil-arrow-up scrollup_icon"></i>
        </a>
     </transition>
        

</template>
<script>
export default {
    name: "AppLayoutFooter",
    data() {
        return {
            items: [
                {
                    name: "services",
                    label: "Services",
                    to: "#services"
                },
                {
                    name: "portfolio",
                    label: "Portfolio",
                    to: "#portfolio"
                },
                {
                    name: "contact",
                    label: "Contact",
                    to: "#contact"
                }

            ],
            year: '',
            buttonShow: false
        }
       
        
    },
    props: {
        aboutInfo: {
            type: Object,
            required: true
        }

    },
    methods: {
        printYear() {
            return new Date().getFullYear();
        },
        checkScrollPosition() {
            this.buttonShow = window.pageYOffset > 10;
        },
        scrollUp() {
            scroll({
            top: 0,
            behavior: "smooth"
            })
        }

        
    },
    mounted() {
        this.year = this.printYear(),
        this.checkScrollPosition(),
        window.addEventListener('scroll', this.checkScrollPosition)
    }
}
</script>
<style scoped>
   
</style>
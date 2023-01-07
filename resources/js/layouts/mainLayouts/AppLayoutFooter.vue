<template>
    <!--==================== FOOTER ====================-->
    <footer class="footer">
          <div class="footer_bg">
            <div class="footer_container container grid">
                <div>
                    <h1 class="footer_title">Vasiuk Olena</h1>
                    <span class="footer_subtitle">PHP FullStack developer</span>
                </div>
                <ul class="footer_links">
                    <menu-item
                     :menuItem="item"
                     @smoothScroll="ScrollToItem"
                     class="footer_link"
                     v-for="item in items"
                     :key="item.to"
                    />
                </ul>
                <div class="footer_socails">
                    <a href="!#" target="_blank" class="footer_social">
                        <i class="uil uil-github-alt"></i>
                    </a>
                    <a href="!#" target="_blank" class="footer_social">
                        <i class="uil uil-linkedin-alt"></i>
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
        },
        ScrollToItem(item) {
            window.scrollTo({
                top: document.querySelector(item).offsetTop,
                behavior: 'smooth'
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
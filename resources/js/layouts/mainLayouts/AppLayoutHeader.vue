<template>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <span class="nav_logo">
               Vasiuk Olena
            </span>

            <div class="nav_menu" id="nav-menu" v-if="!showMenu">
                <ul class="nav_list"  v-if="items.length >0">
                    <menu-item
                     class="nav_link"
                     :menuItem="item"
                     v-for="item in items"
                    />
                </ul>

                <div class="nav_close_main" id="nav-close" @click="showMobileMenu()">
                    <i class="uil uil-times nav_close" id="nav-close"></i>
                </div>
            </div>

            <div class="nav_btns">
                <!--===== THEME CHANGE BUTTON =====-->
                <i class="uil uil-moon change_theme" id="theme_button"></i>

                <div class="nav_toogle" id="nav-toggle" @click="showMobileMenu()">
                    <i class="script.uil uil-bars"></i>
                </div>
            </div>
        </nav>
    </header>

</template>
<script>

export default {
    name: "AppLayoutHeader",
    
    data() {
        return {
            items: [
                {
                    name: "home",
                    label: "Home",
                    to: "#home"
                },
                {
                    name: "skills",
                    label: "Skills",
                    to: "#skills"
                },
                {
                    name: "qualification",
                    label: "Qualification",
                    to: "#qualification"
                },
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
            showMenu: false,
            width: null
        }
    },
    methods: {
        showMobileMenu() {
            if(!this.showMenu) {
                this.showMenu = true
            } else {
                this.showMenu = false
            }
            
        },
       
        updateWidth() {
            this.width = window.innerWidth;
            if(this.width > 849) {
                this.showMenu = false
            } else {
                this.showMenu = false
                this.showMobileMenu()
            }
            
        }
    },
    created() {
    window.addEventListener('resize', this.updateWidth);
    this.updateWidth();
   
  },
}
</script>
<style scoped>
  
</style>
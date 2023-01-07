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
                     @smoothScroll="smoothScrollItem"
                     :menuItem="item"
                     v-for="item in items"
                     :key="item.to"
                    />
                </ul>

                <div class="nav_close_main" id="nav-close" @click="showMobileMenu()">
                    <i class="uil uil-times nav_close" id="nav-close"></i>
                </div>
            </div>

            <div class="nav_btns">
                <!--===== THEME CHANGE BUTTON =====-->
                <i class="uil uil-moon change_theme" 
                :class="[
                    darkTheme ? 'uil-sun' : ''
                ]"
                id="theme_button"
                @click="changeTheme()"
                ></i>

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
            width: null,
            darkTheme: false
           
            
           
        }
    },
    
    methods: {
        showMobileMenu() {
            if(!this.showMenu) {
                this.showMenu = true
            }  else {
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
        },
        smoothScrollItem(item) {
                window.scrollTo({
                top: document.querySelector(item).offsetTop,
                behavior: 'smooth'
                })
               this.updateWidth()
        },
        changeTheme() {
            const darkTheme = 'dark-theme'
            this.darkTheme = !this.darkTheme
            document.body.classList.toggle(darkTheme)
        }
       

    },
    created() {
    window.addEventListener('resize', this.updateWidth);
    this.updateWidth();
   
  }
}
</script>

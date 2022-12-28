<template>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#home" class="nav_logo">
                John Doe
            </a>

            <div class="nav_menu" id="nav-menu">
                <ul class="nav_list">
                    <li class="nav-item">
                        <a href="#home" class="nav_link active_link">Home</a>
                    </li>
                    <li class="nav-item_main">
                        <a href="#about" class="nav_link">About</a>
                    </li>
                    <li class="nav-item_main">
                        <a href="#skills" class="nav_link">Skills</a>
                    </li>
                    <li class="nav-item_main">
                        <a href="#services" class="nav_link">Services</a>
                    </li>
                    <li class="nav-item_main">
                        <a href="#portfolio" class="nav_link">Portfolio</a>
                    </li>
                    <li class="nav-item_main">
                        <a href="#contact" class="nav_link">Contact Me</a>
                    </li>
                </ul>

                <div class="nav_close_main" id="nav-close">
                    <i class="uil uil-times nav_close" id="nav-close"></i>
                </div>
            </div>

            <div class="nav_btns_main">
                <!--===== THEME CHANGE BUTTON =====-->
                <i class="uil uil-moon change_theme" id="theme_button"></i>

                <div class="nav_toogle" id="nav-toggle">
                    <i class="script.uil uil-bars"></i>
                </div>
            </div>
        </nav>
    </header>

</template>
<script>
export default {
    name: "AppLayoutHeader"
    
}
</script>
<style scoped>
  
</style>
<template>
    <!-- Nav Main -->
    <nav class="nav">
            <div class="nav_wrapper">
                <span class="nav_close">
                    <i class="fas fa-window-close"></i>
                </span>
                <ul class="nav_list">
                    <li class="nav_item">
                        <router-link class="nav_link " :to="{name: 'admin.home.index' }">
                            <span class="nav_link--span--icon">
                                <i class="fas fa-home nav__link--icon"> </i>
                            </span>
                            <span class="nav_link--span--navname">
                                Home
                            </span>
                        </router-link>
                    </li>
                    <li class="nav_item">
                        <router-link class="nav_link " :to="{name: 'admin.about.index' }">
                            <span class="nav_link--span--icon">
                                <i class="fas fa-home nav__link--icon"> </i>
                            </span>
                            <span class="nav_link--span--navname">
                                About 
                            </span>
                        </router-link>
                    </li>
                    <li class="nav_item">
                        <router-link class="nav_link " :to="{name: 'admin.services.index' }">
                            <span class="nav_link--span--icon">
                                <i class="fas fa-home nav__link--icon"> </i>
                            </span>
                            <span class="nav_link--span--navname">
                                 Services
                            </span>
                        </router-link>
                    </li>
                    <li class="nav_item">
                        <router-link class="nav_link " :to="{name: 'admin.skills.index' }">
                            <span class="nav_link--span--icon">
                                <i class="fas fa-home nav__link--icon"> </i>
                            </span>
                            <span class="nav_link--span--navname">
                                Skills
                            </span>
                        </router-link>
                    </li>
                    <li class="nav_item">
                        <router-link class="nav_link " :to="{name: 'admin.education.index' }">
                            <span class="nav_link--span--icon">
                                <i class="fas fa-home nav__link--icon"> </i>
                            </span>
                            <span class="nav_link--span--navname">
                                Education
                            </span>
                        </router-link>
                    </li>
                    <li class="nav_item">
                        <router-link class="nav_link " :to="{name: 'admin.experience.index' }">
                            <span class="nav_link--span--icon">
                                <i class="fas fa-home nav__link--icon"> </i>
                            </span>
                            <span class="nav_link--span--navname">
                                Experiences
                            </span>
                        </router-link>
                    </li>
                    <li class="nav_item">
                        <router-link class="nav_link " :to="{name: 'admin.project.index' }">
                            <span class="nav_link--span--icon">
                                <i class="fas fa-home nav__link--icon"> </i>
                            </span>
                            <span class="nav_link--span--navname">
                                Projects
                            </span>
                        </router-link>
                    </li>
                    <li class="nav_item">
                        <router-link class="nav_link " :to="{ name: 'admin.testimonial.index' }">
                            <span class="nav_link--span--icon">
                                <i class="fas fa-home nav__link--icon"> </i>
                            </span>
                            <span class="nav_link--span--navname">
                                Testimonial
                            </span>
                        </router-link>
                    </li>
                    <li class="nav_item">
                        <router-link class="nav_link "  :to="{ name: 'admin.message.index' }">
                            <span class="nav_link--span--icon">
                                <i class="fas fa-home nav__link--icon"> </i>
                            </span>
                            <span class="nav_link--span--navname">
                                Messages
                            </span>
                        </router-link>
                    </li>
                   
                    <!-- <li class="nav_item">
                        <a class="nav_link " href="#">
                            <span class="nav_link--span--icon">
                                <i class="fas fa-home nav__link--icon"> </i>
                            </span>
                            <span class="nav_link--span--navname">
                                Setting
                            </span>
                        </a>
                    </li> -->

                </ul>
            </div>
        </nav>
        <!-- End Nav Main -->
</template>
<script>
    export default {
        name: "AppLayoutSidebar"
    }
</script>
<style scoped>

</style>

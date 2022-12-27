<template>
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
                <div class="buttons-about">
                    <my-button>
                        Contact Me <i class="uil uil-message button__icon"></i>
                    </my-button>
                    <my-button>
                        Download CV <i class="uil uil-download-alt button_icon"></i>
                    </my-button>
                </div>
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
</template>
<script>
export default {
    name: 'about',
    props: {
        aboutInfo: {
            type: Object,
            required: true
        }

    }
}
</script>
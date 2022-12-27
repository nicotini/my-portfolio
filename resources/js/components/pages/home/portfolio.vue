<template>
    <h2 class="section__title">Portfolio</h2>  
        <span class="section__subtitle">Most recent work</span>
        <swiper
        :modules="modules"
        :slides-per-view="1"
        :space-between="50"
        :navigation="true"
        :pagination="{ clickable: true }"
        :scrollbar="{ draggable: true }"
        
        class="data-slider"
        @swiper="onSwiper"
        @slideChange="onSlideChange"
        >
            <swiper-slide 
            v-for="myPoject in allProjects" 
            :key="myPoject.id"
            class="portfolio_content grid"
            >
                <img :src="myPoject.url_image" alt="{{ myPoject.title }}" class="portfolio_img">
                <div class="portfolio_data">
                    <h3 class="portfolio_title">{{ myPoject.title }}</h3>
                    <p class="portfolio_description">
                        {{ myPoject.desc }}
                    </p>
                    <a :href="myPoject.link" class="button button--flex button--small portfolio_button">
                        See the project 
                        <i class="uil uil-arrow-right button__icon"></i>
                    </a>
                </div>
            </swiper-slide>
        </swiper>
</template>
<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination, Navigation } from 'swiper'
import 'swiper/scss';
import 'swiper/scss/autoplay';
import 'swiper/scss/navigation';
import 'swiper/scss/pagination';

export default {
    name: 'portfolio',
    components: {
        Swiper,
        SwiperSlide
    },
    props: {
        allProjects: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
        modules: [Autoplay, Pagination, Navigation]
      }

        
    },
    methods: {
    onSwiper(swiper) {
      console.log(swiper);
    },
    onSlideChange() {
      console.log("slide change");
    },
  }
}
</script>
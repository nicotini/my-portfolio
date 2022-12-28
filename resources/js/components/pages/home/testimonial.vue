<template>
    <section class="testimonial section" v-if="allTestimonials">
        <h2 class="section__title">Testimonial</h2>  
        <span class="section__subtitle">My client saying</span>

        <swiper
        :modules="modules"
        :slides-per-view="2"
        :space-between="50"
        :pagination="{ clickable: true }"
        :scrollbar="{ draggable: true }"
        :autoplay="{ delay: 3000, disableOnInteraction: false}"
        class="data-slider"
        @swiper="onSwiper"
        @slideChange="onSlideChange"
        >
        <swiper-slide
            v-for="(testimonial, i) in allTestimonials" 
            :key="testimonial.id"
            >
            <testimonials-item
            :testimonial_data="testimonial"
            ></testimonials-item>
            </swiper-slide> 
        </swiper>
    </section>
</template>
<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination } from 'swiper';
import testimonialsItem from '../../testimonials/testimonial-item.vue'
import 'swiper/scss';
import 'swiper/scss/autoplay';
import 'swiper/scss/pagination';
export default {
    name: 'testimonial',
    components: {
        Swiper,
        SwiperSlide,
        testimonialsItem

    },
    props: {
        allTestimonials: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
        modules: [Autoplay, Pagination]
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
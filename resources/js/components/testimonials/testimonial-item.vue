<template>
    <div class="testimonial_content swiper-slide">
                        <div class="testimonial_data">
                            <div class="testimonial_header">
                                <img :src="testimonial_data.url_image" alt="" class="testimonial_img">
                                <div>
                                    <h3 class="testimonial_name">{{ testimonial_data.name }}</h3>
                                    <span class="testimonial_client">{{ testimonial_data.position }}</span>
                                </div>
                            </div>
                            <div class="rating" :data-id="testimonial_data.id">
                                <div class="rating_body">
                                    <div class="rating_active"></div>
                                    <div class="rating_items">
                                    <input type="radio" class="rating_item" name="rating" value="1">
                                    <input type="radio" class="rating_item" name="rating" value="1">
                                    <input type="radio" class="rating_item" name="rating" value="1">
                                    <input type="radio" class="rating_item" name="rating" value="1">
                                    <input type="radio" class="rating_item" name="rating" value="1">
                                    </div>
                                </div>
                                <div class="rating_value">
                                    ({{ testimonial_data.rating }})
                                </div>
                            </div>
                        </div>
                        <p class="testimonial_description">
                            {{ testimonial_data.testimony }}
                        </p>
                    </div>

</template>
<script>
export default {
    name: "testimonials-item",
    props: {
        testimonial_data: {
            type: Object,
            default() {
                return {}
            }
        }
    },
    methods: {
        showRating() {
            const ratings = document.querySelectorAll('.rating')
           
            for (let index = 0; index < ratings.length; index++) {
                const rating = ratings[index]
                if(rating.dataset.id == this.testimonial_data.id) {
                    let ratingActive = rating.querySelector('.rating_active')
                    let ratingValue = this.testimonial_data.rating
                    const ratingActiveWidth = ratingValue/0.1
                    ratingActive.style.width = `${ratingActiveWidth}%`
                }
               
            }
           
        }
        
    },
    mounted() {
        this.showRating()
    }
    
}
</script>
<template>
    <main class="main">
        <!-- Side Nav Dummy-->
        <div class="main__sideNav"></div>
        <!-- End Side Nav -->
        <!-- Main Content -->
        <div class="main__content">
            <section class="testimonials section" id="testimonials">
                <div class="testimonials_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Testimonials </h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn__open--modal">
                                <router-link :to="{name: 'admin.testimonial.create'}">
                                New Testimonial
                                </router-link>
                            </div>
                        </div> 
                    </div>

                    <div class="table">

                        <div class="table_filter">
                            <span class="table_filter-Btn ">
                                <i class="fas fa-ellipsis-h"></i>
                            </span>
                            <div>
                                <ul class="table_filter-list">
                                    <li>
                                        <p class="table_filter-link table_filter-link--active">
                                            All
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
            
                        <div class="table_search">
                            <div class="table_search-wrapper">
                                <select class="table_search-select" name="" id="">
                                    <option value="">Filter</option>
                                </select>
                            </div>
                            <div class="relative">
                                <i class="table_search-input--icon fas fa-search "></i>
                                <input class="table_search--input" type="text" placeholder="Search Testimonial">
                            </div>
                        </div>
            
                        <div class="testimonial_table-heading">
                            <p>Photo</p> 
                            <p>name</p>
                            <p>Function</p>
                            <p>Testimony</p>
                            <p>Rating</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <template v-if="testimonials">
                        <div v-for="testimonial in testimonials" :key="testimonial.id" class="testimonial_table-items">
                            <p>
                                <img :src="testimonial.url_image" alt="" class="testimonial_img-list">
                            </p>
                            <p>{{ testimonial.name }}</p>
                            <p>{{ testimonial.position }}</p>
                            <p>{{ testimonial.testimony }}</p>
                            <p>{{ testimonial.rating}} / 10</p>
                            <div>
                                <router-link :to="{name:'admin.testimonial.edit', params: {id:testimonial.id}}" class="btn-icon success">
                                    <i class="fas fa-pencil-alt"></i>
                                </router-link>
                                <button class="btn-icon danger" @click.prevent="deleteTestimonial(testimonial.id)">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </template>
                    </div>
                </div>
            </section>
        </div>
    </main>
</template>
<script>
import axios from 'axios';
export default {
    name: "index",
    data() {
        return {
            testimonials: {}
        }
    },
    methods: {
        getAllTestimonials() {
            axios.get('/api/testimonial')
            .then( res => {
                this.testimonials = res.data.data
            })
        },
        deleteTestimonial(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You can't go back",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
                }).then( res => {
                    if(res) {
                        axios.delete(`/api/testimonial/${id}`)
                        .then( res => {
                            Swal.fire(
                                'Delete',
                                'About Info has deleted successfully',
                                'success'
                            )
                            this.getAllTestimonials()
                        })
                    }
                })
        }
    },
    mounted() {
        this.getAllTestimonials()
    }
}
</script>

<template>
    <main class="main">
        <!-- Side Nav Dummy-->
        <div class="main__sideNav"></div>
        <!-- End Side Nav -->
        <!-- Main Content -->
        <div class="main__content">
            <section class="about section" id="testimonial">
                <div class="about_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Edit Testimonial</h1>
                        </div>

                    </div>
                    <div v-if="errors">
                        <div v-for="(field, k) in errors" :key="k">
                            
                            <p v-for="error in field" :key="error">
                                {{error}}
                            </p>
                        </div>
                    </div>
                    <form>
                        <div class="card_wrapper">
                            <div class="wrapper_left">
                                <div class="card">
                        
                                    <p>Name</p>
                                    <input type="text" v-model="form.name" class="input" />
                                    
                                    <p>Function</p>
                                    <input type="text" v-model="form.position" class="input" />

                                    <p>Testimony</p>
                                    <textarea cols="10" rows="5" v-model="form.testimony" ></textarea>

                                </div>
                            </div>
                            <div class="wrapper_right ">
                                <div class="card">
                                    <div ref="dropzone" class="testimonial_img-container">
                                        Upload a photo
                                    </div>
                                    <p>Rating ?/10</p>
                                    <input type="text" v-model="form.rating" class="input" />
                                </div>    
                            </div>
                        </div>
                        <div class="titlebar">
                            <div class="titlebar_item">
                                
                            </div>
                            <div class="titlebar_item">
                                <button :disabled="!isDisabled" type="submit" class="btn btn-secondary"  @click.prevent="updateTestimonial()">
                                    Update Testimonial
                                </button>
                            </div> 
                        </div>
                    </form>
                </div>
            </section>
        </div>
        </main>
</template>
<script>
import axios from 'axios';
import Dropzone from 'dropzone';

export default {
    name: "edit",
    data() {
        return {
            form: {
                name: null,
                position: null,
                testimony: null,
                dropzone:null,
                rating: null
            },
            errors: {}
        }  
    },
    methods: {
        getTestimonial() {
            axios.get(`/api/testimonial/${this.$route.params.id}`)
            .then( res => {
                this.form.id = res.data.data.id
                this.form.name = res.data.data.name
                this.form.position = res.data.data.position
                this.form.testimony = res.data.data.testimony
                this.form.url_image = res.data.data.url_image
                this.form.photo_path = res.data.data.photo_path
                this.form.rating = res.data.data.rating
                this.form.size = res.data.data.size
                this.form.file_name = res.data.data.file_name
                if(this.form.url_image) {
                    let file = {id: this.form.id, name: this.form.file_name, size: this.form.size }
                    this.form.dropzone.displayExistingFile(file, this.form.url_image)
                }
            })
        },
        updateTestimonial() {
            const data = new FormData()
                const files = this.form.dropzone.getAcceptedFiles()
                files.forEach( file => {
                data.append('images[]', file)
                this.form.dropzone.removeFile(file)
                })
                
                data.append('name', this.form.name)
                data.append('position', this.form.position)
                data.append('testimony', this.form.testimony)
                data.append('rating', this.form.rating)
                data.append('_method', 'PATCH')
                axios.post(`/api/testimonial/${this.$route.params.id}`, data, { headers: { 'Content-Type': 'application/x-www-form-urlencoded' } })
                .then( res => {
                    this.$router.push({name: 'admin.testimonial.index' })
                }).catch( error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors

                    }
                })
            
        }
    },
    mounted() {
        
        this.form.dropzone = new Dropzone(this.$refs.dropzone, {
            url: `/api/testimonial/${this.$route.params.id}`,
            autoProcessQueue:false,
            maxFiles: 1,
            addRemoveLinks:true
        }),
        this.form.dropzone.on("maxfilesexceeded", function(file) { this.removeFile(file) }),
        this.getTestimonial()
    },
    computed: {
        isDisabled() {
            return this.form.name && 
                this.form.position && 
                this.form.testimony &&
                this.form.rating
        }
   }
}

</script>
<style scoped>

</style>
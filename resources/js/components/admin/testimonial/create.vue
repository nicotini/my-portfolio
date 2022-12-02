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
                            <h1>Add Testimonial</h1>
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
                                    <textarea cols="10" v-model="form.testimony" rows="5"  ></textarea>

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
                                <button :disabled="!isDisabled" class="btn btn-secondary" type="submit" @click.prevent="store()">
                                    Save Testimonial
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
    name: "create",
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
        store() {
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
               
                axios.post('/api/testimonial', data)
                .then( res => {
                    this.$router.push({name: 'admin.testimonial.index'})
                }).catch( error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors

                    }
                })
                
            }
        
    },
    mounted() {
        this.form.dropzone = new Dropzone(this.$refs.dropzone, {
            url: "/api/testimonial",
            autoProcessQueue:false,
            maxFiles: 1,
            addRemoveLinks:true
        }),
        this.form.dropzone.on("maxfilesexceeded", function(file) { this.removeFile(file) })
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
<style>
.dz-success-mark,
.dz-error-mark {
    display: none;
}
</style>
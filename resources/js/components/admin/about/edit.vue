<template>
    <main class="main">
            <!-- Side Nav Dummy-->
            <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
            <div class="main__content">
                <section class="about section" id="about">
                    <div class="about_container">
                        <div class="titlebar">
                            <div class="titlebar_item">
                                <h1>About</h1>
                            </div>
                            <div class="titlebar_item">
                                <div class="btn btn-secondary">
                                    <router-link :to="{name: 'admin.about.index'}">Back to about section</router-link>
                                    
                                </div>
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
                                    <p>Full Name</p>
                                    <input type="text" class="input" v-model="form.name" />

                                    <p>Email</p>
                                    <input type="email" class="input" v-model="form.email" />

                                    <p>Phone</p>
                                    <input type="phone" class="input" v-model="form.phone" />

                                    <p>Social_alias</p>
                                    <input type="text" class="input" v-model="form.social_alias" />
            
                                    <p>Description</p>
                                    <textarea cols="10" rows="5" v-model="form.desc" ></textarea>  
                                    <p>Upload your photo</p>
                                    <div ref="dropzone" class="input-image">
                                        Upload a photo
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="titlebar">
                                <div class="titlebar_item">
                                    <button  :disabled="!isDisabled" class="btn btn-secondary" @click.prevent="updateAbout" type="submit" >
                                        Update
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
import Dropzone from 'dropzone'

export default {
    name: "edit",
    data() {
        return {
           form: {
                name: null,
                email: null,
                phone: null,
                social_alias: null,
                desc: null,
                dropzone: null,
                /* idImageForDelete: null */
           },
           errors: {}
        }
    },
    
    methods: {
        getInfoAbout() {
            axios.get(`/api/about/${this.$route.params.id}`)
            .then(res => {
                this.form.id = res.data.data.id
                this.form.name = res.data.data.name
                this.form.desc = res.data.data.desc
                this.form.email = res.data.data.email
                this.form.phone = res.data.data.phone
                this.form.social_alias = res.data.data.social_alias
                this.form.preview_url = res.data.data.preview_url
                this.form.size = res.data.data.size
                this.form.file_name = res.data.data.file_name
                let file = {id: this.form.id, name: this.form.file_name, size: this.form.size };
                this.form.dropzone.displayExistingFile(file, this.form.preview_url);
            })
        },
        updateAbout() {
            console.log(this.form.idImageForDelete)
           /*  axios.patch(`/api/about/${this.$route.params.id}`, {  
                name: this.form.name, 
                email: this.form.email, 
                phone: this.form.phone,
                social_alias: this.form.social_alias,
                desc: this.form.desc }).then( res => {
                this.$router.push({name: 'admin.about.index'})
            }).catch( error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors

                    }
                }) */
                const data = new FormData()
                const files = this.form.dropzone.getAcceptedFiles()
                files.forEach( file => {
                data.append('images[]', file)
                this.form.dropzone.removeFile(file)
                })
                
                data.append('name', this.form.name)
                data.append('email', this.form.email)
                data.append('phone', this.form.phone)
                data.append('social_alias', this.form.social_alias)
                data.append('desc', this.form.desc)
                /* data.append('id_image_delete', this.form.idImageForDelete) */
                data.append('_method', 'PATCH')
                axios.post(`/api/about/${this.$route.params.id}`, data)
                .then( res => {
                    this.$router.push({name: 'admin.about.index'})
                }).catch( error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors

                    }
                })
        }
        
        
    

    },
    mounted() {
        
        this.form.dropzone = new Dropzone(this.$refs.dropzone, {
        url: "/api/about",
        autoProcessQueue:false,
        maxFiles: 1,
        addRemoveLinks:true
       }),

      /*  this.form.dropzone.on('removedfile', (file) => {
        this.form.idImageForDelete = file.id
       }), */
       this.getInfoAbout()
        
    },
    computed: {
        isDisabled() {
            return this.form.name && 
            this.form.email && 
            this.form.phone && 
            this.form.social_alias && 
            this.form.desc
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

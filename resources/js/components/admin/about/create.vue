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
                                    
                                    <div ref="dropzone" class="input-image">
                                        Upload a photo
                                    </div>
                                    
                                    <div ref="dropzoneCv" class="input-image">
                                        Upload your CV
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="titlebar">
                                <div class="titlebar_item">
                                    <button :disabled="!isDisabled" class="btn btn-secondary" type="submit" @click.prevent="store">
                                        Save Changes
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
import Dropzone from 'dropzone'

export default {
    name: "create",
    data() {
        return {
           form: {
                name: null,
                email: null,
                phone: null,
                social_alias: null,
                desc: null,
                dropzone: null,
                dropzoneCv: null
           },
          
           errors: {},
        }
    },
    mounted() {
        this.form.dropzone = new Dropzone(this.$refs.dropzone, {
        url: "/api/about",
        autoProcessQueue:false,
        maxFiles: 1,
        addRemoveLinks:true
       }),
       this.form.dropzoneCv = new Dropzone(this.$refs.dropzoneCv, {
        url: "/api/about",
        maxFiles: 1,
        autoProcessQueue:false,
        addRemoveLinks: true,
        acceptedFiles: ".pdf"

       }),
       this.form.dropzone.on("maxfilesexceeded", function(file) { this.removeFile(file) }),
       this.form.dropzoneCv.on("maxfilesexceeded", function(file) { this.removeFile(file) })
    },
    methods: {
        store() {
                const data = new FormData()
                const files = this.form.dropzone.getAcceptedFiles()
                files.forEach( file => {
                data.append('images[]', file)
                this.form.dropzone.removeFile(file)
                })
                const cvs = this.form.dropzoneCv.getAcceptedFiles()
                cvs.forEach( file => {
                    data.append('cv[]', file)
                    this.form.dropzoneCv.removeFile(file)
                })
                
                data.append('name', this.form.name)
                data.append('email', this.form.email)
                data.append('phone', this.form.phone)
                data.append('social_alias', this.form.social_alias)
                data.append('desc', this.form.desc)
                axios.post('/api/about', data)
                .then( res => {
                    this.$router.push({name: 'admin.about.index'})
                }).catch( error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors

                    }
                })
                
            },
        
    

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
<style scoped>
@import '../../../assets/css/base.css';

.dz-success-mark,
.dz-error-mark {
    display: none;
}
</style>

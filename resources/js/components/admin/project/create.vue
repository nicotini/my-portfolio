<template>
     <main class="main">
        <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
        <div class="main__content">
            <section class="about section" id="project">
                <div class="about_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Add Project</h1>
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

                                <p>Title</p>
                                <input type="text" v-model="form.title" class="input" />

                                <p>Description</p>
                                <textarea cols="10" rows="5" v-model="form.desc" ></textarea>

                                <p>Link</p>
                                <input type="text" class="input" v-model="form.link" />
                            </div>
                        </div>
                        <div class="wrapper_right " >
                           <div class="card">
                                <div ref="dropzone">
                                    Upload your file
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="titlebar">
                        <div class="titlebar_item">
                            
                        </div>
                        <div class="titlebar_item">
                            <button :disabled="!isDisabled" type="submit" class="btn btn-secondary" @click.prevent="store()">
                                Save Project
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
                title:null,
                desc: null,
                link: null,
                dropzone: null
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
                data.append('title', this.form.title)
                data.append('desc', this.form.desc)
                data.append('link', this.form.link)

                axios.post('/api/project', data)
                .then( res => {
                    this.$router.push({name: 'admin.project.index'})
                })
        }
    },
    computed: {
        isDisabled() {
            return this.form.title && 
            this.form.desc && 
            this.form.link 
           
        }
    },
    mounted() {
        this.form.dropzone = new Dropzone(this.$refs.dropzone, {
        url: "/api/project",
        autoProcessQueue:false,
        maxFiles: 1,
        addRemoveLinks:true,
        acceptedFiles: ".png, .jpg"
       }),
       this.form.dropzone.on("maxfilesexceeded", function(file) { this.removeFile(file) })
    }
    
} 
</script>
<style scoped>


</style>

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
                           <h1>Update Project</h1>
                       </div>
                       <div class="titlebar_item">
                           <div class="btn btn-secondary">
                               Update Project
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
                                <button :disabled="!isDisabled" type="submit" class="btn btn-secondary" @click.prevent="updateProject()">
                                    Update Project
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
               title:null,
               desc: null,
               link: null,
               dropzone: null
           },
           errors: {}

       }
      
   },
   methods: {
     getProject() {
        axios.get(`/api/project/${this.$route.params.id}`)
        .then( res => {
            this.form.id = res.data.data.id
            this.form.title = res.data.data.title
            this.form.desc = res.data.data.desc
            this.form.link = res.data.data.link
            this.form.path_image = res.data.data.path_image
            this.form.preview_url = res.data.data.preview_url
            this.form.url_image = res.data.data.url_image
            this.form.size = res.data.data.size
            this.form.file_name = res.data.data.file_name
            if(this.form.preview_url) {
                    let file = {id: this.form.id, name: this.form.file_name, size: this.form.size }
                    this.form.dropzone.displayExistingFile(file, this.form.preview_url)
                }
        })
        
        },
        updateProject() {
            const data = new FormData()
            const files = this.form.dropzone.getAcceptedFiles()
            files.forEach( file => {
            data.append('images[]', file)
            this.form.dropzone.removeFile(file)
            })
            data.append('title', this.form.title)
            data.append('desc', this.form.desc)
            data.append('link', this.form.link)
            data.append('_method', 'PATCH')
            axios.post(`/api/project/${this.$route.params.id}`, data)
            .then( res => {
                this.$router.push({name: 'admin.project.index'})
            }).catch( error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors

                    }
                })
        }
       
   },
   mounted() {
       this.form.dropzone = new Dropzone(this.$refs.dropzone, {
       url: `/api/project/${this.$route.params.id}`,
       autoProcessQueue:false,
       maxFiles: 1,
       addRemoveLinks:true,
       acceptedFiles: ".png, .jpg"
      }),
      this.form.dropzone.on("maxfilesexceeded", function(file) { this.removeFile(file) }),

      this.getProject();
   },
   computed: {
    isDisabled() {
        return this.form.title && 
            this.form.desc && 
            this.form.link 
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

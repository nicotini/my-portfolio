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
                                    <router-link :to="{name: 'admin.about.create'}">
                                        Create about section
                                    </router-link>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="table">
                            <div class="education_table-heading">
                                <p>Full name</p> 
                                
                                <p>Email</p>
                                <p>Image</p>
                                <p>Phone</p>
                               <!--  <p>Social media</p> -->
                                <p>Description</p>
                                <p>Actions</p>
                            </div>
                        <!-- item 1 -->
                        <template v-if="aboutInfo">
                            <div class="education_table-items" >
                                <p>{{ this.aboutInfo.name }}</p>
                                <p><img class="pb-5" :src="this.aboutInfo.preview_url" /></p>
                                <p>{{ this.aboutInfo.email }}</p>
                                <p>{{ this.aboutInfo.phone }}</p>
                                <!-- <p>{{ this.aboutInfo.social_alias }}</p> -->
                                <p class="truncate-desc">{{ this.aboutInfo.desc }}</p>
                                <div>
                                    <router-link :to="{name:'admin.about.edit', params: {id:aboutInfo.id}}" class="btn-icon success" > 
                                        <i class="fas fa-pencil-alt"></i>
                                    </router-link>
                                    <button class="btn-icon danger" @click.prevent="deleteAbout(aboutInfo.id)" >
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </template>
                        </div>
                    
                    
                </section>
            </div>
    </main>
</template>
<script>
import axios from 'axios'

export default {
    name: "index",
    data() {
        return {
           aboutInfo : null
        }
    },
    methods: {
        
        getAboutInfo() {
                axios.get('/api/about').then( res => {
                this.aboutInfo = res.data.data

           })
            
           
        }, 
        deleteAbout(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You can't go back",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                /* confirmButtomText: 'Yes, delete it!' */
                }).then( res => {
                    if(res) {
                        axios.delete(`/api/about/${id}`)
                        .then( res => {
                            Swal.fire(
                                    'Delete',
                                    'About Info has deleted successfully',
                                    'success'
                                )
                    this.getAboutInfo()
                    })
                }
            })
           
        }
    },
    mounted() {
      
            this.getAboutInfo()
      
        
    }

}
</script>

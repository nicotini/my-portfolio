<template>
     <main class="main">
        <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
        <div class="main__content">
            <section class="projects section" id="projects">
                <div class="skills_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Projects </h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn-secondary">
                                <router-link :to="{name: 'admin.project.create'}">
                                    New Project
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
                                <input class="table_search--input" type="text" placeholder="Search Project">
                            </div>
                        </div>
            
                        <div class="project_table-heading">
                            <p>Image</p> 
                            <p>Title</p>
                            <p>Description</p>
                            <p>Link</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <template v-if="projects">
                            <div v-for="project in projects" :key="project.id" class="project_table-items">
                                <p>
                                    <img :src="project.preview_url" alt="" class="project_img-list">
                                </p>
                                <p>{{ project.title }}</p>
                                <p>{{ project.desc }}</p>
                                <p>{{ project.link }}</p>
                                <div>
                                    <router-link :to="{name:'admin.project.edit', params: {id:project.id}}" class="btn-icon success" > 
                                        <i class="fas fa-pencil-alt"></i>
                                    </router-link>
                                    <button class="btn-icon danger" @click.prevent=" deleteProject(project.id)" >
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
            projects: {}
        }
    },
     methods: {
        getAllProjects() {
            axios.get('/api/project/')
            .then( res => {
                this.projects = res.data.data
            })
        },
        deleteProject(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You can't go back",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
                }).then( res => {
                    if(res) {
                        axios.delete(`/api/project/${id}`)
                        .then( res => {
                            Swal.fire(
                                'Delete',
                                'About Info has deleted successfully',
                                'success'
                            )
                            this.getAllProjects()
                        })
                    }
                })
            }
        },
     mounted() {
        this.getAllProjects()
     }

}
</script>
<style scoped>
    
</style>


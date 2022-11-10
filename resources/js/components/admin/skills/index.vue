<template>
    <main class="main">
        <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
            <div class="main__content">
                 <!--==================== SKILLS ====================-->
                <section class="skills section" id="skills">
                    <div class="skills_container">
                        <div class="titlebar">
                            <div class="titlebar_item">
                                <h1>Skills </h1>
                            </div>
                            <div class="titlebar_item">
                                <div class="btn btn__open--modal" @click.prevent="openModal">
                                    New Skill
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
                                    <input class="table_search--input" type="text" placeholder="Search Skill">
                                </div>
                            </div>
                
                            <div class="skill_table-heading">
                                <p>Name</p> 
                                <p>Proficiency</p>
                                <p>Service</p>
                                <p>Actions</p>
                            </div>
                            <!-- item 1 -->
                            <template v-if="skills">
                                <div class="skill_table-items" v-for="skill in skills" :key="skill.id">
                                    <p>{{ skill.title}}</p>
                                    <div class="table_skills-bar">
                                        <span class="table_skills-percentage" :style="{'width' : `${skill.proficiency}%`}"></span>
                                        <strong>{{ skill.proficiency}} %</strong>
                                    </div>
                                    <p v-if="skill.service_title">{{ skill.service_title }}</p>
                                    <div>
                                        <button class="btn-icon success" @click.prevent="editModal(skill.id)">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="btn-icon danger" >
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </template>
                        </div>
                        
                    </div>
                    <!-------------- SERVICES MODAL --------------->
                    <div class="modal main__modal " :class="{show: showModal}" >
                        <div class="modal__content">
                            <span class="modal__close btn__close--modal" @click.prevent="closeModal" >×</span>
                            <h3 v-if="editMode == false" class="modal__title">Add Skill</h3>
                            <h3  v-if="editMode == true" class="modal__title">Update Skill</h3>
                            <hr class="modal_line"><br>
                            <div v-if="errors">
                                <div v-for="(field, k) in errors" :key="k">
                                    
                                    <p v-for="error in field" :key="error">
                                        {{error}}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <p>Title</p>
                                <input type="text" v-model="form.title" class="input" />

                                <p>Proficiency</p>
                                <input type="text" v-model="form.proficiency" class="input" />
                            
                                <p> select a Service</p>
                                <select class="inputSelect" v-model="form.service_id">
                                    <option disabled>Select service</option>
                                    <option :value="service.id" v-for="service in services" :key="service.id">
                                       {{ service.title }}
                                    </option>
                                </select>
                            </div>
                            <br><hr class="modal_line">
                            <div class="model__footer">
                                <button class="btn mr-2 btn__close--modal" @click="closeModal">
                                    Cancel
                                </button>
                                <button :disabled="!isDisabled" v-if="editMode == false" class="btn btn-secondary btn__close--modal " @click.prevent="createSkill">Save</button>
                                <button :disabled="!isDisabled" v-if="editMode == true" class="btn btn-secondary btn__close--modal " @click.prevent="updateSkill(form.id)">Update</button>
                            </div>
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
                skills: {},
                showModal: false,
                hideModal: true,
                form: {
                    title: null,
                    proficiency: null,
                    service_id: null
                },
                services: {},
                editMode: false,
                errors: {}
                
                
            }
        },
        methods: {
            getSkills() {
                axios.get('/api/skill').then( res => {
                    this.skills = res.data.data
                })
            },
            openModal() {
                this.showModal = !this.showModal
                this.editMode = false
            },
            closeModal() {
                this.showModal = !this.hideModal
                this.form = {}
            },
            getServices() {
                axios.get('/api/service').then(res => {
                    this.services = res.data.data
                })
            },
            createSkill() {
                axios.post('/api/skill/', {
                    title: this.form.title,
                    proficiency: this.form.proficiency,
                    service_id: this.form.service_id
                }).then( res => {
                    this.getSkills()
                    this.closeModal()
                    toast.fire({
                        icon: 'success',
                        title: 'Skill has added succsessfully'
                    })
                }).catch( error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                })
            },
            editModal(id) {
                this.editMode = true
                this.showModal = !this.showModal
                this.getSkill(id)
                /* console.log(id) */

            },
            getSkill(id) {
                axios.get(`/api/skill/${id}`)
                .then( res => {
                    this.form.id = res.data.data.id,
                    this.form.title = res.data.data.title,
                    this.form.proficiency = res.data.data.proficiency,
                    this.form.service_id  = res.data.data.service_id 
                })
            },
            updateSkill(id) {
                axios.patch(`/api/skill/${id}`, {
                    title: this.form.title,
                    proficiency: this.form.proficiency,
                    service_id: this.form.service_id 
                    
                }).then( res => {
                    console.log(this.form.service_id)
                    this.getSkills()
                    this.closeModal()
                    toast.fire({
                        icon: 'success',
                        title: 'Skill has updated succsessfully'
                    })
                }).catch( error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                })
            }
            
        },
        mounted() {
            this.getSkills()
            this.getServices()
        },
        computed: {
            isDisabled() {
                return this.form.title &&
                this.form.proficiency &&
                this.form.service_id
            }
        }

        
    }
</script>
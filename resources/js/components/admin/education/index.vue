<template>
    <main class="main">
        <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
        <div class="main__content">
            <section class="educations section" id="educations">
                <div class="skills_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Educations </h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn__open--modal" @click.prevent="openModal">
                                New Education
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
                                <input class="table_search--input" type="text" placeholder="Search Education">
                            </div>
                        </div>
            
                        <div class="education_table-heading">
                            <p>Institution</p> 
                            <p>Period</p>
                            <p>Degree</p>
                            <p>Department</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <template v-if="educations">
                            <div v-for="education in educations" :key="education.id" class="education_table-items">
                                <p>{{ education.institution }}</p>
                                <p>{{ education.period }}</p>
                                <p>{{ education.degree }}</p>
                                <p>{{ education.department }}</p>
                                <div>
                                    <button class="btn-icon success">
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
                <!-------------- EDUCATION MODAL --------------->
                <div class="modal main__modal " :class="{show: showModal}" >
                    <div class="modal__content">
                        <span class="modal__close btn__close--modal" @click.prevent="closeModal" >×</span>
                        <h3 class="modal__title">Add Education</h3>
                        <hr class="modal_line"><br>
                        <div>
                            <p>Institution</p>
                            <input type="text" class="input" v-model="form.institution" />

                            <p>Period</p>
                            <input type="text" class="input" v-model="form.period" />

                            <p>Degree</p>
                            <input type="text" class="input" v-model="form.degree" />

                            <p>Department</p>
                            <input type="text" class="input" v-model="form.department" />
                           
                        </div>
                        <br><hr class="modal_line">
                        <div class="model__footer">
                            <button class="btn mr-2 btn__close--modal" @click="closeModal()">
                                Cancel
                            </button>
                            <button class="btn btn-secondary btn__close--modal " @click.prevent="createEducation">Save</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</template>
<script>
import axios from 'axios';
import { toDisplayString } from 'vue';

export default {
    name:"education",
    data() {
        return {
            educations: {},
            showModal: false,
            hideModal: true,
            form: {
                institution: null,
                period: null,
                degree: null,
                department: null
            }
        }
    },
    methods: {
        getEducations() {
            axios.get('/api/education')
            .then( res => {
                this.educations = res.data.data
            })
        },
        openModal() {
            this.showModal = !this.showModal
        },
        closeModal() {
            this.showModal = !this.hideModal
            this.form = {}
        },
        createEducation() {
            axios.post('/api/education', {
                institution: this.form.institution,
                period: this.form.period,
                degree: this.form.degree,
                department: this.form.department
            }).then( res => {
                this.getEducations()
                this.closeModal()
                toast.fire({
                        icon: 'success',
                        title: 'Education has added succsessfully!'
                    })
            })
        }
    },
    mounted() {
        this.getEducations();
    }
}
</script>

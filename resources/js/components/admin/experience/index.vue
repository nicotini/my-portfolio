<template>
    <main class="main">
        <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
        <div class="main__content">
            <section class="experiences section" id="experiences">
                <div class="skills_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Experiences </h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn__open--modal" @click.prevent="openModal">
                                New Experience
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
                                <input class="table_search--input" type="text" placeholder="Search Experience">
                            </div>
                        </div>
            
                        <div class="experience_table-heading">
                            <p>Company</p> 
                            <p>Period</p>
                            <p>Position</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <template v-if="experiences">
                            <div v-for="experience in experiences" :key="experience.id" class="experience_table-items" >
                                <p>{{ experience.company }}</p>
                                <p>{{ experience.period }}</p>
                                <p>{{ experience.position }}</p>
                                <div>
                                    <button class="btn-icon success" @click.prevent="editModal(experience.id)">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn-icon danger" @click.prevent="deleteExperience(experience.id)">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                    
                </div>
                <!-------------- EXPERIENCE MODAL --------------->
                <div class="modal main__modal " :class="{show: showModal}" >
                    <div class="modal__content">
                        <span class="modal__close btn__close--modal" @click.prevent="closeModal()">×</span>
                        <h3 class="modal__title"  v-if="editMode == false">Add Experience</h3>
                        <h3 class="modal__title"  v-if="editMode == true">Update Experience</h3>
                        <hr class="modal_line"><br>
                        <div>
                            <p>Company</p>
                            <input type="text" v-model="form.company" class="input" />

                            <p>Period</p>
                            <input type="text" v-model="form.period" class="input" />

                            <p>Position</p>
                            <input type="text" v-model="form.position" class="input" />
                           
                        </div>
                        <br><hr class="modal_line">
                        <div class="model__footer">
                            <button class="btn mr-2 btn__close--modal" @click.prevent="closeModal()">
                                Cancel
                            </button>
                            <button :disabled="!isDisabled" class="btn btn-secondary btn__close--modal" v-if="editMode == false" @click.prevent="createExperience()">Save</button>
                            <button :disabled="!isDisabled" class="btn btn-secondary btn__close--modal" v-if="editMode == true" @click.prevent="updateExperience(form.id)">Update</button>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        </main>
</template>
<script>
export default {
    name:"experience",
    data() {
        return {
            experiences: {},
            showModal: false,
            hideModal: true,
            form: {
                company: null,
                period: null,
                position: null
            },
            error: {},
            editMode: false

        }
    },
    methods: {
        getExperiences() {
            axios.get('/api/experience')
            .then( res=> {
                this.experiences = res.data.data
            })
        },
        openModal() {
            this.editMode = false
            this.showModal = !this.showModal
        },
        closeModal() {
            this.showModal = !this.hideModal
            this.form =  {}
        },
        createExperience() {
            axios.post('/api/experience',  {
                company: this.form.company,
                period: this.form.period,
                position: this.form.position
            }).then( res => {
                this.getExperiences()
                this.closeModal()
                toast.fire({
                    icon: 'success',
                    title: 'Experience has added succsessfully!'
                })
            }).catch( error => {
                if(error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
            })
        },
        getExperience(id) {
            axios.get(`/api/experience/${id}`)
            .then( res=> {
                this.form.id = res.data.data.id,
                this.form.company = res.data.data.company,
                this.form.period = res.data.data.period,
                this.form.position = res.data.data.position
            })
        },
        editModal(id) {
            this.editMode = true
            this.showModal = !this.showModal
            this.getExperience(id)
        },
        updateExperience(id) {
           axios.patch(`/api/experience/${id}`, {
                company: this.form.company,
                period: this.form.period,
                position: this.form.position
           }).then( res => {
             this.getExperiences()
             this.closeModal()
             toast.fire({
                    icon: 'success',
                    title: 'Experience has updated succsessfully'
                })
           }).catch( error => {
            if(error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
           }) 
        },
        deleteExperience(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You can't go back",
                icon: 'warning'
            }).then( res => {
                if(res) {
                    axios.delete(`/api/experience/${id}`)
                    .then( res => {
                        Swal.fire(
                                'Delete',
                                'Experience has deleted successfully',
                                'success'
                            )
                            this.getExperiences();
                        })
                    }
                })
            }

    },
    mounted() {
        this.getExperiences();
    },
    computed: {
        isDisabled() {
                return this.form.company &&
                this.form.period &&
                this.form.position
            }
    }
    

}
</script>

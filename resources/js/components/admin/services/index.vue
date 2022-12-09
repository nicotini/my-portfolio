<template>
     <main class="main">
        <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
            <div class="main__content">
                <section class="services section" id="services">
                <div class="services_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Services</h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn__open--modal" @click.prevent="openModal">
                                create Service
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
                                <input class="table_search--input" type="text" placeholder="Search Service">
                            </div>
                        </div>
            
                        <div class="service_table-heading">
                            <p>Title</p> 
                            <p>Icon</p>
                            <p>Description</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <template v-if="services">
                        <div class="service_table-items" v-for="service in services" :key="service.id">
                            <p>{{ service.title }}</p>
                            <button class="service_table-icon">
                             
                              <i class="  {{service.icon }}"></i>
                            </button>
                            <p>
                                {{ service.desc }}	
                            </p>
                            <div>
                                <button class="btn-icon success" @click.prevent="editModal(service.id)">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn-icon danger" @click.prevent="deleteService(service.id)">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </template>
                        <!-- end item 1 -->
                    </div>

                </div>
                <!-------------- SERVICES MODAL --------------->
                <div class="modal main__modal " :class="{ show: showModal}">
                    <div class="modal__content">
                        <span class="modal__close btn__close--modal" @click.prevent="closeModal" >×</span>
                        <h3 class="modal__title" v-show="editMode == false">Add Service</h3>
                        <h3 class="modal__title" v-show="editMode == true">Update Service</h3>
                        <div v-if="errors">
                            <div v-for="(field, k) in errors" :key="k">
                                
                                <p v-for="error in field" :key="error">
                                    {{error}}
                                </p>
                            </div>
                        </div>
                        <div>
                            <p>Service Name</p>
                            <input type="text" class="input" v-model="form.title" />

                            <p>Icon Class</p>
                            <input type="text" class="input"  v-model="form.icon" />
                            <span style="color:#006fbb;">Find your suitable icon: Font Awesome</span>

                            <p>Description</p>
                            <textarea cols="10" rows="5" v-model="form.desc" ></textarea>
                        </div>
                        
                        <div class="model__footer">
                            <button class="btn mr-2 btn__close--modal" @click.prevent="closeModal" >
                                Cancel
                            </button>
                            <button :disabled="!isDisabled" class="btn btn-secondary btn__close--modal " v-show="editMode == false" @click.prevent="createService">Save</button>
                            <button  :disabled="!isDisabled" class="btn btn-secondary btn__close--modal " v-show="editMode == true" @click.prevent="updateService(form.id)">Update</button>
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
            services: null,
            showModal: false,
            hideModal: true,
            editMode: false,
            form: {
                id: null,
                title: null,
                icon: null,
                desc: null
            },
            errors: {}
        }
    },
    mounted() {
        this.getServices()
       
        
    },
    methods: {
        getServices() {
            axios.get('/api/service').then( res => {
                this.services = res.data.data
                
            })
        },
        /* openModal() {
         this.editMode == false
         this.showModal ? this.showModal = false : this.showModal = true
         
        }, */
        openModal() {
            this.showModal = !this.showModal
            this.editMode = false
        },
        closeModal() {
            this.showModal = !this.hideModal
            this.form = {}
        },
        createService() {
            axios.post('/api/service', {
                title: this.form.title,
                icon: this.form.icon,
                desc: this.form.desc})
                .then( res => {
                    this.getServices()
                    this.closeModal()
                    this.form = {}
                }).catch( error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                })
        },
        updateService(id) {    
            axios.patch(`/api/service/${id}`, {
                title: this.form.title,
                icon: this.form.icon,
                desc: this.form.desc
            }).then( res => {
                this.getServices()
                this.closeModal()
                
               
            }).catch( error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                })
        },
        editModal(id) {
            this.editMode = true
            this.showModal = !this.showModal
            this.getService(id)
            //console.log(id)
        },
        getService(id) {
            axios.get(`/api/service/${id}`)
            .then( res => {
                this.form.id = res.data.data.id
                this.form.title = res.data.data.title
                this.form.icon = res.data.data.icon
                this.form.desc = res.data.data.desc
            })
        },
        deleteService(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You can't go back",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtomText: 'Yes, delete it!'
            }).then(res => {
                if(res) {
                    axios.delete(`/api/service/${id}`).then( res => {
                        Swal.fire(
                            'Delete',
                            'Service deleted successfully',
                            'success'
                        )
                        this.getServices()
                    }) 
                }
            })
            
        }
       
    },
    computed: {
        isDisabled() {
            return this.form.title &&
            this.form.icon &&
            this.form.desc 
        }

    }
}
</script>
<style scoped>
   
</style>

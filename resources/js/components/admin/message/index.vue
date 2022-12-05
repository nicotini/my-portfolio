<template>
    <main class="main">
        <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
        <div class="main__content">
            <section class="messages section" id="messages">
                <div class="messages_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Messages </h1>
                        </div>
                        <div class="titlebar_item">
                            
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
                                <input class="table_search--input" type="text" placeholder="Search Message">
                            </div>
                        </div>
            
                        <div class="message_table-heading">
                            <p>Name</p> 
                            <p>Email</p>
                            <p>Subject</p>
                            <p>Description</p>
                            <p>Status</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <template v-if="allMessages">
                            <div v-for="message in allMessages" :key="message.id" class="message_table-items">
                                <p>{{ message.name }}</p> 
                                <p>{{ message.email }}</p>
                                <p>{{ message.subject }}</p>
                                <p>{{ message.desc }}</p>
                                <p>
                                    <span @click.prevent="updateStatus(message.id, 0)"  v-if="message.status == 1" class="badge_read">
                                        Read
                                    </span>
                                    <span @click.prevent="updateStatus(message.id, 1)" v-if="message.status == 0"  class="badge_unread">
                                        Unread
                                    </span>
                                </p>
                                <div>
                                    <button class="btn-icon danger" @click.prevent="deleteMessage(message.id)">
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
            allMessages: {},
            

        }
    },
    methods: {
        getAllMessages() {
            axios.get('/api/message')
            .then( res => {
                this.allMessages = res.data.data
                console.log(res.data.data)
            })
        },
        updateStatus(id, status) {
           const data = new FormData()
          data.append('status', status)
          data.append('_method', 'PATCH')
          axios.post(`/api/message/${id}`, data)
          .then( res => {
            toast.fire({
                type: 'success',
                title: 'Status has change successfully',
            })
            this.getAllMessages()
          })

        },
        deleteMessage(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You can't go back",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            }).then( res => {
                if(res) {
                    axios.delete(`/api/message/${id}`).then( res => {
                    Swal.fire(
                            'Delete',
                            'Message has deleted successfully',
                            'success'
                            )
                        this.getAllMessages()    
                    }) 
                }
            })
        }
    },
     
    mounted() {
        this.getAllMessages()
    }
    
}
</script>
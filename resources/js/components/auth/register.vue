<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <form class="mt-5">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your name</label>
                            <input v-model="name" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input v-model="email" type="email" class="form-control" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input v-model="password" type="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password confirmation</label>
                            <input v-model="password_confirmation" type="password" class="form-control">
                        </div>
                       
                        <button @click.prevent="register" type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import store from '../../store';

export default {
    name: "register", 
    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,

        }
    },
    methods: {
        register() {
            axios.get('/sanctum/csrf-cookie')
            .then(response => {
                axios.post('/register',  {
                name: this.name, 
                email: this.email, 
                password: this.password, 
                password_confirmation: this.password_confirmation
                }).then( res => {
                    store.dispatch('setToken', res.config.headers['X-XSRF-TOKEN'])
                    
                    this.$router.push({name: 'admin.home.personal'})
                    
                })
             })
            
        }
    }
}
</script>
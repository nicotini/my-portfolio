<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <form class="mt-5">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input v-model="email" type="email" class="form-control" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input v-model="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                       
                        <button @click.prevent="login" type="submit" class="btn btn-primary">Login</button>
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
    name: "login",
    
    data() {
        return {
            email: null,
            password: null,
            
        }
    },
    
    methods: {
        login() {
            
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', {email: this.email, password: this.password})
                .then(res => {
                   store.dispatch('setToken',res.config.headers['X-XSRF-TOKEN'])
                    this.$router.push({name: 'admin.home.index'})
                })
                .catch( err => {
                    console.log(err.response)
                })
            })
        },
        
    },
}
</script>
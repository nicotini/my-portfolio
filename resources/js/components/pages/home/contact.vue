<template>
    
        <h2 class="section__title">Contact Me</h2>
        <span class="section__subtitle">Get in touch</span>
        <div class="contact_container container grid">
            <div>
                <div class="contact_information">
                    <i class="uil uil-phone contact_icon"></i>

                    <div>
                        <h3 class="contact_title">Call Me</h3>
                        <span class="contact_subtitle">444-444-444</span>
                    </div>
                </div>
                <div class="contact_information">
                    <i class="uil uil-envelope contact_icon"></i>

                    <div>
                        <h3 class="contact_title">Email</h3>
                        <span class="contact_subtitle">johndoe@gmail.com</span>
                    </div>
                </div>
                <div class="contact_information">
                    <i class="uil uil-map-marker contact_icon"></i>

                    <div>
                        <h3 class="contact_title">Location</h3>
                        <span class="contact_subtitle">Germany-Munich Av.munich #1234</span>
                    </div>
                </div>
            </div>
            <form class="contact_form grid" v-if="showForm">
                <div v-if="errors">
                <p v-for="(field, k) in errors" :key="k">
                    
                    <span v-for="error in field" :key="error">
                        {{error}}
                    </span>
                </p>
             </div>
                <div class="contact_inputs grid">
                    <div class="contact_content">
                        <my-input 
                        label="Name"
                        type="text"
                        v-model="form.name" 
                        class="contact_input"
                        />
                    </div>
                    <div class="contact_content">
                        <my-input 
                        label="Email"
                        type="email" 
                        v-model="form.email" 
                        class="contact_input"
                        />
                    </div>
                </div>
                <div class="contact_content">
                    <my-input 
                    label="Subject"
                    type="email"
                    v-model="form.subject" 
                    class="contact_input"
                    />
                </div>
                <div class="contact_content">
                    <my-textarea
                    label="Description"
                    v-model="form.desc" 
                    class="contact_input"
                    ></my-textarea>
                </div>
                <div>
                    <my-button
                    @click.prevent="storeMessage()"
                    >
                        Send Message
                        <i class="uil uil-message button_icon"></i>
                    </my-button>
                </div>
            </form>
            <div class="form-message_send" v-else="messageAfterSend">Your message has been sent!</div>
        </div>
</template>
<script>
import axios from 'axios';

export default {
    name: 'contact',
    data() {
        return {
            form: {
                name: null,
                email: null,
                subject: null,
                desc: null
            },
            messageAfterSend: false,
            showForm: true,
            errors: {}
            
        }
    },
    methods: {
        storeMessage() {
            axios.post('/api/main', {
                name: this.form.name,
                email: this.form.email,
                subject: this.form.subject,
                desc: this.form.desc
            }).then( res => {
                this.form = {}
                this.afterSend()
                
            }).catch( error => {
                    if(error.response.status === 422) {
                        this.errors = error.response.data.errors

                    }
                })
        },
        afterSend() {
            this.showForm = !this.showForm
            this.messageAfterSend = !this.messageAfterSend
    }
}
}
</script>
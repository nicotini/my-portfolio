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

            <form class="contact_form grid">
                <div class="contact_inputs grid">
                    <div class="contact_content">
                        <label for="" class="contact_label">Name</label>
                        <input type="text" class="contact_input">
                    </div>
                    <div class="contact_content">
                        <label for="" class="contact_label">Email</label>
                        <input type="email" class="contact_input">
                    </div>
                </div>
                <div class="contact_content">
                    <label for="" class="contact_label">Project</label>
                    <input type="tetx" class="contact_input">
                </div>
                <div class="contact_content">
                    <label for="" class="contact_label">Project description</label>
                    <textarea name="" id="" cols="0" rows="7" class="contact_input"></textarea>
                </div>
                <div>

                    <my-button>
                        Send Message
                        <i class="uil uil-message button_icon"></i>
                    </my-button>
                </div>
            </form>
        </div>
    
</template>
<script>
export default {
    name: 'contact'
}
</script>
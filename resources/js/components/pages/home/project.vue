<template>
    <section class="project section" >
        <div class="project_bg">
        <div class="project_container container grid">
            <div class="project_data">
                <h2 class="project_title">You have new project</h2>
                <p class="project_description">Contact me now and get a 50% discounted</p>
                <my-button
                    style="background-color: #FFF; color: hsl(250, 69%, 61%)"
                >
                    Contact Me
                    <i class="uil uil-message project_icon button_icon"></i>
                </my-button>
            </div>
            <template v-if="aboutInfo">
                <img :src="aboutInfo.url_image" alt="" class="project_img">
            </template>
        </div>
        </div>
    </section>
</template>
<script>
export default {
    name: 'project',

    props: {
        aboutInfo: {
            type: Object,
            required: false
        }
    }
}
</script>
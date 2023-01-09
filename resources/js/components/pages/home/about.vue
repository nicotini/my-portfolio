<template>
    <div class="home_container container grid">
            <div class="home_img" v-if="aboutInfo">
                <img 
                :src="aboutInfo.url_image" 
                :alt="aboutInfo.name"
                >
            </div>

            <div class="home_data">
                <h1 class="home_title">Hi, I'am {{ aboutInfo.name }}</h1>
                <h3 class="home_subtitle">FullStack Web developer</h3>
                <p class="home_description">
                    {{ aboutInfo.desc }}
                </p>
                <div class="buttons-about">
                    <my-button>
                        Contact Me <i class="uil uil-message button__icon"></i>
                    </my-button>
                    <my-button @click.prevent="downloadCV(aboutInfo.id)">
                        Download CV <i class="uil uil-download-alt button_icon"></i>
                    </my-button>
                </div>
            </div>
        </div>
</template>
<script>
export default {
    name: 'about',
    props: {
        aboutInfo: {
            type: Object,
            required: false
        }

    },
    methods: {
        downloadCV(id) {
                axios.get(`/api/main/download/${id}`, {responseType: 'blob'})
                .then( res => {
                    let  fileURL = window.URL.createObjectURL(new Blob([res.data]));
                    let  fURL = document.createElement('a');
                     fURL.href = fileURL;
                     fURL.setAttribute('download', 'my-cv.pdf');
                     document.body.appendChild(fURL);
                     fURL.click();
                })
            }
    }
}
</script>
<template>
    <h2 class="section__title">Services</h2> 
        <span class="section__subtitle">What is offer</span> 

        <div class="services_container container grid">
            <template v-for="service, index in services" :key="service.id">
            <!--============== SERVICE =============-->
                <div class="services_content">
                    <div>
                        <i class="uil uil-web-grid services_icon"></i>
                        <h3 class="services_title">{{ service.title }}</h3>
                    </div>
                    <span class="button button--flex button--small button--link services_button" @click="showPopupInfo(service, index)">
                        View More
                        <i class="uil uil-arrow-right button_icon"></i>
                    </span>
                    <modal-popup
                        v-model:show="isPopupVisible" 
                        :service="this.chosenService"
                        :index = "this.chosenIndex"
                    >
                    <h4 class="services_modal-title">{{ this.chosenService.title }}</h4>
                        <div>{{ this.chosenService.desc }}</div>
                    </modal-popup>
                </div>
            </template>
        </div>
</template>
<script>
export default {
    name: 'service',
    props: {
        services: {
            type: Object,
            required: true
        }
       
    },
    data() {
        return {
            isPopupVisible: false,
            chosenService: null,
            chosenIndex: null
        }
    },
    methods: {
        showPopupInfo(service, index) {
            if(service) {
                this.chosenService = service
                this.chosenIndex = index
            }
            this.isPopupVisible = true
        }
        
    }
}
</script>
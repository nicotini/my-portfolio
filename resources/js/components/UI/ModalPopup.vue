<template>
    <div class="services_modal">
        <div class="services_modal-content ">
            
            <i class="uil uil-times services_modal-close"
            @click="closePopup"
            ></i>
            <div>
                <slot></slot>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "modal-popup",
    methods: {
        closePopup() {
            this.$emit('closePopup')
        }
    }
    
}
</script>
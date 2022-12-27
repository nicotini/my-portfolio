<template>
    <div class="services_modal" v-if="show" @click.stop="hideModal">
        <div @click.stop class="services_modal-content ">
            
            <i class="uil uil-times services_modal-close"
            @click="hideModal"
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
    props: {
        show: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        hideModal() {
            this.$emit('update:show', false)
        }
    }
}
</script>
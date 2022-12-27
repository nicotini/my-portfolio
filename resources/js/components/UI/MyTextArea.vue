<template>
    <label for="" class="contact_label">{{ label }}</label>
    <textarea
     cols="0" 
     rows="7"
     v-bind="$attrs"
    :value="modelValue" 
    @input="updateInput" ></textarea>

</template>
<script>
export default {
    name: 'my-textarea',
    props: {
        label: {
            type: String,
            default: '',
        },
        modelValue: [String, Number]
    },
    methods: {
        updateInput(event) {
            this.$emit('update:modelValue', event.target.value)
        }
    }
}
</script>
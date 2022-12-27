<template>
    <label for="" 
    class="contact_label">{{ label }}</label>
    <input 
    v-bind="$attrs"
    :value="modelValue" 
    @input="updateInput" 
    >
</template>
<script>
export default {
    name: 'my-input',
    inheritAttrs: false,
    props: {
       modelValue: [String, Number],
       
       label: {
        type: String,
        default: '',
       }
    },
    methods: {
        updateInput(event) {
            this.$emit('update:modelValue', event.target.value)
        }
    }
}
</script>
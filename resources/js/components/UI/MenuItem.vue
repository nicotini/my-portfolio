<template>
    <li 
    v-bind="$attrs"
    >
        <a :href="menuItem.to" @click.prevent="smoothScroll(menuItem.to)" class="nav_link">{{ menuItem.name }}</a>
    </li>

</template>
<script>
export default {
    name: 'menu-item',
    inheritAttrs: false,
    
    props: {
        menuItem: {
            type: Object,
            default: {}
        }
       
    },
    methods: {
        smoothScroll(item) {
            window.scrollTo({
            top: document.querySelector(item).offsetTop,
            behavior: 'smooth'
            })
        }
    }

}
</script>
<template>
    <li 
    
    >
        <a :href="menuItem.to" @click.prevent="smoothScroll(menuItem.to)" class="nav_link">{{ menuItem.name }}</a>
    </li>

</template>
<script>
export default {
    name: 'menu-item',
   
    
    props: {
        menuItem: {
            type: Object,
            default: {}
        }
        

       
    },
    methods: {
       /*  smoothScroll(item) {
                window.scrollTo({
                top: document.querySelector(item).offsetTop,
                behavior: 'smooth'
                })
               
                
        } */
        smoothScroll(item) {
            this.$emit('smoothScroll', item)
            
        }
        
    }

}
</script>
<template>
    <div>
        <AppLayout>
            <router-view ></router-view>
        </AppLayout>
        
    </div>
</template>
<script>
import AppLayout from './layouts/AppLayout.vue'
export default {
    name: "App",
    components: { AppLayout }
 
}

</script>

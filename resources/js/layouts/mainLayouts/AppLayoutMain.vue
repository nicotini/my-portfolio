<template>
    <div class="client">
        <AppLayoutHeader />
        <slot />
        <AppLayoutFooter />
    </div>
</template>
<script>
import AppLayoutHeader from './AppLayoutHeader.vue';
import AppLayoutFooter from './AppLayoutFooter.vue';
export default {
    name: "AppLayoutMain",
    components: {
        AppLayoutHeader,
        AppLayoutFooter
    }

}
</script>


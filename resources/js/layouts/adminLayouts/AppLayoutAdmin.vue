<template>
    <div class="base">
      <AppLayoutLinks />
      <AppLayoutSidebar />
      <slot />
    </div>
  </template>
  
  <script>
  
  import AppLayoutSidebar from './AppLayoutSidebar.vue';
  import AppLayoutLinks from './AppLayoutLinks.vue'
  export default {
    name: "AppLayoutAdmin",
    components: {
      AppLayoutLinks,
      AppLayoutSidebar
    }
  }
  </script>
  
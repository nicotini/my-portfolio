<template>
    <component :is="layout">
      <slot />
    </component>
  </template>

<script>
const defaultLayout = 'AppLayoutDefault'
export default {
  name: "AppLayout",
  computed: {
    layout() {
      /* const layout = this.$route.meta.layout || defaultLayout */
      return this.$route.meta.layout || defaultLayout
    }
  }
}
</script>
<style  lang="scss">
  @import '../assets/css/main.scss';
</style>
<template>
    <div>
      
       <router-view></router-view>
       <div>
        <router-link :to="{name: 'admin.home.index'}">Admin Panel</router-link>
        <router-link :to="{name: 'pages.home.index'}">Main page of the component</router-link>
       </div>
    </div>
</template>
<script>
export default {
    name: "app",
}

</script>
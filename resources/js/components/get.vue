<template>
    <div>
        get

    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: "get",

    mounted() {
        this.getData()
    },
    methods: {
        getData() {
            axios.get('/api/get')
            .then(res => {
                console.log(res)
            })
        }
    
    }
}
</script>
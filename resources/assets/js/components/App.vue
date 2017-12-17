<template>
    <div class="container">
        <!--hallo-->
        <list-seeds></list-seeds>
    </div>
</template>

<script>
    import listSeeds from './listSeeds.vue';

    export default {
        name: "app.vue",
        mounted() {
            console.log('Component mounted.')
        },
        components:{
            listSeeds
        }
    }
</script>

<style scoped>

</style>
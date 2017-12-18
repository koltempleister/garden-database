<template>
    <div class="container">
        <!--hallo-->
        <list-species></list-species>
        <list-seeds></list-seeds>
    </div>
</template>

<script>
    import listSeeds from './seed/listSeeds.vue';
    import ListSpecies from "./species/listSpecies";

    export default {
        name: "app.vue",
        mounted() {
            console.log('Component mounted.')
        },
        components:{
            ListSpecies,
            listSeeds
        }
    }
</script>

<style scoped>

</style>
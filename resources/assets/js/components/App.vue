<template>
    <div class="container">
        <list-species></list-species>
        <list-seeds></list-seeds>
    </div>
</template>

<script>
    import store from '../vuex/store.js';
    import listSeeds from './seed/listSeeds.vue';
    import ListSpecies from "./species/listSpecies";

    export default {
        name: "app.vue",
        store,
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
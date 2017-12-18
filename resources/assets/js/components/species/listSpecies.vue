<template>
    <div id ="species"  class="col-md-4">
        <h2>Species</h2>
        <li v-for="(species, index) in species"
            v-bind="species"
            v-bind:index="index"
            v-bind:key="species.id"
        >
            <species :species="species"></species>
        </li>
    </div>
</template>

<script>

    import Species from "./species.vue";

    export default {
        name: "list-species",
        data() {
            return {
                species:[]
            };
        },
        components: {
            Species
        },
        created () {
            let uri = 'http://zaden.local/species';
            Axios.get(uri).then((response) => {
                console.log('ajax call made');
                this.species = response.data;
            });
        }
    }
</script>

<style scoped>

</style>
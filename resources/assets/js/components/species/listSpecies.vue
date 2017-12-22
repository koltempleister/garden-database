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
    import { mapActions, mapGetters } from 'vuex';
    import { species } from '../../vuex/getters';

    export default {
        name: "list-species",
        components: {
            Species
        },
        created () {
            this.getSpeciesList();
        },
        computed: mapGetters({
            species: 'species'
        }),
        methods:{
            ...mapActions([
                'getSpeciesList'
            ]),

        }
    }
</script>

<style scoped>

</style>
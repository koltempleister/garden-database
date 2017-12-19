<template>
    <div class="col-md-6">
        <h2>zaden</h2>
        <span v-on:click="create = true">[new]</span>
        <create-seed v-if="create" ></create-seed>
        <li v-for="(seed, index) in seeds"
            v-bind="seed"
            v-bind:index="index"
            v-bind:key="seed.id"
        >
            <seed :seed="seed"></seed>
        </li>
    </div>
</template>

<script>
    import Seed from "./seed";
    import CreateSeed from "./newSeed";

    export default {
        components: {
            Seed,
            CreateSeed
        },
        name: "list-seeds",
        data() {
            return {
                seeds:[],
                create:false,
             }
        },
        created () {
            this.getSeeds();
            //upon receiving event seed-created
            //add seed to list
            //remove creation form
        },
        methods:{
            getSeeds(){
                let uri = 'http://zaden.local/seed';
                // let uri = 'http://zaden.local/seed/' + this.$route.params.id;
                Axios.get(uri).then((response) => {
                    console.log('ajax call made');
                    this.seeds = response.data;
                });
            },
            addSeed(seed) {
                this.seeds.push(seed);
            },

        }
    }
</script>

<style scoped>

</style>
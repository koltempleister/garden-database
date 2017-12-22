<template>
    <div class="col-md-6">
        <h2>zaden</h2>
        <message></message>
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
    import Seed from "./seed"
    import CreateSeed from "./newSeed"
    import { mapGetters, mapActions } from 'vuex'
    import Message from "../message";

    export default {
        components: {
            Message,
            Seed,
            CreateSeed
        },
        name: "list-seeds",
        data() {
            return {
                create:false,
             }
        },
        computed:mapGetters({
            seeds: 'seeds'
        }),
        created () {
            //upon receiving event seed-created
            this.getSeedList();
            //add seed to list
            //remove creation form
        },
        methods:{
            ...mapActions ([
                'getSeedList'
            ]),


        }
    }
</script>

<style scoped>

</style>
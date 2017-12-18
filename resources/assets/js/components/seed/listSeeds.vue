<template>
    <div  class="col-md-6">
    <h2>zaden</h2>
    [new]
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

    export default {
        components: {
            Seed
        },
        name: "list-seeds",
        data() {
            return {
                // seeds: [
                //     'seed':{
                //         'id':'1',
                //         'name':'lala'
                //     }
                // ]
            seeds:[
            //     {
            //         "id":19,
            //         "name":"Rico Braun",
            //         "species_id":325,
            //         "remarks":"Ut est repellendus deleniti sequi earum nihil.",
            //         "outside_from":{"value":5.06,"formatted":"May"},
            //         "outside_till":{"value":5.56,"formatted":"May"},
            //         "inside_from":{"value":6.87,"formatted":"June"},
            //         "inside_till":{"value":7.65,"formatted":"July"},
            //         "harvest_from":{"value":1,"formatted":"January"},
            //         "harvest_till":{"value":0,"formatted":"nvt"},
            //         "time_till_harvest":2095004423,
            //         "row_distance_cm":23,
            //         "thin_out_cm":46,
            //         "replant_possible":1,
            //         "plant_out_from":{"value":3.3,"formatted":"March"},
            //         "plant_out_till":{"value":8.12,"formatted":"August"},
            //         "species":{
            //             "id":325,
            //             "name":"Zion McDermott",
            //             "parent_id":4,
            //             "_lft":104,"_rgt":105}
                // }
            ]
             }
        },
        created () {
            let uri = 'http://zaden.local/seed';
            // let uri = 'http://zaden.local/seed/' + this.$route.params.id;
            Axios.get(uri).then((response) => {
                console.log('ajax call made');
                this.seeds = response.data;
            });
        }
    }
</script>

<style scoped>

</style>
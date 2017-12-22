<template>
    <div>
        <seed-form :seed="seed" :action="createSeed"  v-model="seed"></seed-form>
    </div>
</template>

<script>
    import SeedForm from './seedForm.vue';
    import { mapActions } from 'vuex'

    export default {

        name: "update-seed",
        data () {
            return {
                seed: {
                    "name": '',
                    "species_id": '',
                    'id':null
                },
            }
        },
        components:{
            SeedForm
        },
        methods:{
            createSeed (event) {
                console.log('seed');
                console.log(this.seed);
                this.addSeed([event, this.seed]);
            },
            seedCreated(){
                console.log("emitting event");
                //emit event seed created
            },
            ...mapActions([
                'addSeed'
            ])
        }
    }
</script>

<style scoped>

</style>
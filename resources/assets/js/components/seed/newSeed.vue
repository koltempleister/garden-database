<template>
    <div>
        <seed-form :seed="seed" :action="createSeed"  v-model="seed"></seed-form>
    </div>
</template>

<script>
    import SeedForm from './seedForm.vue';

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
                event.preventDefault();

                let uri = 'http://zaden.local/seed';
                console.log('submitting to' + uri);
                console.log(this.seed);
                Axios.post(uri, this.seed).then((response) => {
                    console.log('ajax call success');
                    this.seedCreated;
                }).catch((error) => {
                    console.log(error)
                });
            },
            seedCreated(){
                console.log("emitting event");
                //emit event seed created
            }
        }
    }
</script>

<style scoped>

</style>
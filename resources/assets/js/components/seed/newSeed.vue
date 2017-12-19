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
                },
            }
        },
        components:{
            SeedForm
        },
        methods:{
            createSeed (event) {
                event.preventDefault();

                let uri = 'http://zaden.local/seed/';
                console.log('submitting to' + uri);
                console.log(this.seed);
                Axios.post(uri, this.seed).then((response) => {
                    console.log('ajax call success');
                }).catch((error) => {
                    console.log(error)
                });
            }
        }
    }
</script>

<style scoped>

</style>
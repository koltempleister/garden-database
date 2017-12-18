<template>
    <div>
        <div v-if="response"></div>
        <seed-form :seed="seed" :action="updateSeed" v-model="seed"></seed-form>
    </div>
</template>

<script>
   import SeedForm from './seedForm.vue';

    export default {
        data () {
          return {
              response:false
          }
        },
        name: "update-seed",
        props:['seed'],
        components:{
            SeedForm
        },
        methods:{
            updateSeed (event) {
                event.preventDefault();

                let uri = 'http://zaden.local/seed/' + this.seed.id;
                console.log('submitting to' + uri);

                var sendableSeed = this.seed;
                delete sendableSeed.stock_items;
                delete sendableSeed.species;

                console.log(sendableSeed);
                Axios.patch(uri, sendableSeed).then((response) => {
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
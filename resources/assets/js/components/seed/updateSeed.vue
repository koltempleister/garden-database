<template>
    <div>
        <div v-if="response"></div>
        <seed-form :seed="seed" :action="updateSeed" v-model="seed" ></seed-form>
    </div>
</template>

<script>
   import SeedForm from './seedForm.vue';
   //import { mapActions, mapGetters } 'vuex'

    export default {
        data () {
          return {
              response:false
          }
        },
        name: "update-seed",
        components:{
            SeedForm
        },
        props:['id'],
        computed:{
            seed:{
                get(){
                    console.log(this.id);
                   return this.$store.state.seeds.find(seed => seed.id === this.id);
                },
                set(value){
                    console.log('call action updateseed');
                    this.$store.dispatch("updateSeed", value)
                }
            }
        },
        methods: {
            updateSeed () {
                this.$store.dispatch("updateSeed", this.seed)
            }
        }

    }
</script>

<style scoped>

</style>
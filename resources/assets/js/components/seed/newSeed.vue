<template>
    <div>
        <seed-form :seed="seed" :action="addSeed"  v-model="seed"></seed-form>
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

                addSeed () {
                    this.$store.dispatch('addSeed', this.seed)
                }

        }
    }
</script>

<style scoped>

</style>
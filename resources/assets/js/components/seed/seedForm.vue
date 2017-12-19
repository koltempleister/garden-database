<template>
    <form v-on:submit="action">
        <input v-model="seed.name" name="name"/>
        <dropdown-species :seed="seed"></dropdown-species>
        <button>Submit</button>
    </form>
</template>

<script>
    import DropdownSpecies from '../species/dropdownSpecies.vue'

    export default {
        name: "seed-form",
        props:['seed','action'],
        // data () {
        //     return {
        //         id: this.species_id
        //     }
        // },
        components:{
            DropdownSpecies
        },

    }
</script>

<style scoped>

</style>
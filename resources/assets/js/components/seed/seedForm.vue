<template>
    <form v-on:submit="action">
        <input v-model="seed.name" name="name"/>
        <dropdown-species v-model="seed.species_id"></dropdown-species>
        <button>Submit</button>
    </form>
</template>

<script>
    import DropdownSpecies from '../species/dropdownSpecies.vue'

    export default {
        name: "seed-form",
        props:['seed','action'],
        components:{
            DropdownSpecies
        },

    }
</script>

<style scoped>

</style>
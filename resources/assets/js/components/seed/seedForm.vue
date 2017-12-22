<template>
<div>
    <input v-model="seed.name" name="name"/>
    <dropdown-species :seed="seed"></dropdown-species>
    <button @click.prevent="action">Submit</button>
</div>
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
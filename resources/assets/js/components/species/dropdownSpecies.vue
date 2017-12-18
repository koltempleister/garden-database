<template>
    <select name="species_id">
        <option
                v-for="(species,index) in allspecies"
                v-bind:key="index"
                v-bind:value="species.id"

        >{{species.name}}</option>
    </select>
</template>

<script>
    export default {
        name: "dropdown-species",
        data() {
            return {
                allspecies:[]
            };
        },
        created () {
            let uri = 'http://zaden.local/species';
            Axios.get(uri).then((response) => {
                console.log('ajax call made');
                this.allspecies = response.data;
            });
        }
    }
</script>

<style scoped>

</style>
<template>
    <form>
        <input name="name" v-bind:value="seed.name" />
        <button></button>
    </form>
</template>

<script>
    export default {
        name: "update-seed",
        props:['seed']
    }
</script>

<style scoped>

</style>
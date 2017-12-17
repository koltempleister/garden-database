<template>
    <div>
        <h3>{{seed.name}}</h3>
        <div>[detail][edit][stock][delete]</div>
    </div>
</template>

<script>
    export default {
        name: "seed",
        props: ['seed' ],
        created() {
            console.log( this.seed);
        }
    }
</script>

<style scoped>

</style>
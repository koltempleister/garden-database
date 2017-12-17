<template>
    <div>
        <p>{{seed.remarks}}</p>
    </div>
</template>

<script>
    export default {
        name: "seed-detail",
        props: ['seed' ],
        created() {
            console.log( this.seed);
        }
    }
</script>

<style scoped>

</style>
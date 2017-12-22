<template>
    <div>{{message}}</div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        name: "message",
        computed: mapGetters({
            message: 'message'
        }),
    }
</script>

<style scoped>

</style>
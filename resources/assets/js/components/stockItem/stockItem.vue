<template>
    <span>
        {{stockitem.date_of_purchase}} - {{stockitem.fresh_untill}} - {{stockitem.status}} [edit][delete]
    </span>
</template>

<script>
    export default {
        name: "stock-item",
        props: ['stockitem']
    }
</script>

<style scoped>

</style>
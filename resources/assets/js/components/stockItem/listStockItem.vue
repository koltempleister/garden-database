<template>
    <div>
        <h4>Stock</h4>
        [add]
        <li
        v-for="(item, index) in stockitems"
        v-bind="item"
        v-bind:index="index"
        v-bind:key="item.id"
        >
            <stock-item :stockitem="item"></stock-item>
        </li>
    </div>
</template>

<script>
    import StockItem from './stockItem.vue';

    export default {
        name: "list-stock-item",
        components : {
            StockItem
        },
        props : ['stockitems']
    }
</script>

<style scoped>
li{
    list-style-type: none;
}
</style>
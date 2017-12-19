<template>
    <div>
        <h3 v-on:click="detail = !detail">{{seed.name}}</h3>
        <nav>
            <li v-on:click="edit = !edit">edit</li>
            <li v-on:click="stock = !stock">stock</li>
            <li>delete</li>
        </nav>
        <div v-if="detail">
            <p>{{seed.remarks}}</p>

            <div>species: {{seed.species.name}}</div>
            <div>outside: {{seed.outside_from.formatted}} - {{seed.outside_till.formatted}}</div>
            <div>inside: {{seed.inside_from.formatted}} - {{seed.inside_till.formatted}}</div>
            <div>plant out: {{seed.plant_out_from.formatted}} - {{seed.plant_out_till.formatted}}</div>
            <div>row distance: {{seed.row_distance_cm}}</div>
            <div>thin out cm: {{seed.thin_out_till}}</div>
            <div>harvest: {{seed.harvest_from.formatted}} - {{seed.harvest_till.formatted}}</div>
        </div>
        <list-stock-item v-if="stock" :stockitems="seed.stock_items"></list-stock-item>
        <update-seed v-if="edit" :seed="seed"></update-seed>
    </div>
</template>

<script>
     import ListStockItem from '../stockItem/listStockItem.vue';
     import UpdateSeed from './updateSeed.vue';
     import MenuItem from '../menuItem';

    export default {
        name: "seed",
        props: ['seed' ],
        data () {
            return {
                detail: false,
                stock: false,
                edit: false,
            }
        },
        components: {
            UpdateSeed,
            ListStockItem,
            MenuItem
        },
    }
</script>

<style scoped>
nav li {
    display: inline;
}
</style>
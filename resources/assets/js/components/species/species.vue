<template>
    <div>
        {{species.name}}
        <li v-for="(child,index) in species.children"
            v-bind="child"
            v-bind:index="index"
            v-bind:key="child.id"
        >
            <species :species="child"></species>
        </li>
    </div>
</template>

<script>


    export default {
        name: "species",
        props:['species'],

    }
</script>

<style scoped>
 div {
     margin-left:20px;
 }
</style>
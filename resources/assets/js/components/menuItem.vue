<template>
    <span
            v-on:click="isactive"
            v-bind:class="{active: isactive}"
    >{{title}}</span>
</template>

<script>
    export default {
        name: "menu-item",
        data(){
            return {
                isactive : false
            }
        },
        props:['title'],

    }
</script>

<style scoped>
.active{
    background-color: #00b3ee;
}
</style>
<template>
    <div>
        <h3>{seed.name}</h3>
        <div>{seed.remarks}</div>
    </div>
</template>

<script>
    export default {
        name: "seed",
        data: function () {
            return {seed: {name: '', remarks: ''}}
        },
        created: function() {
            let uri = 'http://zaden.local/seed/31' + this.$route.params.id;
            // let uri = 'http://zaden.local/seed/' + this.$route.params.id;
            Axios.get(uri).then((response) => {
                this.seed = response.data;
            });
        }
    }
</script>

<style scoped>

</style>
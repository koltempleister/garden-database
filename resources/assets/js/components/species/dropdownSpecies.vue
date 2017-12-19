<template>
    <select name="species_id">
        <option
                v-for="(species,index) in flatTreeSpecies"
                v-bind:key="index"
                v-bind:value="species.id"

        >{{species.name}}</option>
    </select>
</template>

<script>
    export default {
        name: "dropdown-species",
        data() {
            return {
                allspecies:[],
                flatTree:[]
            };
        },
        created () {
            let uri = 'http://zaden.local/species';
            Axios.get(uri).then((response) => {
                console.log('ajax call made');
                this.allspecies = response.data;
            });
        },
        //https://stackoverflow.com/questions/39740660/render-a-select-recursively-in-vue-js#39744577
        computed:{
            flatTreeSpecies(){

                return this.flat(this.allspecies);
            }
        },
        methods:{

            flat(items) {
                var final = []
                var self = this
                items.forEach( function(item) {
                    final.push(item)

                    if (typeof item.children !== 'undefined') {
                        final = final.concat(self.flat(item.children));
                    }
                })

                return final;
            }
        }

    }


</script>

<style scoped>

</style>
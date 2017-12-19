<template>
    <select name="species_id" v-model="species_id">
        <option
                v-for="(species,index) in flatTreeSpecies"
                v-bind:key="index"
                v-bind:value="species.id"

                :selected="species.id == seed.species_id"
        >{{species.name}}</option>
    </select>
</template>

<script>
    export default {
        name: "dropdown-species",
        props:['seed'],
        data() {
            return {
                allspecies:[],
                flatTree:[],
                species_id:this.seed.species_id
            };
        },
        created () {
            let uri = 'http://zaden.local/species';
            Axios.get(uri).then((response) => {
                console.log('ajax call made');
                this.allspecies = response.data;
            });
        },
        /**
         * flatten tree
         * https://stackoverflow.com/questions/39740660/render-a-select-recursively-in-vue-js#39744577
         */
        computed:{
            flatTreeSpecies(){

                return this.flat(this.allspecies);
            }
        },
        watch:{
          species_id(){
              console.log('species_id selected');
              this.seed.species_id = this.species_id
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
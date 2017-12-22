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

    import { mapGetters } from 'vuex'

    export default {
        name: "dropdown-species",
        props:['seed'],
        data() {
            return {
                flatTree:[],
                species_id:this.seed.species_id
            };
        },
        /**
         * flatten tree
         * https://stackoverflow.com/questions/39740660/render-a-select-recursively-in-vue-js#39744577
         */
        computed:{
            ...mapGetters({
                allspecies: 'species'
            }),
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
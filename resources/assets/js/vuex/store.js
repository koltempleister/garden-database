import Vue from 'vue'
import Vuex from 'vuex'
import * as actions  from './actions'
import { state,mutations } from './mutations'
import * as getters  from './getters'

Vue.use(Vuex);
Vue.config.debug = true;



export default new Vuex.Store({
    state,
    getters,
    actions,
    mutations
})
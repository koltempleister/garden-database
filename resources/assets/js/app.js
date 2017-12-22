// require('./bootstrap');

window.Vue = require('vue');

window.VueAxios=require('vue-axios').default;

window.Axios=require('axios').default;

import store from './vuex/store'

let AppLayout= require('./components/App.vue');


new Vue(
    Vue.util.extend(
    //     { router },
        AppLayout
    ),
    store

).$mount('#app');
export const state = {
    species:[],
    seeds:[],
    seedform: {
        show: false,
        busy: false,
        success: false,
        errors: {}
    },
    message:'testbeginboodschap'
}

export const mutations = {
    SET_SEED_FORM_SHOW (state, value) {
        console.log('form show state changed');
        state.seedform.show = value
    },
    GET_SEED_LIST () {
        let uri = 'http://zaden.local/seed';

        Axios.get(uri).then((response) => {
            console.log('ajax call made for seeds');
            state.seeds = response.data;
        });
    },
    CREATE_SEED (state, seed) {
        state.seeds.push(seed);
    },
    GET_SPECIES_LIST () {
        let uri = 'http://zaden.local/species';

        Axios.get(uri).then((response) => {
            console.log('ajax call made for species');
            state.species = response.data;
        });
    },
    ADD_MESSAGE (state, message) {
        state.message = message;
    },
}
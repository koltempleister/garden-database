export const showSeedForm = ({ commit }, show) => {
    commit('SET_SEED_FORM_SHOW',show);
}

export const getSeedList = ({ commit }) => {
    commit('GET_SEED_LIST');
}

export const getSpeciesList = ({ commit }) => {
    commit('GET_SPECIES_LIST');
}

export const addMessage  = ({ commit }, message) => {
    commit('ADD_MESSAGE', message);
}

export const addSeed = ({ commit, dispatch }, data ) => {
    let formData = data[0];
    let seed = data[1];

    formData.preventDefault();

    let uri = 'http://zaden.local/seed';

    Axios.post(uri, seed).then((response) => {
        commit('CREATE_SEED', response.data);
        dispatch('addMessage', 'new seed created');
        dispatch('showSeedForm', false);
    }).catch((error) => {
        dispatch('addMessage', error.message);
        console.log(error)
    });
}





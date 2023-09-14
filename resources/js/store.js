import { createStore } from "vuex";

const store = createStore({

    state: {
        user: {
            data: {},
            token: localStorage.getItem('auth_token'), // récupère le token du localstorage
        }
    }
});

export default store;
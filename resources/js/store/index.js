import Vue from 'vue'
import Vuex from "vuex";

Vue.use(Vuex);

import devices from "./modules/devices";

const store = new Vuex.Store({
    modules: {
        devices,
    }
})

export default store;
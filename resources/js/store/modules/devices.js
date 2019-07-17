import Vue from 'vue'

const devices = {
    namespaced: true,
    state: {
        data: [],
    },
    getters: {

    },
    mutations: {
        SET_DEVICES(state, devices) {
            for (const device in devices) {
                if (devices.hasOwnProperty(device)) {
                    const val = devices[device];
                    Vue.set(state.data, device, val);
                }
            }
        }
    },
    actions: {
        getDevices() {
            let self = this;
            axios
                .get("/devices")
                .then(function (response) {
                    // handle success
                    console.log(response);
                    self.commit("devices/SET_DEVICES", response.data)
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
    }
}

export default devices;
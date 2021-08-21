export default {
    state: {
        list: [],
        selected: [1, 2],
        items: [],
        children: [],
        show: {},
        new: {},
        update: {}
    },

    getters: {},

    actions: {
        index({ commit }) {
            return axios
                .get(`/api/item/`)
                .then(res => {
                    commit("setList", res.data);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        fetchItems({ commit, state, dispatch }) {
            commit("resetItems");
            state.selected.forEach(id => {
                dispatch("fetchItem", id);
            });
        },
        fetchItem({ commit, state }, id) {
            return axios
                .get(`/api/item/items/${id}`)
                .then(res => {
                    state.list.forEach(parent => {
                        if (parent.id === id) {
                            res.data.forEach(child => {
                                child.icon = parent.icon;
                            });
                        }
                    });
                    commit("setItems", res.data);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        show({ commit }, id) {
            return axios
                .get(`/api/item/${id}`)
                .then(res => {
                    commit("setShow", res.data);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },

    mutations: {
        setList(state, data) {
            state.list = data;
        },
        setSelected(state, data) {
            state.selected = data;
        },
        setItems(state, data) {
            state.items.push(...data);
        },
        resetItems(state) {
            state.items = [];
        },
        setShow(state, data) {
            state.show = data;
        }
    },

    namespaced: true
};

export default {
    state: {
        categories: [],
        selected: [1, 2],
        list: [],
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
                    commit("setCategories", res.data);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        buildList({ commit, state, dispatch }) {
            commit("resetList");
            state.selected.forEach(id => {
                dispatch("fetchList", id);
            });
        },
        fetchList({ commit, state }, id) {
            return axios
                .get(`/api/item/list/${id}`)
                .then(res => {
                    state.categories.forEach(parent => {
                        if (parent.id === id) {
                            res.data.forEach(child => {
                                child.icon = parent.icon;
                            });
                        }
                    });
                    commit("setList", res.data);
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
                    console.log(res.data);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },

    mutations: {
        setCategories(state, data) {
            state.categories = data;
        },
        setSelected(state, data) {
            state.selected = data;
        },
        setList(state, data) {
            state.list.push(...data);
            state.list.sort((a, b) => a.name > b.name);
        },
        resetList(state) {
            state.list = [];
        },
        setShow(state, data) {
            state.show = data;
        }
    },

    namespaced: true
};

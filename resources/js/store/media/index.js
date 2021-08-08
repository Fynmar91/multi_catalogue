export default {
    state: {
        list: [],
        new: {},
        update: {},
        empty: {
            name: "",
            name_alt: "",
            season: null,
            released_at: null,
            rating: null,
            type_id: null,
            status_id: null
        },
        filter: {
            types: [],
            statuses: []
        },
        search: ""
    },

    getters: {
        getList(state) {
            return state.list;
        },
        getFilteredList(state, getters) {
            let list = getters.getList;

            if (state.search == "") {
                if (state.filter.types.length > 0) {
                    list = list.filter(item =>
                        state.filter.types.includes(item.type_id)
                    );
                }

                if (state.filter.statuses.length > 0) {
                    list = list.filter(item =>
                        state.filter.statuses.includes(item.status_id)
                    );
                }
            }

            return list;
        },
        getListCount(state, getters) {
            return getters.getFilteredList.length;
        },
        getOne: state => id => {
            let a = state.list.find(item => item.id == id);
            if (a == undefined) return state.empty;
            return a;
        },
        getNew(state) {
            return state.new;
        },
        getUpdate(state) {
            return state.update;
        },
        getTypeFilter(state) {
            return state.filter.types;
        },
        getStatusFilter(state) {
            return state.filter.statuses;
        },
        getSearch(state) {
            return state.search;
        }
    },

    actions: {
        index(context) {
            return new Promise((resolve, reject) => {
                axios
                    .get("media")
                    .then(response => {
                        context.commit("setList", response.data);
                    })
                    .catch(error => reject(error.response.data.errors));
            });
        },
        create(context) {
            return new Promise((resolve, reject) => {
                axios
                    .get("medium/create")
                    .then(response => {
                        context.commit("setNew", response.data);
                    })
                    .catch(error => reject(error.response.data.errors));
            });
        },
        store(context) {
            return new Promise((resolve, reject) => {
                axios
                    .post("medium/", context.getters.getNew)
                    .then(response => {
                        console.log("go");
                        context.dispatch("index");
                        resolve(response);
                    })
                    .catch(error => reject(error.response.data.errors));
            });
        },
        edit(context, id) {
            return new Promise((resolve, reject) => {
                axios
                    .get(`medium/${id}/edit`)
                    .then(response => {
                        context.commit("setUpdate", response.data);
                    })
                    .catch(error => reject(error.response.data.errors));
            });
        },
        update(context) {
            return new Promise((resolve, reject) => {
                axios
                    .put(
                        `medium/${context.getters.getUpdate.id}`,
                        context.getters.getUpdate
                    )
                    .then(response => {
                        context.dispatch("index");
                        resolve(response);
                    })
                    .catch(error => reject(error.response.data.errors));
            });
        },
        delete(context, id) {
            return new Promise((resolve, reject) => {
                axios
                    .delete(`medium/${id}`)
                    .then(response => {
                        context.dispatch("index");
                        resolve(response);
                    })
                    .catch(error => reject(error.response.data.errors));
            });
        }
    },

    mutations: {
        setList(state, data) {
            state.list = data;
        },
        setNew(state, data) {
            state.new = data;
        },
        setUpdate(state, data) {
            state.update = data;
        },
        setTypeFilter(state, data) {
            state.filter.types = data;
            Vue.$cookies.set("types", JSON.stringify(data));
        },
        setStatusFilter(state, data) {
            state.filter.statuses = data;
            Vue.$cookies.set("statuses", JSON.stringify(data));
        },
        setSearch(state, data) {
            state.search = data;
        }
    },

    namespaced: true
};

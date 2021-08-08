/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

import App from "./App.vue";

// Vuetify
import Vuetify from "vuetify";
Vue.use(Vuetify);
export default new Vuetify({
    theme: { dark: true }
});

// Router
import VueRouter from "vue-router";
import router from "./router";
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

// Axios
import VueAxios from "vue-axios";
import axios from "axios";
Vue.axios.defaults.baseURL = process.env.MIX_API_URL;

// Vuex
import Vuex from "vuex";
Vue.use(Vuex);
import storeData from "./store/index";
const store = new Vuex.Store(storeData);

// Cookies
import VueCookies from "vue-cookies";
Vue.use(VueCookies);
Vue.$cookies.config("7d");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    store,
    el: "#app",
    vuetify: new Vuetify(),
    render: h => h(App)
});

import Vue from "vue";
import VueRouter from "vue-router";

import About from "../pages/About.vue";
import Home from "../pages/Home.vue";
import View from "../pages/View.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    routes: [
        {
            name: "home",
            path: "/",
            component: Home
        },
        {
            name: "about",
            path: "/about",
            component: About
        },
        {
            name: "view",
            path: "/view/:id",
            component: View
        }
    ]
});

export default router;

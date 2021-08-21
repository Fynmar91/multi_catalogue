<template>
    <Default>
        <template v-slot:sidebar>
            <Sidebar></Sidebar>
        </template>

        <template>
            <h1>Home</h1>
            <v-alert type="warning" :value="true">
                Vuetify was installed properly
            </v-alert>
        </template>
    </Default>
</template>

<script>
import Default from "../layouts/Default.vue";
import Sidebar from "../components/Sidebar.vue";

export default {
    components: {
        Default,
        Sidebar
    }
};
</script>

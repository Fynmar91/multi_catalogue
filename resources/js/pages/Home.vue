<template>
    <Default>
        <template v-slot:app-bar>
            <app-bar></app-bar>
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
import AppBar from "../components/AppBar.vue";

export default {
    components: {
        Default,
        AppBar
    }
};
</script>

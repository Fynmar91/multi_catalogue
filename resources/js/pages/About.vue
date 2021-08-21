<template>
    <Default>
        <template v-slot:sidebar>
            <Sidebar></Sidebar>
        </template>

        <template>
            <h1>About</h1>
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

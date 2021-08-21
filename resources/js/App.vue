<template>
    <router-view></router-view>
</template>

<script>
export default {
    created() {
        this.$store.dispatch("item/index");
    }
};
</script>

<style>
html,
body {
    overflow-x: hidden;
}
.v-list-item__title {
    text-decoration: none;
}
</style>

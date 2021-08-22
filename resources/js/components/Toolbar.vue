<template>
    <v-card min-height="64px" tile>
        <v-card-title>{{ show.name }}</v-card-title>
    </v-card>
</template>

<script>
export default {
    components: {},
    computed: {
        show: {
            get() {
                return this.$store.state.item.show;
            }
        }
    }
};
</script>

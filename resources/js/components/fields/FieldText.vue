<template>
    <v-text-field
        style="width: 200px"
        outlined
        :label="header"
        prepend-inner-icon="mdi-map-marker"
        v-model="value"
    >
    </v-text-field>
</template>

<script>
export default {
    props: {
        valueId: Number,
        fieldId: Number,
        value: String,
        header: String
    },
    data() {
        return {};
    },
    computed: {},
    methods: {},
    created() {}
};
</script>

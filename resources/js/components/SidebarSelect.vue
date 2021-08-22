<template>
    <v-select
        class="m-0 mr-3"
        :items="categories"
        v-model="selectedCategories"
        @change="changed"
        item-value="id"
        item-text="name"
        solo
        multiple
        dense
        flat
        hide-details
    ></v-select>
</template>

<script>
export default {
    data() {
        return {};
    },
    computed: {
        categories: {
            get() {
                return this.$store.state.item.categories;
            }
        },
        selectedCategories: {
            get() {
                return this.$store.state.item.selected;
            },
            set(value) {
                return this.$store.commit("item/setSelected", value);
            }
        }
    },
    methods: {
        changed() {
            this.$store.dispatch("item/buildList");
        }
    },
    created() {
        this.$store.dispatch("item/buildList");
    }
};
</script>

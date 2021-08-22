<template>
    <v-list class="grow">
        <v-list-item
            v-for="item in list"
            :key="item.id"
            item
            dense
            @click="click(item.id)"
            style="text-decoration: none;"
        >
            <v-list-item-icon>
                <v-icon v-text="item.icon"></v-icon>
            </v-list-item-icon>
            <v-list-item-content>
                <v-list-item-title v-text="item.name"></v-list-item-title>
            </v-list-item-content>
        </v-list-item>
    </v-list>
</template>

<script>
export default {
    data() {
        return {};
    },
    computed: {
        list: {
            get() {
                return this.$store.state.item.list;
            }
        }
    },
    methods: {
        click(id) {
            if (this.$route.params.id != id) {
                this.$store.dispatch("item/show", id);
                this.$router.push({ name: "view", params: { id: id } });
            }
        }
    }
};
</script>

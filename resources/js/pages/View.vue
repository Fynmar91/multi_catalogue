<template>
    <Default>
        <template v-slot:sidebar>
            <Sidebar></Sidebar>
        </template>

        <template v-slot:image>
            <Banner></Banner>
        </template>

        <template v-slot:bar>
            <Toolbar></Toolbar>
        </template>

        <template>
            <FieldBox></FieldBox>
        </template>

        <template v-slot:episodes>
            <Episodes></Episodes>
        </template>
    </Default>
</template>

<script>
import Default from "../layouts/Default.vue";
import Sidebar from "../components/Sidebar.vue";
import Banner from "../components/Banner.vue";
import Toolbar from "../components/Toolbar.vue";
import FieldBox from "../components/FieldBox.vue";
import Episodes from "../components/Episodes.vue";

export default {
    components: {
        Default,
        Sidebar,
        Banner,
        Toolbar,
        FieldBox,
        Episodes
    },
    computed: {
        show: {
            get() {
                return this.$store.state.item.show;
            }
        }
    },
    created() {
        this.$store.dispatch("item/show", this.$route.params.id);
    }
};
</script>

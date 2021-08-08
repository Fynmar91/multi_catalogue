<template>
    <v-app-bar app flat dense>
        <v-tabs centered color="orange">
            <v-tab
                v-for="link in links"
                :key="link[0]"
                :to="link[1]"
                class="px-15"
            >
                {{ link[0] }}
            </v-tab>
        </v-tabs>
    </v-app-bar>
</template>

<script>
export default {
    data: () => ({
        links: [
            ["Home", { name: "home" }],
            ["About", { name: "about" }]
        ]
    }),
    computed: {}
};
</script>

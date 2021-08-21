<template>
    <v-navigation-drawer permanent app width="300px">
        <v-row no-gutters align="center">
            <v-col cols="auto">
                <v-list-item class="pl-3 pr-0 my-1">
                    <router-link :to="{ name: 'home' }">
                        <v-list-item-avatar>
                            <v-img src="../img/22314.png"></v-img>
                        </v-list-item-avatar>
                    </router-link>
                </v-list-item>
            </v-col>
            <v-col>
                <SidebarSelect />
            </v-col>
        </v-row>
        <v-divider class="my-1"></v-divider>
        <v-row no-gutters>
            <SidebarList />
        </v-row>
    </v-navigation-drawer>
</template>

<script>
import SidebarSelect from "./SidebarSelect.vue";
import SidebarList from "./SidebarList.vue";

export default {
    components: {
        SidebarSelect,
        SidebarList
    }
};
</script>

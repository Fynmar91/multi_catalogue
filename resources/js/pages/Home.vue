<template>
    <Default>
        <template v-slot:sidebar>
            <Sidebar></Sidebar>
        </template>

        <template>
            <v-card class="mt-2" tile>
                <v-simple-table v-if="categories != null" dense tile>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-left" style="width: 50px">
                                    ID
                                </th>
                                <th class="text-left" style="width: 100px">
                                    Name
                                </th>
                                <th class="text-left" style="width: 100px">
                                    Level
                                </th>
                                <th class="text-left" style="width: 100px">
                                    Type
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in categories" :key="item.id">
                                <td>{{ item.id }}</td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.level }}</td>
                                <td>{{ item.type }}</td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-card>
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
    },
    computed: {
        categories: {
            get() {
                return this.$store.state.item.categories;
            }
        }
    }
};
</script>

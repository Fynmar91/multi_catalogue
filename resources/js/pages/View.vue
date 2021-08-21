<template>
    <Default>
        <template v-slot:sidebar>
            <Sidebar></Sidebar>
        </template>

        <template>
            <h1>View</h1>
            <h2>{{ show.name }}</h2>

            <FieldText
                v-if="show.values != null"
                v-bind:value="show.values[0].value"
                v-bind:header="show.values[0].field.header"
            />

            <v-simple-table dense class="mb-3">
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
                                Datum
                            </th>
                        </tr>
                    </thead>
                    <tbody v-if="show != null">
                        <tr v-for="item in show.children" :key="item.id">
                            <td>{{ item.id }}</td>
                            <td>{{ item.name }}</td>
                            <td>
                                {{
                                    item.dates[
                                        item.dates.length - 1
                                    ].date.split(" ")[0]
                                }}
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
            <v-simple-table v-if="show.tags != null" dense>
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
                                Type
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in show.tags" :key="item.id">
                            <td>{{ item.id }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.type }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </template>
    </Default>
</template>

<script>
import Default from "../layouts/Default.vue";
import Sidebar from "../components/Sidebar.vue";

import FieldText from "../components/fields/FieldText.vue";

export default {
    components: {
        Default,
        Sidebar,
        FieldText
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

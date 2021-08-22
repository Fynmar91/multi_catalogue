<template>
    <v-card class="p-2" tile>
        <FieldText
            v-if="show.values != null"
            v-bind:value="show.values[0].value"
            v-bind:header="show.values[0].field.header"
        />
        <v-simple-table v-if="show.tags != null" dense tile>
            <template v-slot:default>
                <thead>
                    <tr>
                        <th class="text-left">
                            ID
                        </th>
                        <th class="text-left">
                            Name
                        </th>
                        <th class="text-left">
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
    </v-card>
</template>

<script>
import FieldText from "../components/fields/FieldText.vue";

export default {
    components: {
        FieldText
    },
    computed: {
        show: {
            get() {
                return this.$store.state.item.show;
            }
        }
    }
};
</script>

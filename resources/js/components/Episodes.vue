<template>
    <v-card tile width="500px">
        <v-simple-table
            v-if="show.children != null && show.children.length > 0"
            dense
        >
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
                            Datum
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in show.children" :key="item.id">
                        <td>{{ item.id }}</td>
                        <td>{{ item.name }}</td>
                        <td>
                            {{
                                item.dates[item.dates.length - 1].date.split(
                                    " "
                                )[0]
                            }}
                        </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
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

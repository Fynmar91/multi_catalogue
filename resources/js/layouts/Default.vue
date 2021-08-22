<template>
    <v-app>
        <slot name="sidebar"></slot>

        <v-main class="my-2 ml-5 mr-0">
            <v-row dense>
                <v-col><slot name="image"></slot></v-col>
            </v-row>
            <v-row dense>
                <v-col><slot name="bar"></slot></v-col>
            </v-row>
            <v-row dense>
                <v-col><slot></slot></v-col>
                <v-col cols="auto"><slot name="episodes"></slot></v-col>
            </v-row>
        </v-main>
    </v-app>
</template>

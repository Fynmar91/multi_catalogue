<template>
    <v-app>
        <slot name="sidebar"></slot>

        <v-main class="ma-3">
            <slot></slot>
        </v-main>
    </v-app>
</template>

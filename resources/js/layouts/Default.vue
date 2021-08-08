<template>
    <v-app id="inspire">
        <slot name="app-bar"></slot>

        <v-main class="ma-3">
            <slot></slot>
        </v-main>
    </v-app>
</template>

<script setup lang="ts">
import fullLogo from '@/images/dg-web-logo.svg'
</script>

<template>
    <v-system-bar
        class="system-bar-container font-weight-bold"
        height="100"
        window
    >
        <router-link to="/home">
            <img
                class="mt-1 pl-1"
                :src="fullLogo"
                width="168px"
                alt="DG WEB Logo"
            />
        </router-link>
        <v-spacer></v-spacer>
    </v-system-bar>
</template>
<style scoped>
.system-bar-container {
    background-color: #ffffff;
    background-image: url('@/images/fond-dg-web.svg');
    background-size: auto 100%;
    background-repeat: no-repeat;
}
</style>
<script setup lang="ts">
defineProps({
    routeName: String,
    libelle: String,
    icon: String
})
</script>

<template>
    <li>
        <router-link
            :to="{ name: routeName }"
            class="flex items-center p-2 text-base text-dark rounded-lg hover:bg-gray-100 group no-underline"
        >
            <v-icon>mdi-home</v-icon>
            <span class="ml-3">{{ libelle }}</span>
        </router-link>
    </li>
</template>

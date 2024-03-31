<script setup lang="ts">
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

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
            <font-awesome-icon
                class="w-3 h-3 text-dark transition duration-75 group-hover:text-gray-900"
                :icon="['fas', icon]"
            />
            <span class="ml-3">{{ libelle }}</span>
        </router-link>
    </li>
</template>

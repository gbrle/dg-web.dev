<script setup lang="ts">
defineProps({
    title: {
        type: String,
        required: true
    }
})
</script>
<template>
    <h2 class="text-xl font-semibold text-gray-900 mt-10">{{ title }}</h2>
</template>

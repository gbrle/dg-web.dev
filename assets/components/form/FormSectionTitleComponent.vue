<script setup lang="ts">
defineProps({
    title: {
        type: String,
        required: true
    }
})
</script>
<template>
    <h2 class="text-xxl font-semibold text-gray-900">{{ title }}</h2>
</template>

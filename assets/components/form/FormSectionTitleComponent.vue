<script setup lang="ts">
defineProps({
    title: {
        type: String,
        required: true
    }
})
</script>
<template>
    <h2
        class="text-xl bg-dark text-white pl-4 pr-2 pb-2 pt-1"
    >
        {{ title }}
    </h2>
</template>

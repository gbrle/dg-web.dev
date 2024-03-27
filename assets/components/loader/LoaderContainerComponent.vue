<script setup lang="ts">
import LoaderComponent from '@/components/loader/LoaderComponent.vue'

defineProps({
    loading: {
        type: Boolean,
        default: true
    }
})
</script>

<template>
    <LoaderComponent v-if="loading" />
    <slot v-else></slot>
</template>

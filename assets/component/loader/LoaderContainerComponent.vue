<script setup lang="ts">
import LoaderComponent from '@/component/loader/LoaderComponent.vue'

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

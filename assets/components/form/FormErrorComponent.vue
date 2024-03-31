<script setup lang="ts">
defineProps({
    errors: {
        type: Array,
        required: true
    }
})
</script>
<template>
  <span v-for="(error, index) in errors" :key="index" class="text-red-500 text-xs">
    {{ error }}
  </span>
</template>

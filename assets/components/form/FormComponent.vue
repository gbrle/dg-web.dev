<script setup lang="ts">
defineProps({
    submitLabel: {
        type: String
    }
})

const emit = defineEmits(['submit'])

const submit = () => {
    emit('submit')
}
</script>

<template>
    <div>
        <slot></slot>
    </div>
        <button
            v-if="submitLabel"
            class="transform transition duration-500 hover:scale-105 border-dark sticky bottom-4 fa-pull-right bg-[#AF5A47] text-white text-uppercase py-2 px-4 mt-8 mb-3"
            @click="submit"
        >
            {{ submitLabel }}
        </button>
</template>

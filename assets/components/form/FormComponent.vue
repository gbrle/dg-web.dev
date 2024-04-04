<script setup lang="ts">
const props = defineProps({
    submitLabel: {
        type: String
    },
    item: {
        type: Object,
        required: false
    },
    isSubmitKeyUpEnter: {
        type: Boolean,
        default: false
    }
})

const emit = defineEmits(['submit'])

const submit = () => {
    emit('submit')
    if (props.item) emit('item', item)
}
</script>

<template>
    <div v-if="isSubmitKeyUpEnter" @keyup.enter="submit">
        <slot></slot>
    </div>
    <div v-else>
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

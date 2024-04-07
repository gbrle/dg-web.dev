<script setup lang="ts">
import { ref, watch } from 'vue'

const props = defineProps({
    libelle: String,
    icon: String,
    isOpenProp: Boolean,
})

const isOpen = ref(false)
const emit = defineEmits(['closeOtherDropdowns'])

// Lorsque la prop isOpenProp change, mettez à jour l'état de ce menu déroulant
watch(() => props.isOpenProp, (newValue) => {
    isOpen.value = newValue
})

const toggleDropdown = () => {
    isOpen.value = !isOpen.value
    // Fermez tous les autres menu déroulants
    if (isOpen.value) {
        emit('closeOtherDropdowns')
    }
}
</script>

<template>
    <li class="overflow-hidden">
        <button
            type="button"
            class="flex align-items-center justify-between w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 z-10"
            aria-controls="dropdown-content"
            @click="toggleDropdown"
        >
            <span class="flex align-items-center">
                <v-icon>mdi-home</v-icon>
                <span class="ml-3 fw-bold"> {{ libelle }} </span>
            </span>
            <slot name="arrow-icon" :toggle-dropdown="toggleDropdown">
                <v-icon>mdi-home</v-icon>
            </slot>
        </button>
        <ul v-if="isOpen" class="z-20 pl-12 w-full overflow-hidden text-base animate__animated animate__backInLeft">
            <slot></slot>
        </ul>
    </li>
</template>

<style scoped>
.animate__animated.animate__backInLeft {
    --animate-duration: 0.400s;
}
</style>

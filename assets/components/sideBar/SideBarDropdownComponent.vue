<script setup lang="ts">
import { ref } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

defineProps({
    libelle: String,
    icon: String
})

const isOpen = ref(false)

const toggleDropdown = () => {
    isOpen.value = !isOpen.value
}
</script>

<template>
    <li class="overflow-hidden">
        <button
            type="button"
            class="flex justify-between w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 z-10"
            aria-controls="dropdown-content"
            @click="toggleDropdown"
        >
      <span>
        <font-awesome-icon
            class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
            :icon="['fas', icon]"
        />
        <span class="ml-3"> {{ libelle }} </span>
      </span>
            <slot name="arrow-icon" :toggle-dropdown="toggleDropdown">
                <font-awesome-icon
                    v-if="isOpen"
                    class="w-4 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                    :icon="['fas', 'chevron-up']"
                />
                <font-awesome-icon
                    v-else
                    class="w-4 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                    :icon="['fas', 'chevron-down']"
                />
            </slot>
        </button>
        <ul v-if="isOpen" class="z-20 w-full py-2 overflow-hidden text-base">
            <slot></slot>
        </ul>
    </li>
</template>

<script setup lang="ts">
import { useInputClasses } from '@/composables/form/useInputClasses'
import FormErrorComponent from '@/components/form/FormErrorComponent.vue'
import { computed, type PropType } from 'vue'
import type { SelectableInterface } from '@/model/selectableInterface'

const props = defineProps({
    modelValue: {
        type: [String, Number]
    },
    label: {
        type: String,
        default: ''
    },
    choices: {
        type: Array as PropType<SelectableInterface[]>
    },
    choicesEnum: {
        type: Object
    },
    span: {
        type: String,
        default: '4'
    },
    errors: {
        type: Array,
        default: () => []
    },
    clearable: {
        type: Boolean,
        default: true
    }
})

const hasError = computed(() => props.errors?.length > 0)
const { inputClasses, labelClasses } = useInputClasses(hasError)

const emit = defineEmits(['update:modelValue'])
const onInput = (event: Event) => {
    const target = event.target as HTMLInputElement
    emit('update:modelValue', target.value)
}
const clearSelection = () => {
    emit('update:modelValue')
}
</script>

<template>
    <div :class="`col-12 col-md-${span} relative`">
        <label v-if="label" :class="labelClasses"> {{ label }}</label>
        <select v-if="choices" :class="inputClasses" :value="modelValue" @input="onInput">
            <option v-for="choice in choices" :key="choice.getKey()" :value="choice.getKey()">
                {{ choice.getLibelle() }}
            </option>
        </select>
        <select
            v-if="choicesEnum"
            id="countries"
            :class="inputClasses"
            :value="modelValue"
            @input="onInput"
        >
            <option v-for="(choice, index) in choicesEnum" :key="index" :value="index">
                {{ choice }}
            </option>
        </select>
        <button
            class="absolute right-5 top-9"
            v-if="modelValue && clearable"
            type="button"
            @click="clearSelection"
        >
            <v-icon>mdi-home</v-icon>
        </button>
        <FormErrorComponent v-if="errors" :errors="errors" />
    </div>
</template>
